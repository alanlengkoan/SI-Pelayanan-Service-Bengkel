<?php
$post = $_POST;

$awal  = strip_tags($_POST['inpawal']);
$akhir = strip_tags($_POST['inpakhir']);
$jarak = strip_tags($_POST['inpjarak']);



if (empty($post['inpidevaluasi'])) {
    // untuk fungsi INSERT parameternya (nama_tabel, nama_kolom, nama_value/nama_hasil)
    $insert = $pdo->Insert("tb_evaluasi", ["awal", "akhir", "jarak"], [$awal, $akhir, $jarak]);
    if ($insert == 1) {
        exit(json_encode(array('title' => 'Berhasil!', 'text' => 'Data ditambah.', 'type' => 'success', 'button' => 'Ok!')));
    } else {
        exit(json_encode(array('title' => 'Gagal!', 'text' => 'Data gagal ditambah.', 'type' => 'error', 'button' => 'Ok!')));
    }
} else {
    $id = strip_tags($_POST['inpidevaluasi']);

    $update = $pdo->Update("tb_evaluasi", "id_evaluasi", $id, ["awal", "akhir", "jarak"], [$awal, $akhir, $jarak]);
    if ($update == 1) {
        exit(json_encode(array('title' => 'Berhasil!', 'text' => 'Data diubah.', 'type' => 'success', 'button' => 'Ok!')));
    } else {
        exit(json_encode(array('title' => 'Gagal!', 'text' => 'Data tidak diubah.', 'type' => 'error', 'button' => 'Ok!')));
    }
}