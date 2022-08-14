$(document).ready(function() {

  // Valida url
  const isValidHttpUrl = (string) => {
      let url;
      
      try {
        url = new URL(string);
      } catch (_) {
        return false;  
      }
    
      return url.protocol === "http:" || url.protocol === "https:";
  }

  // Mostra alert
  const showAlert = (txt, type) => {

      let alert = document.createElement('div');
      alert.className = `alert ${type}`;
      alert.ariaRoleDescription = 'alert';
      alert.innerText = txt;

      let container = document.getElementById("alertContainer");
      container.appendChild(alert);
      return alert;

  }

  // Buscando Urls do banco de dados
  const loadUrls = () => {
    fetch('Sistema/conexaourl.php')
    .then(res => res.json())
    .then(data => {
      let output = '';
      for(let i in data){

        let {id, url, body, status} = data[i];
        body = (body || '').replace(/&/g, "&amp;")
          .replace(/</g, "&lt;")
          .replace(/>/g, "&gt;")
          .replace(/"/g, "&quot;")
          .replace(/'/g, "&#39;")
        status = (status || '')

        let scheme = {
          '0': 'primary',
          '2': 'success',
          '3': 'warning',
          '4': 'danger'
        }[`${status ?? '0'}`[0]]


        output += `
          <li class="list-group-item mt-2" data-toggle="modal" data-target="#modal${id}">
            <span class="badge badge-${scheme}">${status}</span>
            <span>${url}</span> 
          </li>
        `;

        let containerModal = document.getElementById('containerModal');
        containerModal.innerHTML = containerModal.innerHTML + `
          <div class="modal fade" id="modal${id}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLongTitle">
                    <span class="badge badge-${scheme}">${status}</span>
                    ${url}
                  </h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body" style="word-break: break-all;">
                  ${body || '<i>Body não encontrado</i>'}
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <button type="button" class="btn btn-primary">Save changes</button>
                </div>
              </div>
            </div>
          </div>
        `;

      }

      $('#listaUrl').html(output);

    })
    .catch(e => console.log(e))
  }

  loadUrls();

  // Adicionando urls no banco de dados
  let adcUrl = $("#adcUrl");
  let input = $("#inputUrl");

  $(adcUrl).on("click", e => {
                  
    e.preventDefault();

    if(isValidHttpUrl(input.val())) {

      let formdata = new FormData();
      formdata.append('url', input.val());

      fetch('./Sistema/addUrl.php', {
        method: 'post',
        body: formdata
      })
      .then(() => {
        loadUrls();
        let alert = showAlert("Url adicionada com sucesso!", 'alert-success');
        setTimeout(() => {
          alert.remove();
        }, 2000);
      })

      input.val('');

    } else {

      input.val('');
      
      let alert = showAlert("Url invalida!", "alert-danger");
      setTimeout(() => {
        alert.remove();
      }, 2000);

    }
                  
  });

  // Atualizando pagina
  $("#btnAtualizar").on('click', () => {

    $("#listaUrl").html('');
    let containerModal = document.getElementById('containerModal');
    containerModal.innerHTML = '';
    loadUrls();

  })

  setInterval(() => {
    $('.modal').modal('hide');
    let containerModal = document.getElementById('containerModal');
    containerModal.innerHTML = '';
    loadUrls();
  }, 5*60*1000)

})



