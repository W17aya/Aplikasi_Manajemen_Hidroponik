<?php

$tgl1 = $_GET['tanggal_a'];
$tgl2 = $_GET['tanggal_b'];


include 'connection.php';

$panen  = mysqli_query($con, "SELECT jumlah FROM panen WHERE tanggal_panen BETWEEN '$tgl1' AND '$tgl2' 
order by kode_panen asc");
$a       = mysqli_query($con, "SELECT nama_tanaman FROM panen as a inner join tanaman as b ON a.kode_tanaman=b.kode_tanaman WHERE tanggal_panen BETWEEN '$tgl1' AND '$tgl2'
order by kode_panen asc");
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
    <h2 > Grafik Hasil Panen </h2>
    <p>Periode Tanggal <?php echo  $tgl1;?> - <?php echo $tgl2; ?></p>
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
              label: "<?php echo $p['nama_tanaman']; ?> ",
              data: [<?php while ($p = mysqli_fetch_array($panen)) { echo '"' . $p['jumlah'] . '",';}?>],
              backgroundColor: [
                '#29B0D0',
                '#2A516E',
                '#F07124',
                '#CBE0E3',
                '#979193'
              ]
            }
            ]
            };

  var myBarChart = new Chart(ctx, {
            type: 'bar',
            data: data,
            options: {
            legend: {
              display: false
            },
            barValueSpacing: 20,
            scales: {
              yAxes: [{
                  ticks: {
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