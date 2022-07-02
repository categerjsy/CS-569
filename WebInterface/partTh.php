<?php
include 'config.php';
session_start ();

$id_hunt=$_SESSION["part_id"];


$team=$_POST["team"];

$sql= "INSERT INTO participate(id_thunt,id_team)
    VALUES ('$id_hunt','$team')";
mysqli_query($conn,$sql);

unset($_SESSION["part_id"]);
header("location:homepage.php?msg=huntpart"); 


?>