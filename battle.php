<?php
require 'includes/autoload.php';
include_once('includes/db.php');
?>
<?php
$page_title = 'Battle';
include_once('header.php'); ?>
<?php //$battle->battler($gort,$guilder); ?>
<h1>Welcome to the ThreeFive Arena</h1>
	<ul>
	<?php
		foreach($group as $adventurer) { ?>
			<li>
				<a href="adventurer.php?id=<?php echo $adventurer['id']; ?>">
					<?php echo $adventurer['name']; ?>
				</a>
			</li>
	<?php	}
	?>
	</ul>

<?php
if (isset($_POST['attacker_id'], $_POST['defender_id'])) {
	$attacker_id = $_POST['attacker_id'];
	$defender_id = $_POST['defender_id'];
	$adventurers = new App\TFQuery();
	$attacker_data = $adventurers->fetch_data($attacker_id, 'adventurers');
	$attacker = new App\Adventurer($attacker_data['id'], $attacker_data['name'], $attacker_data['maxhp'], $attacker_data['currenthp'], $attacker_data['baseattack'], $attacker_data['damage'], $attacker_data['armor']);

	$defender_data = $adventurers->fetch_data($defender_id, 'adventurers');
	$defender = new App\Adventurer($defender_data['id'], $defender_data['name'], $defender_data['maxhp'], $defender_data['currenthp'], $defender_data['baseattack'], $defender_data['damage'], $defender_data['armor']);

	$battle = new App\Battle();
	$battle->battler($attacker, $defender);

	?>
	<a href="battle-setup.php">New Battle</a>
	<?php
} else {
	echo '<p class="error-message">Please go back to the <a href="battle-setup.php">Battle Setup</a> page.</p>';

}
?>
<a href="admin">Admin</a>
</div>
</body>
</html>
