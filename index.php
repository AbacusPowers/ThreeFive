
<?php
ini_set('display_errors',1);  error_reporting(E_ALL);
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require 'includes/autoload.php';
include_once('includes/db.php');

 // global $hanlder;

// $gort = new App\Adventurer('Gort', 80, 80, 8, '2d6', 20);
// $guilder = new App\Adventurer('Guilder', 58, 58, 6, '2d4', 20);

$adventurers = new App\TFQuery();
$group = $adventurers->fetch_all_adventurers();

?>
<?php
$page_title = 'Home';
include_once('header.php'); ?>

<?php //$battle->battler($gort,$guilder); ?>
<h1>Welcome to the ThreeFive Arena</h1>
<p>Browse the adventurers below, or <a class="button battle-button" href="battle-setup.php">Start A Battle</a></p>
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
	<a href="admin">Admin</a>
</div>
</body>
</html>