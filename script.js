function submitForm() {
    var form = document.getElementById("formTabungan");
    var formData = new FormData(form);
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function() {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                alert(xhr.responseText);
                form.reset();
            } else {
                alert('Ada kesalahan saat menyimpan data!');
            }
        }
    };
    xhr.open('POST', 'hitung.php', true);
    xhr.send(formData);
}
