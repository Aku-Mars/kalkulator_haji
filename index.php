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
            <form id="formTabungan">
                <label for="nama">Nama:</label><br>
                <input type="text" id="nama" name="nama" required><br>
                <label for="total_haji">Total Haji (dalam rupiah):</label><br>
                <input type="number" id="total_haji" name="total_haji" required><br>
                <label for="dana_per_bulan">Dana yang Bisa Ditabung per Bulan (dalam rupiah):</label><br>
                <input type="number" id="dana_per_bulan" name="dana_per_bulan" required><br><br>
                <input type="button" value="Hitung" onclick="submitForm()">
            </form>

            <!-- Tambahkan bagian untuk menampilkan data -->
            <div id="data-container">
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
                        echo "<h3>Data Tersimpan:</h3>";
                        echo "<table>";
                        echo "<tr><th>Nama</th><th>Total Haji</th><th>Dana per Bulan</th><th>Lama Tabungan (bulan)</th></tr>";
                        while($row = $result->fetch_assoc()) {
                            echo "<tr><td>".$row["nama"]."</td><td>".$row["total_haji"]."</td><td>".$row["dana_per_bulan"]."</td><td>".$row["lama_tabungan"]."</td></tr>";
                        }
                        echo "</table>";
                    } else {
                        echo "Tidak ada data tersimpan.";
                    }
                    $conn->close();
                ?>

            </div>
        </div>
    </div>

    <script src="script.js"></script>
</body>
</html>
