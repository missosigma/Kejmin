function updateHealthBarsFromCombat(userHealth, enemyHealth) {
    const safeUserHealth = Math.max(0, Number(userHealth) || 0);
    const safeEnemyHealth = Math.max(0, Number(enemyHealth) || 0);

    if (typeof yourcurrenthp !== 'undefined') {
        yourcurrenthp = safeUserHealth;
    }

    if (typeof enemycurrenthp !== 'undefined') {
        enemycurrenthp = safeEnemyHealth;
    }

    if (typeof updatebars === 'function') {
        updatebars();
    }

    return {
        userHealth: safeUserHealth,
        enemyHealth: safeEnemyHealth
    };
}

function syncCombatHealthBars(userHealth, enemyHealth) {
    return updateHealthBarsFromCombat(userHealth, enemyHealth);
}

window.updateHealthBarsFromCombat = updateHealthBarsFromCombat;
window.syncCombatHealthBars = syncCombatHealthBars;