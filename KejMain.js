const canvas = document.querySelector('canvas');
const context = canvas.getContext(`2d`);

const play = document.getElementById('start-btn');
const playButton = new Image(); playButton.src = 'K_Images/play.png';
const walkSprites = new Image(); walkSprites.src = 'K_Images/testsprite.png';
const town = new Image(); town.src = 'K_Images/town.png';
const tree = new Image(); tree.src = 'K_Images/tree.png';
const enemy1 = new Image(); enemy1.src = 'K_Images/enemy1_left.png';
const npc1 = new Image(); npc1.src = 'K_Images/oldman.png';
const townmusic = new Audio('K_Audio/town4.mp3'); townmusic.loop = true;
let townMusicStarted = false;

function playTownMusic() {
  if (!townmusic.paused) return;
  townmusic.play()
    .then(() => { townMusicStarted = true; })
    .catch(error => console.log('townmusic play blocked', error));
}

window.addEventListener('pageshow', (event) => {
  if ((event.persisted || document.visibilityState === 'visible') && townMusicStarted) {
    playTownMusic();
  }
});

document.addEventListener('visibilitychange', () => {
  if (document.visibilityState === 'visible' && townMusicStarted) {
    playTownMusic();
  }
});

const walkSpriteWidth = 333.5;
const walkSpriteHeight = 522;
let i = 0;
let j = 0;
let walking = false;
let npc1Interactable = false;
let townx = 0;
let towny = -200;
let treex = 252;
let treey = 320;
let enemy1x = 767;
let enemy1y = 444;
let npc1x = 528;
let npc1y = 50;
let spriteSize = 32;
let spritex = 176;
let spritey = 100;
let direction;
let spritesy = 0;
let encountered = 0;
let gameStart = false;
let picked = false;


