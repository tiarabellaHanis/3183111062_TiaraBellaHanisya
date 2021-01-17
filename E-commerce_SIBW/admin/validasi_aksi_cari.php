<?php ini_set('display_errors', 'On'); error_reporting(E_ALL);
include_once '../koneksi.php';

$datacari = filter_input(INPUT_POST, 'datacari', FILTER_SANITIZE_STRING);
$proc = filter_input(INPUT_POST, 'proc', FILTER_SANITIZE_URL); if (empty($proc)) {
$query = "select * from pembelian where no_pem like '%$datacari%' or usr_pem like '%$datacari%' order by id desc";
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
<td style=\"text-align: right;white-space: nowrap\">" . number_format($value['tot_pem'], 2) .
"</td>
<td style=\"white-space: nowrap\">" . $value['sts_pem'] . "</td>
<td nowrap style=\"text-align: center;\">
<button type=\"button\" onclick=\"showModalKonfirm(" . $value['id'] . ",'" . $value['no_pem'] .
"');\" class=\"btn btn-success btn-sm\" title=\"Edit\">
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
echo json_encode($msg); exit();
} else {
$query = "select * from pembelian where id='$datacari'";
$result = mysqli_query($koneksi, $query);
$list = mysqli_fetch_array($result); echo json_encode($list);
exit();
}
?>