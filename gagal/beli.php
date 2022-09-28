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
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
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
                <p class="text-center"> Form Pembelian</p>
                <form action="" method="POST">
                    <div class="row g-3 align-items-center justify-content-center">
                        <div class="col-5">
                            <input type="text" name="nama" class="form-control" placeholder="Masukkan nama Lengkap Anda" required>
                        </div>
                    </div>
                    <div class="row g-3 align-items-center justify-content-center">
                        <select class="input-control col-5" name="kategori" required>
                            <option value="">Pilih Item</option>
                            <?php
                                $produk=mysqli_query($conn, "SELECT * FROM produk ORDER BY id_prod DESC");
                                while($opsi=mysqli_fetch_array($produk)){
                            ?>
                            <option value="<?=$opsi['id_prod']?>"><?=$opsi['nama_prod']?></option>
                            <?php } ?>
                        </select>
                    </div>
                    
                    <div class="row g-3 align-items-center justify-content-center">
                        <div class="col-5">
                            <input name="harga" class="form-control" type="text" value="" onchange="getharga()" disabled readonly>
                        </div>
                    </div>
                    <script type="text/javascript">
                        $.ajax({
                            type:"GET",
                            data:"",
                            url:"ambiljava.php",
                            success:function(result){
                                var objResult=JSON.parse(result);
                                $.each(objResult, function(key,val)){
                                    var harga=$(+val.)

                                    function getProduk() {
                                            var a = document.getElementById("produk").value;
                                            var option = "";

                                            for (i = 0; i < produk.length; i++) {
                                                if (produk[i][0] == a) {
                                                    option += '<option value=' + produk[i][1] + '>' + produk[i][1] +
                                                        '</option>';
                                                }
                                            }
                                            document.getElementById('harga').innerHTML = option;
                                        }
                                }
                            }
                        })
                    </script>
                </form>
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