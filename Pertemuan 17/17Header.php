<?php
// Contoh penggunaan header Location

$a1 = 10;

if ($a1 < 0) {
    echo "Nilai A negatif";
} else {
    // Redirect ke file lain (jangan redirect ke diri sendiri)
    header("Location: 17ErrorHandlingTrigger.php");
    exit; // WAJIB ada exit setelah header Location
}
?>