function drawWorld() {
    context.clearRect(0, 0, canvas.width, canvas.height);

    // if (image.complete) {
    //     context.drawImage(image, 0, 0, canvas.width, canvas.height);
    // }

    if(direction == "right" && treex >= spritex && treex <= spritex + spriteSize && treey+102 >= spritey + spriteSize/16*25/2 - 2 && treey <= spritey + spriteSize + 2) {
        console.log("left of the tree");
        walking = false;
        spritesy = 1997*3/4;
    }
    if(direction == "right" && enemy1x >= spritex && enemy1x <= spritex + spriteSize && enemy1y + spriteSize/16*25 >= spritey + spriteSize/16*25/2 && enemy1y <= spritey + spriteSize + 2) {
        console.log("left of the enemy1");
        walking = false;
        spritesy = 1997*3/4;
    }
    if(direction == "right" && npc1x >= spritex && npc1x <= spritex + spriteSize && npc1y + spriteSize/14*20/2 >= spritey && npc1y <= spritey + spriteSize + 6) {
        console.log("left of the npc1");
        walking = false;
        spritesy = 1997*3/4;
    }
    if(direction == "left" && treex + 64 >= spritex && treex + 64 <= spritex + spriteSize && treey+102 >= spritey + spriteSize/16*25/2 - 2 && treey <= spritey + spriteSize + 4) {
        console.log("right of the tree");
        walking = false;
        spritesy = 1997*2/4;
    }
    if(direction == "left" && enemy1x + spriteSize >= spritex && enemy1x + spriteSize <= spritex + spriteSize && enemy1y + spriteSize/16*25/2 >= spritey && enemy1y <= spritey + spriteSize + 2) {
        console.log("right of the enemy1");
        walking = false;
        spritesy = 1997*2/4;
    }
    if(direction == "left" && npc1x + spriteSize >= spritex && npc1x + spriteSize <= spritex + spriteSize && npc1y + spriteSize/14*20/2 >= spritey && npc1y <= spritey + spriteSize + 6) {
        console.log("right of the npc1");
        walking = false;
        spritesy = 1997*2/4;
    }
    if(direction == "up" && treex + 64 >= spritex + spriteSize/4 && treex + spriteSize/4 <= spritex + spriteSize && treey + 102 - spriteSize/2 >= spritey && treey <= spritey) {
        console.log("below the tree");
        walking = false;
        spritesy = 1997/4;
    }
    if(direction == "up" && enemy1x + spriteSize >= spritex + spriteSize/4 && enemy1x + spriteSize/4 <= spritex + spriteSize && enemy1y + spriteSize/16*25 - spriteSize/2 >= spritey && enemy1y <= spritey) {
        console.log("below the enemy1");
        walking = false;
        spritesy = 1997/4;
    }
    if(direction == "up" && npc1x + spriteSize >= spritex + spriteSize/4 && npc1x + spriteSize/4 <= spritex + spriteSize && npc1y + spriteSize/14*20 - spriteSize/2 >= spritey && npc1y <= spritey) {
        console.log("below the npc1");
        walking = false;
        spritesy = 1997/4;
    }
    if(direction == "down" && treex + 64 >= spritex + spriteSize/4 && treex + spriteSize/4 <= spritex + spriteSize && treey + 102 >= spritey + spriteSize/16*25/2 && treey + spriteSize/4 - 2 <= spritey + spriteSize/16*25) {
        console.log("above the tree");
        walking = false;
        spritesy = 0;
    }
    if(direction == "down" && enemy1x + spriteSize >= spritex + spriteSize/4 && enemy1x + spriteSize/4 <= spritex + spriteSize && enemy1y + spriteSize/16*25/2 >= spritey && enemy1y <= spritey + spriteSize/16*25 + 2) {
        console.log("above the enemy1");
        walking = false;
        spritesy = 0;
    }
    if(direction == "down" && npc1x + spriteSize >= spritex + spriteSize/4 && npc1x + spriteSize/4 <= spritex + spriteSize && npc1y + spriteSize/14*20/2 >= spritey && npc1y <= spritey + spriteSize/14*20 + 2) {
        console.log("above the npc1");
        walking = false;
        spritesy = 0;
    }
    
    if(enemy1x >= 0 && enemy1x + spriteSize <= canvas.width && enemy1x >= spritex + spriteSize && spritey + spriteSize/3 >= enemy1y && spritey + spriteSize - 2 <= enemy1y + spriteSize/16*25 && Math.abs(enemy1x - spritex) <= canvas.width/3 && encountered < 1) {
      alert('An enemy approached!');
      encountered++;
      window.location = `encounter.php?enemyid=1`;
    }

    if((spritesy == 1997*2/4 && npc1x + spriteSize >= spritex && npc1x + spriteSize <= spritex + spriteSize && npc1y + spriteSize/14*20/2 >= spritey && npc1y <= spritey + spriteSize + 6) 
    || (spritesy == 1997/4 && npc1x + spriteSize >= spritex + spriteSize/4 && npc1x + spriteSize/4 <= spritex + spriteSize && npc1y + spriteSize/14*20 - spriteSize/2 >= spritey && npc1y <= spritey)
    || (spritesy == 1997*3/4 && npc1x >= spritex && npc1x <= spritex + spriteSize && npc1y + spriteSize/14*20/2 >= spritey && npc1y <= spritey + spriteSize + 6)
    ) { npc1Interactable = true; } else { npc1Interactable = false; }
    if((spritesy == 1997*3/4 && enemy1x >= spritex && enemy1x <= spritex + spriteSize && enemy1y + spriteSize/16*25 >= spritey + spriteSize/16*25/2 && enemy1y <= spritey + spriteSize + 2)
    || (spritesy == 1997*2/4 && enemy1x + spriteSize >= spritex && enemy1x + spriteSize <= spritex + spriteSize && enemy1y + spriteSize/16*25/2 >= spritey && enemy1y <= spritey + spriteSize + 2)
    || (spritesy == 1997/4 && enemy1x + spriteSize >= spritex + spriteSize/4 && enemy1x + spriteSize/4 <= spritex + spriteSize && enemy1y + spriteSize/16*25 - spriteSize/2 >= spritey && enemy1y <= spritey) 
    || (spritesy == 0 && enemy1x + spriteSize >= spritex + spriteSize/4 && enemy1x + spriteSize/4 <= spritex + spriteSize && enemy1y + spriteSize/16*25/2 >= spritey && enemy1y <= spritey + spriteSize/16*25 + 2)
    ) { enemy1Interactable = true; } else { enemy1Interactable = false; }

    if(walking) {
        switch(direction) {
            case "down":
                if(towny > -360 && spritey >= canvas.height/2 - spriteSize/16*25/2) {towny -= spriteSize/4; treey -= spriteSize/4; enemy1y -= spriteSize/4; npc1y -= spriteSize/4;} else { spritey += spriteSize/4;}
                spritesy = 0;
                break;
            case "up": 
                if(towny < 0 && spritey <= canvas.height/2 - spriteSize/16*25/2) {towny += spriteSize/4; treey += spriteSize/4; enemy1y += spriteSize/4; npc1y += spriteSize/4;} else { spritey -= spriteSize/4 ;}
                spritesy = 1997/4;
                break;
            case "left": 
                if(townx < 0 && spritex <= canvas.width/2 - spriteSize/2) {townx += spriteSize/4; treex += spriteSize/4; enemy1x += spriteSize/4; npc1x += spriteSize/4;} else { spritex -= spriteSize/4 ;}
                spritesy = 1997*2/4;
                break;
            case "right": 
                if(townx > -1120 && spritex >= canvas.width/2 - spriteSize/2) {townx -= spriteSize/4; treex -= spriteSize/4; enemy1x -= spriteSize/4; npc1x -= spriteSize/4;} else { spritex += spriteSize/4;}
                spritesy = 1997*3/4;
                break;
        }
        context.drawImage(town, townx, towny, 1920, 960);
        context.drawImage(tree, treex, treey);
        context.drawImage(enemy1, 34 * j, 0, 34, 54, enemy1x, enemy1y, spriteSize, spriteSize/16*25);
        context.drawImage(npc1, 0, 0, 28, 40, npc1x, npc1y, spriteSize, spriteSize/14*20);
        context.drawImage(walkSprites, walkSpriteWidth * i, spritesy, walkSpriteWidth, walkSpriteHeight, spritex, spritey, spriteSize, spriteSize/16*25);
        console.log("walking", i);
        i++
        if(i >= 4) { i = 0; walking = false; }
    } else {
        context.drawImage(town, townx, towny, 1920, 960); 
        context.drawImage(tree, treex, treey);
        context.drawImage(enemy1, 34 * j, 0, 34, 54, enemy1x, enemy1y, spriteSize, spriteSize/16*25);
        context.drawImage(npc1, 0, 0, 28, 40, npc1x, npc1y, spriteSize, spriteSize/14*20);
        context.drawImage(walkSprites, 0, spritesy, walkSpriteWidth, walkSpriteHeight, spritex, spritey, spriteSize, spriteSize/16*25);
    }
} 

