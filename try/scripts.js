
function toggleFaq(element) {
  const answer = element.nextElementSibling;
  
  // Toggle the display of the answer
  if (answer.style.display === 'block') {
      answer.style.display = 'none';
      element.classList.remove('active');
  } else {
      answer.style.display = 'block';
      element.classList.add('active');
  }
}
// Informations d'identification valides (stockées localement)
const validCredentials = {
    username: 'admin',
    password: 'password123'
  };

  const loginForm = document.getElementById('loginForm');

  loginForm.addEventListener('submit', (event) => {
    event.preventDefault(); // Empêcher le rechargement de la page

    const username = document.getElementById('username').value;
    const password = document.getElementById('password').value;

    // Vérifier les informations d'identification
    if (username === validCredentials.username && password === validCredentials.password) {
      // Rediriger vers une autre page
      window.location.href = 'db1.html';
    } else {
      alert('Nom utilisateur ou mot de passe incorrect.');
    }
  });
