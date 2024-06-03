# kalkulator_haji

Database Query
```
CREATE DATABASE IF NOT EXISTS haji_tabungan;
USE haji_tabungan;

CREATE TABLE IF NOT EXISTS haji (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nama VARCHAR(100),
    harga_haji DECIMAL(10,2),
    tabungan_perbulan DECIMAL(10,2),
    lama_menabung INT
);

```