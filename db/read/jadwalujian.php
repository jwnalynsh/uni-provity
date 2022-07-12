<?php
$koneksi = new mysqli("localhost", "root", "", "uas");
$hasil = $koneksi->query("SELECT * FROM jadwalujian");
$output = "";
while ($rs = $hasil->fetch_array(MYSQLI_ASSOC)) {
  if ($output != "") {
    $output .= ",";
  }
  $output .= '{"mapel":"' . $rs["mapel"] . '",';
  $output .= '"hari":"' . $rs["hari"] . '",';
  $output .= '"wamul":"' . $rs["wamul"] . '",';
  $output .= '"wasel":"' . $rs["wasel"] . '"}';
}

$output = '{"datan":[' . $output . ']}';
$koneksi->close();
echo ($output);
