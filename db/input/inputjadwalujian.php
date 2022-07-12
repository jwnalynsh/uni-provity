<?php

$info = json_decode(file_get_contents("php://input"));
$mapelUjian = $info->mapelUjian;
$hariUjian = $info->hariUjian;
$wamulUjian = $info->wamulUjian;
$waselUjian = $info->waselUjian;



if (!empty($mapelUjian)) {
  if (!empty($hariUjian)) {
    if (!empty($wamulUjian)) {
      if (!empty($waselUjian)) {
        $host = "localhost";
        $dbusername = "root";
        $dbpassword = "";
        $dbname = "uas";
        $conn = new mysqli("localhost", "root", "", "uas");

        if (mysqli_connect_error()) {
          die('Connect Error (' . mysqli_connect_errno() . ') ' . mysqli_connect_error());
        } else {
          $sql = "INSERT INTO jadwalujian (mapel, hari, wamul, wasel) VALUES ('$mapelUjian', '$hariUjian', '$wamulUjian', '$waselUjian')";
          if ($conn->query($sql)) {
          } else {
            echo "Error: " . $sql . " " . $conn->error;
          }

          $conn->close();
        }
      } else {
        die();
      }
    } else {
      die();
    }
  } else {
    die();
  }
} else {
  die();
}
ob_start();
header('Location: ' . $_SERVER['HTTP_REFERER']);
ob_end_flush();
exit();
