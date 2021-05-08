
<?php

use Mpdf\Tag\Td;
 
$id=$_GET['id'];


include 'connection.php';
$result=mysqli_query( $con, "SELECT * FROM rincian_kebun WHERE kode_kebun='$id'");

$result3=mysqli_query( $con, "SELECT * FROM kebun WHERE kode_kebun='$id'");
while($data2 = mysqli_fetch_array($result3)){

    $tanggal_buat = $data2['tanggal_buat'];
    $nama_kebun = $data2['nama_kebun'];
  }  
     $result2 = mysqli_query($con,  "SELECT SUM(harga_bahan) AS totall FROM rincian_kebun
     WHERE kode_kebun='$id'  ");


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
    
    PEMBUATAN KEBUN <br> "'.$nama_kebun.'"</h4>

    <p align="left" >KODE  ';
    foreach($result3 as $row2){
        $html .='
    '. $row2["kode_kebun"] .'
    <br> TANGGAL PEMBUATAN '.$tanggal_buat.'
    </p> 
    


<table align="center" border="1" cellpadding="10" cellspacing="0" >

    <tr align="center">
    <th scope="col">NO</th>
    <th scope="col">NAMA BAHAN</th>
    <th scope="col">JUMLAH BAHAN</th>
    <th scope="col">HARGA BAHAN</th>
    </tr>';
    }
$i = 1;
foreach($result as $row){
    $html .= '<tr>
    <td>'. $i++ .'</td>
    <td>'. $row["nama_bahan"] .'</td>
    <td>'. $row["jumlah_bahan"] .'</td>
    <td>'. number_format($row['harga_bahan']) .'</td>

    
    </tr>';
}

foreach($result2 as $row2){
    $html .='
    <tr>
    <td colspan="3" >TOTAL PEMBUATAN</td>
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
$mpdf->Output('laporan_pembuatan_kebun.pdf', \Mpdf\Output\Destination::INLINE);
?>

!