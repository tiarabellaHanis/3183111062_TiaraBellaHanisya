<?php
include_once '../koneksi.php';

$id = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT);
$br_nm = filter_input(INPUT_POST, 'nama', FILTER_SANITIZE_STRING);
$br_hrg = filter_input(INPUT_POST, 'harga', FILTER_VALIDATE_INT);
$stok = filter_input(INPUT_POST, 'stok', FILTER_VALIDATE_INT);
$ket = filter_input(INPUT_POST, 'ket', FILTER_SANITIZE_STRING);
$br_kat = filter_input(INPUT_POST, 'katnama', FILTER_SANITIZE_STRING);
$proc = filter_input(INPUT_POST, 'proc', FILTER_SANITIZE_STRING);
$filename_old = filter_input(INPUT_POST, 'filename', FILTER_SANITIZE_STRING);

define("UPLOAD_DIR", "../produk_img/");

if ($id == 0) {

    if (!empty($_FILES["media"])) {
        $media = $_FILES["media"];
        $ext = pathinfo($_FILES["media"]["name"], PATHINFO_EXTENSION);
        $size = $_FILES["media"]["size"];
        $tgl = date("Y-m-d");
        if ($media["error"] !== UPLOAD_ERR_OK) {
            echo 'Gagal upload file...!!';
            exit;
        }
        // rename file
        $name = preg_replace("/[^A-Z0-9._-]/i", "_", $media["name"]);
        // prevent overwrite filename
        $i = 0;
        $parts = pathinfo($name);
        while (file_exists(UPLOAD_DIR . $name)) {
            $i++;
            $name = $parts["filename"] . "-" . $i . "." . $parts["extension"];
        }
        $success = move_uploaded_file($media["tmp_name"], UPLOAD_DIR . $name);
        if ($success) {
            $br_gbr = "produk_img/" . $name;
            $query = "INSERT INTO produk (br_nm, br_item, br_hrg, br_stok, br_satuan, br_gbr, ket, br_sts, br_kat) "
                    . "VALUE ('$br_nm','1','$br_hrg','$stok','Pcs','$br_gbr','$ket','Y','$br_kat')";
        } else {
            $msg[0] = "0";
            $msg[1] = "Gagal Upload..!!";
            echo json_encode($msg);
            exit();
        }
        
        chmod(UPLOAD_DIR . $name, 0644);
    }
} elseif ($id >= 1) {
    if ($proc == 'edit') {
        if (!empty($_FILES["media"])) {
            $media = $_FILES["media"];
            $ext = pathinfo($_FILES["media"]["name"], PATHINFO_EXTENSION);
            $size = $_FILES["media"]["size"];
            $tgl = date("Y-m-d");
            if ($media["error"] !== UPLOAD_ERR_OK) {
                echo 'Gagal upload file...!!';
                exit;
            }
            // rename file
            $name = preg_replace("/[^A-Z0-9._-]/i", "_", $media["name"]);
            // prevent overwrite filename
            $i = 0;
            $parts = pathinfo($name);
            while (file_exists(UPLOAD_DIR . $name)) {
                $i++;
                $name = $parts["filename"] . "-" . $i . "." . $parts["extension"];
            }
            $success = move_uploaded_file($media["tmp_name"], UPLOAD_DIR . $name);
            if ($success) {
                $file = "../" . $filename_old;
                if (!unlink($file)) {
                    //echo ("Error deleting $file");
                } else {
                    //echo ("Deleted $file");
                }
                $br_gbr = "produk_img/" . $name;
                $query = "UPDATE produk SET br_nm = '$br_nm', br_hrg = '$br_hrg', br_stok='$stok', br_gbr='$br_gbr', ket='$ket', br_kat='$br_kat' WHERE br_id=$id";
            } else {
                $msg[0] = "0";
                $msg[1] = "Gagal Upload..!!";
                echo json_encode($msg);
                exit();
            }
            chmod(UPLOAD_DIR . $name, 0644);
        } else {
            $query = "UPDATE produk SET br_nm = '$br_nm', br_hrg = '$br_hrg', br_stok='$stok', ket='$ket', br_kat='$br_kat' WHERE br_id=$id";
        }
    } elseif ($proc == 'delete') {
        $file = "../" . $filename_old;
        if (!unlink($file)) {
        } else {
        }
        $query = "DELETE FROM produk WHERE br_id=$id";
    }
}
$result = mysqli_query($koneksi, $query);
if (!$result) {
    $msg[0] = "0";
    $msg[1] = mysqli_error($koneksi);
} else {
    $query = "select * from produk order by br_id desc";
    $result = mysqli_query($koneksi, $query);
    $i = 1;
    $list = "";
    $msg[0] = "1";
    foreach ($result as $value) {
        $list .= "<tr>
                <td>" . $i . "</td>
                <td>" . $value['br_nm'] . "</td>
                <td>" . $value['br_hrg'] . "</td>
                <td>" . $value['br_stok'] . "</td>
                <td>" . $value['ket'] . "</td>
                <td>
                    <img class=\"mb-4\" src=\"../" . $value['br_gbr'] . "\" alt=\"\" style=\"max-width: 100px;height: auto;\">
                </td>
                <td nowrap style=\"text-align: center;\">
                    <button type=\"button\" onclick=\"showModalEdt(" . $value['br_id'] . ",'" . $value['br_nm'] . "');\" class=\"btn btn-success btn-sm\" title=\"Edit\">
                         Edit
                    </button>
                    <button type=\"button\" onclick=\"showModalDel(" . $value['br_id'] . ",'" . $value['br_nm'] . "','" . $value['br_gbr'] . "');\" class=\"btn btn-danger btn-sm\" title=\"Delete\">
                         Del
                    </button>
                </td>
            </tr>";
        $i++;
    }
    $msg[1] = $list;
}
echo json_encode($msg);
