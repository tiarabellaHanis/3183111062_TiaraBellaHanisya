<?php

ini_set('display_errors','On');
errpr_reporting(E_ALL);
include_once '../koneksi.php';

$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
$password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);
$fullname = filter_input(INPUT_POST, 'fullname', FILTER_SANITIZE_STRING);
$formid = filter_input(INPUT_POST, 'formid', FILTER_SANITIZE_NUMBER_INT);
$proc = filter_input(INPUT_POST, 'proc', FILTER_SANITIZE_URL);

if ($formid == 0) {
	$query = "INSERT INTO member (nm_usr, pas_usr, email_usr)". "VALUE ('$fullname', '$password', '$email')";

} elseif ($formid >=1) {
	if($proc=='edit') {
		if(empty($password)) {
		$query = "UPDATE member SET nm_usr = '$fullname', email_usr ='$email', WHERE id=$formid";
	} else {
		$query = "UPDATE member SET pas_usr = '$password', nm_usr ='$fullname', email_usr ='$email', WHERE id=$formid";
	}
} elseif ($proc=='delete') {
	$query = "DELETE FROM member WHERE id=$formid";
}
}

$result = mysqli_query($koneksi, $query);

if (!$result) {
	$msg[0] = "0";
	$msg[1] = mysqli_error($koneksi);

} else {
	$query = "select * from member order by nm_usr desc";
	$result = mysqli_query($koneksi, $query);
	$si = 1;
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
	$ms[1] = $list;
}
echo json_encode($msg);
?>