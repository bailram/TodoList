<?php
  if (isset($_POST['title']) && isset($_POST['idtask']) && $_POST['deadline']) {
    include 'connection.php';

    $title = $_POST['title'];
    $id_task = $_POST['idtask'];
    $deadline = $_POST['deadline'];
    echo "id task : ".$id_task;
    if (empty($title) || empty($id_task || $deadline)) {
      header("Location: main.php?mess=error");
    }else{
      $sql = "INSERT INTO list(id_task,title,date_time_end) VALUE ('$id_task','$title','$deadline')";
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
