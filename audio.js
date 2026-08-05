//music oh yeahh


 
const bgmusic = document.getElementById("bg-music");
 document.addEventListener('click', () => {
    if(bgmusic.paused) {
      bgmusic.play().catch(error => console.log("blocked suckka",error));}
    }, {once: true});

  window.addEventListener('pageshow', (event) => {
      const audio = document.getElementById('bg-music'); 
      if (event.persisted && audio) {
          audio.play().catch((error) => {
              console.log("Autoplay was prevented", error);
          });
      }
  });
 const battlemusic = document.getElementById("battle-music");
  document.addEventListener('click', () => {
    if(battlemusic.paused) {
      battlemusic.play().catch(error => console.log("blocked suckka",error));}
    }, {once: true});

  window.addEventListener('pageshow', (event) => {
      const audio = document.getElementById('battle-music'); 
      if (event.persisted && audio) {
          audio.play().catch((error) => {
              console.log("Autoplay was prevented", error);
          });
      }
  });

// function playMusic() {
//   bgmusic.play().catch(error => console.log("blocked suckka",error));
// }

// function playBattleMusic() {
//   battlemusic.play().catch(error => console.log("blocked suckka",error));
// }