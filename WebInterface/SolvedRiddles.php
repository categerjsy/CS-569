<?php
include 'config.php';

$team=$_POST["team"];
$thunt=$_POST["thunt"];


$total=-1;


$idQueryTH=mysqli_query($conn,"SELECT * FROM treasure_hunt WHERE name='$thunt'");
 while ($row = mysqli_fetch_array($idQueryTH, MYSQLI_ASSOC)) {
    $id_thunt=$row["id_thunt"];
 }

$checkQuery="SELECT * FROM has WHERE id_thunt='$id_thunt'";
$result=mysqli_query($conn,$checkQuery);
$total=mysqli_num_rows($result);

$idQuery=mysqli_query($conn,"SELECT * FROM team WHERE name='$team'");
 while ($row = mysqli_fetch_array($idQuery, MYSQLI_ASSOC)) {
    $id_team=$row["id_team"];
 }

$solved=0;
$solveQuery="SELECT * FROM solve WHERE id_thunt='$id_thunt' AND id_team='$id_team'";
$solveResult=mysqli_query($conn,$solveQuery);
$solved=mysqli_num_rows($solveResult);

$points=0;
$riddles=mysqli_query($conn,"SELECT * FROM solve WHERE id_thunt='$id_thunt' AND id_team='$id_team'");
 while ($row = mysqli_fetch_array($riddles, MYSQLI_ASSOC)) {
    $id_riddle=$row["id_riddle"];
    $point=mysqli_query($conn,"SELECT * FROM riddle WHERE id_riddle='$id_riddle'");
    while ($rowp = mysqli_fetch_array($point, MYSQLI_ASSOC)) {
        $points=$points+$rowp["points"];
    }

}

echo $solved;
echo "/";
echo $total;
echo "*";   
echo $points;





?>