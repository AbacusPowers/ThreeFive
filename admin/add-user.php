<?php

namespace Admin;

include_once('../includes/db.php');
include_once('../App/TFQuery.php');

session_start();
	//display the form
	if (isset($_POST['username'], $_POST['password'])) {
		$username = $_POST['username'];
		$password = $_POST['password'];
		$hasher = new \App\TFQuery();
		$hashed_pword = $hasher->blowfishCrypt($password,10);
		$email = $_POST['email'];


		if( empty($username) or empty($password) or empty($email)) {
			$error = '<p class="error-message">All fields required.</p>';
		} else {
			$usercheck = $handler->prepare('SELECT * FROM users WHERE user_name = ?');
			$usercheck->execute(array($username));
			$num = $usercheck->rowCount();
			if ($num == 0) {
				$query = $handler->prepare('INSERT INTO users (user_name, user_password, email) VALUES (?, ?, ?)');
				$query->execute(array($username, $hashed_pword, $email));
				$lastId = $handler->lastInsertId();
				$_SESSION['user_id'] = $lastId;
				$_SESSION['logged_in'] = TRUE;
				header('Location: index.php');
			} else {
				$error = 'That username is taken';
			}
		}
	} else {
		echo 'not posted';
	}
	?>
	<?php
	$page_title = 'Create A New Account';
	include_once('header.php'); ?>

	<h1>Create a new account</h1>
	<?php
	if (isset($error)) {
		echo $error;
	}
	?>
	<form action="add-user.php" method="post">
		<input type="text" name="username" placeholder="Username" /><br>
		<input type="password" name="password" placeholder="Password" /><br>
		<input type="text" name="email" placeholder="Email" /><br>
		<input type="submit" value="Create Account" />
	</form>
	<a href="index.php">&larr; Back to admin</a>
	</div>
	</body>
	</html>