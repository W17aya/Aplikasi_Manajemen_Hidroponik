<?php
include "koneksi.php"; //Panggil koneksi ke database terlebih dahulu

echo "<table>
      <tr><th>No</th><th>Nilai A</th><th>Nilai B</th><th>A + B</th></tr>";
      $no=0;
$sql=mysql_query("SELECT * FROM tbl_nilai");
while ($r=mysql_fetch_array($sql)){ //Looping data dari database
    $no++;
    $ab= $r['nilai_a'] + $r['nilai_b']; //Menghitung A + B
    echo "<tr><td>$no</td>
              <td>$r[nilai_a]</td>
              <td>$r[nilai_b]</td>
              <td>$ab</td>
              </tr>";
  $total_nilai += $ab ;//Menghitung Total dari A+B
}
//Menghitung Total Nila A dan B dengan query
$j = mysql_query("SELECT SUM(nilai_a) AS jumlah_a, SUM(nilai_b) AS jumlah_b FROM tbl_nilai");
echo "<tr><td>Total</td><td>$j[jumlah_a]</td><td>$j[jumlah_b]</td><td>$total_nilai</td></tr>";
echo "</table>";
?>