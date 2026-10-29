<?php
$data = [];

if (isset($_POST['simpan'])) {
    $kode = strtoupper(substr($_POST['tempat_tes'], 0, 1))
          . strtoupper(substr($_POST['gelombang'], 0, 1))
          . "-" . $_POST['nomor'] . "-" . date("m");

    $nama = $_POST['nama'];
    $jk = $_POST['jk'];
    $tgl = $_POST['tgl'];
    $asal = $_POST['asal'];
    $pekerjaan = $_POST['pekerjaan'];

    $mat = (float) $_POST['mat'];
    $inggris = (float) $_POST['inggris'];
    $umum = (float) $_POST['umum'];

    $rata = ($mat + $inggris + $umum) / 3;

    if ($rata >= 70) {
        $ket = "Lulus";
    } elseif ($rata >= 60) {
        $ket = "Cadangan";
    } else {
        $ket = "Tidak Lulus";
    }

    $data[] = [
        $kode, $nama, $tgl, $jk, $asal,
        $pekerjaan, $mat, $inggris, $umum,
        number_format($rata, 2), $ket
    ];
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Input Pendaftaran Mahasiswa</title>
</head>
<body>

<h2>INPUT PENDAFTARAN MAHASISWA BARU</h2>

<form method="POST">
    Tempat Tes:
    <select name="tempat_tes" required>
        <option value="A">Gedung A</option>
        <option value="B">Gedung B</option>
        <option value="V">Vikur</option>
    </select>
    <br><br>

    Gelombang:
    <select name="gelombang" required>
        <option value="1">Gelombang 1</option>
        <option value="2">Gelombang 2</option>
        <option value="3">Gelombang 3</option>
    </select>
    <br><br>

    Nomor Pendaftaran:
    <input type="number" name="nomor" required>
    <br><br>

    Nama Pendaftar:
    <input type="text" name="nama" required>
    <br><br>

    Jenis Kelamin:
    <input type="radio" name="jk" value="Laki-laki" required> Laki-laki
    <input type="radio" name="jk" value="Perempuan"> Perempuan
    <br><br>

    Tanggal Lahir:
    <input type="date" name="tgl" required>
    <br><br>

    Asal Sekolah:
    <input type="text" name="asal" required>
    <br><br>

    Pekerjaan Orang Tua:
    <input type="text" name="pekerjaan" required>
    <br><br>

    Nilai Matematika:
    <input type="number" name="mat" min="0" max="100" required>
    <br><br>

    Nilai Bahasa Inggris:
    <input type="number" name="inggris" min="0" max="100" required>
    <br><br>

    Nilai Pengetahuan Umum:
    <input type="number" name="umum" min="0" max="100" required>
    <br><br>

    <button type="submit" name="simpan">Simpan</button>
    <button type="reset">Reset</button>
</form>

<hr>

<h2>TABEL DATA PENDAFTAR</h2>

<table border="1" cellpadding="5" cellspacing="0">
    <tr>
        <th>Kode</th>
        <th>Nama</th>
        <th>Tanggal Lahir</th>
        <th>JK</th>
        <th>Asal Sekolah</th>
        <th>Pekerjaan Ortu</th>
        <th>Matematika</th>
        <th>Inggris</th>
        <th>Umum</th>
        <th>Rata-rata</th>
        <th>Keterangan</th>
    </tr>

    <?php foreach ($data as $d): ?>
    <tr>
        <?php foreach ($d as $nilai): ?>
            <td><?= htmlspecialchars((string)$nilai) ?></td>
        <?php endforeach; ?>
    </tr>
    <?php endforeach; ?>
</table>

</body>
</html>