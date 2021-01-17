<?php
require_once ("koneksi.php");
if (!isset($_SESSION)) {
    session_start();
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>SIBW</title>
        <meta name="description" content="Sistem, information, informasi, web"/>
        <meta name="keywords" content="Distro, Murah, Baju, lengkap" />
        <meta name="author" content="Toko SIBW"/>
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

        <!-- Style Bootstrap -->
        <link href="assets/css/bootstrap.css" rel="stylesheet">
        <link href="assets/css/bootstrap-responsive.css" rel="stylesheet">
        <link href="assets/css/style.css" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />

        <script src="https://unpkg.com/feather-icons@4.10.0/dist/feather.min.js"></script>
        <script src="assets/js/jquery-1.8.2.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>

    </head>
    <body>

        <header>
            <?php include_once './content/header.php';?>
        </header>

        <?php
        $lnk = filter_input(INPUT_GET, 'link', FILTER_SANITIZE_URL);
        if (empty($lnk)) {
            include_once './content/home.php';
        }elseif ($lnk=='produk') {
            include_once './content/produk.php';
        }elseif ($lnk=='detailbarang') {
            $kd = filter_input(INPUT_GET, 'kd', FILTER_SANITIZE_URL);
            if(!empty($kd)){
                $_SESSION['kd']    = $kd;
            }
            include_once './content/produk_detail.php';
        }elseif ($lnk=='keranjang') {
            include_once './content/keranjang.php';
        }elseif ($lnk=='checkout') {
            include_once './content/checkout.php';
        }elseif ($lnk=='komentar') {
            include_once './content/komentar.php';
        }elseif ($lnk=='selesai') {
            include_once './content/selesai.php';
        }elseif ($lnk=='login') {
            include_once './content/login.php';
        } elseif ($lnk=='memberform') {
            include_once './content/member_form.php';
        }
        ?>

        <div id="footer">
            <?php include_once './content/footer.php';?>
        </div>

        <div id="copyright">
            <div class="container">
                <p>
                    Copyright &copy; <a href="#">SIBW 2020</a> Supported by <a href="https://github.com/coreui/coreui-free-bootstrap-admin-template" alt="Bootstrap Themes">Bootstrap Themes</a>
                </p>
            </div>
        </div>

        <!-- <script src="assets/jquery/jquery-3.3.1.min.js"></script> -->
        <script src="assets/js/bootstrap.js"></script>
        <script src="assets/js/flexslider.js"></script>
        <script src="assets/js/carousel.js"></script>
        <script src="assets/js/jquery.cslider.js"></script>
        <script src="assets/js/slider.js"></script>
        <script defer="defer" src="assets/js/custom.js"></script>

        <!-- <script src="assets/js/app.js"></script> -->

        <script>
            $( document ).ready(function() {
                $('#kota_asal').select2({
                placeholder: 'Pilih kota/kabupaten asal', language: "id" });

                $('#kota_tujuan').select2({
                placeholder: 'Pilih kota/kabupaten tujuan', language: "id"
                });

                $.ajax({
                type: "GET",
                dataType: "html",
                url: "content/cekkota.php?q=kotaasal",
                success: function(msg){
                $("select#kota_asal").html(msg);
                //alert (msg);
                }
                });

                $.ajax({
                type: "GET",
                dataType: "html",
                url: "content/cekkota.php?q=kotatujuan",
                success: function(msg){
                $("select#kota_tujuan").html(msg);
                }
                });

                $("#ongkir").submit(function(e) {
                e.preventDefault();
                $.ajax({
                url: 'content/cekongkir.php',
                type: 'post',
                data: $( this ).serialize(),
                success: function(data) {
                console.log(data);
                document.getElementById("response_ongkir").innerHTML = data;
            }
            });
            });
    });
        </script>
    </body>
</html>