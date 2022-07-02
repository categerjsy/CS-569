<?php
include 'config.php';
session_start ();



	if (isset($_POST['signup'])){
        $username=$_POST['username'];
        $email=$_POST['email'];
        $fullname=$_POST['fullName'];
        $birth=$_POST['dateOfBirth'];
        $birth_for_database = date ('Y-m-d', strtotime($birth));
        $password=$_POST['password'];
        $cpassword=$_POST['cpassword'];

        $username = stripslashes($username);
        $email = stripslashes($email);
        $query = mysqli_query($conn,"select * from user where username='$username'");
        $ru = mysqli_num_rows($query);
        $query = mysqli_query($conn,"select * from user where email='$email'");
        $re = mysqli_num_rows($query);

        if($password==$cpassword) {
            if($ru==1||$re==1){
                echo "Username or email taken";
                header("Location: index.php");
            }else{
                $sql = "INSERT INTO user (birth,username,password,fullname,email)
		                VALUES (' $birth_for_database','$username','$password','$fullname','$email')";
            }

		mysqli_query($conn,$sql);
        header("Location: index.php?msg=up");
        }
        else{
            echo "Password do not match";
            header("Location: index.php");
        }
	}

    if (isset($_POST['signin'])){
        $username=$_POST['username'];
        $password=$_POST['password'];
        
        if($username && $password){
        
            $username = stripslashes($username);
            $password = stripslashes($password);
            $queryp = mysqli_query($conn,"select * from user where password='$password' AND username='$username'");
            $rowsp = mysqli_num_rows($queryp);

            if($rowsp == 1) {
				$_SESSION["username"] = $username;

				$id = mysqli_query($conn,"select * from user where password='$password' AND username='$username'");
				 while ($row = mysqli_fetch_array($id, MYSQLI_ASSOC)) {
					$my_user=$row["id_user"];
                    $dateOfBirth=$row["birth"];
                    $today = date("Y-m-d");
                    $diff = date_diff(date_create($dateOfBirth), date_create($today));
                    $_SESSION["age"]=$diff->format('%y');
                   
				}
				$_SESSION["id_user"] =  $my_user;

                
                if(isset($_SESSION['URL'])==NULL) {
				header("location:homepage.php"); 	
                }
                else {
                $url=$_SESSION['URL'];
                header("location:".$url); 	
                }
                 
			} 
            else{
			header("Location: index.php?msg=wrong");
			}
      
        }
	}
?>