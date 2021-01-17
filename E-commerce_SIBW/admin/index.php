<?php

session_start();
if (isset($_SESSION["gagal"])) {
  if ($_SESSION["gagal"]>=3) {
    echo '<h1>ANDA SEDANG DI BLOKIR</h1>';
    exit();
  }
}

?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

  <title>Sistem Informasi Berbasis Web</title>
  <link rel="stylesheet" type="text/css" href="asset/bootstrap-4.5.2/css/bootstrap.min.css">
  <script>
    window.setTimeout{function() {
      $(".alert").fadeTo(500,0).slideUp(500, function() {
        $(this).remove();
      });
    },2000};
  </script>
</head>
<body class="text-center">
  <div class="container">
    <div class="border rounded col-lg3 col-md5 col-sm7 col-xl-3"style="margin: 0 auto; margin-top: 50px">
      <form id="frm01" name="frm01" method="POST" action="login_cek.php" class="form-signin">
        <h1 class="h3 mb-3 font-weght-normal">Silahkan Login !!</h1>
        <?php
        if (isset($_SESSION["gagal"])) {
          if ($_SESSION["gagal"] < 3) {
            echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">GAGAL Login ke-'.$_SESSION["gagal"].'  .. !!
            <button type="button" class="close" data-dismiss="alert" aria-label="close">
            <span-aria-hidden="true"></span>
            </button>
            </div>';
          }
        }
        ?>
        <label for="inputEmail" class="sr-only">Email address</label>
        <input type="email" id="inputEmail" name="inEmail" class="form-control" placeholder="Email address" required autofocus><br>

        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" id="inputPassword" name="inPass" class="form-control" placeholder="Password" required><br>
        
        <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
        <p class="mt-5 mb-3 text-muted">&copy; TiaraBellaHanisya</p>
        </form>
  </div>
</div>

<script src="asset/js/jquery.js"></script>
<script src="asset/bootstrap-4.5.2/js/bootstrap.js"></script>

</body>
</html>