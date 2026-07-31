const canvas = document.querySelector('canvas');
const context = canvas.getContext(`2d`);
const walkSprites = new Image(); walkSprites.src = 'K_Images/248259.png';
const background = new Image(); background.src = 'K_Images/bg.jpg';
const tree = new Image(); tree.src = 'K_Images/tree.png';
const walkSpriteWidth = 333.5;
const walkSpriteHeight = 522;
let i = 0;
let walking = false;
let backgroundx = canvas.width-200;
let backgroundy = canvas.height+100;
let treex = 100;
let treey = 100;
let spriteSize = 32;
let spritex = canvas.width/2-spriteSize/2;
let spritey = canvas.height/2-spriteSize/2/16*25;
let direction;
let spritesy = 0;


function clear() {
    context.fillStyle = "rgb(255, 255, 255)";
    context.fillRect(0,0,canvas.width,canvas.height);
}

function drawWalk() {
    if(direction == "right" && treex >= spritex && treex <= spritex + spriteSize && treey+102 >= spritey + spriteSize/16*25/2 && treey <= spritey + spriteSize + 2) {
        console.log("left of the tree");
        walking = false;
        spritesy = 1997*3/4;
    }
    if(direction == "left" && treex + 64 >= spritex && treex + 64 <= spritex + spriteSize && treey+102 >= spritey + spriteSize/16*25/2 && treey <= spritey + spriteSize + 2) {
        console.log("left of the tree");
        walking = false;
        spritesy = 1997*2/4;
    }
    if(direction == "up" && treex + 64 - spriteSize/4 >= spritex && treex + spriteSize/4 <= spritex + spriteSize && treey + 102 - spriteSize/2 >= spritey && treey <= spritey) {
        console.log("below the tree");
        walking = false;
        spritesy = 1997/4;
    }
    if(direction == "down" && treex + 64 - spriteSize/4 >= spritex && treex + spriteSize/4 <= spritex + spriteSize && treey + 102 >= spritey && treey + spriteSize/4 <= spritey + spriteSize/16*25) {
        console.log("below the tree");
        walking = false;
        spritesy = 0;
    }
    
    
    if(walking) {
        switch(direction) {
            case "down":
                backgroundy -= spriteSize/4;
                treey -= spriteSize/4;
                spritesy = 0;
                break;
            case "up": 
                backgroundy += spriteSize/4;
                treey += spriteSize/4;
                spritesy = 1997/4;
                break;
            case "left": 
                backgroundx += spriteSize/4;
                treex += spriteSize/4;
                spritesy = 1997*2/4;
                break;
            case "right": 
                backgroundx -= spriteSize/4;
                treex -= spriteSize/4;
                spritesy = 1997*3/4;
                break;
        }
        // context.fillStyle = "rgb(0, 0, 0)";
        // context.fillRect(spritex-spriteSize/2, spritey-spriteSize/2*16/25, spriteSize*2, spriteSize*2);
        // context.drawImage(background, backgroundx-canvas.width, backgroundy-canvas.height);
        context.drawImage(tree, treex, treey);
        context.drawImage(walkSprites, walkSpriteWidth * i, spritesy, walkSpriteWidth, walkSpriteHeight, spritex, spritey, spriteSize, spriteSize/16*25);
        console.log("walking", i);
        i++
        if(i >= 4) { i = 0; walking = false; }
    } else { 
        // context.fillStyle = "rgb(0, 0, 0)";
        // context.fillRect(spritex-spriteSize/2, spritey-spriteSize/2*16/25, spriteSize*2, spriteSize*2);
        // context.drawImage(background, backgroundx-canvas.width, backgroundy-canvas.height);
        context.drawImage(tree, treex, treey);
        context.drawImage(walkSprites, walkSpriteWidth * i, spritesy, walkSpriteWidth, walkSpriteHeight, spritex, spritey, spriteSize, spriteSize/16*25);
    }
} 

function walk() {
    clear();
    drawWalk();
}

window.setInterval(walk,1000/16);

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