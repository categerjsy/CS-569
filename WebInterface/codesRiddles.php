<?php
include 'config.php';
session_start ();
 if (isset($_SESSION["username"])==NULL){
  header("Location: index.php");
 }
include('phpqrcode/qrlib.php');
$thunt=$_SESSION["th"];
$tempDir = "qrcodes/";
?>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>AR Treasure Hunt</title>
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
      integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />
    <link rel="stylesheet" href="css/st.css" />
    <link rel="stylesheet" href="css/form.css" />
    <link rel="stylesheet" href="css/button.css" />
    <link rel="stylesheet" href="css/disclaimer.css" />
    <script type="text/javascript" src="http://static.runoob.com/assets/qrcode/qrcode.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    
    <style>
      .content {
      display: flex; 
      justify-content: space-between;
      }
    </style>
  </head>
  <body>
    <nav class="navbar">
      <div class="navbar-container container">
          <input type="checkbox" name="" id="">
          <div class="hamburger-lines">
              <span class="line line1"></span>
              <span class="line line2"></span>
              <span class="line line3"></span>
          </div>
          <ul class="menu-items">
              <li><a href="homepage.php">Home</a></li>
              <li><a href='teams.php'>Teams</a></li>
              <?php 
              $diff=$_SESSION["age"];
              if($diff>14){
              echo "<li><a href='userriddle.php'>Riddles</a></li>
                    <li><a href='createriddle.php?msg=first'>Create Riddle</a></li>
                    <li><a href='createteam.php'>Create Team</a></li>
                    <li><a href='createthunt.php'>Create Hunt</a></li>
                    <li><a href='treasurehunts.php'>Treasure hunt</a></li>";
              }
              ?>
              <li><a href="signout.php">Sign out</a></li>
          </ul>
          <h1 class="logo">TH</h1>
      </div>
  </nav>
    <section class="showcase-area" id="showcase">
      <div class="showcase-container">
        <h1 class="main-title" id="home">Create your team!</h1>
        <p>Solve riddles and pick up coins in your treasure chest!</p>
      </div>
    </section>

    <section id="about">
    <div class='container'>
    <?php

     $number=0;
     $query = mysqli_query($conn, "SELECT * FROM has WHERE id_thunt='$thunt'");
     while ($row = mysqli_fetch_array($query, MYSQLI_ASSOC)) {
         $riddle=$row["id_riddle"];
         $queryr = mysqli_query($conn, "SELECT * FROM riddle WHERE id_riddle='$riddle'");
         while ($rowr = mysqli_fetch_array($queryr, MYSQLI_ASSOC)) {
        $number=$number+1;
        $text=$rowr['text'];
        $location_solution=$rowr['location_solution'];
        $infotext=$rowr['infotext'];
        $points=$rowr['points'];
        $link=$rowr['riddle_link'];
        array_push($Qrcodes,$link);
        echo "<div class='row'>
          <div class='col-25'>
            <p>Riddle's Text</p>
          </div>
          <div class='col-75'>
            $text
          </div>
          </div>
          <div class='row'>
          <div class='col-25'>
            <p>Riddle's solution</p>
          </div>
          <div class='col-75'>
            $location_solution
          </div>
          </div>
          <div class='row'>
          <div class='col-25'>
            <p>Riddle's Information</p>
          </div>
          <div class='col-75'>
            $infotext
          </div>
          </div>
          <div class='row'>
          <div class='col-25'>
            <p>Riddle's point</p>
          </div>
          <div class='col-75'>
            $points
          </div>
          </div>
          <div class='row'>
          <div class='col-25'>
          </div>
          <div class='col-75'>
          <div class='row'>
            <div class='col-25'>
            <p>Please save this QRCode for your treasure hunt.</p>
            </div>
            <div class='col-75'>";
            
            $fileName = 'riddle_t'.$thunt.'_r'.$number.'.png';
            $pngAbsoluteFilePath = $tempDir.$fileName;
            $urlRelativeFilePath = $tempDir.$fileName;
            
                // generating
                if (!file_exists($pngAbsoluteFilePath)) {
                    QRcode::png($link, $pngAbsoluteFilePath, QR_ECLEVEL_H, 10);
                } 
              echo '<div class="row"><div class="col-25">';
              echo '<img width="100" height="100" id="'.$number.'" src="'.$urlRelativeFilePath.'" />';
              echo "</div><div class='col-75'>";
              echo "</br></br><p>&nbsp&nbsp<a href='https://arthunt.000webhostapp.com/download.php?path=$urlRelativeFilePath' ><img  src='img/download-svgrepo-com.svg'  width='25' height='25'/></a></p>";
              $sqli = "UPDATE has SET qrcode='$urlRelativeFilePath' WHERE id_thunt='$thunt' AND id_riddle='$riddle'";
              mysqli_query($conn,$sqli);
       echo 
       " </div></div>
       </div>
        </div>
            </div>
        <div class='row'>
        <div class='col-25'>
          </div>
          <div class='col-75'>
            <div class='col-25'>
            </div>
            <div class='col-75'>
          </div>
        </div>
        </div><hr>";
         }
     }
     ?>
    </div>


    </section>
    <footer id="footer">
      <h2>AR Treasure Hunt &copy; </h2>
    </footer>
  </body>

  <script src="js/number.js"></script>
  <script src="js/disablePreviousDates.js"></script>
</html>