<?php
include 'config.php';
session_start ();

$thunt=$_POST["thunt"];

$_SESSION["th"]=$thunt;
header("Location: codesRiddles.php");
?>