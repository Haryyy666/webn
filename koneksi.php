<?php 
$server = "localhost";
$user   = "root";
$pass   = "";
$db_name = "db_mahasiswa2";

$koneksi = mysqli_connect($server, $user, $pass, $db_name);

if(!$koneksi) {
    die("Gagal terhubung ke database : " . mysqli_connect_error());
}



?>