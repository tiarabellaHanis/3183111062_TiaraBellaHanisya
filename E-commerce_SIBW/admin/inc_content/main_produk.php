<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2" style="font-family: Comic Sans MS;">Produk</h1>
</div>
<div class="col-lg-12">
    <button type="button" class="btn btn-large btn-success" onclick="showModalAdd();" style="margin-bottom: 5px;">
        <i data-feather="plus-circle" style="margin-bottom: 3px;"></i> Add
    </button>

    <input class="form-control-sm py-3 px-4 border" type="search" value="" placeholder="Search Category" id="searchkategori" name="searchkategori" onkeyup="searchdt(this.value);">

    <div class="table-responsive">
        <table class="table table-hover">
            <thead class="thead-light">
                <tr style="font-family: Comic Sans MS;">
                    <th>No</th>
                    <th>Nama Produk</th>
                    <th>Harga</th>
                    <th>Stok</th>
                    <th>Keterangan</th>
                    <th>Gambar</th>
                    <th style="text-align: center;">Aksi</th>
                </tr>
            </thead>
            <tbody id="datalist">
                <?php
                require_once("../koneksi.php");
                $varCnt = 0;
                $sql = "select * from produk order by br_id desc";
                $result = mysqli_query($koneksi, $sql);
                while ($data = mysqli_fetch_assoc($result)) {
                    $varCnt = $varCnt + 1;
                    $varId = $data['br_id'];
                    $varNm = $data['br_nm'];
                    $varHrg = $data['br_hrg'];
                    $varStk = $data['br_stok'];
                    $varKet = $data['ket'];
                    $varGbr = $data['br_gbr'];
                    ?>
                    <tr class="">
                        <td><?php echo $varCnt; ?></td>
                        <td><?php echo $varNm; ?></td>
                        <td><?php echo $varHrg; ?></td>
                        <td><?php echo $varStk; ?></td>
                        <td><?php echo $varKet; ?></td>
                        <td>
                            <img class="mb-4" src="../<?php echo $varGbr; ?>" alt="" style="max-width: 100px;height: auto;">
                        </td>
                        <td nowrap style="text-align: center;">
                            <button type="button" onclick="showModalEdt(<?php echo $varId; ?>, '<?php echo $varNm; ?>');" class="btn btn-success btn-sm" title="Edit">
                                Edit
                            </button>
                            <button type="button" onclick="showModalDel(<?php echo $varId; ?>, '<?php echo $varNm; ?>', '<?php echo $varGbr; ?>');" class="btn btn-danger btn-sm" title="Delete">
                                Del
                            </button>
                        </td>
                    </tr>
                    <?php
                }
                ?>
            </tbody>
        </table>
    </div>
</div>
</div>

<!-- FORM 01 MODAL -->
<div class="modal fade" id="Modal01" tabindex="-1" role="dialog" aria-labelledby="DialogModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #337AB7;">
                <h5 class="modal-title" id="ModalLabel01">
                    PRODUK
                </h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" style="background-color:#BBD6EC;">
                <form id="form-kategori">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <input type="hidden" name="id01" id="id01">
                                <input type="hidden" id="proc01" name="proc01" value="">
                                <input type="hidden" id="filenm" name="filenm" value="">
                                <input type="text" id="nama" name="nama" placeholder="Nama Produk" maxlength="20" class="form-control">
                            </div>                                    
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <select id="katnama" name="katnama" class="form-control">
                                    <option value="">Pilih Kategori</option>
                                    <?php
                                    $sql = "select * from produk_kategori order by kategori_nama";
                                    $result = mysqli_query($koneksi, $sql);
                                    while ($data = mysqli_fetch_assoc($result)) {
                                        $varKd = $data['kategori_kode'];
                                        $varNm = $data['kategori_nama'];
                                        $varId = $data['id'];
                                        ?>
                                        <option value="<?php echo $varKd; ?>"><?php echo $varNm; ?></option>
                                        <?php
                                    }
                                    ?>
                                </select>
                            </div>                                    
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <input type="text" id="harga" name="harga" placeholder="Harga" maxlength="10" class="form-control" onkeypress="return isNumberKey(event);" min="1">
                            </div>                                    
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <input type="text" id="stok" name="stok" placeholder="Stok" maxlength="3" class="form-control" onkeypress="return isNumberKey(event);" min="1">
                            </div>                                    
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <input type="text" id="ket" name="ket" placeholder="Keterangan" class="form-control">
                            </div>                                    
                        </div>
                        <div class = "col-lg-12"> 
                            <div class = "form-group"> 
                                <input type = "file" id = "userImage" name = "userImage" placeholder = "File" onchange = "readURL(this);" style = "word-break: break-all; word-wrap: break-word;"> 
                            </div> 
                        </div> 
                        <div class = "col-lg-6"> 
                            <div class = "form-group"> 
                                <img id = "gambarnya" src = "#" alt = "" width = "100%" onclick = "$('#userImage').trigger('click'); return false;" /> 
                            </div> 
                        </div> 
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button onclick="insertdata();" class="btn btn-success" type="button" data-dismiss="modal">
                    Save
                </button>
                <button class="btn btn-danger" type="button" data-dismiss="modal">
                    Cancel
                </button>
            </div>
        </div>
    </div>
</div>
<!-- END OF FORM KATEGORI MODAL -->

