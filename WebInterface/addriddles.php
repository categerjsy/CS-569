<?php
include 'config.php';
session_start ();
 if (isset($_SESSION['username'])==NULL){
  header('Location: index.php');
 }

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
        <h1 class='main-title' id='home'>Create your team!</h1>
        <p>Solve riddles and pick up coins in your treasure chest!</p>
      </div>
    </section>

    <section id='about'>
    <div class='container'>
    <?php
    $query = mysqli_query($conn, 'SELECT * FROM riddle');
    while ($row = mysqli_fetch_array($query, MYSQLI_ASSOC)) {
      $text=$row['text'];
      $location_solution=$row['location_solution'];
      $infotext=$row['infotext'];
      $points=$row['points'];
      $id_riddle=$row['id_riddle'];
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
          $thunt=$_SESSION['id_thunt'];
          $q = "select * from has where id_riddle='$id_riddle' and id_thunt='$thunt'"; 
								
					// Execute the query and store the result set 
					$result1 = mysqli_query($conn, $q); 
								
					if ($result1) { 
					// it returns number of rows in the table. 
					$row = mysqli_num_rows($result1); 
          
					if ($row) { 
          echo "
          <form method='post' action='has.php#form-anchor' id='form-anchor'>
					<button type ='submit' name='remove_riddle'  class='button' value='$id_riddle'>
					<span>Remove riddle</span>
					</button>
          </form>";
          }else {
          echo "
          <form method='post' action='has.php#form-anchor' id='form-anchor'>
					<button type ='submit' name='add_riddle'  class='button' value='$id_riddle'>
					<span>Add riddle</span>
					</button>
          </form>";
          }
        }
        
          echo "
          </div>
          </div>
          <hr>";
    }
    ?>

<form action='https://arthunt.000webhostapp.com/generatelinkQRHunt.php';>
  <button type ='submit' class='button'>
    <span>Sent participation to leaders!</span>
  </button>
</form>
</br>
</br>


    
    </div>
    </section>
    <footer id='footer'>
      <h2>AR Treasure Hunt &copy; </h2>
    </footer>
  </body>
  <script>
function downloadURI(uri, name) {
  var link = document.createElement('a');
  link.download = name;
  link.href = uri;
  document.body.appendChild(link);
  link.click();
  document.body.removeChild(link);
  delete link;
};

window.onload = function ()
{
  console.log('onload');
  let qrcode = new QRCode(document.getElementById('qrcode'),
             {
              text: 'https://localhost/CS569-WebApplication/participateTeam.php?id='+'<?php echo $_SESSION['id_team'] ?>',
              width: 450,
              height: 450,
              colorDark : '#000000',
              colorLight : '#ffffff',
              correctLevel : QRCode.CorrectLevel.H
            });  
  setTimeout(
    function ()
    {
        let dataUrl = document.querySelector('#qrcode').querySelector('img').src;
        downloadURI(dataUrl, 'qrcode.png');
    }
    ,1000);

};
    
  </script>
 
  <script src='https://cdn.jsdelivr.net/gh/davidshimjs/qrcodejs/qrcode.min.js'></script>
  <script src='js/number.js'></script>
  <script src='js/disablePreviousDates.js'></script>
</html>