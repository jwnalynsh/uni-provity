<?php

$info = json_decode(file_get_contents("php://input"));

$item = $info->item;


if (!empty($item)) {
  $host = "localhost";
  $dbusername = "root";
  $dbpassword = "";
  $dbname = "uas";
  $conn = new mysqli("localhost", "root", "", "uas");

  if (mysqli_connect_error()) {
    die('Connect Error (' . mysqli_connect_errno() . ') ' . mysqli_connect_error());
  } else {
    $sql = "INSERT INTO todo (item) VALUES ('$item')";
    if ($conn->query($sql)) {
    } else {
      echo "Error: " . $sql . " " . $conn->error;
    }

    $conn->close();
  }
} else {
  die();
}