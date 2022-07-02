<?php
include 'config.php';
session_start ();

$riddleText=$_POST['riddleText'];
$solution=$_POST['solution'];
$infoText=$_POST['infoText'];
$number=$_POST['number'];


$sql = "INSERT INTO riddle (text, location_solution,infotext, points,riddle_link)
VALUES ('$riddleText','$solution','$infoText','$number','not defined')";
mysqli_query($conn,$sql);
$last_id = $conn->insert_id;
$link='https://arthunt.000webhostapp.com/Solved.php?r='.$last_id;
$user=$_SESSION["id_user"];
$sql = "UPDATE riddle
		SET riddle_link='$link'
		WHERE id_riddle='$last_id';";

$qry = mysqli_query($conn, $sql);
$sql1 = "INSERT INTO produce (id_user,id_riddle)
VALUES ('$user','$last_id')";
mysqli_query($conn,$sql1);
header("Location: userriddle.php?msg=riddle");

?>