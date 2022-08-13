
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
        ${data[i].url}
      </li>
    `;
  }

  $('#listaUrl').html(output);
})
.catch(e => console.log(e))



