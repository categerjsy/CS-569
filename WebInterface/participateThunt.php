<?php
include 'config.php';
session_start ();

 if (isset($_SESSION["username"])==NULL){
  $actual_link = $_SERVER['REQUEST_URI'];   
  $_SESSION['URL']= $actual_link;
  header("Location: index.php"); 
 }
 if (!isset($_SESSION["username"])==NULL){
    $diff=$_SESSION["age"];
    $user=$_SESSION["id_user"];
    if($diff>14){
 

    $query = mysqli_query($conn,"SELECT * FROM is_member WHERE id_user='$user' AND role='leader'");
    $rt = mysqli_num_rows($query);
    
      if($rt==0){
      header("location:createteam.php?msg=create");
      } else {
      unset($_SESSION['URL']);
      $_SESSION["part_id"]=$_GET["id"];
      header("location:selectTeam.php");
      }
       
    }else {
      header("location:homepage.php?msg=age");
    }
 }

?>