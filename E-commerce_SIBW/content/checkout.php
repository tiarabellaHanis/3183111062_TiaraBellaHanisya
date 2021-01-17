<?php
    include 'koneksi.php';

    if (isset($_GET['act'])) {
        // Query untuk insert data ke table checkout
        $nama         = $_POST['nm_usr'];
        $username     = $_POST['log_usr'];
        $password     = $_POST['pas_usr'];
        $email        = $_POST['email_usr'];
        $alamat       = $_POST['almt_usr'];
        $kodePos      = $_POST['kp_usr'];
        $kota         = $_POST['kota_usr'];
        $noTelpon     = $_POST['tlp'];
        $noRekening   = $_POST['rek'];
        $namaRekening = $_POST['nmrek'];
        $bank         = $_POST['bank'];
        $queryCheckout = "INSERT INTO checkout (nm_usr, log_usr, pas_usr, email_usr, almt_usr, kp_usr, kota_usr, tlp, rek, nmrek, bank) VALUES ('$nama', '$username', '$password', '$email', '$alamat', '$kodePos', '$kota', '$noTelpon', '$noRekening', '$namaRekening', '$bank')";

        mysqli_query($koneksi, $queryCheckout);
        $checkout_id = mysqli_insert_id($koneksi);

        foreach ($_SESSION['items'] as $key => $item) {
            $queryDetailCheckout = "INSERT INTO detail_checkout (checkout_id, produk_id, qty) VALUES ('$checkout_id', '$key', '$item')";
            mysqli_query($koneksi, $queryDetailCheckout);
        }

    }
    ?>


    <div id="page-title">
            <div id="page-title-inner">

                <div class="container">
                        <h2><i class="ico-camera ico-white"></i>Form Checkout</h2>
                </div>
            </div>	
	</div>

        <div id="wrapper">
            <div class="container">
                <!-- start: Row -->
                <div class="row">
                    <?php 
                    $total = filter_input(INPUT_GET, 'total', FILTER_SANITIZE_URL);
                    ?>
                <!-- start: Table -->
                <div class="table-responsive">
                    <div class="hero-unit">Total Belanja Anda Rp. <?php echo abs((int) $total); ?>,-</div> 
                    <form id="formku" action="index.php?link=checkout&act=beli" method="post">
                        <table class="table table-condensed">
                            <input type="hidden" name="total" value="<?php echo abs((int) $_GET['total']); ?>">
                            <tr>
                                <td><label for="nm_usr">Nama</label></td>
                                <td><input name="nm_usr" type="text" class="required" minlength="6" id="nm_usr" size="200" /></td>
                            </tr>
                            <tr>
                                <td><label for="log_usr">Username</label></td>
                                <td><input name="log_usr" type="text" class="required" minlength="6" id="log_usr" /></td>
                            </tr>
                            <tr>
                                <td><label for="pas_usr">Password</label></td>
                                <td><input name="pas_usr" type="password" class="required" minlength="6" id="pas_usr" /></td>
                            </tr>
                            <tr>
                                <td><label for="email_usr">Email</label></td>
                                <td><input name="email_usr" type="text" class="email required" id="email_usr" /></td>
                            </tr>
                            <tr>
                                <td><label for="almt_usr">Alamat</label></td>
                                <td><input name="almt_usr" type="text" class="required" id="almt_usr" /></td>
                            </tr>
                            <tr>
                                <td><label for="kp_usr">Kode Pos</label></td>
                                <td><input name="kp_usr" type="text" class="required number" minlength="5" maxlength="5" id="kp_usr" /></td>
                            </tr>
                            <tr>
                                <td><label for="kota_usr">Kota</label></td>
                                <td><input name="kota_usr" type="text" class="required" minlength="6" id="kota_usr" /></td>
                            </tr>
                            <tr>
                                <td><label for="tlp">No telepon</label></td>
                                <td><input name="tlp" type="text" class="required number" minlength="12" id="tlp" /></td>
                            </tr>
                            <tr>
                                <td><label for="rek">No Rekening</label></td>
                                <td><input name="rek" type="text" class="required number" minlength="12" id="rek" /></td>
                            </tr>
                            <tr>
                                <td><label for="nmrek">Nama Rekening</label></td>
                                <td><input name="nmrek" type="text" class="required" minlength="6" id="nmrek" /></td>
                            </tr>
                            <tr>
                                <td><label for="bank">Bank</label></td>
                                <td><select name="bank" class="required">
                                        <option></option>
                                        <option value="Mandiri">Mandiri</option>
                                        <option value="BNI">BNI</option>
                                        <option value="CIMB">CIMB</option>
                                        <option value="BCA">BCA</option>
                                        <option value="Bank Jabar">Bank Jabar</option>
                                        <option value="Danamon">Danamon</option>
                                        <option value="BRI">BRI</option>
                                        <option value="Permata">Permata</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td></td>
                                <td><input type="submit" value="Simpan Data" name="finish"  class="btn btn-sm btn-primary"/>&nbsp;<a href="index.php" class="btn btn-sm btn-primary">Kembali</a></td>
                            </tr>
                        </table>
                    </form>
                </div>
                </div>
            </div>
        </div>
