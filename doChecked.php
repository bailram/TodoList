<?php
  if (isset($_POST['id'])) {
    include 'connection.php';

    $id = $_POST['id'];

    if (empty($id)) {
      echo 'error';
    }else{
      $sqlSelect = "SELECT id, checked FROM list WHERE id=$id";
      $list = $conn->query($sqlSelect);
      foreach ($list as $value) {
        // echo $id;
        $checked = $value['checked'];
        $uChecked = $checked ? 0 : 1;

        $sqlUpdate = "UPDATE list SET checked=$uChecked WHERE id=$id";
        $res = $conn->query($sqlUpdate);

        if ($res) {
          echo $checked;
        } else {
          echo "error";
        }

      }

      $conn->close();
      exit();
    }
  }else{
    echo "kosong";
  }

?>
