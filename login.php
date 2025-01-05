<?php

session_start();

if(isset($_SESSION["login"])){
    header("Location: login.php");
    exit;
}

require 'functions.php';

if(isset($_POST["login"])){

    $username = $_POST["username_mrizalamsori"];
    $password = $_POST["password_mrizalamsori"];

    $result = mysqli_query($conn, "SELECT * FROM tbl_user_mrizalamsori WHERE username_mrizalamsori = '$username'");

    if(mysqli_num_rows($result) === 1 ){

        // cek passwordnya
        $row = mysqli_fetch_assoc($result);
        if( password_verify($password, $row["password_mrizalamsori"])){

            // set seeeion
            $_SESSION["login"] = true;
            header("Location: index.php");
            exit;
        }
    }

    echo "<script> alert('username/password yang dimasukan salah'); location:href = 'login.php'; </script>";

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
            <h2>Login</h2>
            <span>Please enter your details</span>
            <ul>
                <li>
                    <label for="username_mrizalamsori"><i class='bx bx-user' ></i></label>
                    <input type="text" name="username_mrizalamsori" placeholder="Username">
                </li>
                <li>
                    <label for="password_mrizalamsori"><i class='bx bx-lock' ></i></label>
                    <input type="password" name="password_mrizalamsori" placeholder="Password">
                </li>
                <li class="forget">
                    <div class="remember-me">
                        <input type="checkbox">
                        <p>remember me</p>
                    </div>
                    <a href="#">Forget password</a></p>
                </li>
                <li>
                    <button type="submit" name="login">Login</button>
                </li>
                <li class="signin">
                    <a href="#"><i class='bx bxl-google-plus' ></i>Sign in with Google</a>
                </li>
                <li class="last">
                    <p>Don't have an account? <a href="register.php">Sign up</a></p>
                </li>
            </ul>
        </form>
        <div class="image"><img src="img/mobil.jpg" alt=""></div>
    </div>
</body>
</html>