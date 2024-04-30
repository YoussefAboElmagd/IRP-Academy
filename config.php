<?php

$server_name = "localhost";
$db_usr = "root";
$db_pass = "";
$db_name = "irp";
$conn = new mysqli($server_name, $db_usr, $db_pass,$db_name);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }

  
?>