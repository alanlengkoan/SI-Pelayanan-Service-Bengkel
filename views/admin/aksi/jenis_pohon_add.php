<?php
$jenistanaman = strip_tags($_POST['inpjenistanaman']);
$keterangan = strip_tags($_POST['inpketerangan']);

// untuk format foto
$formatGambar = array('jpeg', 'jpg', 'png');
// untuk ukuran foto
$ukuranGambar = 10 * 1024 * 1024;
// untuk nama gambar
$nmaGambar = $_FILES['inpgambar']['name'];
$tmpGambar = $_FILES['inpgambar']['tmp_name'];
$szeGambar = $_FILES['inpgambar']['size'];
$errGambar = $_FILES['inpgambar']['error'];

if ($errGambar == 0) {
    if ($szeGambar > $ukuranGambar) {
        exit(json_encode(array('title' => 'Peringatan!', 'text' => 'Ukuran Gambar terlalu besar!', 'type' => 'warning', 'button' => 'Ok!')));
    } else if (!in_array(pathinfo($nmaGambar, PATHINFO_EXTENSION), $formatGambar)) {
        exit(json_encode(array('title' => 'Peringatan!', 'text' => 'Ektensi gambar tidak sesuai yg diperbolehkan hanya jpeg, jpg dan png!', 'type' => 'warning', 'button' => 'Ok!')));
    } else if (file_exists("../../../assets/uploads/pohon/" . $nmaGambar)) {
        exit(json_encode(array('title' => 'Peringatan!', 'text' => 'Nama Gambar sudah ada silahkan diganti!', 'type' => 'warning', 'button' => 'Ok!')));
    } else {
        // untuk fungsi INSERT parameternya (nama_tabel, nama_kolom, nama_value/nama_hasil)
        $insert = $pdo->Insert("tb_responden", ["responden", "keterangan", "gambar"], [$jenistanaman, $keterangan, $nmaGambar]);
        if ($insert == 1) {
            // upload gambar atau menyimpan gambar
            move_uploaded_file($tmpGambar, "../../../assets/uploads/pohon/" . basename($nmaGambar));
            exit(json_encode(array('title' => 'Berhasil!', 'text' => 'Data ditambah.', 'type' => 'success', 'button' => 'Ok!')));
        } else {
            exit(json_encode(array('title' => 'Gagal!', 'text' => 'Data gagal ditambah.', 'type' => 'error', 'button' => 'Ok!')));
        }
    }
} else {
    exit(json_encode(array('title' => 'Gagal!', 'text' => 'Terjadi kesalahan pada gambar!', 'type' => 'error', 'button' => 'Ok!')));
}