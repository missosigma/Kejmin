const playerKejId = document.getElementById('team1').getAttribute('data-db');
const urlParams = new URLSearchParams(window.location.search);
const enemyid = urlParams.get('enemyid');
let enemyKejId;
switch (enemyid) {
    case "1":
        enemyKejId = 10;
}

document.addEventListener('DOMContentLoaded', () => {
    const moveSelect = document.getElementById('moveSelect');
    moveSelect.addEventListener('click', (event) => {
        const button = event.target.closest('.move');
        if (!button) return;
        const moveId = button.dataset.id;
        const moveName = button.textContent.trim();
        console.log(`Button pressed! ID: ${moveId}, Name: ${moveName}`);
        handleAttack(moveId);
    });
});


let effective = 1;
let types = ["Neutral", "Water", "Soap", "Sugar", "Cotton", "Metal", "Paper", "Bamboo"]
let kejmin_name = [, , , , , , "Aerk", "Sleef", "Sweeterie", "Fanzo", "Getzy"];
let move1 = [, , , , , , "Bubble Pop", "Water Blast", "Sugar Rush", "Blunt Force Trauma", "Sugar Crash"];
let move2 = [, , , , , , "Brute Force", "Quick Strike", "Quick Strike", "Rusty Swipe", "Cotton Squeeze"];
let move3 = [, , , , , , "Water Blast", "Drown", "Sugar Punch", "Brute Force", "Quick Strike"];
let kejmin_type1 = [, , , , , , types[1], types[2], types[3], types[5], types[4]];
let kejmin_type2 = [, , , , , , types[1], types[0], types[0], types[0], types[3]];
let move_type = [
            [, , , , , , types[2], types[1], types[3], types[5], types[3]], 
            [, , , , , , types[0], types[0], types[0], types[5], types[4]],
            [, , , , , , types[1], types[1], types[3], types[0], types[0]]
            ];
let move_power = [
            [, , , , , , 30, 20, 30, 30, 10],
            [, , , , , , 30, 20, 20, 20, 10],
            [, , , , , , 20, 10, 20, 30, 20]
            ]
let damage;
let playerHP = 100;
let enemyHP = 100;
let movePick;

console.log("Your", kejmin_name[playerKejId], "is up against the opponent's", kejmin_name[enemyKejId] + "!");

