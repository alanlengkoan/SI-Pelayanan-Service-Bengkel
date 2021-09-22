<?php
$id     = $_POST['id'];
$query  = $pdo->GetWhere('tb_bengkel', 'id_bengkel', $id);
$row    = $query->fetch(PDO::FETCH_OBJ);
$nmaGambarDb = $row->gambar;
// menghapus foto yg tersimpan dalam file dan akan diganti
if ($nmaGambarDb != '' || $nmaGambarDb != null) {
    if (file_exists("../../../assets/uploads/pohon/" . $nmaGambarDb)) {
        unlink("../../../assets/uploads/pohon/" . $nmaGambarDb);
    }
}

// untuk fungsi delete parameternya (nama_tabel, id, id_value)
$delete = $pdo->Delete("tb_bengkel", "id_bengkel", $id);
if ($delete == 1) {
    exit(json_encode(array('title' => 'Berhasil!', 'text' => 'Data telah dihapus!', 'type' => 'success', 'button' => 'Ok!')));
} else {
    exit(json_encode(array('title' => 'Gagal!', 'text' => 'Data tidak dapat dihapus!', 'type' => 'error', 'button' => 'Ok!')));
}