<?php
  if (isset($_POST['title'])) {
    include 'connection.php';
    session_start();

    $id_user = $_SESSION['id_user'];
    $title = $_POST['title'];
    if (empty($title)) {
      header("Location: main.php?messT=error");
    }else{
      $sql = "INSERT INTO task(id_user,title) VALUE ($id_user,'$title')";
      if ($conn->query($sql) === TRUE) {
        header("Location: main.php");
      } else {
        header("Location: main.php");
      }

      $conn->close();
    }
  }else{
    echo "kosong";
  }

?>
