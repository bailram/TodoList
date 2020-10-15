<?php
  include 'model.php';

  $username = $_POST['inputUsername'];
  $password = $_POST['inputPassword'];

  if($res = do_sign_in($username,$password)){
    $data = $res->fetch_assoc();
    if(empty($data)){
      header("Location: index.php?mess=2"); // username atau password salah
    }else{
      print_r($data);
      session_start();
      $_SESSION['id_user'] = $data['id'];
      $_SESSION['username'] = $data['username'];
      $_SESSION['nama'] = $data['nama'];

      header("Location: main.php");
      // TODO set session and redirect to main.php
    }
  }else {
    header("Location: index.php?mess=1"); // database error
  }
?>
