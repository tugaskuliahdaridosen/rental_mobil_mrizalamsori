<?php

session_start();

if(!isset($_SESSION["login"])){
    header("Location: login.php");
    exit;
}

require 'functions.php';

$id = $_GET["id"];

if(hapus($id) > 0 ){
    echo "<script> alert('Data berhasil di hapus'); location.href = 'tampil_data_mobil.php'; </script>";
}else{
    echo "<script> alert('Data gagal di hapus'); location.href = 'tampil_data_mobil.php'; </script>";
}

?>