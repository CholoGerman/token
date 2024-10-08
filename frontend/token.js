const form = document.getElementById('login-form');
const tokenContainer = document.getElementById('token-container');

form.addEventListener('submit', (e) => {
  e.preventDefault();
  let username = document.getElementById('username').value;
  let password = document.getElementById('password').value;

  fetch('controlador.php', {
    method: 'POST',
    headers: {
      'Content-Type': 'application/json'
    },
    body: JSON.stringify({ username, password })
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