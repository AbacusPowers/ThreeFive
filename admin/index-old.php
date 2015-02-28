<?php
include_once('../App/TFQuery.php');
include_once('../includes/db.php');
			// $query = $handler->prepare('SELECT * FROM users WHERE user_name = ? and user_password = ?');
			// $query->execute(array($username, $password));
			// $results = $query->fetchAll();
			// var_dump($results);
		// var_dump($password);
// $username = 'abacuspowers';
// $password = 'password';
// 			$query = $handler->prepare('SELECT * FROM users WHERE user_name = ? and user_password = ?');
// 			// $query->bindValue(':user', 'abacuspowers');
// 			// $query->bindValue(2, 'password');
// 			$query->execute(array($username, $password));
// 			//$results = $query->fetchAll();
// 			//var_dump($results);
// 			$rows = $query->fetchAll();
// 			var_dump($rows);
// 			$num_rows = count($rows);
// if($num_rows == 1) {
// 	//correct login
// 	$_SESSION['logged_in'] = TRUE;
// 	//header('Location: index.php');
// 	echo 'logged in!';
// } else {
// 	//incorrect login
// 	$error = "<p>Incorrect login information!</p>";
// }
session_start();
if (isset($_SESSION['logged_in'])) { //if logged in
	?>
	<html>
	<head>
		<title>Logged in</title>
	</head>
	<body>
	<ul>
		<li><a href="add.php">Add Adventurer</a></li>
		<li><a href="delete.php">Delete Adventurer</a></li>
		<li><a href="logout.php">Logout</a></li>
	</ul>
	<a href="/">&larr; Home</a>
	</body>
	</html>
	<?php
} else { //if NOT logged in
	if (isset($_POST['username'], $_POST['password'])) {
		$username = $_POST['username'];
		$password = $_POST['password'];


		if (empty($username) or empty($password)) { //if a field is empty
			$error = "<p>All fields are required!</p>";
		} else { //if form is filled out
			// $hasher = new \App\TFQuery();
			// $hashed_pword = $hasher->blowfishCrypt($password,10);

			$query = $handler->prepare('SELECT * FROM users WHERE user_name = ?');
			$query->execute(array($username));
			// $num_rows = count($rows);
			$num_rows = $query->rowCount();
			if($num_rows == 1) {
				$result = $query->fetch();

				//correct login
				$hash = $result['user_password'];
				if(crypt($password,$hash)==$hash){ //This checks a password

					$_SESSION['logged_in'] = TRUE;
					header('Location: index.php');
				}
			} else {
				//incorrect login
				$error = "<p>Incorrect login information!</p>";
			}
		}
	}
	?>
	<!DOCTYPE html>
	<html>
	<head>
		<title>Not logged in</title>
	</head>
	<body>
	<?php
	if (isset($error)) {
		echo $error;
	}
	?>
	<form action="index.php" method="post">
		<input type="text" name="username" placeholder="Username" />
		<input type="text" name="password" placeholder="Password" />
		<input type="submit" value="Login" />
	</form>
	<a href="add-user.php">Create an account</a>
	<a href="/">&larr; Home</a>
	</body>
	</html>
	<?php
}


?>

