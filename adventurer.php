<?php
require 'autoload.php';
include_once('includes/db.php');

$query = new App\TFQuery();

if ( isset( $_GET['id'] ) ) {
	$id = $_GET['id'];
	$data = $query->fetch_data($id, 'adventurers');
} else {
	header('Location: index.php');
	exit();
}

$adventurer = new App\Adventurer($data['name'], $data['maxhp'], $data['currenthp'], $data['baseattack'], $data['damage'], $data['armor']);
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<h1><?php echo $data['name']; ?></h1>
<?php $adventurer->list_stats(); ?>
</body>
</html>