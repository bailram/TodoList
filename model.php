<?php
  include 'connection.php';

  function do_sign_up($username, $password, $nama){
    $sql = "INSERT INTO user(username,password,nama) VALUE ('$username','$password','$nama')";
    return $GLOBALS['conn']->query($sql);
  }

  function do_sign_in($username, $password){
    $sql = "SELECT * from user WHERE username='$username' AND password='$password'";
    return $GLOBALS['conn']->query($sql);
  }

  function do_update_user($id, $username, $nama){
    $sql = "UPDATE `user` SET `username` = '$username', `nama` = '$nama' WHERE `user`.`id` = $id";
    return $GLOBALS['conn']->query($sql);
  }

  function change_password($id, $password){
    $sql = "UPDATE `user` SET `password` = '$password' WHERE `user`.`id` = $id";
    return $GLOBALS['conn']->query($sql);
  }
?>
