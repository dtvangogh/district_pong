<?php
    include 'includes/dbh.inc.php';
    require 'header.php';
?>
<!DOCTYPE html>
<html>
<head>
    
    <title> </title>
</head>
<body>
    <table border="2px" style="width:400px; line-height:30px;">
        
        <tr>
			<th colspan="5"><h2>Game History</h2> </th>
            
        </tr>
        <t>
            <th> player1 </th>
             <th> score </th>
             <th> player2 </th>
             <th> score </th>
            <th> date</th>
            </t>
    

<?php 
		
    $sql = "SELECT * FROM games";
    $result = mysqli_query($conn, $sql);
    $resultCheck = mysqli_num_rows($result);
    
    if ($resultCheck > 0) {
		
        while ($row = mysqli_fetch_assoc($result)) {
			
			$sql = "SELECT * FROM users ";
			$sql .="WHERE idUsers =". $row['player2']; 
			$userResult = mysqli_query($conn, $sql);
			$userRowArray = mysqli_fetch_assoc($userResult);
		
			
            ?>
        <tr>
			<td><?php  echo $row['player1']; ?></td>
			<td><?php  echo $row['player1score']; ?></td>
            <td><?php  echo $row['player2']; ?></td>
           <td><?php  echo $row['player2score']; ?></td>
           
        </tr>
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