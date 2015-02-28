<?php

//require '../includes/autoload.php';
include_once('../includes/db.php');
include_once('../App/TFQuery.php');
session_start();

$adventurers = new App\TFQuery();
$group = $adventurers->fetch_all_adventurers();

if (isset($_SESSION['logged_in'])) {
	//delete form
	$user_id = $_SESSION['user_id'];
	if (isset($_GET['id'])) {
		$id = $_GET['id'];
		$query = $handler->prepare('DELETE FROM adventurers WHERE id = ?');
		$query->execute(array($id));
		header('Location: delete.php');
	}
	?>
	<?php
	$page_title = 'Delete Adventurer';
	include_once('header.php'); ?>

	<h1>Delete an Adventurer</h1>
	<?php
	if (isset($error)) {
		echo $error;
	}
	?>
	<form action="delete.php" method="get">
	<select onchange="this.form.submit();" name="id">
		<?php foreach ($group as $adventurer) { 
			if ($adventurer['owner_id'] == $user_id) { ?>
				<option value="<?php echo $adventurer['id']; ?>">
					<?php echo $adventurer['name'] . ' - ' . $adventurer['id']; ?>
				</option>
		<?php }
		} ?>
	</select>
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