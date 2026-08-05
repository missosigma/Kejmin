const moves = document.querySelectorAll('.move'); 
const attack = document.querySelector('.attack a');
const movebar = document.getElementById('movebar');

moves.forEach(button => {
  button.addEventListener('click', () => {
    clearmovebar();
  });
});

function clearmovebar() {
  if (movebar) {
    movebar.classList.add('hidden'); 
  }
}

function pullupmovebar() {
  if (attack) {
    attack.addEventListener('click', (event) => {
      event.preventDefault(); 
      if (movebar) {
        movebar.classList.remove('hidden'); 
      }
    });
  }
}
pullupmovebar();