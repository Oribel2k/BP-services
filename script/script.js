// function redirect() {
//     window.location.href ="";
// }

// function redirect1() {
//     window.location.href ="";
// }

// function redirect2() {
//     window.location.href ="";
// }

// function redirect3() {
//     window.location.href ="db1.html"
// }

<<<<<<< HEAD
// function toggleFaq(element) {
//     const answer = element.nextElementSibling;
    
//     // Toggle the display of the answer
//     if (answer.style.display === 'block') {
//         answer.style.display = 'none';
//         element.classList.remove('active');
//     } else {
//         answer.style.display = 'block';
//         element.classList.add('active');
//     }
// }
=======
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

>>>>>>> 81b1b5f3bcbbbb8fc3e9a52c3728f3901c595837

const validUsername = "admin";
const validPassword = "motdepasse";

// Gestionnaire d'événement pour le formulaire
const loginForm = document.getElementById("loginForm");
    loginForm.addEventListener("submit", function(event) {
    event.preventDefault(); // Empêche le rechargement de la page

// Récupération des valeurs saisies
const username = document.getElementById("identifiant").value;
const password = document.getElementById("password").value;

      // Vérification des informations d'identification
      if (username === validUsername && password === validPassword) {
        // Redirection vers une autre page en cas de succès
        window.location.href = "db1.html";
      } else {
        // Affichage d'une alerte en cas d'échec
        alert("Nom d'utilisateur ou mot de passe incorrect.");
      }
    });

