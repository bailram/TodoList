<?php
  include 'model.php';

  $username = $_POST['inputUsername'];
  $password = $_POST['inputPassword'];
  $repassword = $_POST['inputRetypePassword'];
  $name = $_POST['inputName'];

  if(do_sign_up($username,$password,$name)){
    header("Location: index.php");
  }else {
    header("Location: index.php?mess=error");
  }
?>
