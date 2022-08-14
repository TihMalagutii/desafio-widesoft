$(document).ready(function() {

  const isValidHttpUrl = (string) => {
      let url;
      
      try {
        url = new URL(string);
      } catch (_) {
        return false;  
      }
    
      return url.protocol === "http:" || url.protocol === "https:";
  }

  const showAlert = (txt, type) => {

      let alert = document.createElement('div');
      alert.className = `alert ${type}`;
      alert.ariaRoleDescription = 'alert';
      alert.innerText = txt;

      let container = document.getElementById("alertContainer");
      container.appendChild(alert);
      return alert;

  }

  fetch('Sistema/conexaourl.php')
  .then(res => res.json())
  .then(data => {
    let output = '';
    for(let i in data){
      output += `
        <li class="list-group-item mt-2" data-toggle="modal" data-taget="${data[i].id}">
          <a class="btn btn-outline-danger mr-2">
            <i class="bi bi-trash"></i>
          </a>  
          <span>${data[i].url}</span> 
        </li>
      `;
    }

    $('#listaUrl').html(output);
  })
  .catch(e => console.log(e))

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
      });

      input.val('');

      let alert = showAlert("Url adicionada com sucesso!", 'alert-success');
      setTimeout(() => {
        alert.remove();
      }, 2000);

    } else {

      input.val('');
      
      let alert = showAlert("Url invalida!", "alert-danger");
      setTimeout(() => {
        alert.remove();
      }, 2000);

    }
                  
  });


  

})



