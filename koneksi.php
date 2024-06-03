<?php
$host = 'localhost'; // Ganti dengan host Anda
$username = 'admin'; // Ganti dengan username database Anda
$password = 'SOK1PSTIC'; // Ganti dengan password database Anda
$database = 'haji_tabungan'; // Ganti dengan nama database Anda

$conn = new mysqli($host, $username, $password, $database);

if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}
?>
