<!DOCTYPE html>
<html>
<head>
    <title>Grafik Produk </title>
    <!-- <script type="text/javascript" src="Chart.js"></script> -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>
    <!-- <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.bundle.min.js"></script> -->
</head>
<body>

<?php
    include "koneksi.php";
    $sql = "SELECT * FROM produk";
    $namprod = $conn->query($sql);
    $jumlah = $conn->query($sql);
?>

    <style type="text/css">
        body{
            font-family: roboto;
        }
    </style>
 
    <h2>Grafik stok Produk</h2>
    <div style="width: 500px;height: 500px">
        <canvas id="myChart"></canvas>
    </div>
 
    <script>
        var ctx = document.getElementById("myChart").getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'pie',
            data: {
                labels: [<?php while($b = mysqli_fetch_array($namprod)) { echo '"' . $b['nama_prod'] . '",'; } ?>], //keterangan nama-nama label],
                datasets: [{
                    label: 'Grafik stok', // judul grafik
                    data: [<?php while($a = mysqli_fetch_array($jumlah)) { echo $a['stok_prod'] . ', '; } ?>], //Data Grafik
                    backgroundColor: [
                        'red',  //Warna Background
                        'blue', //Warna Background
                        'green', //Warna Background
                        'silver', //Warna Background
                        'black', //Warna Background
                        'yellow', //Warna Background
                        'purple', //Warna Background
                        'brown' //Warna Background
                    ],        
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero:true
                        }
                    }]
                }
            }
        });
    </script>
</body>
</html>
<!-- <script type="text/javascript" src="chartjs/Chart.js"></script>
<script type="text/javascript" src="chartjs/Chart.js"></script> -->
<div style="width: 500px;height: 500px">
    <canvas id="myChart"></canvas>
</div>
