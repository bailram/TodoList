<?php
  include 'model.php';
  session_start();

  $id = $_SESSION['id_user'];
  $old_password = $_POST['inputOldPassword'];
  $password = $_POST['inputPassword'];

  echo "$id $old_password $password";
?>
