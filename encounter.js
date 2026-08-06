const team1 = document.getElementById('team1').getAttribute('data-db');
const team2 = document.getElementById('team2').getAttribute('data-db');
const team3 = document.getElementById('team3').getAttribute('data-db');
const urlParams = new URLSearchParams(window.location.search);
const enemyid = urlParams.get('enemyid');
let enemykej;
switch (enemyid) {
    case "1":
        enemykej = 10;
}

let effective = 1;
let types = ["Neutral", "Water", "Soap", "Sugar", "Cotton", "Metal", "Paper", "Bamboo"]
let kejmin_name = [, , , , , , "Aerk", "Sleef", "Sweeterie", "Fanzo", "Getzy"];
let move1 = [, , , , , , "Bubble Pop", "Water Blast", "Sugar Rush", "Blunt Force Trauma", "Sugary Crash"];
let move2 = [, , , , , , "Brute Force", "Quick Strike", "Quick Strike", "Rusty Swipe", "Cotton Squeeze"];
let move3 = [, , , , , , "Water Blast", "Drown", "Sugar Punch", "Brute Force", "Quick Strike"];
let kejmin_type1 = [, , , , , , types[2], types[1], types[3], types[5], types[4]];
let kejmin_type2 = [, , , , , , types[1], types[0], types[0], types[0], types[3]];
let move_type = [
            [, , , , , , types[2], types[1], types[3], types[5], types[3]], 
            [, , , , , , types[0], types[0], types[0], types[5], types[4]],
            [, , , , , , types[1], types[1], types[3], types[0], types[0]]
            ]

console.log(enemyid);
console.log("Your Kejmin are", kejmin_name[team1] + ",", kejmin_name[team2] + ", and", kejmin_name[team3] + ". The opponent's", kejmin_name[enemykej], "appeared!");

// function calcEffective(movePicked) {
//     if(
//         move_type[movePicked[team1]] == types[1] && 
//             ()
//     ) {

//     }
// }