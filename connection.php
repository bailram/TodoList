<?php
$conn = new mysqli("localhost","root","","todo_database");

if($conn->connect_error){
  echo "Connection database failed : ".$conn->connect_error;
}
?>
