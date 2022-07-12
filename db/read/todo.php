<?php
$koneksi = new mysqli("localhost", "root", "", "uas");
$hasil = $koneksi->query("SELECT * FROM todo");
$output = "";
while ($rs = $hasil->fetch_array(MYSQLI_ASSOC)) {
  if ($output != "") {
    $output .= ",";
  }
  $output .= '{"item":"' . $rs["item"] . '"}';
}
$output = '{"datanya":[' . $output . ']}';
$koneksi->close();
echo ($output);
