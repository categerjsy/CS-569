<?php
include 'config.php';
session_start ();

 if (isset($_SESSION["username"])==NULL){
  $actual_link = $_SERVER['REQUEST_URI'];   
  $_SESSION['URL']= $actual_link;
  header("Location: index.php");
 }
 if (!isset($_SESSION["username"])==NULL){
    unset($_SESSION['URL']);
    $user=$_SESSION["id_user"];
    $team_id=$_GET["id"];
    $sql2 = "INSERT INTO is_member (id_user,id_team,role)
    VALUES ('$user','$team_id','simplePlayer')";
    mysqli_query($conn,$sql2);
    header("location:homepage.php?msg=teampart"); 
 }

?>