<?php

define('DB_HOST', '127.0.0.1'); // Host database
define('DB_USER', 'suhailahnfsella'); // Nama pengguna database
define('DB_PASS', 'Sella250104*'); // Kata sandi database
define('DB_NAME', 'dbsuaracapres'); // Nama database

function get_connection() {
    $conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    
    if ($conn->connect_error) {
        throw new Exception("Koneksi database gagal: " . $conn->connect_error);
    }
    return $conn;
}
?>
