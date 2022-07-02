<?php

include 'config.php';
$id_riddle=$_GET["r"];
//εδω καπως θα μπουν τα αντιστοιχα :3
$id_thunt=$_POST["id_thunt"];
$team=$_POST["team"];

$idQuery=mysqli_query($conn,"SELECT * FROM team WHERE name='$team'");
 while ($row = mysqli_fetch_array($idQuery, MYSQLI_ASSOC)) {
    $id_team=$row["id_team"];
 }

$checkQuery="SELECT * FROM solve WHERE id_riddle='$id_riddle' AND id_thunt='$id_thunt' AND id_team='$id_team'";
$result=mysqli_query($conn,$checkQuery);

if(mysqli_num_rows($result)>=1)
{
     echo "already in database";
}
else{
    $sql = "INSERT INTO solve (id_riddle,id_thunt,id_team)
    VALUES ('$id_riddle','$id_thunt','$id_team')";
    mysqli_query($conn,$sql);
    $result=mysqli_query($conn,$checkQuery);
    if(mysqli_num_rows($result)==1)
    {
        echo "success";
    } else{
        echo "failed";

    }

}

?>