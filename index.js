const canvas = document.querySelector('canvas');

const c = canvas.getContext('2d');

console.log(collisions);

canvas.width = 1024;
canvas.height = 576;
console.log(canvas);

const collisionsMap = [];
for (let i = 0; i < collisions.length; i+= 70) {
    collisionsMap.push(collisions.slice(i,i+70));
    
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
console.log(image);

image.onload = () => {
    c.drawImage(image, -100, -400);
}