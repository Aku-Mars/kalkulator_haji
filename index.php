<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Tabungan Haji</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f2f2f2;
            color: #333;
        }

        .container {
            width: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            padding: 20px;
        }

        .card {
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            width: 100%;
            max-width: 600px;
        }

        h2 {
            text-align: center;
        }

        form {
            text-align: center;
        }

        label {
            display: block;
            margin-bottom: 5px;
        }

        input[type="text"],
        input[type="number"],
        input[type="submit"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        tr:hover {
            background-color: #f2f2f2;
        }
    </style>
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

    <div class="container">
        <h2>Data Tabungan Haji</h2>
        <div id="dataTabungan"></div>
    </div>

    <script>
        function submitForm() {
            var form = document.getElementById("formTabungan");
            var formData = new FormData(form);
            var xhr = new XMLHttpRequest();
            xhr.onreadystatechange = function() {
                if (xhr.readyState === XMLHttpRequest.DONE) {
                    if (xhr.status === 200) {
                        document.getElementById("dataTabungan").innerHTML = xhr.responseText;
                    } else {
                        alert('Ada kesalahan saat menyimpan data!');
                    }
                }
            };
            xhr.open('POST', 'hitung.php', true);
            xhr.send(formData);
        }
    </script>
</body>
</html>
