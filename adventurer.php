<?php
require 'includes/autoload.php';
include_once('includes/db.php');

$query = new App\TFQuery();

if ( isset( $_GET['id'] ) ) {
	$id = $_GET['id'];
	$data = $query->fetch_data($id, 'adventurers');
} else {
	header('Location: index.php');
	exit();
}

$adventurer = new App\Adventurer($data['id'], $data['name'], $data['maxhp'], $data['currenthp'], $data['baseattack'], $data['damage'], $data['armor']);
?>

<?php
$page_title = $data['name'];
include_once('header.php'); ?>

<?php $adventurer->list_stats(); ?>
<a href="index.php">&larr; Home</a>
</div>
</body>
</html>