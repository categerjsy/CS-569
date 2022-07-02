<?php
include 'config.php';
//Logiki gia to url na exei to username
$username=$_GET["username"];

$idQuery=mysqli_query($conn,"SELECT * FROM user WHERE username='$username'");
 while ($row = mysqli_fetch_array($idQuery, MYSQLI_ASSOC)) {
    $id_user=$row["id_user"];

    $query = mysqli_query($conn, "SELECT * FROM is_member WHERE id_user='$id_user' AND role='leader'");
    while ($rowi = mysqli_fetch_array($query, MYSQLI_ASSOC)) {
      $id_team=$rowi['id_team']; 

      $queryt = mysqli_query($conn, "SELECT * FROM participate WHERE id_team='$id_team'");
      while ($rowt = mysqli_fetch_array($queryt, MYSQLI_ASSOC)) {
        $id_thunt=$rowt['id_thunt'];
        $queryth = mysqli_query($conn, "SELECT * FROM treasure_hunt WHERE id_thunt='$id_thunt'");
        while ($rowth = mysqli_fetch_array($queryth, MYSQLI_ASSOC)) {
        $game_name=$rowth["name"];
        echo $game_name;
        echo "*";
        }
        
       
      }

 }

}   




?>
