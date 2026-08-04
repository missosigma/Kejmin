const canvas = document.querySelector('canvas');
const c = canvas.getContext('2d');
console.log(battleZonesData);

canvas.width = 1024;
canvas.height = 576;

const collisionsMap = [];
for (let i = 0; i < collisions.length; i+= 60) {
    collisionsMap.push(collisions.slice(i, 60 + i));
}

const battleZonesMap = [];
for (let i = 0; i < battleZonesData.length; i+= 60) {
    battleZonesMap.push(battleZonesData.slice(i, 60 + i));
}

const boundaries = [];
const offset = {
    x: -735,
    y: -650
}

collisionsMap.forEach((row, i) => {
    row.forEach((symbol, j) => {
        if (symbol === 554)
        boundaries.push(
            new Boundary({
                position: {
                    x: j * Boundary.width,
                    y: i * Boundary.height
                }
        }));
    })
})

const battleZones = [];

const image = new Image();
image.src = './K_Images/town.png';

// const foreground = new Image();
// foregroundImage.src = './K_Images/foregroundObjectsTown.png';

image.onload = () => {
    c.drawImage(image, -100, -400);
}

// const foreground = new Sprite({
//     position: {
//         x: offset.x,
//         y: offset.y
//     },
//     image: foregroundImage
// })

// const movables = [background, ...boundaries, foreground];

// function rectangularCollision({ rectangle1, rectangle2 }) {
//     return (
//         rectangle1.position.x + rectangle1.width >= rectangle2.position.x &&
//         rectangle1.position.x <= rectangle2.position.x + rectangle2.width &&
//         rectangle1.position.y <= rectangle2.position.y + rectangle2.height &&
//         rectangle1.position.y + rectangle1.height >= rectangle2.position.y
//     );
// }

// function animate() {
//     window.requestAnimationFrame(animate);
//     background.draw();
//     boundaries.forEach((boundary) => {
//         boundary.draw();
//     })
//     player.draw();
//     foreground.draw();
// }