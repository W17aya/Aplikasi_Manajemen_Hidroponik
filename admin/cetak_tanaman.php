
<?php

use Mpdf\Tag\Td;

include 'connection.php';
$result = mysqli_query($con, "SELECT * FROM tanaman   ORDER BY kode_tanaman ASC"); 
require_once __DIR__ . '/vendor/autoload.php';

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
 	h2, h4, p{text-align: center}
 	th{background-color: #95a5a6; padding: 10px;color: #fff}
 </style>
</head>
<body>
<h2 class="center" > HIDROPONIK FARMS <br> BANJARBARU </h2>
<p> Jalan Scorpio XI Komplek Cahaya Bumi Bintang No. 27 Blok F <br> 
Telp : 082153453120 / Email : umardani21@gmail.com </p>
<br>
<h4 class="center" > LAPORAN STOK DAN HARGA <br> TANAMAN HASIL PANEN </h4>


<table border="1" cellpadding="10" cellspacing="0" >

    <tr align="center">
    <th scope="col">NO</th>
    <th scope="col">KODE TANAMAN</th>
    <th scope="col">NAMA TANAMAN</th>
    <th scope="col">STOK</th>
    <th scope="col">HARGA SATUAN (/KG)</th>
    </tr>';
$i = 1;
foreach($result as $row){
    $html .= '<tr>
    <td>'. $i++ .'</td>
    <td style="white-space:nowrap">'. $row["kode_tanaman"] .'</td>
    <td>'. $row["nama_tanaman"] .'</td>
    <td>'. $row["stok"] .' Kg</td>
    <td>'. number_format($row['harga_satuan']) .'</td>

    
    </tr>';
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
$mpdf->Output('laporan-tanaman.pdf', \Mpdf\Output\Destination::INLINE);
?>

!