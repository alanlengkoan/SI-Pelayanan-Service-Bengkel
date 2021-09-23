<?php
// untuk token mencegah terjadi perulangan
if (!isset($_SESSION['token'])) {
    $_SESSION['token'] = base64_encode(openssl_random_pseudo_bytes(26));
}

// untuk proses masuk
if ($_SESSION['token'] == $_POST['_token_form']) {
    $username = htmlspecialchars($_POST['username'], ENT_QUOTES);
    $password = htmlspecialchars($_POST['password'], ENT_QUOTES);
    $check    = isset($_POST['ingat_saya']) ? $_POST['ingat_saya'] : '';

    $query = $pdo->Query("SELECT * FROM tb_users WHERE username = '$username'");
    $data  = $query->fetch(PDO::FETCH_OBJ);

    if ($query->rowCount() > 0) {
        if ($data->status_akun == 1) {
            if (password_verify($password, $data->password)) {
                // untuk mengecek level user
                if ($data->level == 'admin') {
                    // set session
                    $_SESSION['id_users'] = $data->id_users;
                    $_SESSION['login']    = true;
                    // untuk mengenerate session id
                    session_regenerate_id();
                    // mengecek ingat saya
                    if ($check) {
                        setcookie('id_users', $data->id_users, time() + 3600, '/', $_SERVER['SERVER_NAME']);
                        setcookie('key', $_SESSION['token'], time() + 3600, '/', $_SERVER['SERVER_NAME']);
                    }

                    exit(json_encode(array('status' => true, 'link' => '../views/admin/dashboard')));
                } else if ($data->level == 'users') {
                    // set session
                    $_SESSION['id_users'] = $data->id_users;
                    $_SESSION['login']    = true;
                    // untuk mengenerate session id
                    session_regenerate_id();
                    // mengecek ingat saya
                    if ($check) {
                        setcookie('id_users', $data->id_users, time() + 3600, '/', $_SERVER['SERVER_NAME']);
                        setcookie('key', $_SESSION['token'], time() + 3600, '/', $_SERVER['SERVER_NAME']);
                    }

                    exit(json_encode(array('status' => true, 'link' => '../views/users/dashboard')));
                } else if ($data->level == 'bengkel') {
                    // set session
                    $_SESSION['id_users'] = $data->id_users;
                    $_SESSION['login']    = true;
                    // untuk mengenerate session id
                    session_regenerate_id();
                    // mengecek ingat saya
                    if ($check) {
                        setcookie('id_users', $data->id_users, time() + 3600, '/', $_SERVER['SERVER_NAME']);
                        setcookie('key', $_SESSION['token'], time() + 3600, '/', $_SERVER['SERVER_NAME']);
                    }

                    exit(json_encode(array('status' => true, 'link' => '../views/bengkel/dashboard')));
                }
            } else {
                exit(json_encode(array('title' => 'Gagal!', 'text' => 'Username atau Password yang Anda masukkan Salah!', 'type' => 'error', 'button' => 'Sip!')));
            }
        } else {
            exit(json_encode(array('title' => 'Gagal!', 'text' => 'Username atau Password yang Anda masukkan Salah!', 'type' => 'error', 'button' => 'Sip!')));
        }
    } else {
        exit(json_encode(array('title' => 'Gagal!', 'text' => 'Username atau Password yang Anda masukkan Salah!', 'type' => 'error', 'button' => 'Sip!')));
    }
} else {
    exit(json_encode(array('title' => 'Gagal!', 'text' => 'Jangan nakal.', 'type' => 'error', 'button' => 'Sip!')));
}
