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
        <p class="lead">Tambah Kategori</p>
        <div class="container bg-secondary">
            <form action="" method="POST">
                <div class="row g-3 align-items-center justify-content-center">
                    <div class="col-5">
                        <input type="text" name="nama" class="form-control" placeholder="Masukkan nama Kategori" required>
                    </div>
                </div>
                <br>
                <button type="bsubmit" name="bsubmit" class="btn btn-dark btn-sm mb-3">SUBMIT</button>
            </form>
            <table class="table bg-secondary">
                    <thead>
                        <tr>
                            <th>NO</th>
                            <th>Kategori</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $no=1;
                            $kategori=mysqli_query($conn,"SELECT * FROM kategori ORDER BY id_kategori DESC");
                            while($row=mysqli_fetch_array($kategori)){
                        ?>
                        <tr>
                            <td><?=$no++;?></td>
                            <td><?=$row['nama_kategori']?></td>
                            <td>
                                <a href="edit.php?idk=<?=$row['id_kategori']?>">Edit</a>||
                                <a href="hapus.php?idk=<?=$row['id_kategori']?>" onclick="return confirm('Anda akan menghapus item ini')">Hapus</a>
                            </td>
                        </tr>
                        <?php }?>
                    </tbody>
            </table>
        </div>
        <?php
        if(isset($_POST["bsubmit"])){
            $nama=ucwords($_POST['nama']);
            $insert=mysqli_query($conn, "INSERT INTO kategori VALUES (
                                        null,
                                        '".$nama."')");
            if($insert){
                echo '<script>alert("Tambah Kategori Berhasil")</script>';
                echo '<script>window.location="tkategori.php"</script>';
            }else{
                echo 'gagal'.mysqli_error($conn);
            }
        }
        ?>
    </div>
    <!-- footer -->
    <?php include "footer.php"?>
    <!-- javascript link -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
</body>