function moveCalc(movePicked, attackingId, defendingId) {
    if(
            (move_type[movePicked][attackingId] == types[1] && (
                kejmin_type1[defendingId] == types[2] || kejmin_type1[defendingId] == types[3] || kejmin_type1[defendingId] == types[6]
            )
        ) ||
            (move_type[movePicked][attackingId] == types[2] && (
                kejmin_type1[defendingId] == types[3] || kejmin_type1[defendingId] == types[5]
            )
        ) ||
            (move_type[movePicked][attackingId] == types[3] && (
                kejmin_type1[defendingId] == types[5] || kejmin_type1[defendingId] == types[7]
            )
        ) ||
            (move_type[movePicked][attackingId] == types[4] && (
                kejmin_type1[defendingId] == types[1] || kejmin_type1[defendingId] == types[2]
            )
        ) ||
            (move_type[movePicked][attackingId] == types[5] && (
                kejmin_type1[defendingId] == types[6] || kejmin_type1[defendingId] == types[7]
            )
        ) ||
            (move_type[movePicked][attackingId] == types[6] && (
                kejmin_type1[defendingId] == types[2] || kejmin_type1[defendingId] == types[3]
            )
        ) ||
            (move_type[movePicked][attackingId] == types[7] && (
                kejmin_type1[defendingId] == types[1] || kejmin_type1[defendingId] == types[2]
            )
        )
    ){
        effective *= 1.5;
    }
    if(
            (move_type[movePicked][attackingId] == types[1] && (
                kejmin_type2[defendingId] == types[2] || kejmin_type2[defendingId] == types[3] || kejmin_type2[defendingId] == types[6]
            )
        ) ||
            (move_type[movePicked][attackingId] == types[2] && (
                kejmin_type2[defendingId] == types[3] || kejmin_type2[defendingId] == types[5]
            )
        ) ||
            (move_type[movePicked][attackingId] == types[3] && (
                kejmin_type2[defendingId] == types[5] || kejmin_type2[defendingId] == types[7]
            )
        ) ||
            (move_type[movePicked][attackingId] == types[4] && (
                kejmin_type2[defendingId] == types[1] || kejmin_type2[defendingId] == types[2]
            )
        ) ||
            (move_type[movePicked][attackingId] == types[5] && (
                kejmin_type2[defendingId] == types[6] || kejmin_type2[defendingId] == types[7]
            )
        ) ||
            (move_type[movePicked][attackingId] == types[6] && (
                kejmin_type2[defendingId] == types[2] || kejmin_type2[defendingId] == types[3]
            )
        ) ||
            (move_type[movePicked][attackingId] == types[7] && (
                kejmin_type2[defendingId] == types[1] || kejmin_type2[defendingId] == types[2]
            )
        )
    ){
        effective *= 1.5;
    }
    if(
            (move_type[movePicked][attackingId] == types[1] && (
                kejmin_type1[defendingId] == types[4] || kejmin_type1[defendingId] == types[7]
            )
        ) ||
            (move_type[movePicked][attackingId] == types[2] && (
                kejmin_type1[defendingId] == types[1] || kejmin_type1[defendingId] == types[6]
            )
        ) ||
            (move_type[movePicked][attackingId] == types[3] && (
                kejmin_type1[defendingId] == types[3] || kejmin_type1[defendingId] == types[6]
            )
        ) ||
            (move_type[movePicked][attackingId] == types[4] && (
                kejmin_type1[defendingId] == types[5] || kejmin_type1[defendingId] == types[7]
            )
        ) ||
            (move_type[movePicked][attackingId] == types[5] && (
                kejmin_type1[defendingId] == types[1]
            )
        ) ||
            (move_type[movePicked][attackingId] == types[6] && (
                kejmin_type1[defendingId] == types[1]
            )
        ) ||
            (move_type[movePicked][attackingId] == types[7] && (
                kejmin_type1[defendingId] == types[4] || kejmin_type1[defendingId] == types[5]
            )
        )
    ){
        effective /= 1.5;
    }
    if(
            (move_type[movePicked][attackingId] == types[1] && (
                kejmin_type2[defendingId] == types[4] || kejmin_type2[defendingId] == types[7]
            )
        ) ||
            (move_type[movePicked][attackingId] == types[2] && (
                kejmin_type2[defendingId] == types[1] || kejmin_type2[defendingId] == types[6]
            )
        ) ||
            (move_type[movePicked][attackingId] == types[3] && (
                kejmin_type2[defendingId] == types[3] || kejmin_type2[defendingId] == types[6]
            )
        ) ||
            (move_type[movePicked][attackingId] == types[4] && (
                kejmin_type2[defendingId] == types[5] || kejmin_type2[defendingId] == types[7]
            )
        ) ||
            (move_type[movePicked][attackingId] == types[5] && (
                kejmin_type2[defendingId] == types[1]
            )
        ) ||
            (move_type[movePicked][attackingId] == types[6] && (
                kejmin_type2[defendingId] == types[1]
            )
        ) ||
            (move_type[movePicked][attackingId] == types[7] && (
                kejmin_type2[defendingId] == types[4] || kejmin_type2[defendingId] == types[5]
            )
        )
    ){
        effective /= 1.5;
    }

    damage = move_power[movePicked][attackingId] * effective;
    if(defendingId == playerKejId) {
        playerHP -= damage;
    }
    if(defendingId == enemyKejId) {
        enemyHP -= damage;
    }
    console.log(damage, enemyHP, playerHP);
}

// movePick = prompt(`Choose a move! \n[0] for ${move1[playerKejId]} \n[1] for ${move2[playerKejId]} \n[2] for ${move3[playerKejId]}`)
// moveCalc(movePick, playerKejId, enemyKejId);