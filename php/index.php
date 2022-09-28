<!-- koneksi php -->
<?php
    include "koneksi.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- bootstrap link-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <!-- fonts link-->
    <link href="https://fonts.googleapis.com/css2?family=Otomanopee+One&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Hind:wght@300&display=swap" rel="stylesheet">
    <!-- css link-->
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>19410100113 ZERQ</title>
</head>

<body>
    <!--Navigasi-->
    <header>
        <?php include "nav.php"; ?>
    </header>
    <div class="container" style="background-color: #c4c4c4;">
        <div class="row justify-content-md-center">
            <div class="col-sm-4">
                <h3 class="text-center"> SELAMAT DATANG DI DODOLANKU</h3>
            </div>
            <div class="row justify-content-md-center"></div>
            <div class="col-11">
                <p class="text-center"> Kami selalu menyediakan produk gaming berkualitas untuk para gamer lainnya!</p>
                <?php
                    $produk=mysqli_query($conn, "SELECT * FROM produk ORDER BY id_prod DESC");
                    if(mysqli_num_rows($produk)>0){
                        while($p=mysqli_fetch_array($produk)){
                ?>
                <div class="card">
                    <img src="../gbr/prod/<?=$p['gambar_prod']?>" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title"><?=$p['nama_prod']?></h5>
                        <p class="card-text"><?=$p['harga_prod']?></p>
                        <a href="tambahcart.php?idp=<?=$p['id_prod']?>" class="btn btn-secondary">Tambah ke Keranjang</a>
                    </div>
                </div>
                <div class="card">
                    <img src="../gbr/prod/<?=$p['gambar_prod']?>" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title"><?=$p['nama_prod']?></h5>
                        <p class="card-text"><?=$p['harga_prod']?></p>
                        <a href="tambahcart.php?idp=<?=$p['id_prod']?>" class="btn btn-secondary">Tambah ke Keranjang</a>
                    </div>
                </div>
                <?php }}else{ ?>
                    <p>PRODUK KOSONG</p>
                <?php } ?>
            </div>
        </div>
    </div>
    <!-- footer -->
    <?php include "footer.php"?>
    <!-- javascript link -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
</body>

</html>