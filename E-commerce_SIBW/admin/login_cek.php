<?php
session_start();
$user = filter_input(INPUT_POST, 'inEmail', FILTER_SANITIZE_URL);
$pass = filter_input(INPUT_POST, 'inPass', FILTER_SANITIZE_URL);
//=============================
$dbuser = "admin@sibw.com";
$dbpass = "admin123";
//=============================
if($user == $dbuser && $pass == $dbpass){
    $_SESSION["logedin"] = TRUE;
    header("location:home.php");
} else {
    if(isset($_SESSION["gagal"])){
        $_SESSION["gagal"]++;
    }else {
        $_SESSION["gagal"] = 1;
    }
    $_SESSION["logedin"] = FALSE;
    header("location:index.php");
}
