<?php
include "koneksi.php";
if($_SESSION['login']!=true){
    echo '<script>window.location="login.php"</script>';
    // $produk=mysqli_query($conn, "SELECT * FROM produk WHERE id_prod='$_GET[idp]'");
    // $p=mysqli_fetch_object($produk);
    // $p=mysqli_fetch_array($produk);
    // $p=$produk->fetch_assoc();
    
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
        <p class="lead">EDIT Data Produk</p>
        <div class="container bg-secondary">
            <form action="" method="POST" enctype="multipart/form-data">
                <div class="row g-3 align-items-center justify-content-center">
                    <select class="input-control col-5" name="kategori" required>
                        <?php
                        $produk=mysqli_query($conn, "SELECT * FROM produk WHERE id_prod='$_GET[idp]'");
                        $p=mysqli_fetch_array($produk); 
                        if($p){
                            $vprod=$p['id_prod'];
                            $vkat=$p['id_kategori'];
                            $vnam=$p['nama_prod'];
                            $vhar=$p['harga_prod'];
                            $vgam=$p['gambar_prod'];
                            $vstok=$p['stok_prod'];
                        }
                        ?>
                        <option value="">Pilih Kategori</option>
                        <?php
                            $kgori=mysqli_query($conn, "SELECT * FROM kategori ORDER BY id_kategori DESC");
                            while($opsi=mysqli_fetch_array($kgori)){
                        ?>
                        <option value="<?php echo $opsi['id_kategori']?>" <?php echo ($opsi['id_kategori']==$vkat)? 'selected':'';?>>
                            <?php echo $opsi['nama_kategori']?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="row g-3 align-items-center justify-content-center">
                    <div class="col-5">
                        <input type="text" name="nama" class="form-control" placeholder="Masukkan nama Produk"
                        value="<?=$vnam?>" required>
                    </div>
                </div>
                <div class="row g-3 align-items-center justify-content-center">
                    <div class="col-5">
                        <input type="text" name="harga" class="form-control" placeholder="Masukkan harga Produk"
                        value="<?=$vhar?>" required>
                    </div>
                </div>
                <div class="row g-3 align-items-center justify-content-center">
                    <div class="col-5">
                        <img src="../gbr/prod/<?=$vgam?>" width="300px">
                        <input type="hidden" name="foto" value="<?=$vgam?>">
                        <input type="file" name="gambar" class="form-control">
                    </div>
                </div>
                <div class="row g-3 align-items-center justify-content-center">
                    <div class="col-5">
                        <input type="text" name="stok" class="form-control" placeholder="Masukkan jumlah stok Produk"
                        value="<?=$vstok?>" required>
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
                    $foto=$_POST['foto'];
                    $gambar=$_POST['gambar'];
                    $stok=$_POST['stok'];

                    $filename=$_FILES['gambar']['name'];
                    $tmpname=$_FILES['gambar']['tmp_name'];

                    $pisah=explode('.', $filename);
                    $tipe=$pisah[1];
                    $tipe_file=array('jpg','jpeg','png');
                    $gambar_produk='produk'.time().'.'.$tipe;
                    
                    // jika gambar diganti
                    if($filename!=''){
                        if(in_array($tipe, $tipe_file)){
                            unlink('../gbr/prod/'.$foto);
                            move_uploaded_file($tmp_name, '../gbr/prod/'.$gambar_produk);
                            $namagambar=$gambar_produk;
                        }else{
                            echo '<script>alert("File harus bertipe JPG, JPEG, PNG")</script>';
                        }
                    }else{
                        $namagambar=$foto;
                    }
                    // update data
                    $update=mysqli_query($conn, "UPDATE produk SET id_kategori='".$kategori."',
                                                                    nama_prod='".$nama."',
                                                                    harga_prod='".$harga."',
                                                                    gambar_prod='".$namagambar."',
                                                                    stok_prod='".$stok."'
                                                                    WHERE id_prod='".$vprod."'");
                    if($update){
                        echo '<script>alert("Edit item Berhasil")</script>';
                        echo '<script>window.location="adminpage.php"</script>';
                    }else{
                        echo 'Edit item Gagal'.mysqli_error($conn);
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