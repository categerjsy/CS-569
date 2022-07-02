<?php
include 'config.php';
session_start ();

 if (isset($_SESSION['username'])==NULL){
  header('Location: index.php');
 }
$id=$_SESSION["id_user"];
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
    <script type='text/javascript' src='http://static.runoob.com/assets/qrcode/qrcode.min.js'></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel='stylesheet' href='css/button.css' />
    <link rel="stylesheet" href="css/sweetalert.css" />
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
                    <li><a href='createriddle.php'>Create Team</a></li>
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
        <h1 class='main-title' id='home'>Let's see your riddles!</h1>
        <p>Solve riddles and pick up coins in your treasure chest!</p>
      </div>
    </section>

    <section id='about'>
    <div class='container'>
    </br></br>
    <h2>Your riddles:</h2>
    <?php
    $test=0;
    $my_user=$_SESSION["id_user"] ;

    $query = mysqli_query($conn, "SELECT * FROM produce WHERE id_user='$my_user'");
    while ($row = mysqli_fetch_array($query, MYSQLI_ASSOC)) {
      $id_riddle=$row['id_riddle']; 
      $queryt = mysqli_query($conn, "SELECT * FROM riddle WHERE id_riddle='$id_riddle'");
      while ($rowt = mysqli_fetch_array($queryt, MYSQLI_ASSOC)) {
        $test=1;
        $text=$rowt['text'];
        $location_solution=$rowt['location_solution'];
        $infotext=$rowt['infotext'];
        $points=$rowt['points'];
        $id_riddle=$rowt['id_riddle'];
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
            <div class='col-75'>";
      }
    }
    if ($test==0) { 
      
      echo "</br></br><h3>Please create a riddle! It will really help us! :)<h3></br></br>";
    }
          
    ?>
    </br></br>
    </div>
    </section>
    <footer id='footer'>
      <h2>AR Treasure Hunt &copy; </h2>
    </footer>
  </body>

 
  <script>
    window.onload = function mess() {
      <?php if (isset($_GET["msg"]) && $_GET["msg"] == 'riddle') { ?>
        swal({
          title: "Good job!",
          text: "Your riddle is ready!",
          type: "success",
          timer: 2000,
          showConfirmButton: false
        }, function(){
              window.location.href = "/userriddle.php";
        });
        <?php }?>  
    }

  </script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script> 
  <script src='js/number.js'></script>
  <script src='js/disablePreviousDates.js'></script>
</html>