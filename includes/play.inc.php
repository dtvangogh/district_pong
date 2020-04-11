<?php

// Here we check whether the user got to this page by clicking the proper signup button.
if (isset($_POST['submit'])) {

	// We include the connection script so we can use it later.
	// We don't have to close the MySQLi connection since it is done automatically, but it is a good habit to do so anyways since this will immediately return resources to PHP and MySQL, which can improve performance.
	require 'dbh.inc.php';
	

	// We grab all the data which we passed from the game-submit form so we can use it later.
	$player1 = $_POST['player1'];
	$player1score = $_POST['player1score'];
	$player2 = $_POST['player2'];
	$player2score = $_POST['player2score'];
    
    if (empty($player1) || empty($player1score) || empty($player2) || empty($player2score)){
		header("Location: ../play.php?error=emptyfields");
		exit();
	} 
	else if ($player1score == $player2score) {
		header("Location: ../play.php?error=invalidscore");
		exit();
	}
	
	else if ($player1 = $player1) {
		header("Location: ../play.php?error=invalidopponent");
		exit(); 
	}
else {

		$sql = "INSERT INTO games (player1, player1score, player2, player2score) VALUES (?, ?, ?, ?);";
		// Here we initialize a new statement using the connection from the dbh.inc.php file.
		$stmt = mysqli_stmt_init($conn);
		// Then we prepare our SQL statement AND check if there are any errors with it.
		if (!mysqli_stmt_prepare($stmt, $sql)) {
			// If there is an error we send the user back to the signup page.
			header("Location: ../play.php?error=sqlerror");
			exit();
		} else {


			// Next we need to bind the type of parameters we expect to pass into the statement, and bind the data from the user.
			mysqli_stmt_bind_param($stmt, "ssss", $player1, $player1score, $player2, $player2score);
			// Then we execute the prepared statement and send it to the database!
			// This means the user is now registered! :)
			mysqli_stmt_execute($stmt);
			// Lastly we send the user back to the signup page with a success message!
			header("Location: ../play.php?submit=success");
			exit();
		}
	


// Then we close the prepared statement and the database connection!

// If the user tries to access this page an inproper way, we send them back to the signup page.
header("Location: ../play.php");
exit();
}
}