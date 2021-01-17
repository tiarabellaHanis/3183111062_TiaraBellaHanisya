<?php
error_reporting(E_ALL ^ E_NOTICE);
include_once "koneksi.php";
$username = $_POST['user'];
$password = $_POST['pass'];

$result = mysqli_query($koneksi, "SELECT * FROM member WHERE email_usr='$username' AND pas_usr='$password'");
$dt = mysqli_fetch_array($result);
$cnt = mysqli_num_rows($result);

if ($cnt >= 1) {
    session_start();
    $_SESSION['username'] = $dt['email_usr'];
    $_SESSION['nm_usr'] = $dt['nm_usr'];
    header("location : index.php");
    
} else {
    echo "<script>alert('Username dan Password tidak valid.'); window.location = 'index.php?link=login'</script>";
}
?>