	<!-- start: Page Title -->
	<div id="page-title">
            <div id="page-title-inner">
                <!-- start: Container -->
                <div class="container">
                        <h2><i class="ico-camera ico-white"></i>Selesai Belanja</h2>
                </div>
                <!-- end: Container  -->
            </div>	
	</div>
	<!-- end: Page Title -->

        <!--start: Wrapper-->
        <div id="wrapper">
            <!--start: Container -->
            <div class="container">
                <!-- start: Row -->
                <div class="row">
                    <div class="table-responsive">
                        <div class="title"><h3>Checkout Selesai</h3></div>
                        <div class="hero-unit">
                            <?php
                            if ($_POST['finish']) {
                                session_destroy();
                                echo 'Terima kasih Anda sudah berbelanja di Toko kami dan berikut ini adalah data yang perlu Anda catat.';
                                echo '<p>Total biaya untuk pembelian Produk adalah Rp. ' . $_POST['total'] . ',- dan biaya bisa di kirimkan melalui Rekening Bank Mandiri cabang Cikarang dengan nomor rekening 123-234-56347-8 atas nama PT.SIBW.</p>';
                                echo '<p>Dan barang akan kami kirim ke alamat di bawah ini:</p>';
                                echo '<p>Nama Lengkap : ' . $_POST['nm_usr'] . '<br>';
                                echo 'Email : ' . $_POST['email_usr'] . '<br>';
                                echo 'Alamat : ' . $_POST['almt_usr'] . '<br>';
                                echo 'Kode Pos : ' . $_POST['kp_usr'] . '<br>';
                                echo 'Kota : ' . $_POST['kota_usr'] . '<br>';
                                echo 'No Telepon : ' . $_POST['tlp'] . '<br>';
                                echo 'Total Belanja : Rp. ' . $_POST['total'] . ',-</p>';
                            } else {
                                header("Location: index.php");
                            }
                            ?>
                        </div>
                        <!-- end: Table -->
                    </div>
                </div>
                <!-- end: Row -->
            </div>
            <!--end: Container-->
        </div>
        <!-- end: Wrapper  -->			
