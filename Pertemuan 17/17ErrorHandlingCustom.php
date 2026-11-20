<?php
// Sembunyikan semua pesan error bawaan PHP
error_reporting(0);

/**
 * Fungsi untuk menangani error.
 * Fungsi ini wajib memiliki 4 parameter.
 */
function tanganiError($level, $message, $file, $line) {
    echo "<div style='padding: 2rem; background: rgba(200, 0, 0, 0.5); color: white'>";
    echo    "<b>Terjadi Error</b>";
    echo    "<p>[{$level}] {$message} - {$file}:{$line}</p>";
    echo "</div>";
}

set_error_handler('tanganiError');

// Variabel $tes tidak ada → akan memicu error
echo $tes;
?>
