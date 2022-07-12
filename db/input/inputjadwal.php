<?php
$info = json_decode(file_get_contents("php://input"));

$mapel = $info->mapel;
$hari = $info->hari;
$wamul = $info->wamul;
$wasel = $info->wasel;



if (!empty($mapel)) {
  if (!empty($hari)) {
    if (!empty($wamul)) {
      if (!empty($wasel)) {
        $host = "localhost";
        $dbusername = "root";
        $dbpassword = "";
        $dbname = "uas";
        $conn = new mysqli("localhost", "root", "", "uas");

        if (mysqli_connect_error()) {
          die('Connect Error (' . mysqli_connect_errno() . ') ' . mysqli_connect_error());
        } else {
          $sql = "INSERT INTO jadwal (mapel, hari, wamul, wasel) VALUES ('$mapel', '$hari', '$wamul', '$wasel')";
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
// echo "<script type='text/javascript'>alert('Berhasil Menginput');</script>";
// ob_start();
// header('Location: ' . $_SERVER['HTTP_REFERER']);
// ob_end_flush();
// exit();
