<?php
  if(isset($_POST['id']) && isset($_POST['title'])){
      include 'connection.php';
      $id = $_POST['id'];
      $title = $_POST['title'];

      if(empty($id) || empty($title)){
        echo false;
      }else{
        $sqlUpdate = "UPDATE task SET title='$title' WHERE id=$id";
        if($conn->query($sqlUpdate)){
          echo true;
        }else{
          echo false;
        }
        $conn->close();
      }
  }else{
    echo "kosong";
  }
?>
