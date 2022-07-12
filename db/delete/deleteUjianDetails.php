<?php

$conn = mysqli_connect("localhost", "root", "", "uas");
$info = json_decode(file_get_contents("php://input"));
$mapel = $info->mapel;
$query = "DELETE FROM jadwalujian WHERE mapel ='$mapel'";
if (mysqli_query($conn, $query)) {
  header("Refresh:0");
  echo 'Data Berhasil Dihapus';
} else {
  header("Refresh:0");
  echo 'Data Gagal Dihapus';
}
