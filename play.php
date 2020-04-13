<?php
// To make sure we don't need to create the header section of the website on multiple pages, we instead create the header HTML markup in a separate file which we then attach to the top of every HTML page on our website. In this way if we need to make a small change to our header we just need to do it in one place. This is a VERY cool feature in PHP!
include "header.php";
$dBServername = "localhost";
$dBUsername = "root";
$dBPassword = "";
$dBName = "loginsystem";

// Create connection
$connect = mysqli_connect($dBServername, $dBUsername, $dBPassword, $dBName);
function fill_users($connect)
{
	$output = ' ';
	
	if (isset($_SESSION['id'])) {
	$user_id = $_SESSION['id'];

	$sql = "SELECT * FROM users WHERE idUsers != $user_id";

	$result = mysqli_query($connect, $sql);

	while ($row = mysqli_fetch_array($result)) {
		$output .= '<option value=" ' . $row["uidUsers"] . '">' . $row["uidUsers"] . '</option>';
	}}
	return $output; 
}
	// Here we create an error message if the user made an error trying to submit 
			if (isset($_GET["error"])) {
				if ($_GET["error"] == "emptyfields") {
					echo '<h2 class="submiterror">you forgot to fill in a field</h2>';
				} else if ($_GET["error"] == "invalidscore") {
					echo '<h2 class="submiterror">Finish the game. We dont end in ties here.</h2>';
				} else if ($_GET["error"] == "invalidopponent") {
					echo '<h2 class="submiterror">Playing with yourself is unhealthy!</h2>';
				} 
			}
			if (isset($_GET["submit"])) {
				if ($_GET["submit"] == "success") {
					echo '<h2 class="submit sucess">Submit successful!</h>';
				}
				else {
					echo '<h2 class="submit error">Something went wrong!</h>';
				}
			}
?>



<main>
	<div class="wrapper-main">
		<section class="section-default">
            <h1>Submit a Match</h1>
			<?php
			
			//HERE IF USER IS NOT SIGNED IN THEY CANNOT ACCESS PAGE
			if (!isset($_SESSION['id'])) {
				echo '<p class="login-status">Login or Signup to Begin!</p>';
				// If the user tries to access this page an inproper way, we send them back to the signup page.
				header("Location: ../pingpong/signup.php");
			} 
			else if (isset($_SESSION['id'])) {
				
			?>
            <form class="form-submit" action="includes/play.inc.php" method="post">
                
            <html> 
                
                   <h4> 
					  <input type="hidden" name="player1" 
					value="<?php echo $_SESSION['uid']; ?>"> <?php echo "hello  "; echo $_SESSION['uid']; ?>  <br>
					   <input type="player1score" name="player1score"
                 placeholder="Enter your score">
					   <br>
     <! ––PLAYER 2 BOX/-->
                   <h3>
                        <select id="users" name="player2"> 
                            <option value="">Select Opponent</option> 
                            
							<?php echo fill_users($connect); ?> 
						</select>
					   <br>
					   <input type="player2score" name="player2score"
                 placeholder="Enter opponents score">
                       
				<br>
				

                
				<button type="submit" name="submit">SUBMIT</button>      

<?php
// And just like we include the header from a separate file, we do the same with the footer.
require "footer.php";

}
?>
