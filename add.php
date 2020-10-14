<?php
  if (isset($_POST['title']) && isset($_POST['idtask'])) {
    include 'connection.php';

    $title = $_POST['title'];
    $id_task = $_POST['idtask'];
    echo "id task : ".$id_task;
    if (empty($title) || empty($id_task)) {
      header("Location: main.php?mess=error");
    }else{
      $sql = "INSERT INTO list(id_task,title) VALUE ('$id_task','$title')";
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
