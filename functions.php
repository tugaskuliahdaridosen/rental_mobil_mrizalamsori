<?php
$conn = new mysqli("localhost", "root", "", "rentalmobil_mrizalamsori");
if($conn -> connect_error){
    die("Connection Failed") . $conn->connect_error;
}

function query($query){
    global $conn;

    $result = mysqli_query($conn, $query);
    $rows = [];
    while($row = mysqli_fetch_assoc($result)){
        $rows[] = $row;
    }

    return $rows;
}


function insert($data){
    global $conn;

    $no_plat = htmlspecialchars($data["no_plat_mrizalamsori"]);
    $nama_mobil = htmlspecialchars($data["nama_mobil_mrizalamsori"]);
    $brand_mobil = htmlspecialchars($data["brand_mobil_mrizalamsori"]);
    $tipe_transmisi = htmlspecialchars($data["tipe_transmisi_mrizalamsori"]);

    $query = "INSERT INTO tbl_mobil_mrizalamsori VALUES ('', '$no_plat', '$nama_mobil', '$brand_mobil', '$tipe_transmisi')";

    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

function edit($data, $id){
    global $conn;

    $no_plat = htmlspecialchars($data["no_plat_mrizalamsori"]);
    $nama_mobil = htmlspecialchars($data["nama_mobil_mrizalamsori"]);
    $brand_mobil = htmlspecialchars($data["brand_mobil_mrizalamsori"]);
    $tipe_transmisi = htmlspecialchars($data["tipe_transmisi_mrizalamsori"]);

    $query = "UPDATE tbl_mobil_mrizalamsori SET no_plat_mrizalamsori = '$no_plat', nama_mobil_mrizalamsori = '$nama_mobil', brand_mobil_mrizalamsori = '$brand_mobil', tipe_transmisi_mrizalamsori = '$tipe_transmisi' WHERE id = $id";
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

function hapus($id){
    global $conn;
    mysqli_query($conn, "DELETE FROM tbl_mobil_mrizalamsori WHERE id = $id");
    return mysqli_affected_rows($conn);
}

function search_mobil($keyword){
    $query = "SELECT * FROM tbl_mobil_mrizalamsori WHERE nama_mobil_mrizalamsori LIKE '%$keyword%' OR brand_mobil_mrizalamsori LIKE '%$keyword%'";
    return query($query);
}

function insert_pelanggan($data){
    global $conn;

    $nik = htmlspecialchars($data["nik_ktp_mrizalamsori"]);
    $nama_pelanggan = htmlspecialchars($data["nama_mrizalamsori"]);
    $no_hp = htmlspecialchars($data["no_hp_mrizalamsori"]);
    $alamat_pelanggan = htmlspecialchars($data["alamat_mrizalamsori"]);

    $query = "INSERT INTO tbl_pelanggan_mrizalamsori VALUES ('', '$nik', '$nama_pelanggan', '$no_hp', '$alamat_pelanggan')";

    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

function edit_pelanggan($data, $id){
    global $conn;

    $nik = htmlspecialchars($data["nik_ktp_mrizalamsori"]);
    $nama_pelanggan = htmlspecialchars($data["nama_mrizalamsori"]);
    $no_hp = htmlspecialchars($data["no_hp_mrizalamsori"]);
    $alamat_pelanggan = htmlspecialchars($data["alamat_mrizalamsori"]);

    $query = "UPDATE tbl_pelanggan_mrizalamsori SET nik_ktp_mrizalamsori = '$nik', nama_mrizalamsori = '$nama_pelanggan', no_hp_mrizalamsori = '$no_hp', alamat_mrizalamsori = '$alamat_pelanggan' WHERE id = $id";

    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

function hapus_pelanggan($id){
    global $conn;
    mysqli_query($conn, "DELETE FROM tbl_pelanggan_mrizalamsori WHERE id = $id");
    return mysqli_affected_rows($conn);
}

function search_pelanggan($keyword){
    $query = "SELECT * FROM tbl_pelanggan_mrizalamsori WHERE nama_mrizalamsori LIKE '%$keyword%'";
    return query($query);
}

function insert_rental($data){
    global $conn;

    $no_trx = htmlspecialchars($data["no_trx_mrizalamsori"]);
    $nik_ktp = htmlspecialchars($data["nik_ktp_mrizalamsori"]);
    $no_plat = htmlspecialchars($data["no_plat_mrizalamsori"]);
    $tgl_rental = htmlspecialchars($data["tgl_rental_mrizalamsori"]);
    $jam_rental = htmlspecialchars($data["jam_rental_mrizalamsori"]);
    $harga = htmlspecialchars($data["harga_mrizalamsori"]);
    $lama = htmlspecialchars($data["lama_mrizalamsori"]);
    $total_bayar = htmlspecialchars($data["total_bayar_mrizalamsori"]);

    $query = "INSERT INTO tbl_rental_mrizalamsori VALUES ('', '$no_trx', '$nik_ktp', '$no_plat', '$tgl_rental', '$jam_rental', '$harga', '$lama', '$total_bayar')";

    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

function edit_rental($data){
    global $conn;

    $no_trx = htmlspecialchars($data["no_trx_mrizalamsori"]);
    $nik_ktp = htmlspecialchars($data["nik_ktp_mrizalamsori"]);
    $no_plat = htmlspecialchars($data["no_plat_mrizalamsori"]);
    $tgl_rental = htmlspecialchars($data["tgl_rental_mrizalamsori"]);
    $jam_rental = htmlspecialchars($data["jam_rental_mrizalamsori"]);
    $harga = htmlspecialchars($data["harga_mrizalamsori"]);
    $lama = htmlspecialchars($data["lama_mrizalamsori"]);
    $total_bayar = htmlspecialchars($data["total_bayar_mrizalamsori"]);

    $query = "UPDATE tbl_rental_mrizalamsori SET no_trx_mrizalamsori = '$no_trx', nik_ktp_mrizalamsori = '$nik_ktp', no_plat_mrizalamsori = '$no_plat', tgl_rental_mrizalamsori = '$tgl_rental', jam_rental_mrizalamsori = '$jam_rental', harga_mrizalamsori = '$harga', lama_mrizalamsori = '$lama', total_bayar_mrizalamsori = '$total_bayar' WHERE id = $id";

    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

function hapus_rental($id){
    global $conn;
    mysqli_query($conn, "DELETE FROM tbl_rental_mrizalamsori WHERE id = $id");
    return mysqli_affected_rows($conn);
}

function search_rental($keyword){
    $query = "SELECT * FROM tbl_rental_mrizalamsori WHERE no_plat_mrizalamsori LIKE '%$keyword%' OR nik_ktp_mrizalamsori LIKE '%$keyword%'";
    return query($query);
}

function register($data){
    global $conn;

    $nama = stripcslashes(strtolower($data["nama_lengkap_mrizalamsori"]));
    $level = stripcslashes(strtolower($data["level_mrizalamsori"]));
    $username = stripcslashes(strtolower($data["username_mrizalamsori"]));
    $password = mysqli_real_escape_string($conn, $data["password_mrizalamsori"]);
    $confirm = mysqli_real_escape_string($conn, $data["confirm_password_mrizalamsori"]);

    $result = mysqli_query($conn, "SELECT username_mrizalamsori FROM tbl_user_mrizalamsori WHERE username_mrizalamsori = '$username'");

    if(mysqli_fetch_assoc($result)){
        echo "<script> alert('username sudah digunakan'); </script>";
        return false;
    }

    if($password !== $confirm){
        echo "<script> alert('konfirmasi password tidak sesuai'); </script>";
        return false;
    }

    $password = password_hash($password, PASSWORD_DEFAULT);

    mysqli_query($conn, "INSERT INTO tbl_user_mrizalamsori VALUES ('', '$username', '$password', '$nama', '$level')");
    return mysqli_affected_rows($conn);
}

?>