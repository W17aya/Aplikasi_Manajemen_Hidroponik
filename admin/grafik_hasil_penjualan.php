<?php

$tahun = $_GET['tahun'];

include 'connection.php';
 
$panen  = mysqli_query($con, "SELECT jumlah FROM penjualan WHERE year(tanggal_jual) = '$tahun'
order by kode_penjualan asc");


$a       = mysqli_query($con, "SELECT * FROM penjualan as 
a inner join tanaman as b ON a.kode_tanaman=b.kode_tanaman WHERE
year(tanggal_jual)='$tahun'
order by a.kode_tanaman asc");
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Hidroponik</title>
    <link rel="icon" type="image/png" href="logincss/images/icons/favicon.ico"/>
    <script src="vendor/Chart.js/Chart.js"></script>
    <style type="text/css">
            .container {
                width: 40%;
                margin: 15px auto;
            }
            h2{text-align: center}
 	          p{text-align: center}
    </style>
  </head>
  <body>
    <h2 > Grafik Hasil Penjualan </h2>
    <p>Periode Tahun <?php echo  $tahun;?></p>
    <br/>
    <div class="container">
        <canvas id="barchart" width="100" height="100"></canvas>
    </div>

  </body>
</html>

<script  type="text/javascript">
  var ctx = document.getElementById("barchart").getContext("2d");
  var data = {
            labels: [<?php while ($p = mysqli_fetch_array($a)) { echo '"' . $p['nama_tanaman'] . '",';}?>],
            datasets: [
            {
              label: [<?php while ($p = mysqli_fetch_array($a)) { echo '"' . $p['nama_tanaman'] . '",';}?>],
              data: [<?php while ($p = mysqli_fetch_array($panen)) { echo '"' . $p['jumlah'] . '",';}?>],
              backgroundColor: [
                '#29B0D0',
                '#2A516E',
                '#F07124',
                '#CBE0E3',
                '#979193'
              ],
              borderWidth: 1
            }
            ]
            };

  var myBarChart = new Chart(ctx, {
            type: 'bar',
            data: data,
            options: {
            legend: {
              display: true
            },
            barValueSpacing: 20,
            scales: {
              yAxes: [{
                  ticks: {
                      beginAtZero:true,
                      min: 0,
                  }
              }],
              xAxes: [{
                          gridLines: {
                              color: "rgba(0, 0, 0, 0)",
                          }
                      }]
              }
          }
        });

</script>


