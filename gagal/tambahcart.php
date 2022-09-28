<?php
    include "koneksi.php";

    $idk=$_GET["idk"];

    $produk=mysqli_query($conn, "SELECT * FROM produk WHERE id_produk='".$idk."'");
    $p=mysqli_fetch_object($produk)

    $_SESSION[$idk]=[
        "nama"=> $p->nama_prod,
        "harga"=> $p->harga_prod,
        "jumlah"=> 1
    ];
    header("location:../php/cart.php");
?>