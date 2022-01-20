<?php
include "connection.php"; //Panggil koneksi ke database terlebih dahulu

echo "<table>
      <tr><th>No</th><th>Nilai A</th><th>Nilai B</th><th>A + B</th></tr>";
      $no=0;
$sql=mysqli_query($con, "SELECT * FROM laba");

//Menghitung Total Nila A dan B dengan query
$j = mysqli_query($con, "SELECT SUM(total_laba) AS (jumlah_a) FROM laba");
echo "<tr><td>jumlah_a</td>";
echo "</table>";
?>
