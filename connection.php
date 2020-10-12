<?php
$conn = new mysqli("localhost","root","","todo_database");

if($conn->connect_error){
  echo "Koneksi database gagal : ".$conn->connect_error;
}
?>
