function redirect() {
    window.location.href ="";
}

function redirect1() {
    window.location.href ="";
}

function redirect2() {
    window.location.href ="";
}

function redirect3() {
    window.location.href ="dasboard.html"
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


