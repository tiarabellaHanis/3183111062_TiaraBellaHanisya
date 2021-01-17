	<div id="page-title">
            <div id="page-title-inner">
                <!-- start: Container -->
                <div class="container">
                        <h2><i class="ico-camera ico-white"></i>Detail Produk</h2>
                </div>
             </div>	
	</div>
        <div id="wrapper">
            <div class="container">
                <!-- start: Row -->
                <div class="row">
                    <div class="col-sm-6">
                        <?php
                        $kd = filter_input(INPUT_GET, 'kd', FILTER_SANITIZE_URL);
                        if(empty($kd)){
                            $kd = $_SESSION['kd'];
                        }
                        $query = mysqli_query($koneksi, "SELECT * FROM produk WHERE br_id='$kd'");
                        $data = mysqli_fetch_array($query);
                        ?>

                        <div class="hero-unit" style="margin-left: 20px;">
                            <table>
                                <tr>
                                    <td rowspan="7"><img src="<?php echo $data['br_gbr']; ?>" /></td>
                                </tr>
                                <tr>
                                    <td colspan="4"><div class="title"><h3><?php echo $data['br_nm']; ?></h3></div></td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td size="200"><h3>Harga</h3></td>
                                    <td><h3>:</h3></td>
                                    <td><div><h3>Rp.<?php echo number_format($data['br_hrg'], 2, ",", "."); ?></h3></div></td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td><h3>Stock</h3></td>
                                    <td><h3>:</h3></td>
                                    <td><div><h3><?php
                                                if ($data['br_stok'] >= 1) {
                                                    echo '<strong style="color: blue;">In Stock</strong>';
                                                } else {
                                                    echo '<strong style="color: red;">Out Of Stock</strong>';
                                                };
                                                ?></h3></div></td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td><h3>Satuan</h3></td>
                                    <td><h3>:</h3></td>
                                    <td><div><h3><?php echo $data['br_satuan']; ?></h3></div></td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td><h3>Keterangan</h3></td>
                                    <td><h3>:</h3></td>
                                    <td><div><h3><?php echo $data['ket']; ?></h3></div></td>
                                </tr>

                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td><div class="clear"> <a href="cart.php?act=add&amp;barang_id=<?php echo $data['br_id']; ?>&amp;ref=index.php?link=keranjang&kd=<?php echo $data['br_id']; ?>" class="btn btn-lg btn-danger">Beli &raquo;</a></div></td>
                                </tr>

                            </table>
                        </div>
                    </div>

                </div>
            </div>
        </div>	

        <!-- End Row -->

        <!-- Start Form Raja Ongkir -->
        
        <div class="row">
        <div class="col-md-6">
        <div class="panel panel-default">
        <div class="panel-body">
        <form class="form-horizontal" id="ongkir" method="POST">
        <div class="form-group">
        <label class="control-label col-sm-3">Kota Asal: </label>
        <div class="col-sm-9">
        <select class="form-control" id="kota_asal" name="kota_asal" required="">
        </select>
        </div>
        </div>
        <br>

        <div class="form-group">
        <label class="control-label col-sm-3">Kota Tujuan: </label>
        <div class="col-sm-9">
        <select class="form-control" id="kota_tujuan" name="kota_tujuan" required="">
        <option></option>
        </select>
        </div>
        </div>
        <br>

        <div class="form-group">
        <label class="control-label col-sm-3">Kurir: </label>
        <div class="col-sm-9">
        <select class="form-control" id="kurir" name="kurir" required="">
        <option value="pos">POS INDONESIA</option>
        <option value="jne">JNE</option>
        <option value="tiki">TIKI</option>
        </select>
        </div>
        </div>
        <br>

        <div class="form-group">
        <label class="control-label col-sm-3">Berat (Kg): </label>
        <div class="col-sm-9">
        <input type="text" class="form-control" id="berat" name="berat" required="">
        <button type="submit" class="btn btn-default">Cek Ongkir</button>
        </div>
        </div>
        </form>
        </div>
        </div>
        </div>
        
        <div class="col-md-7" id="response_ongkir">
        </div>
        </div>
<!-- End Form Raja Ongkir -->