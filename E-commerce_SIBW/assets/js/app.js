	$( document ).ready(function() {

	 $.ajax({
	 type: "GET",
	 dataType: "html",
	 url: "cekkota.php?q=kotaasal",
	 success: function(msg){
	 $("select#kota_asal").html(msg);
	 }
	 });

	 $.ajax({
	 type: "GET",
	 dataType: "html",
	 url: "cekkota.php?q=kotatujuan",
	 success: function(msg){
	 $("select#kota_tujuan").html(msg);
	 }
	 });

	 $("#ongkir").submit(function(e) {
	 e.preventDefault();
	 $.ajax({
	 url: 'cekongkir.php',
	 type: 'post',
	 data: $( this ).serialize(),
	 success: function(data) {
	 console.log(data);
 	document.getElementById("response_ongkir").innerHTML = data;
 }
 });
 });
});