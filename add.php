<?php
  if (isset($_POST['title'])) {
    include 'connection.php';

    $title = $_POST['title'];
    if (empty($title)) {
      header("Location: list.php?mess=error");
    }else{
      $sql = "INSERT INTO list(title) VALUE ('$title')";
      if ($conn->query($sql) === TRUE) {
        header("Location: list.php?mess=success");
      } else {
        header("Location: list.php");
      }

      $conn->close();
    }
  }else{
    echo "kosong";
  }

?>
