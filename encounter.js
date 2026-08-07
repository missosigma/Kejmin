const playerKejId = document.getElementById('team1').getAttribute('data-db');
const urlParams = new URLSearchParams(window.location.search);
const enemyid = urlParams.get('enemyid');

document.addEventListener('DOMContentLoaded', () => {
    const moveSelect = document.getElementById('moveSelect');
    moveSelect.addEventListener('click', (event) => {
        const button = event.target.closest('.move');
        if (!button) return;
        const moveId = +button.dataset.id - 1;
        if(playerHP > 0 && enemyHP > 0) {
            if(Math.random() * 2 > 1) {
                    moving = "player";
                    moveCalc(moveId, playerKejId, enemyKejId);
                    if(enemyHP > 0) {
                        moving = "enemy";
                        moveCalc(Math.floor(Math.random()*3), enemyKejId, playerKejId);
                        if(playerHP <= 0 || enemyHP <= 0) { gameOver(); }
                    } else { gameOver(); }
            } else {
                    moving = "enemy";
                    moveCalc(Math.floor(Math.random()*3), enemyKejId, playerKejId);
                    if(playerHP > 0) {
                        moving = "player";
                        moveCalc(moveId, playerKejId, enemyKejId);
                        if(enemyHP <= 0 || playerHP <= 0) { gameOver(); }
                    } else { gameOver(); }
            }
        } else { gameOver(); }
        syncBattleBars();
    });
});

function getHealthUser(){

}
function getHealthEnemy(){

}


let effective = 1;
let types = ["Neutral", "Water", "Soap", "Sugar", "Cotton", "Metal", "Paper", "Bamboo"]
let kejmin_name = [, , , , , , "Aerk", "Sleef", "Sweeterie", "Fanzo", "Getzy"];
let move_name = [
            [, , , , , , "Bubble Pop", "Bubble Pop", "Sugar Rush", "Blunt Force Trauma", "Sugar Crash"],
            [, , , , , , "Brute Force", "Quick Strike", "Quick Strike", "Rusty Swipe", "Cotton Squeeze"],
            [, , , , , , "Water Blast", "Water Blast", "Sugar Punch", "Brute Force", "Quick Strike"]
                ];
let kejmin_type1 = [, , , , , , types[1], types[2], types[3], types[5], types[4]];
let kejmin_type2 = [, , , , , , types[1], types[0], types[0], types[0], types[3]];
let move_type = [
            [, , , , , , types[2], types[2], types[3], types[5], types[3]], 
            [, , , , , , types[0], types[0], types[0], types[5], types[4]],
            [, , , , , , types[1], types[1], types[3], types[0], types[0]]
            ];
let move_power = [
            [, , , , , , 30, 30, 30, 30, 10],
            [, , , , , , 30, 20, 20, 20, 10],
            [, , , , , , 20, 20, 20, 30, 20]
            ]
let damage;
let playerHP = 100;
let enemyHP = 100;
let movePick;
let moving;

alert(`Your ${kejmin_name[playerKejId]} is up against the opponent's ${kejmin_name[enemyKejId]}!`);

function moveCalc(movePicked, attackingId, defendingId) {
    effective = 1;
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

    damage = Math.round(move_power[movePicked][attackingId] * effective);
    alert(`${kejmin_name[attackingId]} used ${move_name[movePicked][attackingId]} on ${kejmin_name[defendingId]}!`);
    if(moving == "player") {
        enemyHP -= damage;
        if(enemyHP < 0) { enemyHP = 0;}
        alert(`${kejmin_name[defendingId]} took ${damage} damage. It has ${enemyHP} HP left.`);
    }
    if(moving == "enemy") {
        playerHP -= damage;
        if(playerHP < 0) { playerHP = 0;}
        alert(`${kejmin_name[defendingId]} took ${damage} damage. It has ${playerHP} HP left.`);
    }
}



function syncBattleBars() {
    if (typeof window.updateHealthBarsFromCombat === 'function') {
        window.updateHealthBarsFromCombat(playerHP, enemyHP);
    } else if (typeof updateHealthBarsFromCombat === 'function') {
        updateHealthBarsFromCombat(playerHP, enemyHP);
    }
}

function gameOver() {
    if(playerHP == 0) {
        alert(`The opposing ${kejmin_name[enemyKejId]} won! Your ${kejmin_name[playerKejId]} fainted! Better luck next time, trainer!`);
    }
    if(enemyHP == 0) {
        alert(`Your ${kejmin_name[playerKejId]} won! The opposing ${kejmin_name[enemyKejId]} fainted! Well done, trainer!`);
    }
    playerHP = 100;
    enemyHP = 100;
    window.history.back();
}

syncBattleBars();
