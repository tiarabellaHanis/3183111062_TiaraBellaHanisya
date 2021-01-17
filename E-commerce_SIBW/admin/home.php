<?php
session_start();
if (!isset($_SESSION["logedin"])) {
    header("Location: index.php");
    exit();
}
?>
<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="icon" href="assets/images/favicon.ico">
        <title>SIBW</title>
        <link href="assets/bootstrap41/css/bootstrap.min.css" rel="stylesheet">
        <link href="assets/bootstrap41/css/dashboard.css" rel="stylesheet">
    </head>

    <body>
        <nav class="navbar navbar-dark fixed-top bg-dark flex-md-nowrap p-0 shadow">
            <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="#" style="font-family:Matura MT Script Capitals;">ADMIN</a>
            <ul class="navbar-nav px-3">
                <li class="nav-item text-nowrap">
                    <a class="nav-link" href="index.php" style="font-family:Matura MT Script Capitals;">Sign out</a>
                </li>
            </ul>
        </nav>

        <div class="container-fluid">
            <div class="row">
                <nav class="col-md-2 d-none d-md-block bg-light sidebar">
                    <div class="sidebar-sticky">
                        <?php include_once './inc_content/sidebar_menu.php';?>
                    </div>
                </nav>

                <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
                    <?php
                    $lnk = filter_input(INPUT_GET, 'link', FILTER_SANITIZE_URL);
                    if (empty($lnk)) {
                        include_once './inc_content/main_home.php';
                    }elseif ($lnk=='kategori') {
                        include_once './inc_content/main_kategori.php';
                    }elseif ($lnk=='produk') {
                        $kd = filter_input(INPUT_GET, 'kd', FILTER_SANITIZE_URL);
                        if(!empty($kd)){
                            $_SESSION['kd']    = $kd;
                        }
                        include_once './inc_content/main_produk.php';
                    } elseif ($lnk=='member') {
                        include_once './inc_content/main_member.php';
                    } elseif ($lnk=='validasi') {
                        include_once './inc_content/main_validasi.php';
                    }
                    ?>

                   <!-- elseif ($lnk=='checkout') {
                        include_once './content/checkout.php';
                    }elseif ($lnk=='komentar') {
                        include_once './content/komentar.php';
                    }elseif ($lnk=='selesai') {
                        include_once './content/selesai.php';
                    }elseif ($lnk=='login') {
                        include_once './content/login.php'; -->
                </main>
            </div>
        </div>

        <script src="assets/js/jquery-3.3.1.min.js"></script>      
        <script src="assets/bootstrap41/js/bootstrap.min.js"></script>

        <!-- Icons -->
        <script src="assets/feather/feather.min.js"></script>
        <script>
            feather.replace()
        </script>

    </body>
</html>
