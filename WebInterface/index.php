<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" href="css/disclaimer.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <link rel="stylesheet" href="css/sweetalert.css" />
    <title>AR Treasure Hunt</title>
  </head>
  <body>
    <div class="container">
      <div class="forms-container">
        <div class="signin-signup">
          <form action="connect.php" method="post" class="sign-in-form">
            <h2 class="title">Sign in</h2>
            <div class="input-field">
              <label for="username">Username:</label>
              <input type="text" name="username" required/>
            </div>
            <div class="input-field">
              <label for="password">Password:</label>
              <input type="password" name="password" required/>
            </div>
            <input type="submit" name='signin' value="Login" class="btn solid" />
          </form>

          <form action="connect.php" method="post" class="sign-up-form" >
            <h2 class="title">Sign up</h2>
            <div class="input-field">
              <label for="username">Username:</label>
              <input type="text" name="username" id="username" required/>
            </div>
            <div class="input-field">
              <label for="email">Email:</label>
              <input type="email" name="email" id="email" required/>
            </div>
            <div class="input-field">
            <label for="fullName">Full name:</label>
              <input type="text" name="fullName" id="fullName" required/>
            </div>
            <div class="input-field">
              <label for="dateOfBirth">Date of Birth:</label>
             <input type="date"  name="dateOfBirth" value="2022-04-18" min="1928-02-20" max="<?php echo date('Y-m-d');?>">
            </div>
            <div class="input-field">
              <label for="password">Password:</label>
              <input type="password" name="password" id="password" required/>
            </div>
            <div class="input-field">
              <label for="confirmPassword">Confirm:</label>
              <input type="password" name="cpassword" id="confirm_password" required/>
            </div>
            <span id='message'></span>
            <input type="submit" name='signup' class="btn" value="Sign up" required/>
          </form>
        </div>
      </div>

      <div class="panels-container">
        <div class="panel left-panel">
          <div class="content">
            <h3>New here ?</h3>
            <p>
              Create your own treasure hunts! Discover,learn and play with your friends.
            </p>
            <button class="btn transparent" id="sign-up-btn">
              Sign up
            </button>
          </div>
          <img src="img/log.svg" class="image" alt="" />
        </div>
        <div class="panel right-panel">
          <div class="content">
            <h3>One of us ?</h3>
            <p>
              Sign in to create your treasure hunts!
            </p>
            <button class="btn transparent" id="sign-in-btn">
              Sign in
            </button>
          </div>
          <img src="img/register.svg" class="image" alt="" />
        </div>
      </div>
    </div>
    <script>
    window.onload = function mess() {
        <?php if (isset($_GET["msg"]) && $_GET["msg"] == 'wrong') { ?>
        swal({
          title: "Oops!",
          text: "Something went wrong! Please try again.",
          type: "error",
          timer: 2000,
          showConfirmButton: false
        }, function(){
              window.location.href = "/index.php";
        });
        <?php }?>
        <?php  if (isset($_GET["msg"]) && $_GET["msg"] == 'up') { ?>
          swal({
          title: "Success!",
          text: "Great you have an account.Sign In!",
          type: "success",
          timer: 2000,
          showConfirmButton: false
        }, function(){
              window.location.href = "/index.php";
        });
        <?php }?>
    }

  </script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script> 
  <script src="js/password.js"></script>
  <script src="js/app.js"></script>
  </body>
</html>