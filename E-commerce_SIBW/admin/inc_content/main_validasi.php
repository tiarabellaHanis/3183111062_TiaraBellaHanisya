<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
<h1 class="h2" style="font-family: Comic Sans MS;">Validasi Pembayaran</h1>
</div>

<div class="col-lg-8">

	<input class="form-control-sm py-3 px-4 border" type="search" value="" placeholder="Search" id="search" name="search" onkeyup="search(this.value);">
	<div class="table-responsive d-block d-md-table">
	<table class="table table-hover">
	<thead class="thead-light">
		<tr style="font-family: Comic Sans MS;">
		<th style="text-align: center;">NO</th>
		<th style="text-align: center;">Invoice</th>
		<th style="text-align: center;">Tanggal</th>
		<th style="text-align: center;">Member</th>
		<th style="text-align: center;white-space: nowrap">No. Rek</th>
		<th style="text-align: center;white-space: nowrap">Pemilik Rek</th>
		<th style="text-align: center;">Bank</th>
		<th style="text-align: center;">Total</th>
		<th style="text-align: center;">Status</th>
		<th style="text-align: center;">AKSI</th>
		</tr>
	</thead>
<tbody id="datalist">
	<?php
	require_once ("../koneksi.php");

	$varCnt=0;
	$sql="select * from pembelian order by no_pem desc";
	$result= mysqli_query($koneksi, $sql);
	while($data=mysqli_fetch_assoc($result)){
	$varCnt=$varCnt+1;
	$varId=$data['id'];
	$varInVoice=$data['no_pem'];
	$varTg=$data['tgl_pem'];
	$varNm=$data['usr_pem'];
	$varNoRek=$data['norek_pem'];
	$varNmRek=$data['nmrek_pem'];
	$varBank=$data['bankrek_pem'];
	$varTot=$data['tot_pem'];
	$varSts=$data['sts_pem'];
	?>

		<tr class="">
		<td><?php echo $varCnt;?></td>
		<td style="white-space: nowrap"><?php echo $varInVoice;?></td>
		<td style="white-space: nowrap"><?php echo $varTg;?></td>
		<td style="white-space: nowrap"><?php echo $varNm;?></td>
		<td style="white-space: nowrap"><?php echo $varNoRek;?></td>
		<td style="white-space: nowrap"><?php echo $varNmRek;?></td>
		<td style="white-space: nowrap"><?php echo $varBank;?></td>

		<td style="text-align: right;white-space: nowrap;">
		<?php echo number_format($varTot,2);?></td>
		<td style="white-space: nowrap"><?php echo $varSts;?></td>
		<td style="text-align: center;white-space: nowrap;">
		<button type="button" onclick="showModalKonfirm(<?php echo $varId;
		?>,'<?php echo $varInVoice; ?>');" class="btn btn-success btn-sm" title="Konfirmasi">
		<span id="fcheck" data-feather="check"></span>
		</button>
		<button type="button" onclick="showModalDel(<?php echo $varId; ?>,'<?php echo $varInVoice; ?>');" class="btn btn-danger btn-sm" title="Hapus">
		<span id="ftrash2" data-feather="trash-2"></span>
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
		<!-- FORM MODAL DIALOG -->
		<div class="modal fade" id="Modal01" tabindex="-1" role="dialog" aria- labelledby="DialogModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
		<div class="modal-content">
		<div class="modal-header" style="background-color: #337AB7;">
		<h5 class="modal-title" id="ModalLabel01"> Konfirmasi
		</h5>
		<button class="close" type="button" data-dismiss="modal" aria-label="close">
		<span aria-hidden="true">&times;</span>
		</button>
		</div>

		<div class="modal-body" style="background-color:#BBD6EC;">
		<p style="color: blue; font-size: larger;text-align: center">Yakin Validasi data

		<h3 id="datakonfir" style="text-align: center; color: #039"></h3>
		<form id="form01">
		<div class="row">
		<div class="col">
		<div class="form-group">
		<input type="hidden" name="formid" id="idkonf">
		<input type="hidden" id="proc01" name="proc" value="">
		</div>
		</div>
		</div>
		</form>
		</div>
		<div class="modal-footer">
		<button onclick="konfirm();" class="btn btn-success" type="button" data-
		 
		dismiss="modal">
		OK's
		</button>
		<button class="btn btn-danger" type="button" data-dismiss="modal"> Cancel
		</button>

		</div>
		</div>
		</div>
		</div>

	<!-- END OF FORM MODAL DIALOG -->
	<!-- Modal Delete -->
	<div class="modal fade" id="ModalDel" tabindex="-1" role="dialog" aria- labelledby="DialogModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
	<div class="modal-content">
	<div class="modal-header" style="background-color: #d9534f;">
	<h5 class="modal-title" id="ModalLabel01"> Delete
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
	<input type="hidden" name="formid" id="iddel">
	<input type="hidden" id="proc02" name="proc" value="">
	</div>
	</div>
	</div>
	</form>
	</div>
	<div class="modal-footer">

	<button onclick="delete_data();" class="btn btn-danger" type="button" data-dismiss="modal">Delete</button>
	<button class="btn btn-info" type="button" data-dismiss="modal"> Cancel</button>
	</div>
	</div>
	</div>
	</div>
	<!-- End Of Modal Delete -->
	<!-- Modal Error Aksi -->
	<div class="modal fade" id="ModalError" tabindex="-1" role="dialog" aria- labelledby="DialogModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document">
	<div class="modal-content">
	<div class="modal-header" style="background-color: #d9534f;">
	<h5 class="modal-title" id="ModalLabel01"> ERROR...!!!
	</h5>
	<button class="close" type="button" data-dismiss="modal" aria-label="close">
	<span aria-hidden="true">&times;</span>
	</button>
	</div>
	<div class="modal-body" style="background-color:#BBD6EC;">
	<h3 id="errnama" style="text-align: center; color: #d9534f"></h3>
	</div>
	<div class="modal-footer">
	<button class="btn btn-danger" type="button" data-dismiss="modal"> Tutup
	</button>
	</div>
	</div>
	</div>
	</div>
	<!-- End Of Modal Error Aksi -->

