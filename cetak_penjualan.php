
<?php

use Mpdf\Tag\Td;
 
$tgl1 = $_GET['tanggal_a'];
$tgl2 = $_GET['tanggal_b'];


include 'connection.php';
$result = mysqli_query($con,  "SELECT * FROM penjualan 
INNER JOIN tanaman ON penjualan.kode_tanaman = tanaman.kode_tanaman
WHERE tanggal_jual BETWEEN '$tgl1' AND '$tgl2' ORDER BY kode_penjualan ASC");
     
     $result2 = mysqli_query($con,  "SELECT SUM(total_jual) AS totall FROM penjualan
     WHERE tanggal_jual BETWEEN '$tgl1' AND '$tgl2'  ");

require_once __DIR__ . '/vendor/autoload.php';

if(@$_GET['cetak_penjualan']){

}



$mpdf = new \Mpdf\Mpdf();

$html = '
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="vendor/print.css" rel="stylesheet">
    <title>Laporan Kategori</title>
    <style>

 	td,th{padding: 5px;text-align: center; width: 150px}
 	h2{text-align: center}
 	h4{text-align: center}
 	p{text-align: center}
 	th{background-color: #95a5a6; padding: 10px;color: #fff}
 </style>
  
</head>

<body>

    <h2 class="center" > HIDROPONIK FARMS
    <br>BANJARBARU</h2>
    <p> Jalan Scorpio XI Komplek Cahaya Bumi Bintang No. 27 Blok F <br> 
    Telp : 082153453120 / Email : umardani21@gmail.com </p>
    <br>
    <h4 class="center" > LAPORAN PENJUALAN HASIL PANEN </h4>

    <P> Periode Tanggal '. $tgl1 .' - '. $tgl2 .' </P>


<table border="1" cellpadding="10" cellspacing="0" >

    <tr align="center">
    <th scope="col">NO</th>
    <th scope="col">KODE PENJUALAN</th>
    <th scope="col">TANGGAL PENJUALAN</th>
    <th scope="col">NAMA TANAMAN</th>
    <th scope="col">JUMLAH <br> (KG)</th>
    <th scope="col">HASIL PENJUALAN</th>
    </tr>';
$i = 1;
foreach($result as $row){
    $html .= '<tr>
    <td>'. $i++ .'</td>
    <td style="white-space:nowrap">'. $row["kode_penjualan"] .'</td>
    <td>'. $row["tanggal_jual"] .'</td>
    <td>'. $row["kode_tanaman"] .'</td>
    <td>'. $row["jumlah"] .'</td>
    <td>'. number_format($row['total_jual']) .'</td>

    
    </tr>';
}

foreach($result2 as $row2){
    $html .='
    <tr>
    <td colspan="5" >TOTAL HASIL PENJUALAN</td>
    <td>'. number_format($row2["totall"]) .'</td> 
    
    </tr>
    ';
}



$html .= '</table>
'. date('l, d M Y') .' 


<br/>
<table border="0" cellpadding="10" cellspacing="20"  >

<tr>
<td scope="col">Pemohon,</td>
<td scope="col"></td>
<td scope="col"></td>
<td scope="col"></td>

<td scope="col">Mengetahui,</td>
</tr>;

<tr>
<td scope="col" ></td>
<td scope="col"></td>
</tr>;



<tr>
<td scope="col">..............</td>
<td scope="col"></td>
<td scope="col"></td>
<td scope="col"></td>
<td scope="col">..............</td>
</tr>;

</table> 

</body>
</html>
';

$mpdf->setFooter('{PAGENO}');
$mpdf->WriteHTML($html);
$mpdf->Output('laporan-penjualan.pdf', \Mpdf\Output\Destination::INLINE);
?>

!