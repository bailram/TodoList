<?php
  session_start();
  $_SESSION['id_user'] = "";
  $_SESSION['username'] = "";
  $_SESSION['nama'] = "";
  $_SESSION['id_task'] ="";

  header("Location: index.php");
?>
