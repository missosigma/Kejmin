const canvas = document.querySelector('canvas');
canvas.style.position = "absolute";
canvas.style.bottom = "0";
canvas.style.left = "50%";
canvas.style.transform = "translate(-50%, 0)";
const c = canvas.getContext('2d');

window.addEventListener('pageshow', (event) => {
  if (event.persisted) {
    fighting = false;
  }
});


canvas.width = 1024;
canvas.height = 576;

const collisionsMap = [];
for (let i = 0; i < collisions.length; i+= 60) {
    collisionsMap.push(collisions.slice(i, 60 + i));
}

const boundaries = [];
const offset = {
    x: -5,
    y: -300
}

collisionsMap.forEach((row, i) => {
    row.forEach((symbol, j) => {
        if (symbol === 554)
        boundaries.push(
            new Boundary({
                position: {
                    x: j * Boundary.width + offset.x,
                    y: i * Boundary.height + offset.y
                }
            })
        )
    })
})

// console.log(boundaries);

const image = new Image();
image.src = './K_Images/town.png';

const foregroundImage = new Image();
foregroundImage.src = './K_Images/foregroundObjectsTown.png';

const playerDownImage = new Image();
playerDownImage.src = './K_Images/sprites/testSpriteDown.png'; 

const playerUpImage = new Image();
playerUpImage.src = './K_Images/sprites/testSpriteUp.png'; 

const playerLeftImage = new Image();
playerLeftImage.src = './K_Images/sprites/testSpriteLeft.png'; 

const playerRightImage = new Image();
playerRightImage.src = './K_Images/sprites/testSpriteRight.png'; 

const enemy1 = new Image(); 
enemy1.src = 'K_Images/enemy1_left.png';

const npc1 = new Image(); 
npc1.src = 'K_Images/oldman.png';

const player = new Sprite({
    position: {
        x: canvas.width / 4 + 4, 
        y: canvas.height / 2 - 164 / 2
    },
    image: playerDownImage,
    frames: {
        max: 4
    },
    sprites: {
        up: playerUpImage,
        left: playerLeftImage,
        right: playerRightImage,
        down: playerDownImage

        
    }
})

const background = new Sprite({ 
    position: {
        x: offset.x,
        y: offset.y
    },
    image: image
})

const foreground = new Sprite({ 
    position: {
        x: offset.x,
        y: offset.y
    },
    image: foregroundImage
})

const trainer1 = new Sprite({
    position: {
        x: offset.x + 1140,
        y: offset.y + 966
    },
    image: enemy1,
    scale: 15/11
})

const oldman = new Sprite({
    position: {
        x: offset.x + 796,
        y: offset.y + 400
    }, 
    image: npc1,
    scale: 15/10
})

const keys = {
    w: {
        pressed: false
    },
    a: {
        pressed: false
    },
    s: {
        pressed: false
    },
    d: {
        pressed: false
    }
}

const movables = [background, ...boundaries, foreground, trainer1, oldman];
const fixedWorldSprites = [];