<script>

	function showModalKonfirm(id,nm) {
		$('#idkonf').val(id);
		$('#datakonfir').text(nm);
		$('#proc01').val('edit');
		$('#Modal01').modal('show');
	}

		
	function konfirm() {
		$.ajax({
		type: "POST",
		url: "validasi_aksi.php",
		data: $("#form01").serialize(), cache: false,
		dataType: "json", success: function (data) {
		if(data[0]==0){
		$('#errnama').text(data[1]);
		$('#ModalError').modal('show');
		}else{
		$("#datalist").html(data[1]);
	}
},
	error: function (err) { console.log(err);
	}
	});
}

	function search(srch) {
		$.ajax({
		type: "POST",
		url: "validasi_aksi_cari.php", data: { datacari: srch }, cache: false,
		dataType: "json", success: function (data) {
		if(data[0]==0){
		alert(data[1]);
		}else{
		$("#datalist").html(data[1]);
	}
		$("#fcheck").html('<span id="fcheck" data-feather="check"></span>');
	},
		error:function(err) {
			console.log(err);
	}
		});
	}

	
	function showModalDel(id,nm) {
		$('#iddel').val(id);
		$('#datanama').text(nm);
		$('#proc02').val('delete');
		$('#ModalDel').modal('show');
	}
		
		
	function delete_data() {
		$.ajax({
		type: "POST",
		url: "validasi_aksi.php",
		data: $("#form-del").serialize(), cache: false,
		dataType: "json", success: function (data) {
		if(data[0]==0){
		$('#errnama').text(data[1]);
		$('#ModalError').modal('show');
		}else{
		$("#datalist").html(data[1]);
	}
},
		error: function (err) { console.log(err);
		}
	});
}

</script>
