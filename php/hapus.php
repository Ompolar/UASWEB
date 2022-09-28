<?php
    include "koneksi.php";
    
    // hapus data produk
    if(isset($_GET['idp'])){
        // menghapus gambar produk dari folder database
        $produk=mysqli_query($conn, "SELECT gambar_prod FROM produk WHERE id_prod='".$_GET['idp']."'");
        $p=mysqli_fetch_object($produk);
        unlink('../gbr/prod/'.$p->gambar_prod);
        // menghapus data produk
        $delete=mysqli_query($conn, "DELETE FROM produk WHERE id_prod='".$_GET['idp']."'");
        echo '<script>alert("Item Produk Berhasil Dihapus")</script>';
        echo '<script>window.location="adminpage.php"</script>';
    }

    // hapus data kategori
    if(isset($_GET['idk'])){
        $delete=mysqli_query($conn, "DELETE FROM kategori WHERE id_kategori='".$_GET['idk']."'");
        echo '<script>alert("Kategori Berhasil Dihapus")</script>';
        echo '<script>window.location="tkategori.php"</script>';
    }
?>