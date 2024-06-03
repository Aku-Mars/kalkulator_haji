<?php
$nama = $_POST['nama'];
$total_haji = $_POST['total_haji'];
$dana_per_bulan = $_POST['dana_per_bulan'];

$waktu_bulan = ceil($total_haji / $dana_per_bulan);

$servername = "localhost";
$username = "admin";
$password = "SOK1PSTIC";
$dbname = "haji_tabungan";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "INSERT INTO users (nama, total_haji, dana_per_bulan) VALUES ('$nama', '$total_haji', '$dana_per_bulan')";

if ($conn->query($sql) === TRUE) {
    echo "Data berhasil disimpan. Waktu yang dibutuhkan untuk menabung haji: $waktu_bulan bulan.";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
