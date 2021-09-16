<?php
$id_oto = $myfun->get_id_otomatis('tb_users', 'id_users');  // is users
$nama   = htmlspecialchars($_POST['inpnama'], ENT_QUOTES);
$usernm = htmlspecialchars($_POST['inpusername'], ENT_QUOTES);
$passnm = htmlspecialchars($_POST['inppassword1'], ENT_QUOTES);
$passwd = htmlspecialchars($_POST['inppassword2'], ENT_QUOTES);
$level  = 'users';

$nik     = htmlspecialchars($_POST['inpnik'], ENT_QUOTES);
$no_hp   = htmlspecialchars($_POST['inpnohp'], ENT_QUOTES);
$tmp_lhr = htmlspecialchars($_POST['inptmplhr'], ENT_QUOTES);
$tgl_lhr = htmlspecialchars($_POST['inptgllhr'], ENT_QUOTES);
$jen_kel = htmlspecialchars($_POST['inpjeniskelamin'], ENT_QUOTES);
$alamat  = htmlspecialchars($_POST['inpalamat'], ENT_QUOTES);

if ($passnm != $passwd) {
    echo "Password tidak sama!";
} else {

    $passhash = password_hash($passwd, PASSWORD_DEFAULT);
    $ins1 = $pdo->Insert("tb_users", ["id_users", "nama", "username", "password", "level"], [$id_oto, $nama, $usernm, $passhash, $level]);
    $ins2 = $pdo->Insert("tb_member", ["id_users", "nik", "no_hp", "tmp_lahir", "tgl_lahir", "jen_kel", "alamat"], [$id_oto, $nik, $no_hp, $tmp_lhr, $tgl_lhr, $jen_kel, $alamat]);

    if ($ins1 == 1 || $ins2 == 1) {
        exit(json_encode(array('title' => 'Berhasil!', 'text' => 'Anda berhasil mendaftar!', 'type' => 'success', 'button' => 'Ok!')));
    } else {
        exit(json_encode(array('title' => 'Gagal!', 'text' => 'Maaf Anda tidak dapat mendaftar!', 'type' => 'error', 'button' => 'Ok!')));
    }
}
