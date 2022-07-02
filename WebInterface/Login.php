<?php
include 'config.php';

    $userName=$_REQUEST['userName'];
    $PassWord=$_REQUEST['passWord'];
    $checkQuery="SELECT * FROM user WHERE username='$userName' AND password='$PassWord'";
    $result=mysqli_query($conn,$checkQuery);
    
    if(mysqli_num_rows($result)==1)
    {
     echo $userName;
    }
     else
    {
      echo 0;
    }


?>
