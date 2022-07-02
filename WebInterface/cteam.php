<?php
include 'config.php';
session_start ();

$teamname=$_POST['teamname'];
$number=$_POST['number'];

$query = mysqli_query($conn,"select * from team where name='$teamname'");
$rt = mysqli_num_rows($query);
if($rt==1){
    header("Location: createteam.php?msg=tryagain");
}
else{
    $sql = "INSERT INTO team (name,numberPlayers)
    VALUES ('$teamname','$number')";
    mysqli_query($conn,$sql);
    $last_id = $conn->insert_id;
    $user=$_SESSION["id_user"];
    $_SESSION["id_team"] =$last_id;
    $sql1 = "INSERT INTO creates_team (id_user,id_team)
    VALUES ('$user','$last_id')";
    mysqli_query($conn,$sql1);
    $sql2 = "INSERT INTO is_member (id_user,id_team,role)
    VALUES ('$user','$last_id','leader')";
    mysqli_query($conn,$sql2);
    header("Location: homepage.php?msg=team");
}
?>