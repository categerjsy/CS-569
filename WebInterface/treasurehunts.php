<?php
include 'config.php';
session_start ();

 if (isset($_SESSION['username'])==NULL){
  header('Location: index.php');
 }
$id=$_SESSION["id_user"];
?>
<html>
  <head>
    <meta charset='UTF-8' />
    <meta http-equiv='X-UA-Compatible' content='IE=edge' />
    <meta name='viewport' content='width=device-width, initial-scale=1.0' />
    <title>AR Treasure Hunt</title>
    <link
      rel='stylesheet'
      href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css'
      integrity='sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w=='
      crossorigin='anonymous'
      referrerpolicy='no-referrer'
    />
    <link rel='stylesheet' href='css/st.css' />
    <link rel='stylesheet' href='css/form.css' />
    <link rel="stylesheet" href="css/disclaimer.css" />
    <script type='text/javascript' src='http://static.runoob.com/assets/qrcode/qrcode.min.js'></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel='stylesheet' href='css/button.css' />
  </head>
  <body>
    <nav class='navbar'>
      <div class='navbar-container container'>
          <input type='checkbox' name='' id=''>
          <div class='hamburger-lines'>
              <span class='line line1'></span>
              <span class='line line2'></span>
              <span class='line line3'></span>
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
          <h1 class='logo'>TH</h1>
      </div>
  </nav>
    <section class='showcase-area' id='showcase'>
      <div class='showcase-container'>
        <h1 class='main-title' id='home'>Let's see your treasure hunts!</h1>
        <p>Solve riddles and pick up coins in your treasure chest!</p>
      </div>
    </section>

    <section id='about'>
    <div class='container'>
    </br></br>
    <h2>Treasure hunt you had created:</h2>
    <?php
    $notr=0;
    $my_user=$_SESSION["id_user"] ;

    $query = mysqli_query($conn, "SELECT * FROM creates_treasure_hunt WHERE id_user='$my_user'");
    while ($row = mysqli_fetch_array($query, MYSQLI_ASSOC)) {
      $treasure_hunt=$row['id_thunt']; 
      $queryt = mysqli_query($conn, "SELECT * FROM treasure_hunt WHERE id_thunt='$treasure_hunt'");
      while ($rowt = mysqli_fetch_array($queryt, MYSQLI_ASSOC)) {
        $thunt_name=$rowt['name'];
        $notr=1;
      echo "<div class='row'>
            <div class='col-25'>
              <p>Treasure hunt name</p>
            </div>
            <div class='col-75'>
            $thunt_name
            </div>
            </div> 
            <div class='row'>
            <div class='col-25'>
            </div>
            <div class='col-75'>
            <form method='post' action='edithunt.php#form-anchor' id='form-anchor'>
            <button name='thunt'  class='button' value='$treasure_hunt'>
            <span>Εdit Treasure hunt</span>
			</button>
            </form>
            </div>
            </div><hr>";
      }
    }
    if ($notr==0) { 
      
      echo "</br></br><h3>You have no treasure hunts! :/ <h3></br></br>";
    }
          
    ?>
    </br></br>
    </div>
    </section>
    <footer id='footer'>
      <h2>AR Treasure Hunt &copy; </h2>
    </footer>
  </body>

 
  <script src='https://cdn.jsdelivr.net/gh/davidshimjs/qrcodejs/qrcode.min.js'></script>
  <script src='js/number.js'></script>
  <script src='js/disablePreviousDates.js'></script>
</html>