<?php

session_start();

if(!isset($_SESSION["login"])){
    header("Location: login.php");
    exit;
}

require '../rental_mobil_mrizalamsori/functions.php';

$mobil = query("SELECT * FROM tbl_mobil_mrizalamsori");
$pelanggan = query("SELECT * FROM tbl_pelanggan_mrizalamsori");
$rental = query("SELECT * FROM tbl_rental_mrizalamsori");

$hitung_mobil = count($mobil);
$hitung_pelangan = count($pelanggan);
$hitung_rental = count($rental);

$mbl = query("SELECT * FROM tbl_mobil_mrizalamsori ORDER BY id DESC LIMIT 3");
$plgn = query("SELECT * FROM tbl_pelanggan_mrizalamsori ORDER BY id DESC LIMIT 3");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
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

        <!-- cards -->
        <div class="cardBox">
            <div class="card">
                <div>
                    <div class="numbers"><?= $hitung_mobil; ?></div>
                    <div class="cardName">Jumlah Mobil</div>
                </div>

                <div class="iconBx">
                    <ion-icon name="car-sport-outline"></ion-icon>
                </div>
            </div>

            <div class="card">
                <div>
                    <div class="numbers"><?= $hitung_pelangan; ?></div>
                    <div class="cardName">Data Pelanggan</div>
                </div>

                <div class="iconBx">
                    <ion-icon name="people-outline"></ion-icon>
                </div>
            </div>

            <div class="card">
                <div>
                    <div class="numbers"><?= $hitung_rental; ?></div>
                    <div class="cardName">Jumlah Rental </div>
                </div>

                <div class="iconBx">
                    <ion-icon name="man-outline"></ion-icon>
                </div>
            </div>
        </div>

        <!-- order details -->
        <div class="details">
            <div class="recentOrders">
                <div class="cardHeader">
                    <h2>Data Mobil Terbaru</h2>
                </div>
                <table>
                    <thead>
                        <tr>
                            <td>No Plat</td>
                            <td>Nama</td>
                            <td>Brand</td>
                            <td>Tipe</td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($mbl as $m) : ?>
                        <tr>
                            <td><?= $m["no_plat_mrizalamsori"]; ?></td>
                            <td><?= $m["nama_mobil_mrizalamsori"] ?></td>
                            <td><?= $m["brand_mobil_mrizalamsori"] ?></td>
                            <td><span class="status delivered"><?= $m["tipe_transmisi_mrizalamsori"]; ?></span></td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="details">
            <div class="recentOrders">
                <div class="cardHeader">
                    <h2>Data Pelanggan Terbaru</h2>
                </div>
                <table>
                    <thead>
                        <tr>
                            <td>Nama</td>
                            <td>Nomor Hp</td>
                            <td>Alamat</td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($plgn as $p) : ?>
                        <tr>
                            <td><?= $p["nama_mrizalamsori"]; ?></td>
                            <td><?= $p["no_hp_mrizalamsori"] ?></td>
                            <!-- <td><?= $p["brand_mobil_mrizalamsori"] ?></td> -->
                            <td><span class="status delivered"><?= $p["alamat_mrizalamsori"]; ?></span></td>
                        </tr>
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