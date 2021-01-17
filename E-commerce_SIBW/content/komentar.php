<div id="page-title">
    <div id="page-title-inner">
        <div class="container">
            <h2><i class="ico-message-circle ico-white"></i>Komentar Anda</h2>
        </div>
    </div>	
</div>
<div id="wrapper">
    <!--start: Container -->
    <div class="container">
        <!-- start: Row -->
        <div class="row">

    <div class="title"><h3>Komentar Anda</h3></div>

                <form id="formku" method="post" action="proses.php" onsubmit="return formCheck(this);">
                    <table style="font-style: oblique; font-weight: bold; margin-left: 140px;">
                        <tr>
                            <td width="150">Nama</td>
                            <td width="30">:</td>
                            <td width="550"><input type="text" name="nama" size="30" class="required" minlength="3" placeholder="Nama Anda" /></td>
                        </tr>
                        <tr>
                            <td width="150">Email</td>
                            <td width="30">:</td>
                            <td width="550"><input type="text" name="email" size="30" class="required email" minlength="3" placeholder="Alamat Email" /></td>
                        </tr>
                        <tr>
                            <td width="150">Komentar</td>
                            <td width="30">:</td>
                            <td width="550"><input type="text" name="komentar" size="30" class="required" minlength="3" placeholder="Komentar Anda " /></td>
                        </tr>
                        <tr>
                            <td width="150"></td>
                            <td width="30"></td>
                            <td width="550">
                                <input class="btn btn-success" type="submit" value="Kirim"/>
                            </td>
                        </tr>
                    </table>
                </form>            
            <div class="komentar">
                <?php
                echo "<head><title>Aaliya Collection</title></head>";
                $fp = fopen("guestbook.txt", "r");
                echo "<table border=0>";

                while ($isi = fgets($fp, 250)) {
                    $pisah = explode("|", $isi);
                    echo "<tr><td>$pisah[0], $pisah[1]</td></tr>";
                    echo "<tr><td><font color=brown>$pisah[2]</font>, Bilang</td></tr>";
                    echo "<tr><td>$pisah[4]</td></tr><tr><td>&nbsp;</td><td>&nbsp;</td></tr>";
                }
                echo "</table>";
                ?>
            </div>
            
        </div>
    </div>
</div>		
