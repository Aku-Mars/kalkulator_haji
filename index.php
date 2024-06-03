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
        </div>
    </div>

    <script src="script.js"></script>
</body>
</html>
