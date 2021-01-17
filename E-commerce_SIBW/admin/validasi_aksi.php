<?php ini_set('display_errors', 'On'); error_reporting(E_ALL); include_once '../koneksi.php';

$formid = filter_input(INPUT_POST, 'formid', FILTER_SANITIZE_NUMBER_INT);

$query = "UPDATE pembelian SET sts_pem = 'Valid' WHERE id=$formid";
$result = mysqli_query($koneksi, $query);

if (!$result) {
$msg[0] = "0";
$msg[1] = mysqli_error($koneksi);
} else {
$query = "select * from pembelian order by no_pem desc";
$result = mysqli_query($koneksi, $query);
$i = 1;
$list = "";
$msg[0] = "1";
foreach ($result as $value) {
$list .= "<tr>
<td>" . $i . "</td>
<td style=\"white-space: nowrap\">" . $value['no_pem'] . "</td>
<td style=\"white-space: nowrap\">" . $value['tgl_pem'] . "</td>
<td style=\"white-space: nowrap\">" . $value['usr_pem'] . "</td>
<td style=\"white-space: nowrap\">" . $value['norek_pem'] . "</td>
<td style=\"white-space: nowrap\">" . $value['nmrek_pem'] . "</td>
<td style=\"white-space: nowrap\">" . $value['bankrek_pem'] . "</td>
<td style=\"text-align: right;white-space: nowrap\">" . $value['tot_pem'] . "</td>
<td style=\"white-space: nowrap\">" . $value['sts_pem'] . "</td>
<td nowrap style=\"text-align: center;\">
<button type=\"button\" onclick=\"showModalKonfirm(" . $value['id'] . ",'" . $value['no_pem'] . "');\" class=\"btn btn-success btn-sm\" title=\"Edit\">
OK
</button>
<button type=\"button\" onclick=\"showModalDel(" . $value['id'] . ",'" . $value['no_pem'] . "');\" class=\"btn btn-danger btn-sm\" title=\"Delete\">
Del
</button>
</td>
</tr>";
$i++;
}
$msg[1] = $list;
}
echo json_encode($msg);
