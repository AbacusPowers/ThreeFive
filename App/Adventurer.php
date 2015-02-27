<?php

namespace App;

/**
 * Adventurer class
 * @property string name
 * @property int max hit points
 * @property int current hit points
 * @property int base attack
 * @property int armor class
 *
 * @method int attackroll
 */
//use \PDO;

class Adventurer {
	public $ID;
	public $name;
	public $maxhp;
	public $currenthp;
	public $baseattack;
	public $damagedicetype;
	public $damagedicequant;
	public $damagemod;
	public $armor;
	public $queryargs;

	public function __construct($name = '', $maxhp = NULL, $currenthp = NULL, $baseattack = NULL, $damage = NULL, $armor = NULL) {
		//set name
		if (! empty($name)) {$this->name = $name;}
		//set maxhp
		if (! empty($maxhp)) {$this->maxhp = $maxhp;}
		//set currenthp
		if (! empty($currenthp)) {$this->currenthp = $currenthp;}
		//set baseattack bonus
		if (! empty($baseattack)) {$this->baseattack = $baseattack;}

		//parse string and set damage properties
		if (! empty($damage)) {
			//set damage dice

			$damagerules = explode('+', $damage);

			if (array_key_exists(1,$damagerules)) {
				$this->damagemod = $damagerules[1];
			}
			$damageroll = explode('d', $damagerules[0]);
			$this->damagedicequant = $damageroll[0];
			$this->damagedicetype = $damageroll[1];
		}

		//set armor
		if (! empty($armor)) {$this->armor = $armor;}
	}

	/**
	 * @method list_stats
	 *
	 * lists Character's vital statistics
	 */
	public function list_stats(){
		//echo '<h1>' . $this->name . '</h1>';
		echo '<ul>';
		echo '<li>Baseattack: ' . $this->baseattack . '</li>';
		echo '<li>Max HP: ' . $this->maxhp . '</li>';
		echo '<li>Armor: ' . $this->armor . '</li>';
		echo '<li>Damage: ' . $this->damagedicequant . 'd' . $this->damagedicetype . '</li>';
		echo '</ul>';
	}


	/**
	 * @method attackroll
	 *
	 * calculates an attack roll based on Character stats
	 */
	public function attackroll() {
		$roll = rand(1,20);
		$roll = $roll + $this->baseattack;

		return $roll;
	}

	public function damageroll() {
		$roll = 0;
		for ($i = 0; $i < $this->damagedicequant; $i++) {
			$roll = $roll + rand(1,$this->damagedicetype);
		}
		return $roll;
	}
}