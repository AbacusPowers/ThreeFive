<?php

namespace App;
/**
 * function battler
 * @property object $attacker
 * @property object $defender
 */
class Battle{

	public function battler($attacker, $defender) {
		global $handler;
		// echo '<h1>' . $attacker->name . '</h1>';

		// echo '<ul>';
		// echo '<li>Baseattack: ' . $attacker->baseattack . '</li>';
		// echo '<li>Max HP: ' . $attacker->maxhp . '</li>';
		// echo '<li>Armor: ' . $attacker->armor . '</li>';
		// echo '<li>Damage: ' . $attacker->damagedicequant . 'd' . $attacker->damagedicetype . '</li>';
		// echo '</ul>';
		echo '<div id="player1" class="player-card">';
		$attacker->list_stats();
		echo '</div><h1 id="versus">VERSUS</h1><div id="player2" class="player-card">';
		$defender->list_stats();
		echo '</div>';

		$roll = $attacker->attackroll();

		if ($roll >= $defender->armor) {
			echo '<h4 class="battle-results">' . $attacker->name . ' hits!</h4>';
			echo '<p class="battle-summary">' . $attacker->name .' rolled a ' . $roll . ' ';
			echo '...and ' . $defender->name . '\'s armor was too weak.</p>';

			$damage = $attacker->damageroll();
			echo '<p class="battle-summary">' . $defender->name . ' takes ' . $damage . ' points of damage</p>';

			$newhp = $defender->currenthp - $damage;
			$update = $handler->prepare('UPDATE adventurers SET currenthp = ? WHERE id = ?');
			$update->execute(array($newhp, $defender->id));
			echo '<p>' . $defender->name . '\'s health is now ' . $newhp . '</p>';
		} else {
			echo '<h4 class="battle-results">' . $attacker->name . ' misses!</h4>';
			echo '<p class="battle-summary">' . $attacker->name .' rolled a ' . $roll . ' ';
			echo '...and ' . $defender->name . '\'s armor was strong enough to withstand the blow.</p>';
			echo $attacker->name . ' misses!';
		}
	}
}
