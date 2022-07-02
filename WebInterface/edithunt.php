<?php
include 'config.php';
session_start ();
$_SESSION['id_thunt']=$_POST['thunt'];
header("location:ethunt.php"); 
?>