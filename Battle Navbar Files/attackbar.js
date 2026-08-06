const moves = document.querySelectorAll('.move'); 
const attack = document.querySelector('.attack');
const movebar = document.getElementById('movebar');

<script src= "attack.php"></script>

moves.forEach(button => {
  button.addEventListener('click', (e) => {
     e.preventDefault();
    checkmovebar();
  });
});

function checkmovebar() {
  if (movebar) {
     dodamge();

  }
}
function dodamge(){

}
// function pullupmovebar() {
//   if (attack) {
//     attack.addEventListener('click', (event) => {
//       event.preventDefault(); 
//       if (movebar) {
//         movebar.classList.remove('hidden'); 
//       }
//     });
//   }
// }
// pullupmovebar();