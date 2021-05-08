
<?php

use Mpdf\Tag\Td;
 
$id=$_GET['id'];


include 'connection.php';
$result=mysqli_query( $con, "SELECT * FROM rincian_penanaman 
           INNER JOIN bahan ON rincian_penanaman.kode_bahan = bahan.kode_bahan
           WHERE kode_penanaman='$id'");

$result3=mysqli_query( $con, "SELECT * FROM penanaman 
           INNER JOIN kebun ON penanaman.kode_kebun = kebun.kode_kebun
WHERE kode_penanaman='$id'");

while($data2 = mysqli_fetch_array($result3)){

    $tanggal_penanaman = $data2['tanggal_penanaman'];
    $nama_kebun = $data2['nama_kebun'];

  }  



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
    <h4 class="center" > LAPORAN 
    
    PEMAKAIAN BAHAN <br> PENANAMAN "'.$id.'"</h4>

    <p align="left" >  ';

        $html .='
        '.$nama_kebun.'
    <br> Tanggal Penanaman '.$tanggal_penanaman.'
    </p> 
    


<table width="600" align="center" border="1" cellpadding="10" cellspacing="0" >

    <tr align="center">
    <th scope="col" width="50">NO</th>
    <th scope="col" width="300">NAMA BAHAN</th>
    <th scope="col" width="250">JUMLAH BAHAN</th>
    </tr>';
    
$i = 1;
foreach($result as $row){
    $html .= '<tr>
    <td width="10">'. $i++ .'</td>
    <td>'. $row["nama_bahan"] .'</td>
    <td>'. $row["jumlah_bahan"] .'</td>

    
    </tr> ';
}





$html .= '</table><br>
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
$mpdf->Output('laporan_rincian_penanaman.pdf', \Mpdf\Output\Destination::INLINE);
?>

!