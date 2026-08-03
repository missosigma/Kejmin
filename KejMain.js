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
let menuing = false;
let menuIndex = 0;
let menuSelect = false;

function clear() {
    context.fillStyle = "rgb(255, 255, 255)";
    context.fillRect(0,0,canvas.width,canvas.height);
}
function clearMenu() {
    context.fillStyle = "rgb(0, 0, 0)";
    context.strokeRect(10,10,210,310);
    context.fillStyle = "rgb(255, 255, 255)";
    context.fillRect(10,10,210,310);
}

function drawMenu() {
    context.fillStyle = "rgb(0, 0, 0)";
    context.font = `36px Verdana`;
    context.fillText("Kejmins",60,60,canvas.width/4-10);
    context.fillText("Items",60,120,canvas.width/4-10);
    context.fillText("Map",60,180,canvas.width/4-10);
    context.fillText("",60,240,canvas.width/4-10);
    context.fillText("Options",60,300,canvas.width/4-10);
    context.beginPath(); context.moveTo(20,30+60*menuIndex); context.lineTo(20,60+60*menuIndex); context.lineTo(50,45+60*menuIndex); context.closePath(); context.fill();
}

function drawWorld() {
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

function gameCheck() {
  if(!menuing) {
    clear();
    drawWorld();
  }
  if(menuing && !menuSelect) {
    clearMenu();
    drawMenu();
  }
  if(menuSelect) {
    switch(menuIndex) {
      case 0:
        // Party
        break;
      case 1:
        // Items
        break;
      case 2:
        // Map
        break;
      case 3: 
        // 
        break;
      case 4: 
        // Options
        break;
    }
  }
}

window.setInterval(gameCheck,1000/16);

document.addEventListener('keydown', (event) => {
  if ((event.key === "x" || event.key === "c") && menuing && !menuSelect) {
    menuing = false;
  }
  else if (event.key === "x" && menuSelect) {
    menuSelect = false;
    drawWorld();
  }
  else if (event.key === "z" && menuing && !menuSelect) {
    menuSelect = true;
    clear();
  }
  else if (event.key === "c") {
    menuing = true;
  }
  if (event.key === 's') {
    if (!menuing) {
        walking = true;
        direction = "down";
    }
    if (menuing && menuIndex < 4) {
        menuIndex++;
    }
  }
  else if (event.key === 'w') {
    if(!menuing) {
        walking = true;
        direction = "up";
    }
    if (menuing && menuIndex > 0) {
        menuIndex--;
    }
  }
  else if (event.key === 'a') {
    if(!menuing) {
        walking = true;
        direction = "left";
    }
  }
  else if (event.key === 'd') {
    if(!menuing) {
        walking = true;
        direction = "right";
    }
  }
});
