# kalkulator_haji

Database Query
```
CREATE DATABASE IF NOT EXISTS haji_tabungan;
USE haji_tabungan;

CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nama VARCHAR(100),
    total_haji INT,
    dana_per_bulan INT,
    lama_tabungan INT
);

```