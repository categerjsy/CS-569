<?php
include 'config.php';
session_start ();
$thunt=$_SESSION['id_thunt'];
$qrcode="not defined";


	if (isset($_POST['add_riddle'])){
			$sql = "INSERT INTO has (id_thunt,id_riddle,qrcode)
			VALUES ('$thunt', ".$_POST["add_riddle"].",'$qrcode')";

		mysqli_query($conn,$sql);


		echo '<script type="text/JavaScript"> 
		history.back()
		</script>';

	}
	
	 
	
	if (isset($_POST['remove_riddle'])){
	
		 
		$sql = "DELETE FROM has WHERE id_thunt='$thunt' AND id_riddle=".$_POST["remove_riddle"]."";
	
		mysqli_query($conn,$sql);

		echo '<script type="text/JavaScript"> 
		history.back()
		</script>';
	
	}
	
	 
	
?>