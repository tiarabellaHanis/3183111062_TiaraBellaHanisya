<?php

ini_set('display_errors', 'On');
error_reporting(E_ALL);
include_once '../koneksi.php';

$kategori_kode = filter_input(INPUT_POST, 'kategorikode', FILTER_SANITIZE_URL);
$kategori_nama = filter_input(INPUT_POST, 'kategorinama', FILTER_SANITIZE_URL);
$kategoriid = filter_input(INPUT_POST, 'kategoriid', FILTER_SANITIZE_URL);
$proc = filter_input(INPUT_POST, 'proc', FILTER_SANITIZE_URL);

if ($kategoriid == 0) {
    $query = "INSERT INTO produk_kategori (kategori_kode,kategori_nama) "
            . "VALUE ('$kategori_kode','$kategori_nama')";
} elseif ($kategoriid >= 1) {
    if ($proc=='edit'){
        $query = "UPDATE produk_kategori SET kategori_kode = '$kategori_kode', kategori_nama = '$kategori_nama' WHERE id=$kategoriid";
    }elseif ($proc=='delete') {
        $query = "DELETE FROM produk_kategori WHERE id=$kategoriid";
    }
}

$result = mysqli_query($koneksi, $query);

if (!$result) {
    $msg[0] = "0";
    $msg[1] = mysqli_error($koneksi);
} else {
    $query = "select * from produk_kategori order by id desc";
    $result = mysqli_query($koneksi, $query);
    $i = 1;
    $list = "";
    $msg[0] = "1";
    foreach ($result as $value) {
        $list .= "<tr>
                <td>" . $i . "</td>
                <td>" . $value['kategori_kode'] . "</td>
                <td>" . $value['kategori_nama'] . "</td>
                <td nowrap style=\"text-align: center;\">
                    <button type=\"button\" onclick=\"showModalKatEdt(" . $value['id'] . ",'" . $value['kategori_nama'] . "');\" class=\"btn btn-success btn-sm\" title=\"Delete\">
                         Edit
                    </button>
                    <button type=\"button\" onclick=\"showModalKatDel(" . $value['id'] . ",'" . $value['kategori_nama'] . "');\" class=\"btn btn-danger btn-sm\" title=\"Delete\">
                         Del
                    </button>
                </td>
            </tr>";
        $i++;
    }
    $msg[1] = $list;
}
echo json_encode($msg);
