// Informations d'identification valides prédéfinies
const validUsername = "admin";
const validPassword = "motdepasse";

function check() {
    const loginForm = document.getElementById("login-form");
loginForm.addEventListener("submit", function(event) {
  event.preventDefault(); // Empêche le rechargement de la page

  // Récupération des valeurs saisies
  const username = document.getElementById("identifiant").value;
  const password = document.getElementById("password").value;

  // Vérification des informations d'identification
  if (username === validUsername && password === validPassword) {
    // Redirection vers une autre page en cas de succès
    window.location.href = "dashboard.html";
  } else {
    // Affichage d'une alerte en cas d'échec
    alert("Nom d'utilisateur ou mot de passe incorrect.");
  }
});
}

// Gestionnaire d'événement pour le formulaire
