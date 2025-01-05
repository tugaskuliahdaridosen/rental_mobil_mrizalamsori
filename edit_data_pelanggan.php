<?php

session_start();

if(!isset($_SESSION["login"])){
    header("Location: login.php");
    exit;
}

require 'functions.php';

$id = $_GET["id"];

$plg = query("SELECT * FROM tbl_pelanggan_mrizalamsori WHERE id = $id")[0];

if(isset($_POST["submit"])){
    if(edit_pelanggan($_POST, $id) > 0 ){
        echo "<script> alert('Data berhasil di edit'); location.href = 'tampil_data_pelanggan.php'; </script>";
    }else {
        echo "<script> alert('Data gagal di edit'); location.href = 'tampil_data_pelanggan.php'; </script>";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/crud.css">
    <title>Admin Dashboard Responsive</title>
</head>
<body>
    <!-- navigation -->
    <div class="container">
        <div class="navigation">
            <ul>
                <li>
                    <a href="index.php">
                        <span class="icon">
                            <ion-icon name="car-outline"></ion-icon>
                        </span>
                        <span class="title">Rental Mobil</span>
                    </a>
                </li>

                <li>
                    <a href="tampil_data_mobil.php">
                        <span class="icon">
                            <ion-icon name="car-sport-outline"></ion-icon>
                        </span>
                        <span class="title">Data Mobil</span>
                    </a>
                </li>

                <li>
                    <a href="tampil_data_pelanggan.php">
                        <span class="icon">
                            <ion-icon name="people-outline"></ion-icon>
                        </span>
                        <span class="title">Data Pelanggan</span>
                    </a>
                </li>

                <li>
                    <a href="tampil_data_rental.php">
                        <span class="icon">
                            <ion-icon name="cart-outline"></ion-icon>
                        </span>
                        <span class="title">Data Rental</span>
                    </a>
                </li>

                <li>
                    <a href="logout.php">
                        <span class="icon">
                            <ion-icon name="log-out-outline"></ion-icon>
                        </span>
                        <span class="title">Sign Out</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>

    <!-- main -->
    <div class="main">
        <div class="topbar">
            <div class="toggle">
                <ion-icon name="menu-outline"></ion-icon>
            </div>

            <div class="user">
                <img src="img/profil.png" alt="">
            </div>
        </div>

        <!-- order details -->
        <div class="details">
            <div class="recentOrders">
                <div class="cardHeader">
                    <h2>Tambah Data Mobil</h2>
                    <a href="tampil_data_pelanggan.php" class="btn">Kembali</a>
                </div>

                <form action="" method="POST">
                    <ul>
                        <li>
                            <label for="nik_ktp_mrizalamsori">NIK KTP</label>
                            <input type="text" name="nik_ktp_mrizalamsori" value="<?= $plg["nik_ktp_mrizalamsori"]; ?>">
                        </li>
                        <li>
                            <label for="nama_mrizalamsori">Nama Lengkap</label>
                            <input type="text" name="nama_mrizalamsori" value="<?= $plg["nama_mrizalamsori"]; ?>">
                        </li>
                        <li>
                            <label for="no_hp_mrizalamsori">Nomor HP</label>
                            <input type="text" name="no_hp_mrizalamsori" value="<?= $plg["no_hp_mrizalamsori"]; ?>">
                        </li>
                        <li>
                            <label for="alamat_mrizalamsori">Alamat</label>
                            <input type="text" name="alamat_mrizalamsori" value="<?= $plg["alamat_mrizalamsori"]; ?>">
                        </li>
                        <li>
                            <button type="submit" name="submit">Edit Data Pelanggan</button>
                        </li>
                    </ul>
                </form>
            </div>
        </div>

    </div>

    <!-- javascript -->
    <script src="js/main.js"></script>

    <!-- ionicicon -->
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

</body>
</html>