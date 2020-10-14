<?php
  if (isset($_POST['id'])) {
    include 'connection.php';

    $id = $_POST['id'];

    if (empty($id)) {
      echo 0;
    }else{
      $sql_del_list = "DELETE FROM list WHERE id_task=$id";
      $sql = "DELETE FROM task WHERE id=$id";      

      if($conn->query($sql_del_list)){
        if ($conn->query($sql)) {
          echo true;
        } else {
          echo false;
        }
      }else{
        echo false;
      }

      $conn->close();
      exit();
    }
  }else{
    echo "kosong";
  }

?>
