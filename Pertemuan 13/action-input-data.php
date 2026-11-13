<?php

include "koneksi.php";

if (isset($_POST['Submit'])) {

    $id_mahasiswa = $_POST['id_mahasiswa'];
    $nama = $_POST['nama'];
    $jurusan = $_POST['jurusan'];
    $alamat = $_POST['alamat'];
    $telepon = $_POST['telepon'];

    if (
        empty($id_mahasiswa) ||
        empty($nama) ||
        empty($jurusan) ||
        empty($alamat) ||
        empty($telepon)
    ) {

        echo "<script>
                alert('Data Harap Dilengkapi!');
                document.location='index.php';
              </script>";

    } else {

        $cek = mysqli_query(
            $koneksi,
            "SELECT id_mahasiswa FROM mahasiswa 
             WHERE id_mahasiswa='$id_mahasiswa'"
        );

        if (mysqli_num_rows($cek) > 0) {

            echo "<script>
                    alert('NIM sudah dipakai, silahkan gunakan NIM lain!');
                    document.location='index.php';
                  </script>";

        } else {

            $input = mysqli_query(
                $koneksi,
                "INSERT INTO mahasiswa
                (id_mahasiswa, nama, jurusan, alamat, telepon)
                VALUES
                ('$id_mahasiswa', '$nama', '$jurusan', '$alamat', '$telepon')"
            );

            if ($input) {

                echo "<script>
                        alert('Input Data Mahasiswa Berhasil');
                        document.location='index.php';
                      </script>";

            } else {

                echo "Input Data Mahasiswa Gagal!";
            }
        }
    }
}

?>