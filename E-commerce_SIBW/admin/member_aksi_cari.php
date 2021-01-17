<?php

ini_set('display_errors', 'On'); error_reporting(E_ALL);
include_once '../koneksi.php';

$datacari = filter_input(INPUT_POST, 'datacari', FILTER_SANITIZE_STRING);
$proc = filter_input(INPUT_POST, 'proc', FILTER_SANITIZE_URL);
if (empty($proc)) {
$query = "select * from member where nm_usr like '%$datacari%' or email_usr like '%$datacari%' order by id desc";
$result = mysqli_query($koneksi, $query);
$i = 1;
$list = "";
$msg[0] = "1";

foreach ($result as $value) {
	$list .= "<tr>
		<td>" . $i . "</td>
		<td>" . $value['email_usr'] . "</td>
		<td>" . $value['nm_usr'] . "</td>
		<td nowrap style=\"text-align: center; \">
		<button type=\"button\" onclick=\"showModalEdt(" . $value['id'] . ",'" . $value['nm_usr'] . "');\" class=\"btn btn-success btn-sm\" title=\"Edit\">
		Edit
		</button>
		<button type=\"button\" onclick=\"showModalDel(" . $value['id'] . ",'" . $value['nm_usr'] . "');\" class=\"btn btn-danger btn-sm\" title=\"Delete\">
		Delete
		</button>
		</td>
		</tr>";
		$si++;
}

$msg[1] = $list;
echo json_encode($msg);
exit();

} else {
	$query = "select * from member where id='$datacari";
	$result = mysqli_query($koneksi, $query);
	$list = mysqli_fetch_array($result);
	echo json_encode($list);
	exit();
}
?>