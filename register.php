<!doctype html>
<html lang="en">
  <head>
    <title>Todolist | Sign Up</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Pacifico">
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./css/register.css">
  </head>
  <body>
    <div class="container">
      <div class="row justify-content-md-center mt-5">
        <div class="col-lg-5 pb-5" id="form-view">
          <div class="text-center mt-5">
            <h2 id="app-name">Todolist</h2>
            <h5 class="mt-3">Register Account</h5>
          </div>
          <form class="mr-5 ml-5" action="do_register.php" onsubmit="return validatePassword(this)" method="post">
            <div class="form-group mt-3">
              <label for="inputUsername">Username</label>
              <input type="text" class="form-control" name="inputUsername" id="inputUsername" value="" required>
            </div>
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="inputPassword">Password</label>
                <input type="password" class="form-control" name="inputPassword" id="inputPassword" value="" required>
              </div>
              <div class="form-group col-md-6">
                <label for="inputRetypePassword">Retype Password</label>
                <input type="password" class="form-control" name="inputRetypePassword" id="inputRetypePassword" value="" required>
                <div class="invalid-feedback">
                  Password does not match
                </div>
              </div>
            </div>
            <div class="form-group">
              <label for="inputName">Name</label>
              <input type="text" class="form-control" name="inputName" id="inputName" value="" required>
            </div>
            <button type="submit" class="btn btn-submit mt-3 mb-3 btn-text" name="button">Sign Up</button><br>
            <center><a href="index.php" id="already-have-account">Already have an account?</a></center>
          </form>
        </div>
        <div class="col-lg-6 image-view">
          <div class="text-center p-5" id="image-content">
            <img src="./img/personal_data__monochromatic.svg" class="rounded" alt="">
            <h3 class="mt-5">Improve your task management</h3>
            <p>Improve your task management by making a habit of making a list of tasks that you will be working on.</p>
          </div>
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
    <script type="text/javascript">
      function validatePassword(form) {
        password = form.inputPassword.value;
        repassword = form.inputRetypePassword.value;
        if(password != repassword){
          $('#inputRetypePassword').addClass('is-invalid');
          $('.invalid-feedback').show();
          return false;
        }else{
          $('#inputRetypePassword').removeClass('is-invalid');
          $('.invalid-feedback').hide();
          return true;
        }
      }
    </script>
  </footer>
</html>
