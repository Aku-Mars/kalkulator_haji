<?php
include 'koneksi.php';

$nama = $_POST['nama'];
$harga_haji = $_POST['harga_haji'];
$tabungan_perbulan = $_POST['tabungan_perbulan'];

// Menghitung lama menabung
$lama_menabung = ceil($harga_haji / $tabungan_perbulan);

$total_tabungan = $tabungan_perbulan * $lama_menabung;
$kekurangan = $harga_haji - $total_tabungan;

echo "Nama: $nama <br>";
echo "Harga Haji: $harga_haji <br>";
echo "Tabungan per Bulan: $tabungan_perbulan <br>";
echo "Lama Menabung: $lama_menabung bulan <br><br>";

if ($kekurangan <= 0) {
    echo "Anda telah mencapai target tabungan untuk haji.";
} else {
    echo "Anda masih kekurangan $kekurangan untuk mencapai target tabungan haji.";
}
?>
