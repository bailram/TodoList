<!doctype html>
<html lang="en">
  <head>
    <title>Todolist | Login</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Pacifico">
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="./css/index.css">
    <?php
    session_start();
    if(isset($_SESSION['id_user']) && !empty($_SESSION['id_user'])){
      header("Location: main.php");
    }
    ?>
  </head>
  <body>
    <div class="container">
      <div class="row justify-content-md-center mt-5">
        <div class="col-lg-6 image-view">
          <div class="text-center p-5" id="image-content">
            <img src="./img/thinking_monochromatic.svg" class="rounded" alt="">
            <h3 class="mt-5">Free up your mental space</h3>
            <p>Regain clarity and calmness by getting all those tasks out of your head and onto your to-do list (no matter where you are or what device you use).</p>
          </div>
        </div>
        <div class="col-lg-5 pb-5" id="form-view">
          <div class="text-center mt-5">
            <h2 id="app-name">Todolist</h2>
            <small>Welcome to Todolist</small>
          </div>
          <form class="mr-5 ml-5" action="do_login.php" onsubmit="validateForm()" method="post">
            <div class="form-group mt-5">
              <?php if (isset($_GET['mess'])) {
              ?>
                <div class="alert alert-danger" role="alert">
                  <?php
                    if($_GET['mess'] == "2"){
                      echo "Username atau password salah!";
                    }elseif ($_GET['mess'] == "1") {
                      echo "Database error!";
                    }
                  ?>
                </div>
              <?php
              }
              ?>
              <label for="inputUsername">Username</label>
              <input type="text" class="form-control" name="inputUsername" id="inputUsername" value="" required>
            </div>
            <div class="form-group">
              <label for="inputPassword">Password</label>
              <input type="password" class="form-control" name="inputPassword" id="inputPassword" value="" required>
            </div>
            <button type="submit" class="btn btn-submit mt-3 btn-text" name="button">Sign In</button>
            <center class="m-2"> or </center>
            <a href="register.php" class="btn btn-light btn-text" id="btn-signup">Sign Up</a>
          </form>
        </div>
      </div>
    </div>
  </body>
  <footer>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
    <script src="./js/index.js"></script>
  </footer>
</html>
