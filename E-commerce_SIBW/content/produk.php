	<div id="page-title">
            <div id="page-title-inner">
                <div class="container">
                        <h2><i class="ico-camera ico-white"></i>Produk Kami</h2>
                </div>
            </div>	
	</div>
        <div id="wrapper">
            <div class="container">
                <div class="row">
                    <?php
                    $sql = mysqli_query($koneksi, "SELECT * FROM produk ORDER BY br_id DESC");
                    if (mysqli_num_rows($sql) == 0) {
                        echo "Tidak ada produk!";
                    } else {
                        while ($data = mysqli_fetch_assoc($sql)) {
                            ?>
                            <div class="span4">
                                <div class="icons-box">
                                    <div class="title"><h3><?php echo $data['br_nm']; ?></h3></div>
                                    <img src="<?php echo $data['br_gbr']; ?>" />
                                    <div><h3>Rp.<?php echo number_format($data['br_hrg'], 2, ",", "."); ?></h3></div>
                                    <div class="clear">
                                        <a href="index.php?link=detailbarang&kd=<?php echo $data['br_id']; ?>" class="btn btn-lg btn-danger">Detail</a> 
                                        <a href="cart.php?act=add&amp;barang_id=<?php echo $data['br_id']; ?>&amp;ref=index.php?link=keranjang&kd=<?php echo $data['br_id']; ?>" class="btn btn-lg btn-success">Beli &raquo;</a>
                                    </div>
                                </div>
                            </div>
                            <?php
                        }
                    }
                    ?>
                </div>
            </div>
        </div>		
