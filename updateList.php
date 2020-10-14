<?php
  if(isset($_POST['list-id']) && isset($_POST['edit-title']) && isset($_POST['edit-deadline'])){
      include 'connection.php';
      $id = $_POST['list-id'];
      $title = $_POST['edit-title'];
      $deadline = $_POST['edit-deadline'];
      // echo "$id <br>";
      // echo "$title <br>";
      // echo "$deadline <br>";
      if(empty($id) || empty($title) || empty($deadline)){
        header("Location: main.php?messU=error");
      }else{
        $sqlUpdate = "UPDATE list SET title='$title', date_time_end='$deadline' WHERE id=$id";
        if($conn->query($sqlUpdate)){
          header("Location: main.php");
        }else{
          header("Location: main.php");
        }
        $conn->close();
      }
  }else{
    echo "kosong";
  }
?>
