const canvas = document.querySelector('canvas');
const context = canvas.getContext(`2d`);

const walkSprites = new Image(); walkSprites.src = 'K_Images/testsprite.png';
const town = new Image(); town.src = 'K_Images/town.png';

const tree = new Image(); tree.src = 'K_Images/tree.png';
const enemy1 = new Image(); enemy1.src = 'K_Images/enemy1_left.png';
const walkSpriteWidth = 333.5;
const walkSpriteHeight = 522;
let i = 0;
let j = 0;
let walking = false;
let townx = 0;
let towny = -200;
let treex = 100;
let treey = 100;
let enemy1x = 767;
let enemy1y = 444;
let spriteSize = 32;
let spritex = 176;
let spritey = 100;
let direction;
let spritesy = 0;
let encountered = 0;

function drawWorld() {
    context.clearRect(0, 0, canvas.width, canvas.height);

    // if (image.complete) {
    //     context.drawImage(image, 0, 0, canvas.width, canvas.height);
    // }

    if(direction == "right" && treex >= spritex && treex <= spritex + spriteSize && treey+102 >= spritey + spriteSize/16*25/2 && treey <= spritey + spriteSize + 2) {
        console.log("left of the tree");
        walking = false;
        spritesy = 1997*3/4;
    }
    if(direction == "right" && enemy1x >= spritex && enemy1x <= spritex + spriteSize && enemy1y+102 >= spritey + spriteSize/16*25/2 && enemy1y <= spritey + spriteSize + 2) {
        console.log("left of the enemy1");
        walking = false;
        spritesy = 1997*3/4;
    }
    if(direction == "left" && treex + 64 >= spritex && treex + 64 <= spritex + spriteSize && treey+102 >= spritey + spriteSize/16*25/2 && treey <= spritey + spriteSize + 2) {
        console.log("right of the tree");
        walking = false;
        spritesy = 1997*2/4;
    }
    if(direction == "left" && (enemy1x + spriteSize >= spritex && enemy1x + spriteSize <= spritex + spriteSize && enemy1y + spriteSize/16*25/2 >= spritey && enemy1y <= spritey + spriteSize + 2)) {
        console.log("right of the enemy1");
        walking = false;
        spritesy = 1997*2/4;
    }
    if(direction == "up" && treex + 64 >= spritex + spriteSize/4 && treex + spriteSize/4 <= spritex + spriteSize && treey + 102 - spriteSize/2 >= spritey && treey <= spritey) {
        console.log("below the tree");
        walking = false;
        spritesy = 1997/4;
    }
    if(direction == "up" && enemy1x + spriteSize >= spritex + spriteSize/4 && enemy1x + spriteSize/4 <= spritex + spriteSize && enemy1y + spriteSize/16*25 - spriteSize/2 >= spritey && enemy1y <= spritey) {
        console.log("below the enemy1", spritey, enemy1y);
        walking = false;
        spritesy = 1997/4;
    }
    if(direction == "down" && treex + 64 >= spritex + spriteSize/4 && treex + spriteSize/4 <= spritex + spriteSize && treey + 102 >= spritey + spriteSize/16*25/2 && treey + spriteSize/4 <= spritey + spriteSize/16*25) {
        console.log("above the tree");
        walking = false;
        spritesy = 0;
    }
    if(direction == "down" && enemy1x + spriteSize >= spritex + spriteSize/4 && enemy1x + spriteSize/4 <= spritex + spriteSize && enemy1y + spriteSize/16*25/2 >= spritey && enemy1y <= spritey + spriteSize/16*25 + 2) {
        console.log("above the enemy1");
        walking = false;
        spritesy = 0;
    }
    
    if(enemy1x >= 0 && enemy1x + spriteSize <= canvas.width && enemy1x >= spritex + spriteSize && spritey + spriteSize/3 >= enemy1y && spritey + spriteSize - 2 <= enemy1y + spriteSize/16*25 && Math.abs(enemy1x - spritex) <= canvas.width/3 && encountered < 1) {
      console.log("encounter");
      encountered++;
      window.location = `encounter.php?enemyid=1`;
    }
    

    if(walking) {
        switch(direction) {
            case "down":
                if(towny > -360 && spritey >= canvas.height/2 - spriteSize/16*25/2) {towny -= spriteSize/4; treey -= spriteSize/4; enemy1y -= spriteSize/4;} else { spritey += spriteSize/4;}
                spritesy = 0;
                break;
            case "up": 
                if(towny < 0 && spritey <= canvas.height/2 - spriteSize/16*25/2) {towny += spriteSize/4; treey += spriteSize/4; enemy1y += spriteSize/4;} else { spritey -= spriteSize/4 ;}
                spritesy = 1997/4;
                break;
            case "left": 
                if(townx < 0 && spritex <= canvas.width/2 - spriteSize/2) {townx += spriteSize/4; treex += spriteSize/4; enemy1x += spriteSize/4;} else { spritex -= spriteSize/4 ;}
                spritesy = 1997*2/4;
                break;
            case "right": 
                if(townx > -1120 && spritex >= canvas.width/2 - spriteSize/2) {townx -= spriteSize/4; treex -= spriteSize/4; enemy1x -= spriteSize/4;} else { spritex += spriteSize/4;}
                spritesy = 1997*3/4;
                break;
        }
        context.drawImage(town, townx, towny, 1920, 960);
        context.drawImage(tree, treex, treey);
        context.drawImage(enemy1, 34 * j, 0, 34, 54, enemy1x, enemy1y, spriteSize, spriteSize/16*25);
        context.drawImage(walkSprites, walkSpriteWidth * i, spritesy, walkSpriteWidth, walkSpriteHeight, spritex, spritey, spriteSize, spriteSize/16*25);
        console.log("walking", i);
        i++
        if(i >= 4) { i = 0; walking = false; }
    } else {
        context.drawImage(town, townx, towny, 1920, 960); 
        context.drawImage(tree, treex, treey);
        context.drawImage(enemy1, 34 * j, 0, 34, 54, enemy1x, enemy1y, spriteSize, spriteSize/16*25);
        context.drawImage(walkSprites, walkSpriteWidth * i, spritesy, walkSpriteWidth, walkSpriteHeight, spritex, spritey, spriteSize, spriteSize/16*25);
    }
} 

function gameCheck() {
  drawWorld();
}

window.setInterval(gameCheck,1000/16);

document.addEventListener('keydown', (event) => {
  if (event.key === 's') {
    walking = true;
    direction = "down";
  }
  else if (event.key === 'w') {
    walking = true;
    direction = "up";
  }
  else if (event.key === 'a') {
    walking = true;
    direction = "left";
  }
  else if (event.key === 'd') {
    walking = true;
    direction = "right";
  }
});
