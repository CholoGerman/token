window.onload = () => {


}

let form = document.getElementById('login-form');
let tokenContainer = document.getElementById('token-container');

form.addEventListener('submit', (e) => {
  e.preventDefault();
  let correo = document.getElementById('correo').value;
  let contraseña = document.getElementById('contraseña').value;

  fetch('controlador.php', {
    method: 'POST',
    headers: {
      'Content-Type': 'application/json'
    },
    body: JSON.stringify({ correo, contraseña })
  })
  .then(response => response.json())
  .then(data => {
    if (data.token) {
      tokenContainer.innerHTML = `Token: ${data.token}`;
    } else {
      tokenContainer.innerHTML = 'Credenciales incorrectas';
    }
  })
  .catch(error => console.error(error));
});