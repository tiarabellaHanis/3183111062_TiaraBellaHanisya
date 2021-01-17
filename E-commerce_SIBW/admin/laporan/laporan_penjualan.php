<?php 

ini_set('display_errors', 'On'); 
error_reporting(E_ALL);
include_once '../../koneksi.php';
require ('../fpdf182/fpdf.php');

#Ambil Data dari Table dan Masukan Ke Array
$query = "SET @NO_URUT=0"; 
mysqli_query($koneksi, $query);
$query = "SELECT ( @NO_URUT := @NO_URUT + 1 ) nomor,no_pem,tgl_pem,usr_pem,FORMAT(tot_pem,2) AS tot_pem FROM pembelian";
$result = mysqli_query($koneksi, $query);
$data = array();
while ($row = mysqli_fetch_assoc($result)) { 
	array_push($data, $row);
}
$query = "SET @NO_URUT=NULL"; 
mysqli_query($koneksi, $query);

#Setting Judul Laporan dan Header Table
$judul = "LAPORAN PENJUALAN";
$header = array(
    array("label" => "NO", "length" => 10, "align" => "C"), 
    array("label" => "INVOICE", "length" => 50, "align" => "C"),
    array("label" => "TANGGAL", "length" => 40, "align" => "C"), 
    array("label" => "MEMBER", "length" => 50, "align" => "C"),
    array("label" => "TOTAL", "length" => 40, "align" => "C")
);

$align = array(
    array("label" => "NO", "length" => 10, "align" => "C"), 
    array("label" => "INVOICE", "length" => 50, "align" => "C"), 
    array("label" => "TANGGAL", "length" => 40, "align" => "C"), 
    array("label" => "MEMBER", "length" => 50, "align" => "L"), 
    array("label" => "TOTAL", "length" => 40, "align" => "R")
);

#Sertakan Library FPDF dan Bentuk Objek
$pdf = new FPDF();
$pdf->AddPage();

#Tampilkan Judul Laporan
$pdf->SetFont('Arial', 'B', '16');
$pdf->Cell(0, 20, $judul, '0', 1, 'C');

#buat header tabel
$pdf->SetFont('Arial', '', '10');
$pdf->SetFillColor(255, 0, 0);
$pdf->SetTextColor(255);
$pdf->SetDrawColor(138, 0, 0);

foreach ($header as $kolom) {
$pdf->Cell($kolom['length'], 7, $kolom['label'], 1, '0', $kolom['align'], true);
}
$pdf->Ln();

#Tampilkan Data Tablenya
$pdf->SetFillColor(224, 235, 255);
$pdf->SetTextColor(0);
$pdf->SetFont('');
$fill = false;

foreach ($data as $baris) {
$i = 0;
foreach ($baris as $cell) {
$pdf->Cell($header[$i]['length'], 5, $cell, 1, '0', $align[$i]['align'], true);
$i++;
}
$fill = !$fill;
$pdf->Ln();
}

#Output File PDF
$pdf->Output();

?>