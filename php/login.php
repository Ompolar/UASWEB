<?php
include "koneksi.php";
if($_SESSION['login']!=false){
    echo '<script>window.location="adminpage.php"</script>';
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
    <div class="jumbotron jumbotron-fluid">
        <h1 class="display-4">dodolanku</h1>
        <p class="lead">ADMIN LOGIN PAGE</p>
        <div class="container mt-3">
                <form action="" method="POST">
                    <div class="row g-3 align-items-center justify-content-center">
                        <div class="col-auto">
                            <label class="col-form-label text-white">Username</label>
                        </div>
                        <div class="col-5">
                            <input type="text" name="username" value="" class="form-control" placeholder="Masukkan Username Admin anda" required>
                        </div>
                    </div>
                    <br>
                    <div class="row g-3 align-items-center justify-content-center">
                        <div class="col-auto">
                            <label class="col-form-label text-white">Password</label>
                        </div>
                        <div class="col-5">
                            <input type="password" name="password" value="" class="form-control" placeholder="Masukkan Password Admin anda" required>
                        </div>
                    </div>
                    <button type="login" name="blogin" class="btn btn-secondary btn-sm mt-4">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-power" viewBox="0 0 16 16">
                            <path d="M7.5 1v7h1V1h-1z"/>
                            <path d="M3 8.812a4.999 4.999 0 0 1 2.578-4.375l-.485-.874A6 6 0 1 0 11 3.616l-.501.865A5 5 0 1 1 3 8.812z"/>
                        </svg>
                        LOGIN</button>
                </form>
        </div>
        <?php
        if(isset($_POST["blogin"])){
            $user=$_POST["username"];
            $pass=$_POST["password"];
            $cek=mysqli_query($conn, "SELECT * FROM admin WHERE username ='".$user."' AND password='".$pass."'");
            if(mysqli_num_rows($cek)>0){
                $d=mysqli_fetch_object($cek);
                $_SESSION['login']=true;
                $_SESSION['a_global']=$d;
                
                echo '<script>window.location="adminpage.php"</script>';
            }else{
                echo '<script>alert("Username atau Password SALAH")</script>';
            }
        }
        ?>
    </div>
    <!-- javascript link -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
</body>