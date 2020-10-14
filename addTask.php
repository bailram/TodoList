<?php
  if (isset($_POST['title'])) {
    include 'connection.php';

    $title = $_POST['title'];
    if (empty($title)) {
      header("Location: main.php?messT=error");
    }else{
      $sql = "INSERT INTO task(title) VALUE ('$title')";
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
