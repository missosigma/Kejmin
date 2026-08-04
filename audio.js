//music oh yeahh


 const battlemusic = document.getElementById("battle-music");
  const bgmusic = document.getElementById("bg-music");
//  document.addEventListener('click', () => {
//     if(bgmusic.paused) {
//       bgmusic.play().catch(error => console.log("blocked suckka",error));}
//     }, {once: true});

 
//   document.addEventListener('click', () => {
//     if(battlemusic.paused) {
//       battlemusic.play().catch(error => console.log("blocked suckka",error));}
//     }, {once: true});

function playMusic() {
  bgmusic.play().catch(error => console.log("blocked suckka",error));
}

function playBattleMusic() {
  battlemusic.play().catch(error => console.log("blocked suckka",error));
}