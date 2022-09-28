<?php
include "koneksi.php";
if($_SESSION['login']!=true){
    echo '<script>window.location="login.php"</script>';
    
}?>

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
    <!-- js link-->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>
    <!-- css link-->
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>ADMIN</title>
</head>

<body>
    <header>
        <?php include "nav_admin.php";?>
    </header>
    <div class="jumbotron jumbotron-fluid">
        <h1 class="display-4">dodolanku</h1>
        <p class="lead">Dashboard</p>
        <div class="container">
            <a class="nav-item btn btn-secondary mb-2" href="tkategori.php">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-tags" viewBox="0 0 16 16">
                    <path d="M3 2v4.586l7 7L14.586 9l-7-7H3zM2 2a1 1 0 0 1 1-1h4.586a1 1 0 0 1 .707.293l7 7a1 1 0 0 1 0 1.414l-4.586 4.586a1 1 0 0 1-1.414 0l-7-7A1 1 0 0 1 2 6.586V2z"/>
                    <path d="M5.5 5a.5.5 0 1 1 0-1 .5.5 0 0 1 0 1zm0 1a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3zM1 7.086a1 1 0 0 0 .293.707L8.75 15.25l-.043.043a1 1 0 0 1-1.414 0l-7-7A1 1 0 0 1 0 7.586V3a1 1 0 0 1 1-1v5.086z"/>
                </svg>
                Tambah Kategori</a>
            <a class="nav-item btn btn-secondary mb-2" href="tproduk.php">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-file-plus" viewBox="0 0 16 16">
                    <path d="M8.5 6a.5.5 0 0 0-1 0v1.5H6a.5.5 0 0 0 0 1h1.5V10a.5.5 0 0 0 1 0V8.5H10a.5.5 0 0 0 0-1H8.5V6z"/>
                    <path d="M2 2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2zm10-1H4a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1z"/>
                </svg>
                Tambah Produk</a>
            <table class="table bg-secondary">
                <thead>
                    <tr>
                        <th>NO</th>
                        <th>Kategori</th>
                        <th>Nama Produk</th>
                        <th>Harga</th>
                        <th>Gambar</th>
                        <th>Stok</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $no=1;
                        $produk=mysqli_query($conn,"SELECT * FROM produk LEFT JOIN kategori USING (id_kategori) ORDER BY id_prod DESC");
                        while($p=mysqli_fetch_array($produk)){
                    ?>
                    <tr>
                        <td><?=$no++;?></td>
                        <td><?=$p['nama_kategori']?></td>
                        <td><?=$p['nama_prod']?></td>
                        <td><?=$p['harga_prod']?></td>
                        <td><img src="../gbr/prod/<?=$p['gambar_prod']?>" width="50px"></td>
                        <td><?=$p['stok_prod']?></td>
                        <td>
                            <a href="edit.php?idp=<?=$p['id_prod']?>">Edit</a>||
                            <a href="hapus.php?idp=<?=$p['id_prod']?>" onclick="return confirm('Anda akan menghapus item ini')">Hapus</a>
                        </td>
                    </tr>
                    <?php }?>
                </tbody>
            </table>
            <a class="nav-item btn btn-secondary mb-2" href="grafikstok.php">
                Grafik stok</a>
            <a class="nav-item btn btn-secondary mb-2" href="grafikharga.php">
                Grafik harga</a>
            
        </div>
    </div>
    <!-- footer -->
    <?php include "footer.php"?>
    <!-- javascript link -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
</body>