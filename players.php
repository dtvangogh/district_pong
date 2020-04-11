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
            <th colspan="4"><h2>ROSTER</h2>
            </th>
            
        </tr>
        <t>
            <th> NAME  </th>
             <th> OVR </th>
            <th>  RANK </th>
             <th> RECORD </th>
            
            </t>
    

<?php
    $sql = "SELECT * FROM users;";
    $result = mysqli_query($conn, $sql);
    $resultCheck = mysqli_num_rows($result);
    
    if ($resultCheck > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            ?>
        <tr>
            <td><?php  echo $row['uidUsers']; ?></td>
           
        </tr>
        <?php
        }
        ?>
        </table>
</body>
    
    </html>
<?php
require "footer.php";
    }
         //Desire: UserWhoUplaoded Vs. Opponent green box around winner
            //In select box make sure current User is set in box