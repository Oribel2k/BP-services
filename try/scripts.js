<<<<<<< HEAD
=======

>>>>>>> c6bcd2131b7d81c3a5f921db9fb93592e0fae3a5
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
<<<<<<< HEAD
=======
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
>>>>>>> c6bcd2131b7d81c3a5f921db9fb93592e0fae3a5