function gameCheck() {
  drawWorld();
}

playButton.onload = function() { context.drawImage(playButton, canvas.width/2-64,canvas.height/2-64, 128, 128); };
window.addEventListener('click', (event) => {
    if(!gameStart) {
      window.setInterval(gameCheck,1000/20);
      playTownMusic();
      gameStart = true;
    }
    if (townMusicStarted && townmusic.paused) {
      playTownMusic();
    }
});



document.addEventListener('keydown', (event) => {
  if (event.key === 'z' || event.key === 'Enter'){ 
    if(npc1Interactable) {
      alert('The power of technology is amazing!');
    }
    if(enemy1Interactable) {
      if(encountered < 1) {
        alert('An enemy approached!');
        encountered++;
        window.location = `encounter.php?enemyid=1`;
      } else {
        alert('Good fight!');
      }
    }
  }
  if (event.key === 's' || event.key === 'ArrowDown') {
    walking = true;
    direction = "down";
  }
  else if (event.key === 'w' || event.key === 'ArrowUp') {
    walking = true;
    direction = "up";
  }
  else if (event.key === 'a' || event.key === 'ArrowLeft') {
    walking = true;
    direction = "left";
  }
  else if (event.key === 'd' || event.key === 'ArrowRight') {
    walking = true;
    direction = "right";
  }
});
