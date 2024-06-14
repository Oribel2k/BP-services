function redirect1() {
  window.location.href = "form.php"
}

function redirect2() {
  window.location.href = ""
}

function redirect3() {
  window.location.href = ""
}

function redirect() {
  window.location.href = "details.php"
}

function redirect4() {
  window.location.href = "index.php"
}

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

// script.js
window.onload = function() {
  const modal = document.getElementById("modal");
  if (modal) {
      setTimeout(() => {
          modal.style.display = "none";
          window.location.href = "index.php";
      }, 3000);
  }
};


