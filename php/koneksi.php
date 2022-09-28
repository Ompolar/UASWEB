<?php
    session_start();
    $host="localhost";
    $username="root";
    $password="";
    $database="dodolanku";

    $conn=mysqli_connect($host,$username,$password,$database) or die ("koneksi ke database gagal");
?>