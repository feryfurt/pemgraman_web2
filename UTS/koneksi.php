<?php
mysqli_report(MYSQLI_REPORT_OFF);

$db_host = 'localhost';
$db_user = 'root';
$db_password = '';
$db_name = 'pendaftarandb';

$conn = new mysqli($db_host, $db_user, $db_password);

if ($conn->connect_error) {
    die('Koneksi MySQL gagal: ' . htmlspecialchars($conn->connect_error, ENT_QUOTES, 'UTF-8'));
}

if (!$conn->query("CREATE DATABASE IF NOT EXISTS `$db_name` CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci")) {
    die('Database gagal disiapkan: ' . htmlspecialchars($conn->error, ENT_QUOTES, 'UTF-8'));
}

if (!$conn->select_db($db_name)) {
    die('Database gagal dipilih: ' . htmlspecialchars($conn->error, ENT_QUOTES, 'UTF-8'));
}

$conn->set_charset('utf8mb4');

$sql_table = "CREATE TABLE IF NOT EXISTS pendaftar (
    id INT AUTO_INCREMENT PRIMARY KEY,
    tgl_input DATE NOT NULL,
    kode VARCHAR(20) NOT NULL,
    nama VARCHAR(100) NOT NULL,
    jk VARCHAR(20) NOT NULL,
    asal_sekolah VARCHAR(150) NOT NULL,
    pekerjaan_ortu VARCHAR(100) NOT NULL,
    tempat_lahir VARCHAR(100) NOT NULL,
    tgl_lahir DATE NOT NULL,
    mat INT NOT NULL,
    bing INT NOT NULL,
    umum INT NOT NULL,
    rata DECIMAL(6,2) NOT NULL,
    keterangan VARCHAR(30) NOT NULL,
    tempat_tes VARCHAR(50) NOT NULL
)";

if (!$conn->query($sql_table)) {
    die('Tabel pendaftar gagal disiapkan: ' . htmlspecialchars($conn->error, ENT_QUOTES, 'UTF-8'));
}
?>
