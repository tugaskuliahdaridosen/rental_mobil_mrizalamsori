<?php

session_start();

if(!isset($_SESSION["login"])){
    header("Location: login.php");
    exit;
}

require 'functions.php';

$id = $_GET["id"];
$rental = query("SELECT * FROM tbl_rental_mrizalamsori WHERE id = $id")[0];

if(isset($_POST["submit"])){
    if(edit_rental($_POST) > 0 ){
        echo "<script> alert('Data berhasil di edit'); location.href = 'tampil_data_rental.php'; </script>";
    }else {
        echo "<script> alert('Data gagal di edit'); location.href = 'tampil_data_rental.php'; </script>";
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
                    <h2>Edit Data Rental</h2>
                    <a href="tampil_data_rental.php" class="btn">Kembali</a>
                </div>

                <form action="" method="POST">
                    <ul>
                        <li>
                        <input type="hidden" name="id" value="<?= $rental['id'] ?>" >
                        </li>
                        <li>
                            <label for="no_trx_mrizalamsori">No TRX</label>
                            <input type="text" name="no_trx_mrizalamsori" value="<?= $rental["no_trx_mrizalamsori"] ?>">
                        </li>
                        <li>
                            <label for="nik_ktp_mrizalamsori">Pelanggan</label>
                            <select name="nik_ktp_mrizalamsori">
                                <option value="">-- Pilih Pelanggan --</option>
                                <?php

                                    // Query untuk mengambil data pelanggan
                                    $tampil = mysqli_query($conn, "SELECT * FROM tbl_pelanggan_mrizalamsori");

                                    // Mengecek apakah query berhasil dan jika ada data
                                    if (mysqli_num_rows($tampil) > 0) {
                                        while ($data = mysqli_fetch_array($tampil)) {
                                            // Menampilkan opsi dengan format nik_ktp_mrizalamsori dan nama_pelanggan_mrizalamsori
                                            echo "<option value='$data[nik_ktp_mrizalamsori]'> $data[nik_ktp_mrizalamsori] - $data[nama_mrizalamsori]</option>";
                                        }
                                    } else {
                                        echo "<option value=''>Data pelanggan tidak ditemukan</option>";
                                    }
                                ?>
                            </select>
                        </li>
                        <li>
                            <label for="no_plat_mrizalamsori">Mobil</label>
                            <select name="no_plat_mrizalamsori">
                                <option value="">-- Pilih Mobil --</option>
                                <?php

                                    // Query untuk mengambil data pelanggan
                                    $tampil = mysqli_query($conn, "SELECT * FROM tbl_mobil_mrizalamsori");

                                    // Mengecek apakah query berhasil dan jika ada data
                                    if (mysqli_num_rows($tampil) > 0) {
                                        while ($data = mysqli_fetch_array($tampil)) {
                                            // Menampilkan opsi dengan format nik_ktp_mrizalamsori dan nama_pelanggan_mrizalamsori
                                            echo "<option value='$data[no_plat_mrizalamsori]'> $data[no_plat_mrizalamsori] - $data[nama_mobil_mrizalamsori]</option>";
                                        }
                                    } else {
                                        echo "<option value=''>Data pelanggan tidak ditemukan</option>";
                                    }
                                ?>
                            </select>
                        </li>
                        <li>
                            <label for="tgl_rental_mrizalamsori">Tanggal Ambil</label>
                            <input type="date" name="tgl_rental_mrizalamsori" value="<?= $rental["tgl_rental_mrizalamsori"] ?>">
                        </li>
                        <li>
                            <label for="jam_rental_mrizalamsori">Jam Ambil</label>
                            <input type="time" name="jam_rental_mrizalamsori" value="<?= $rental["jam_rental_mrizalamsori"] ?>">
                        </li>
                        <li>
                            <label for="harga_mrizalamsori">Harga</label>
                            <input type="number" id="harga_mrizalamsori" name="harga_mrizalamsori" value="<?= $rental["harga_mrizalamsori"] ?>">
                        </li>
                        <li>
                            <label for="lama_mrizalamsori">Lama</label>
                            <input type="number" id="lama_mrizalamsori" name="lama_mrizalamsori" value="<?= $rental["lama_mrizalamsori"] ?>">
                        </li>
                        <li>
                            <label for="total_bayar_mrizalamsori">Total Bayar</label>
                            <input type="number" id="total_bayar_mrizalamsori" name="total_bayar_mrizalamsori" value="<?= $rental["total_bayar_mrizalamsori"] ?>">
                        </li>
                        <li>
                            <button type="submit" name="submit">Edit Data Rental</button>
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