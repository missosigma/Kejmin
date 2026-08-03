const canvas = document.querySelector('canvas');

const c = canvas.getContext('2d');

console.log(collisions);

canvas.width = 1024;
canvas.height = 576;

const collisionsMap = [];
for (let i = 0; i < collisions.length; i+= 60) {
    collisionsMap.push(collisions.slice(i,i+60));
    
}

class Boundary {
    constructor(position) {
        this.position = position;
        this.width
        this.height
    }
}

const image = new Image();
image.src = './K_Images/town.png';

image.onload = () => {
    c.drawImage(image, -100, -400);
}