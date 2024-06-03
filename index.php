<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Tabungan Haji</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <div class="card">
            <h2>Data Tabungan Haji</h2>
            <form action="hitung.php" method="POST">
                <label for="nama">Nama:</label><br>
                <input type="text" id="nama" name="nama" required><br>
                <label for="total_haji">Total Haji (dalam rupiah):</label><br>
                <input type="number" id="total_haji" name="total_haji" required><br>
                <label for="dana_per_bulan">Dana yang Bisa Ditabung per Bulan (dalam rupiah):</label><br>
                <input type="number" id="dana_per_bulan" name="dana_per_bulan" required><br><br>
                <input type="submit" value="Hitung">
            </form>
        </div>
    </div>

    <div class="container">
        <h2>Data Tabungan Haji</h2>
        <?php
        $servername = "localhost";
        $username = "admin";
        $password = "SOK1PSTIC";
        $dbname = "haji_tabungan";

        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $sql = "SELECT * FROM users";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            echo "<table>";
            echo "<tr><th>Nama</th><th>Total Haji</th><th>Dana per Bulan</th><th>Waktu yang Dibutuhkan (Bulan)</th></tr>";
            while($row = $result->fetch_assoc()) {
                $nama = $row["nama"];
                $total_haji = $row["total_haji"];
                $dana_per_bulan = $row["dana_per_bulan"];
                $waktu_bulan = ceil($total_haji / $dana_per_bulan);
                echo "<tr><td>".$nama."</td><td>".$total_haji."</td><td>".$dana_per_bulan."</td><td>".$waktu_bulan."</td></tr>";
            }
            echo "</table>";
        } else {
            echo "0 results";
        }
        $conn->close();
        ?>
    </div>
</body>
</html>
