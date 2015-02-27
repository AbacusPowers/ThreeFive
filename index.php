
<?php
ini_set('display_errors',1);  error_reporting(E_ALL);
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require 'autoload.php';
include_once('App/includes/db.php');
// global $hanlder;

// $gort = new App\Adventurer('Gort', 80, 80, 8, '2d6', 20);
// $guilder = new App\Adventurer('Guilder', 58, 58, 6, '2d4', 20);

$adventurers = new App\Adventurer();
$group = $adventurers->fetch_all();

?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<?php //$battle->battler($gort,$guilder); ?>
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
</body>
</html>