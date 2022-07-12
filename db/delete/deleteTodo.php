<?php

$conn = mysqli_connect("localhost", "root", "", "uas");
$info = json_decode(file_get_contents("php://input"));
$item = $info->item;
$query = "DELETE FROM todo WHERE item ='$item'";
if (mysqli_query($conn, $query)) {
  header("Refresh:0");
  echo 'Data Berhasil Dihapus';
} else {
  header("Refresh:0");
  echo 'Data Gagal Dihapus';
}
