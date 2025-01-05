<?php

session_start();

if(!isset($_SESSION["login"])){
    header("Location: login.php");
    exit;
}

require 'functions.php';

$pelanggan = query("SELECT * FROM tbl_pelanggan_mrizalamsori");

if(isset($_POST["search"])){
    $pelanggan = search_pelanggan($_POST["keyword"]);
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

            <div class="search">
                <form action="" method="POST">
                    <label>
                        <input type="text" name="keyword" placeholder="Search here">
                        <button type="submit" name="search"><ion-icon name="search-outline"></ion-icon></button>
                    </label>
                </form>
            </div>

            <div class="user">
                <img src="img/profil.png" alt="">
            </div>
        </div>

        <!-- order details -->
        <div class="details">
            <div class="recentOrders">
                <div class="cardHeader">
                    <h2>Daftar Pelanggan Terbaru</h2>
                    <a href="tambah_data_pelanggan.php" class="btn">Tambah Pelanggan</a>
                </div>

                <table>
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>NIK KTP</th>
                            <th>Nama Lengkap</th>
                            <th>Nomor HP</th>
                            <th>Alamat</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php foreach($pelanggan as $plg) : ?>
                        <tr>
                            <td><?= $i; ?></td>
                            <td><?= $plg["nik_ktp_mrizalamsori"]; ?></td>
                            <td><?= $plg["nama_mrizalamsori"]; ?></td>
                            <td><?= $plg["no_hp_mrizalamsori"]; ?></td>
                            <td><?= $plg["alamat_mrizalamsori"]; ?></td>
                            <td>
                                <ul>
                                    <li>
                                        <a href="hapus_data_pelanggan.php?id=<?= $plg["id"]; ?>">Hapus</a>
                                        <a href="edit_data_pelanggan.php?id=<?= $plg["id"]; ?>">Edit</a>
                                    </li>
                                </ul>
                            </td>
                        </tr>
                        <?php $i++; ?>
                        <?php endforeach; ?>
                    </tbody>
                </table>
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