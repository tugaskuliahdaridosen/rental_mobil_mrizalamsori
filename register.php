<?php

require 'functions.php';

if(isset($_POST["register"])){
    if(register($_POST) > 0){
        echo "<script> alert('user baru berhasil ditambahkan!'); </script>";
    }else{
        echo mysqli_error($conn);
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="css/loginsystem.css">
    <title>register</title>
</head>
<body>
    <div class="container">
        <form action="" method="POST">
            <h2>Welcome To Register</h2>
            <span>Please enter your details</span>
            <ul>
                <li>
                    <label for="nama_lengkap_mrizalamsori"><i class='bx bx-user-pin'></i></label>
                    <input type="text" name="nama_lengkap_mrizalamsori" placeholder="Nama Lengkap">
                </li>
                <li>
                    <label for="level_mrizalamsori"><i class='bx bx-cylinder'></i></label>
                    <select name="level_mrizalamsori">
                        <option value="">Pilih Level</option>
                        <option value="Admin">Admin</option>
                        <option value="user">User</option>
                    </select>
                </li>
                <li>
                    <label for="username_mrizalamsori"><i class='bx bx-user'></i></label>
                    <input type="text" name="username_mrizalamsori" placeholder="Username">
                </li>
                <li>
                    <label for="password_mrizalamsori"><i class='bx bx-lock-open-alt' ></i></label>
                    <input type="password" name="password_mrizalamsori" placeholder="Password">
                </li>
                <li>
                    <label for="confirm_password_mrizalamsori"><i class='bx bx-lock' ></i></label>
                    <input type="password" name="confirm_password_mrizalamsori" placeholder="Confirm Password">
                </li>
                <li class="four">
                    <div class="remember-me">
                        <input type="checkbox">
                        <p>remember me</p>
                    </div>
                    <p>I have account! <a href="login.php">Login</a></p>
                </li>
                <li>
                    <button type="submit" name="register">Register</button>
                </li>
            </ul>
        </form>
        <div class="image"><img src="img/mobil.jpg" alt=""></div>
    </div>
</body>
</html>