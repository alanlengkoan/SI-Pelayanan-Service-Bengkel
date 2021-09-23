<?php
$post = $_POST;

$id_oto     = $myfun->get_id_otomatis('tb_users', 'id_users');  // is users
$node       = strip_tags($_POST['inpnode']);
$nama       = strip_tags($_POST['inpnama']);
$alamat     = strip_tags($_POST['inpalamat']);
$latitude   = strip_tags($_POST['inplatitude']);
$longitude  = strip_tags($_POST['inplongitude']);

$usernm = $nama;
$passwd = 1234567;
$level  = 'bengkel';

if (empty($post['inpidbengkel'])) {
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
            $passhash = password_hash($passwd, PASSWORD_DEFAULT);
            $pdo->Insert("tb_users", ["id_users", "nama", "username", "password", "level"], [$id_oto, $nama, $usernm, $passhash, $level]);

            $insert = $pdo->Insert("tb_bengkel", ["id_users", "node", "nama", "alamat", "gambar", "latitude", "longitude"], [$id_oto, $node, $nama, $alamat, $nmaGambar, $latitude, $longitude]);
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
} else {
    $id = strip_tags($_POST['inpidbengkel']);

    // mengecek nama gambar dari database
    $query  = $pdo->GetWhere('tb_bengkel', 'id_bengkel', $id);
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
                $update = $pdo->Update("tb_bengkel", "id_bengkel", $id, ["node", "nama", "alamat", "gambar", "latitude", "longitude"], [$node, $nama, $alamat, $nmaGambar, $latitude, $longitude]);

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
        $update = $pdo->Update("tb_bengkel", "id_bengkel", $id, ["node", "nama", "alamat", "latitude", "longitude"], [$node, $nama, $alamat, $latitude, $longitude]);
        if ($update == 1) {
            exit(json_encode(array('title' => 'Berhasil!', 'text' => 'Data diubah.', 'type' => 'success', 'button' => 'Ok!')));
        } else {
            exit(json_encode(array('title' => 'Gagal!', 'text' => 'Data tidak diubah.', 'type' => 'error', 'button' => 'Ok!')));
        }
    }
}