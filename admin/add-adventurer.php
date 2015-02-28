<?php

namespace Admin;

require '../includes/autoload.php';
include_once('../includes/db.php');
session_start();

if (isset($_SESSION['logged_in'])) {
	//display the form
	if (isset($_POST['name'], $_POST['maxhp'], $_POST['baseattack'], $_POST['damage'], $_POST['armor'])) {
		$owner_id = $_SESSION['user_id'];
		$name = $_POST['name'];
		$maxhp = $_POST['maxhp'];
		$baseattack = $_POST['baseattack'];
		$damage = $_POST['damage'];
		$armor = $_POST['armor'];

		if( empty($name) or empty($maxhp) or empty($baseattack) or empty($damage) or empty($armor)) {
			$error = '<p class="error-message">All fields required.</p>';
		} else {
			$query = $handler->prepare('INSERT INTO adventurers (owner_id, name, maxhp, currenthp, baseattack, damage, armor) VALUES (?, ?, ?, ?, ?, ?, ?)');
			$query->execute(array($owner_id, $name, $maxhp, $maxhp, $baseattack, $damage, $armor));

			header('Location: index.php');
		}
	}
	?>
	<?php
	$page_title = 'Create A New Adventurer';
	include_once('header.php'); ?>

	<h1>Create a new Adventurer</h1>
	<?php
	if (isset($error)) {
		echo $error;
	}
	?>
	<form action="add-adventurer.php" method="post">
		<input type="text" name="name" placeholder="Name" /><br>
		<input type="text" name="maxhp" placeholder="Maxhp" /><br>
		<input type="text" name="baseattack" placeholder="Base Attack Bonus" /><br>
		<input type="text" name="damage" placeholder="Damage Roll (e.g. \"2d6+4\")" /><br>
		<input type="text" name="armor" placeholder="Armor" /><br>
		<input type="submit" value="Add Adventurer" />
	</form>
	<a href="index.php">&larr; Back to admin</a>
	</div>
	</body>
	</html>
	<?php
} else {
	header('Location: index.php');
}
?>