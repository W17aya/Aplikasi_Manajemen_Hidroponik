<?php
include "connection.php"; //Panggil koneksi ke database terlebih dahulu

echo "<table>
      <tr><th>No</th><th>Id Laba</th><th>Tanggal laba</th><th>Kode Tanaman</th></tr>";
      $no=1;
$sql=mysqli_query($con, "SELECT * FROM laba");
$j = mysqli_query($con, "SELECT SUM (total_laba) AS (jumlah_a) FROM laba");
while($s= mysqli_fetch_array($sql)){
      ?>
<tr>



<td><?php echo $no++; ?></td>
				<td><?php echo $s['id_laba']; ?></td>
				<td><?php echo $s['total_laba']; ?></td>
				<td><?php echo $s['total_laba']; ?></td>

				
				<td>
					
				</td>
			</tr>
			<?php 
		}
		?>
	</table>
</body>
</html>
<!-- //Menghitung Total Nila A dan B dengan query -->
<!-- $j = mysqli_query($con, "SELECT SUM(total_laba) AS (jumlah_a) FROM laba");
echo "<tr><td>jumlah_a</td>";
echo "</table>";
?>

</tr>
</body>
</html> -->