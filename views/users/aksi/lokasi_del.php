<?php
$id = $_POST['id'];
// untuk fungsi delete parameternya (nama_tabel, id, id_value)
$delete = $pdo->Delete("tb_lokasi", "id_lokasi", $id);

if ($delete == 1) {
    exit(json_encode(array('title' => 'Berhasil!', 'text' => 'Data telah dihapus!', 'type' => 'success', 'button' => 'Ok!')));
} else {
    exit(json_encode(array('title' => 'Gagal!', 'text' => 'Data tidak dapat dihapus!', 'type' => 'error', 'button' => 'Ok!')));
}
