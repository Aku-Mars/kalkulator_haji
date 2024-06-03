<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kalkulator Haji</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <style>
        .popup {
            display: none;
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: #f4f4f4;
            padding: 20px;
            border: 1px solid #ccc;
            z-index: 9999;
        }
    </style>
</head>
<body>
    <h1>Kalkulator Haji</h1>
    <?php
    include 'koneksi.php';

    // Query untuk mengambil data terakhir dari database
    $sql = "SELECT * FROM haji ORDER BY id DESC LIMIT 1";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $nama = $row['nama'];
        $harga_haji = $row['harga_haji'];
        $tabungan_perbulan = $row['tabungan_perbulan'];
        $lama_menabung = $row['lama_menabung'];

        echo "<form id='hajiForm'>";
        echo "  <label for='nama'>Nama:</label><br>";
        echo "  <input type='text' id='nama' name='nama' value='$nama'><br>";
        echo "  <label for='harga_haji'>Harga Haji:</label><br>";
        echo "  <input type='text' id='harga_haji' name='harga_haji' value='$harga_haji'><br>";
        echo "  <label for='tabungan_perbulan'>Tabungan per Bulan:</label><br>";
        echo "  <input type='text' id='tabungan_perbulan' name='tabungan_perbulan' value='$tabungan_perbulan'><br>";
        echo "  <label for='lama_menabung'>Lama Menabung (bulan):</label><br>";
        echo "  <input type='text' id='lama_menabung' name='lama_menabung' value='$lama_menabung'><br><br>";
        echo "  <input type='submit' value='Hitung'>";
        echo "</form>";
    } else {
        echo "<p>Data tidak ditemukan.</p>";
    }
    ?>
    
    <div id="popup" class="popup">
        <span class="close" onclick="closePopup()">&times;</span>
        <p id="popupContent"></p>
    </div>

    <script>
        $(document).ready(function(){
            $('#hajiForm').submit(function(e){
                e.preventDefault(); // Menghentikan pengiriman formulir standar

                // Menghitung lama menabung
                var hargaHaji = $('#harga_haji').val();
                var tabunganPerbulan = $('#tabungan_perbulan').val();
                var lamaMenabung = Math.ceil(hargaHaji / tabunganPerbulan);
                $('#lama_menabung').val(lamaMenabung);

                $.ajax({
                    type: 'POST',
                    url: 'hitung.php',
                    data: $('#hajiForm').serialize(),
                    success: function(response) {
                        $('#popupContent').html(response);
                        $('#popup').show();
                    }
                });
            });
        });

        function closePopup() {
            $('#popup').hide();
        }
    </script>
</body>
</html>
