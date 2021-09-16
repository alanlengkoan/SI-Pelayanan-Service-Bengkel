<?php
$id = strip_tags($_POST['inpidresponden']);
$jenistanaman = strip_tags($_POST['inpjenistanaman']);
$keterangan = strip_tags($_POST['inpketerangan']);
// mengecek nama gambar dari database
$query  = $pdo->GetWhere('tb_responden', 'id_responden', $id);
$row    = $query->fetch(PDO::FETCH_OBJ);
$nmaGambarDb = $row->gambar;
// untuk mengecek apa bila terjadi perubahan data
if (isset($_POST['ubah_gambar'])) {
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
      $update = $pdo->Update("tb_responden", "id_responden", $id, ["responden", "keterangan", "gambar"], [$jenistanaman, $keterangan, $nmaGambar]);

      if ($update == 1) {
        // menghapus foto yg tersimpan dalam file dan akan diganti
        if ($nmaGambarDb != '' || $nmaGambarDb != null) {
          if (file_exists("../../../assets/uploads/pohon/" . $nmaGambarDb)) {
            unlink("../../../assets/uploads/pohon/" . $nmaGambarDb);
          }
        }
        // upload gambar atau menyimpan gambar
        move_uploaded_file($tmpGambar, "../../../assets/uploads/pohon/" . basename($nmaGambar));
        exit(json_encode(array('title' => 'Berhasil!', 'text' => 'Data diubah.', 'type' => 'success', 'button' => 'Ok!')));
      } else {
        exit(json_encode(array('title' => 'Gagal!', 'text' => 'Data tidak diubah.', 'type' => 'error', 'button' => 'Ok!')));
      }
    }
  } else {
    exit(json_encode(array('title' => 'Gagal!', 'text' => 'Terjadi kesalahan pada gambar!', 'type' => 'error', 'button' => 'Ok!')));
  }
} else {
  $update = $pdo->Update('tb_responden', 'id_responden', $id, ['responden', 'keterangan'], [$jenistanaman, $keterangan]);
  if ($update == 1) {
    exit(json_encode(array('title' => 'Berhasil!', 'text' => 'Data diubah.', 'type' => 'success', 'button' => 'Ok!')));
  } else {
    exit(json_encode(array('title' => 'Gagal!', 'text' => 'Data tidak diubah.', 'type' => 'error', 'button' => 'Ok!')));
  }
}