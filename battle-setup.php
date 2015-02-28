<?php
require 'includes/autoload.php';
include_once('includes/db.php');

$adventurers = new App\TFQuery();
$group = $adventurers->fetch_all_adventurers();
?>

<?php 
$page_title = 'Battle Setup';
include_once('header.php'); ?>

<h1>Let the games begin!</h1>
<?php
if (isset($error)) {
	echo $error;
}
?>
<form action="battle.php" method="post">
<select name="attacker_id">
	<?php foreach ($group as $adventurer) { ?>
		<option value="<?php echo $adventurer['id']; ?>">
			<?php echo $adventurer['name']; ?>
		</option>
	<?php } ?>
</select>
<select name="defender_id">
	<?php foreach ($group as $adventurer) { ?>
		<option value="<?php echo $adventurer['id']; ?>">
			<?php echo $adventurer['name']; ?>
		</option>
	<?php } ?>
</select>
<input type="submit" value="Fight!" />
</form>
<a href="index.php">&larr; Back to admin</a>

<?php include_once('footer.php'); ?>