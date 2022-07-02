<?php
include 'config.php';
session_start ();
 if (isset($_SESSION['username'])==NULL){
  header('Location: index.php');
 }
$id_thunt=$_SESSION['id_thunt'];

?>
<html lang='en'>
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
              echo "<li><a href='userriddle.php'>RiddleS</a></li>
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
        <h1 class='main-title' id='home'>Edit your treasure hunt!</h1>
        <p>Solve riddles and pick up coins in your treasure chest!</p>
      </div>
    </section>

    <section id='about'>
    <div class='container'>
    
    <?php
    
    $query = mysqli_query($conn, "SELECT * FROM treasure_hunt WHERE id_thunt='$id_thunt'");
    while ($row = mysqli_fetch_array($query, MYSQLI_ASSOC)) {
        $name=$row["name"];
        $datetime=$row["datetime"];
        $dt=date('Y-m-d\TH:i', strtotime($datetime));
        echo 
            "<form action='edthunt.php' method='post'>
                <div class='row'>
                <div class='col-25'>
                    <label for='thname'>Threasure Hunt Name</label>
                </div>
                <div class='col-75'>
                    <input type='text' id='thname' name='thname' value='$name' required>
                </div>
                </div>
                <div class='row'>
                <div class='col-25'>
                    <label for='date'>Date</label>
                </div>
                <div class='col-75'>
                <input type='datetime-local' id='datetime' name='datetime' value='$dt' required>
                </div>
                </div>
                </div>
                <div class='row'>
                <input type='submit' value='Edit Treasure Hunt'>
                </div>
            </form>";
    }

  ?>
</div>
    </section>
    <footer id='footer'>
      <h2>AR Treasure Hunt &copy; </h2>
    </footer>
  </body>
  
   <script src='js/number.js'></script>
   <script src='js/disablePreviousDates.js'></script>
</html>