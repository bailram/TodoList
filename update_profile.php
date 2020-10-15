<?php
  include 'model.php';
  session_start();

  $id = $_SESSION['id_user'];
  $username = $_POST['edit-username'];
  $nama = $_POST['edit-nama'];

  if(do_update_user($id, $username, $nama)){
    $_SESSION['username'] = $username;
    $_SESSION['nama'] = $nama;
    header("Location: main.php");
  }else{
    header("Location: main.php");
  }
?>
