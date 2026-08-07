let enemymaxhp = 100;
let enemycurrenthp = 100;

let yourmaxhp = 100;
let yourcurrenthp = 100;

function getHealthBars() {
    return {
        enemybar: document.getElementById('enemy-bar'),
        playerbar: document.getElementById('player-bar')
    };
}

function updatebars() {
    const { enemybar, playerbar } = getHealthBars();
    let enemypercent = (enemycurrenthp / enemymaxhp) * 100;
    let yourpercent = (yourcurrenthp / yourmaxhp) * 100;

    if (enemypercent < 0) {
        enemypercent = 0;
    }

    if (yourpercent < 0) {
        yourpercent = 0;
    }

    if (enemybar) {
        enemybar.style.width = enemypercent + "%";
    }

    if (playerbar) {
        playerbar.style.width = yourpercent + "%";
    }
}

document.addEventListener('DOMContentLoaded', updatebars);

window.updatebars = updatebars;