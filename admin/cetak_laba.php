
<?php

use Mpdf\Tag\Td;

 
$tgl1 = $_GET['tanggal_a'];
$tgl2 = $_GET['tanggal_b'];


include 'connection.php';
$result = mysqli_query($con,  "SELECT * FROM laba
INNER JOIN tanaman ON laba.kode_tanaman = tanaman.kode_tanaman 
WHERE tanggal_laba BETWEEN '$tgl1' AND '$tgl2' ORDER BY id_laba ASC");

$result2 = mysqli_query($con,  "SELECT SUM(total_laba) AS totall FROM laba
WHERE tanggal_laba BETWEEN '$tgl1' AND '$tgl2'  ");

$result3 = mysqli_query($con,  "SELECT * FROM laba
INNER JOIN penjualan ON laba.kode_penjualan = penjualan.kode_penjualan 
WHERE tanggal_laba BETWEEN '$tgl1' AND '$tgl2' ORDER BY id_laba ASC");

while($data2 = mysqli_fetch_array($result3)){

    $jumlah_jual = $data2['jumlah'];
    $total_jual = $data2['total_jual'];
  }  

$result4 = mysqli_query($con,  "SELECT * FROM laba
INNER JOIN rugi ON laba.id_rugi = rugi.id 
WHERE tanggal_laba BETWEEN '$tgl1' AND '$tgl2' ORDER BY id_laba ASC");

while($data4 = mysqli_fetch_array($result4)){

    $jumlah_rugi = $data4['jumlah_rugi'];
  }  


$result5 = mysqli_query($con,  "SELECT * FROM laba
INNER JOIN penanaman ON laba.kode_penanaman = penanaman.kode_penanaman 
WHERE tanggal_laba BETWEEN '$tgl1' AND '$tgl2' ORDER BY id_laba ASC");
     
     while($data5 = mysqli_fetch_array($result5)){

        $total_penanaman = $data5['total'];
      }  


require_once __DIR__ . '/vendor/autoload.php';




if(@$_GET['cetak_laba']){

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
    <h4 class="center" > LAPORAN HASIL KEUNTUNGAN </h4>

    <P> Periode Tanggal '. $tgl1 .' - '. $tgl2 .' </P>


<table border="1" cellpadding="10" cellspacing="0" >

    <tr align="center">
    <th scope="col" >NO</th>
    <th scope="col">ID LABA</th>
    <th scope="col">TANGGAL</th>
    <th scope="col">NAMA TANAMAN</th>
    <th scope="col">JUMLAH PENJUALAN</th>
    <th scope="col">JUMLAH KERUGIAN</th>
    <th scope="col">BIAYA PENANAMAN</th>
    <th scope="col">TOTAL PENJUALAN</th>
    <th scope="col">LABA</th>
    </tr>';
$i = 1;
foreach($result as $row){
    $html .= '<tr>
    <td>'. $i++ .'</td>
    <td style="white-space:nowrap">'. $row["id_laba"] .'</td>
    <td>'. $row["tanggal_laba"] .'</td>
    <td>'. $row["nama_tanaman"] .'</td>
    <td>'.  $jumlah_jual .'</td>
    <td>'. $jumlah_rugi .'</td>
    <td>'. number_format($total_penanaman) .'</td>
    <td>'.  number_format($total_jual) .'</td>
    <td>'. number_format($row['total_laba']) .'</td>

    
    </tr>';
}

foreach($result2 as $row2){
    $html .='
    <tr>
    <td colspan="8" >TOTAL LABA BERSIH</td>
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
<td scope="col"></td>
<td scope="col"></td>
<td scope="col">..............</td>
</tr>;

</table> 

</body>
</html>
';


$mpdf->AddPage('L');
$mpdf->setFooter('{PAGENO}');
$mpdf->WriteHTML($html);
$mpdf->Output('laporan-laba.pdf', \Mpdf\Output\Destination::INLINE);
?>

!