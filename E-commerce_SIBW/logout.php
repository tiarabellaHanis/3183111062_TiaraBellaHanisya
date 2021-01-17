<?php
session_start();
unset($_SESSION["username"]);
unset($_SESSION["nm_usr"]);
session_unset();
session_destroy();

header("location:index.php");

    // echo "<script>alert('Anda telah berhasil keluar.'); window.location = 'index.html'</script>";
?>