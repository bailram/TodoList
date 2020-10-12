<?php
  if (isset($_POST['id'])) {
    include 'connection.php';

    $id = $_POST['id'];

    if (empty($id)) {
      echo 0;
    }else{
      $sql = "DELETE FROM list WHERE id=$id";
      if ($conn->query($sql) === TRUE) {
        echo 1;
      } else {
        echo 0;
      }

      $conn->close();
      exit();
    }
  }else{
    echo "kosong";
  }

?>
