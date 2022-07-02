<?php
include 'config.php';
session_start ();
 if (isset($_SESSION["username"])==NULL){
  header("Location: index.php");
 }

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
    <link rel="stylesheet" href="css/disclaimer.css" />
    <link rel="stylesheet" href="css/sweetalert.css" />
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
    <div class="container">
    <form action="cteam.php" method="post">
    <div class="row">
    <div class="row">
      <div class="col-25">
        <label for="teamname">Team's Name</label>
      </div>
      <div class="col-75">
        <input type="text" id="teamname" name="teamname" placeholder="Your team's name.." required>
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="number">Number of team players</label>
      </div>
        <div class="quantity">
        <input type="number" name="number" min="1" step="1" value="1">
        </div>
      </div>
    </br>
    <div class="row">
      <input type="submit" value="Create my team">
    </div>
  </form>
</div>
    </section>
    <footer id="footer">
      <h2>AR Treasure Hunt &copy; </h2>
    </footer>
  </body>
  <script>
    window.onload = function mess() {//na allaksw name
      
        <?php if (isset($_GET["msg"]) && $_GET["msg"] == 'tryagain') { ?>
        swal({
          title: "Oops...!",
          text: "A team has this name, try a new one!",
          type: "error",
          timer: 2000,
          showConfirmButton: false
        }, function(){
              window.location.href = "/createteam.php";
        });
        <?php }?>
        <?php if (isset($_GET["msg"]) && $_GET["msg"] == 'create') { ?>
        swal({
          title: "Oops...!",
          text: "You need to create a team and then visit the site again to participate to a treasure hunt!",
          type: "info",
          timer: 5000,
          showConfirmButton: true
        }, function(){
              window.location.href = "/createteam.php";
        });
        <?php }?>
    }
    </script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="js/number.js"></script>
  <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script> 
</html>