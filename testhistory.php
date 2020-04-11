<?php
    include 'includes/dbh.inc.php';
    require 'header.php';
	
		$sql = "SELECT * FROM games";
    $result = mysqli_query($conn, $sql);
    $resultCheck = mysqli_num_rows($result);
		
		 if ($resultCheck > 0) {
		
        while ($row = mysqli_fetch_assoc($result)) {
			
			$sql = "SELECT * FROM users ";
			$sql .="WHERE idUsers =". $row['player2']; 
			$userResult = mysqli_query($conn, $sql);
			//$userRowArray = mysqli_fetch_assoc($userResult);
			//use lines 11-16 if usernames are saved as ID numbers. Changed it so usernames saved as username in games table
			
            ?>
<!DOCTYPE html>
<html>
<head>
    
</head>
<body>
   <table style="width:300px; line-height:20px;">
	   
	   
	   <caption> <?php echo $row['date']?></caption>
        
<!--			tr means row -->
			
<!--			make an empty box in the rowblock empty -->
			
		<!--	<td></td> 
			<th scope="col">Players</th>
    <th scope="col">Score</th>-->
	
			<th colspan="5"><h3>Game # <?php  echo $row['idgames']; ?></h3> </th>
<!--	   create column in games table called "match description" where users can enter custom titles -->
            
		<tr>
<!--display ranking next to each player-->
			<td></td>
			<td><?php  echo $row['player1'];echo' (1)'; ?>  </td>
			<td><?php  echo $row['player1score']; ?></td>
			
		</tr>
	   <tr>
		   <td></td>
	   <td><?php  echo $row['player2']; echo' (4)'; ?></td>
  
			<td><?php  echo $row['player2score']; ?></td>
		  
		</tr>
		<br>
        <?php
        }}
        ?>
        </table>
</body>
    
    </html>
<?php
require "footer.php";
	
         //Desire: UserWhoUplaoded Vs. Opponent green box around winner
            //In select box make sure current User is set in box