function rectangularCollision({rectangle1, rectangle2}) {
    return (
        rectangle1.position.x + rectangle1.width >= rectangle2.position.x && 
        rectangle1.position.x <= rectangle2.position.x + rectangle2.width &&
        rectangle1.position.y <= rectangle2.position.y + rectangle2.height && 
        rectangle1.position.y + rectangle1.height >= rectangle2.position.y);
}
function animate() {
    window.requestAnimationFrame(animate);
    background.draw();
    boundaries.forEach(boundary => {
        boundary.draw();
    })
    oldman.draw();
    trainer1.draw();
    fixedWorldSprites.forEach((sprite) => sprite.draw());
    player.draw();
    foreground.draw();

    let moving = true;
    player.moving = true;
    if (keys.w.pressed && lastKey === 'w') {
        player.moving = false;
        player.image = player.sprites.up;
        for (let i = 0; i < boundaries.length; i++){
            const boundary = boundaries[i];
            if (
                rectangularCollision({
                    rectangle1: player,
                    rectangle2: {...boundary,
                        position: {
                            x: boundary.position.x,
                            y: boundary.position.y + 5
                        }

                    }
                })
        )   {
            console.log('Colliding');
            moving = false;
            break;
        }
    }
    if (moving)
        movables.forEach(movables => {
            movables.position.y +=5;
        })
    } else if (keys.a.pressed && lastKey === 'a') {
        player.moving = false;
        player.image = player.sprites.left;
        for (let i = 0; i < boundaries.length; i++){
            const boundary = boundaries[i];
            if (
                rectangularCollision({
                    rectangle1: player,
                    rectangle2: {...boundary,
                        position: {
                            x: boundary.position.x + 5,
                            y: boundary.position.y
                        }

                    }
                })
        )   {
            console.log('Colliding');
            moving = false;
            break;
        }
    }
    if (moving)
        movables.forEach(movables => {
            movables.position.x +=5;
        })
    } else if (keys.s.pressed && lastKey === 's') {
        player.moving = false;
        player.image = player.sprites.down;
        for (let i = 0; i < boundaries.length; i++){
            const boundary = boundaries[i];
            if (
                rectangularCollision({
                    rectangle1: player,
                    rectangle2: {...boundary,
                        position: {
                            x: boundary.position.x,
                            y: boundary.position.y - 5
                        }

                    }
                })
        )   {
            console.log('Colliding');
            moving = false;
            break;
        }
    }
    if (moving)
        movables.forEach(movables => {
            movables.position.y -=5;
        })
    } else if (keys.d.pressed && lastKey === 'd') {
        player.moving = false;
        player.image = player.sprites.right;
        for (let i = 0; i < boundaries.length; i++){
            const boundary = boundaries[i];
            if (
                rectangularCollision({
                    rectangle1: player,
                    rectangle2: {...boundary,
                        position: {
                            x: boundary.position.x - 5,
                            y: boundary.position.y
                        }

                    }
                })
        )   {
            console.log('Colliding');
            moving = false;
            break;
        }
    }
    if (moving)
        movables.forEach(movables => {
            movables.position.x -=5;
        })
    }
}


let lastKey = '';
let fighting;

window.addEventListener('keydown', (e) => {
    if(fighting) { walking = false; return; }
    switch (e.key) {
        case 'w':
            keys.w.pressed = true;
            lastKey = 'w';
            break;
        case 'a':
            keys.a.pressed = true;
            lastKey = 'a';
            break;
        case 's':
            keys.s.pressed = true;
            lastKey = 's';
            break;
        case 'd':
            keys.d.pressed = true;
            lastKey = 'd';
            break;
        case 'z':
            if(!fighting &&
            (lastKey === 'd' && trainer1.position.x == 300 && trainer1.position.y > 180 && trainer1.position.y < 225) ||
            (lastKey === 'a' && trainer1.position.x == 195 && trainer1.position.y > 180 && trainer1.position.y < 225) ||
            (lastKey === "w" && trainer1.position.y == 161 && trainer1.position.x > 240 && trainer1.position.x < 280) ||
            (lastKey === "s" && trainer1.position.y == 281 && trainer1.position.x > 240 && trainer1.position.x < 280)
            ) {
                fighting = true;
                keys.w.pressed = false;
                keys.a.pressed = false;
                keys.s.pressed = false;
                keys.d.pressed = false;
                alert("Let's fight!");
                window.location = `encounter.php?enemyid=1`;
            } else { fighting = false; }
            if(lastKey === 'w' && oldman.position.y == 170 && oldman.position.x > 245 && oldman.position.x < 282) {
                alert('The power of science is amazing!'); // this is a pokemon reference... 
                keys.w.pressed = false;
            }
            break;
    }
})

window.addEventListener('keyup', (e) => {
    switch (e.key) {
        case 'w':
            keys.w.pressed = false;
            break;
        case 'a':
            keys.a.pressed = false;
            break;
        case 's':
            keys.s.pressed = false;
            break;
        case 'd':
            keys.d.pressed = false;
            break;
    }
})


const townmusic = new Audio('K_Audio/town4.mp3'); townmusic.loop = true;
let townMusicStarted = false;
let gameStart = false;
const play = document.getElementById('start-btn');
const playButton = new Image(); playButton.src = 'K_Images/play.png';

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

playButton.onload = function() { c.drawImage(playButton, canvas.width/2-64,canvas.height/2-64, 128, 128); };
window.addEventListener('click', (event) => {
    if(!gameStart) {
      animate();
      playTownMusic();
      gameStart = true;
    }
    if (townMusicStarted && townmusic.paused) {
      playTownMusic();
    }
});