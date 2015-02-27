<?php

namespace App;
/**
 * function battler
 * @property object $attacker
 * @property object $defender
 */
class Battle{

	public function battler($attacker, $defender) {
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

		echo $attacker->name.' rolled a ' . $roll . ' ';
		if ($roll >= $defender->armor) {
			echo '...and ' . $defender->name . '\'s armor was too weak.<br>';
			echo $attacker->name . ' hits!<br>';

			$damage = $attacker->damageroll();

			echo $defender->name . ' takes ' . $damage . ' points of damage';
		} else {
			echo '...and ' . $defender->name . '\'s armor was strong enough to withstand the blow.<br>';
			echo $attacker->name . ' misses!';
		}
	}
}
