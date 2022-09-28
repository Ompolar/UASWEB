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
    <!-- css link-->
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>Landing page</title>
</head>

<body>
    <header>
        <?php include "nav_admin.php";?>
    </header>
    <div class="jumbotron jumbotron-fluid">
        <h1 class="display-4">dodolanku</h1>
        <p class="lead">Tambah Produk</p>
        <div class="container bg-secondary">
            <form action="" method="POST" enctype="multipart/form-data">
                <div class="row g-3 align-items-center justify-content-center">
                    <select class="input-control col-5" name="kategori" required>
                        <option value="">Pilih Kategori</option>
                        <?php
                            $kategori=mysqli_query($conn, "SELECT * FROM kategori ORDER BY id_kategori DESC");
                            while($opsi=mysqli_fetch_array($kategori)){
                        ?>
                        <option value="<?=$opsi['id_kategori']?>"><?=$opsi['nama_kategori']?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="row g-3 align-items-center justify-content-center">
                    <div class="col-5">
                        <input type="text" name="nama" class="form-control" placeholder="Masukkan nama Produk" required>
                    </div>
                </div>
                <div class="row g-3 align-items-center justify-content-center">
                    <div class="col-5">
                        <input type="text" name="harga" class="form-control" placeholder="Masukkan harga Produk"
                            required>
                    </div>
                </div>
                <div class="row g-3 align-items-center justify-content-center">
                    <div class="col-5">
                        <input type="file" name="gambar" class="form-control" required>
                    </div>
                </div>
                <div class="row g-3 align-items-center justify-content-center">
                    <div class="col-5">
                        <input type="text" name="stok" class="form-control" placeholder="Masukkan jumlah stok Produk"
                            required>
                    </div>
                </div>
                <br>
                <button type="bsubmit" name="bsubmit" class="btn btn-dark btn-sm mb-3">SUBMIT</button>
            </form>
            <?php
                if(isset($_POST["bsubmit"])){
                    $kategori=$_POST['kategori'];
                    $nama=$_POST['nama'];
                    $harga=$_POST['harga'];
                    $stok=$_POST['stok'];
                    // upload file gambar (hanya jpg,jpeg,png)
                    $filename=$_FILES['gambar']['name'];
                    $tmp_name=$_FILES['gambar']['tmp_name'];
                    $pisah=explode('.', $filename);
                    $tipe=$pisah[1];
                    $tipe_file=array('jpg','jpeg','png');
                    // mengganti nama file yang diupload
                    $gambar_prod='produk'.time().'.'.$tipe;

                    if(in_array($tipe, $tipe_file)){
                        move_uploaded_file($tmp_name, '../gbr/prod/'.$gambar_prod);
                        // insert data produk
                        $insert=mysqli_query($conn, "INSERT INTO produk VALUES (
                                                    null,'".$kategori."','".$nama."',
                                                    '".$harga."','".$gambar_prod."',
                                                    '".$stok."',null
                        )");
                        if($insert){
                            echo '<script>alert("Tambah item Berhasil")</script>';
                            echo '<script>window.location="adminpage.php"</script>';
                        }else{
                            echo 'Tambah item Gagal'.mysqli_error($conn);
                        }
                    }else{
                        echo '<script>alert("File harus bertipe JPG, JPEG, PNG")</script>';
                    }
                }
            ?>
        </div>

    </div>
    <!-- footer -->
    <?php include "footer.php"?>
    <!-- javascript link -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
</body>