let enemymaxhp = 100;
let enemycurrenthp = 100;

let yourmaxhp = 100;
let yourcurrenthp = 100;

const enemybar = document.getElementById('enemy-bar');
const playerbar = document.getElementById('player-bar');

function updatebars(){
    let enemypercent = (enemycurrenthp/enemymaxhp) * 100;
    let yourpercent = (yourcurrenthp/yourmaxhp) * 100;

    if(enemypercent < 0){
        enemypercent = 0;
    }
    
    if(yourpercent < 0){
        yourpercent = 0;
    }

    enemybar.style.width = enemypercent + "%";
    playerbar.style.width = playerpercent + "%";
}