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
    <form id="hajiForm" action="hitung.php" method="post">
        <label for="nama">Nama:</label><br>
        <input type="text" id="nama" name="nama"><br>
        <label for="harga_haji">Harga Haji:</label><br>
        <input type="text" id="harga_haji" name="harga_haji"><br>
        <label for="tabungan_perbulan">Tabungan per Bulan:</label><br>
        <input type="text" id="tabungan_perbulan" name="tabungan_perbulan"><br><br>
        <input type="submit" value="Hitung">
    </form>

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
