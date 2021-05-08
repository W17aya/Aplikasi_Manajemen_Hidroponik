
<?php

use Mpdf\Tag\Td;
$id=$_GET['id'];
include 'connection.php';
$result = mysqli_query($con, "SELECT * FROM penjualan  
INNER JOIN tanaman ON penjualan.kode_tanaman = tanaman.kode_tanaman
WHERE kode_penjualan='$id'")or die(mysql_error());
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
<h4 class="center" > NOTA PENJUALAN </h4>

<p align="left" >KODE  :';
foreach($result as $row2){
    $html .='
'. $row2["kode_penjualan"] .'
</p> 


</br> 
<p align="left" > TANGGAL :
'. $row2["tanggal_jual"] .'


</p> 


<table width="600" border="1" cellpadding="10" cellspacing="0" align="center">

    <tr align="center">

    <th width="200" scope="col">NAMA TANAMAN</th>
    <th width="50" scope="col">JUMLAH</th>
    <th width="200" scope="col">HARGA SATUAN (/KG)</th>
    </tr>';
}
$i = 1;
foreach($result as $row){
    $html .= '<tr>


    <td >'. $row["nama_tanaman"] .'</td>
    <td>'. $row["jumlah"] .' Kg</td>
    <td>'. number_format($row['harga_jual']) .'</td>

    
    </tr>';
}
 


$html .= '</table>
 

<br/>
    <table width="1000" border="0" cellpadding="10" cellspacing="20"  >

    <tr>
    <td scope="col"></td>
    <td scope="col"></td>
    <td scope="col"></td>
    <td scope="col"></td>

    <td scope="col">
    '. date('l, d M Y') .'
    </td>
    </tr>;


    <tr>
    <td scope="col">Admin Staff,</td>
    <td scope="col"></td>
    <td scope="col"></td>
    <td scope="col"></td>

    <td scope="col">Pembeli,</td>
    </tr>;

    <tr>
    <td scope="col"></td>
    <td scope="col"></td>
    <td scope="col"></td>
    <td scope="col"></td>

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
$mpdf->Output('nota_penjualan.pdf', \Mpdf\Output\Destination::INLINE);
?>

!