<!-- Modal Kategori Delete -->
<div class="modal fade" id="ModalDel" tabindex="-1" role="dialog" aria-labelledby="DialogModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #d9534f;">
                <h5 class="modal-title" id="ModalLabel01">
                    Hapus Produk
                </h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" style="background-color:#BBD6EC;">
                <p style="color: red; font-size: larger;text-align: center">Yakin menghapus data berikut..?</p>
                <h3 id="datanama" style="text-align: center; color: #d9534f"></h3>
                <form id="form-del">
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <input type="hidden" name="id" id="dataiddel">
                                <input type="hidden" name="filename" id="filename">
                                
                                <input type="hidden" id="proc02" name="proc" value="">
                            </div>                                    
                        </div>
                    </div>        
                </form>
            </div>
            <div class="modal-footer">
                <button onclick="deleteData();" class="btn btn-danger" type="button" data-dismiss="modal">
                    Delete
                </button>
                <button class="btn btn-info" type="button" data-dismiss="modal">
                    Cancel
                </button>
            </div>
        </div>
    </div>
</div>
<!-- End Of Modal Delete -->

<!-- Modal Error Aksi -->
<div class="modal fade" id="ModalError" tabindex="-1" role="dialog" aria-labelledby="DialogModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #d9534f;">
                <h5 class="modal-title" id="ModalLabel01">
                    ERROR...!!!
                </h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" style="background-color:#BBD6EC;">
                <h3 id="errnama" style="text-align: center; color: #d9534f"></h3>
            </div>
            <div class="modal-footer">
                <button class="btn btn-danger" type="button" data-dismiss="modal">
                    Tutup
                </button>
            </div>
        </div>
    </div>
</div>
<!-- End Of Modal Error Aksi -->

</main>
</div>
</div>

<script>
    function showModalAdd() {
        $('#id01').val(0);
        $('#ket').val('');
        $('#harga').val('');
        $('#stok').val('');
        $('#nama').val('');
        $("#gambarnya").attr('src', '');
        $("#userImage").val('');
        $("#katnama").val('');
        $("#filenm").val('');
        $("#proc01").val('new');
        $('#Modal01').modal('show');
    }
    function insertdata() {
        var id = document.getElementById('id01').value;
        var nama = document.getElementById('nama').value;
        var proc = document.getElementById('proc01').value;
        var katnama = document.getElementById('katnama').value;
        var harga = document.getElementById('harga').value;
        var stok = document.getElementById('stok').value;
        var ket = document.getElementById('ket').value;
        var filenm = document.getElementById('filenm').value;
        var ofile = document.getElementById('userImage').files[0];

        //alert(ofile.name);
        //alert(ofile.size);

        var formdata = new FormData();
        formdata.append("id", id);
        formdata.append("nama", nama);
        formdata.append("proc", proc);
        formdata.append("katnama", katnama);
        formdata.append("harga", harga);
        formdata.append("stok", stok);
        formdata.append("ket", ket);
        formdata.append("filename", filenm);
        formdata.append("media", ofile);

        $.ajax({
            type: "POST",
            url: "produk_aksi.php",
            data: formdata,
            cache: false,
            async: false,
            dataType: "json",
            mimeTypes: "multipart/form-data",
            contentType: false,
            processData: false,
            success: function (data) {
                if (data[0] == 0) {
                    alert(data[1]);
                } else {
                    $("#datalist").html(data[1]);
                }
            },
            error: function (err) {
                console.log(err);
            }
        });

    }
    function showModalEdt(id, nm) {
        $.ajax({
            type: "POST",
            url: "produk_aksi_cari.php",
            data: "proc=edit&datacari=" + id,
            cache: false,
            dataType: "json",
            success: function (data) {
                $('#id01').val(id);
                $('#harga').val(data.br_hrg);
                $('#stok').val(data.br_stok);
                $('#nama').val(data.br_nm);
                $("#userImage").val('');
                $("#gambarnya").attr('src', "../" + data.br_gbr);
                $('#ket').val(data.ket);
                $("#katnama").val(data.br_kat);
                $("#proc01").val('edit');
                $("#filenm").val(data.br_gbr);
                $('#Modal01').modal('show');
            },
            error: function (err) {
                console.log(err);
            }
        });
    }
    function searchdt(srch) {
        $.ajax({
            type: "POST",
            url: "produk_aksi_cari.php",
            data: {datacari: srch},
            cache: false,
            dataType: "json",
            success: function (data) {
                if (data[0] == 0) {
                    alert(data[1]);
                } else {
                    $("#datalist").html(data[1]);
                }

            },
            error: function (err) {
                console.log(err);
            }
        });
    }
    function showModalDel(id, nm, filename) {
        $('#dataiddel').val(id);
        $('#datanama').text(nm);
        $('#filename').val(filename);
        $('#proc02').val('delete');
        $('#ModalDel').modal('show');
    }
    function deleteData() {
        $.ajax({
            type: "POST",
            url: "produk_aksi.php",
            data: $("#form-del").serialize(),
            cache: false,
            dataType: "json",
            success: function (data) {
                if (data[0] == 0) {
                    $('#errnama').text(data[1]);
                    $('#ModalError').modal('show');
                } else {
                    $("#datalist").html(data[1]);
                }
            },
            error: function (err) {
                console.log(err);
            }
        });
    }

    function isNumberKey(evt) {
        var charCode = (evt.which) ? evt.which : event.keyCode
        if (charCode > 31 && (charCode < 48 || charCode > 57))
            return false;
        return true;
    }
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#gambarnya').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>
