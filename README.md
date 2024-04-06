# Sistem Informasi Inventory Berbasis Website dengan Menerapkan Perhitungan Economic Order Quantity (EOQ)

Sistem ini dibuat menggunakan framework Laravel 10 dikombinasikan dengan Bootstrap CSS. Sistem ini dapat meningkatkan efektivitas dan aksesibilitas data, meminimalisir kesalahan pendataan, serta meningkatkan responsivitas terhadap perubahan stok barang. Terlebih, sistem yang dikembangkan dapat memberikan kemudahan dalam  pemantauan dan manajemen inventory secara keseluruhan, serta memberikan informasi hasil perhitungan jumlah stok barang yang harus dibeli menggunakan perhitungan EOQ lengkap dengan variabel pendukung lain. Dengan demikian, perusahaan dapat meningkatkan efektivitas penggunaan uang pengadaan stok barang.

## User
Pada sistem ini dibuat hanya 3 level user dengan hak akses yang berbeda beda pada tiap usernya.

  1. Owner

     Pertama untuk Owner, user ini memiliki level tertinggi daripada user lainnya, user ini dapat mengakses semua fitur yang ada pada sistem.

  2. Store Manager

     Kedua untuk Store Manager, dari semua fitur yang disediakan pada sistem, user dengan level Store Manager tidak bisa mengakses beberapa fitur berikut.
      - Seluruh fitur management Karyawan
      - Seluruh fitur management EOQ
      - Edit Stok
      - Edit Supplier

  3. Karyawan

     Terakhir yakni Karyawan, User yang memiliki level user ini memiliki banyak sekali batasan akses terhadap fitur yang ada dan hanya bisa mengakses fitur berikut.
      - Login
      - Home Page
      - Data Stok
      - Management Transaksi Keluar

### Login
![Screenshot (183)](https://github.com/Rosyiii/Sistem-Informasi-Inventory/assets/87105307/737c2151-cf51-46b0-af81-5940f8e0199d)

### Home Page
![Screenshot (184)](https://github.com/Rosyiii/Sistem-Informasi-Inventory/assets/87105307/3db7a1ea-0f7a-4455-af35-8024c1da514e)

### Input Transaksi

#### Transaksi Masuk
Transaksi Masuk dengan data stok yang sudah ada

![Screenshot (185)](https://github.com/Rosyiii/Sistem-Informasi-Inventory/assets/87105307/b66de0c8-f6f5-4398-88cd-c286f5514be8)

Transaksi masuk dengan data stok yang baru

![Screenshot (186)](https://github.com/Rosyiii/Sistem-Informasi-Inventory/assets/87105307/ff196609-d90c-439f-b598-3a35d0cfefa6)

#### Transaksi Keluar
![Screenshot (187)](https://github.com/Rosyiii/Sistem-Informasi-Inventory/assets/87105307/b5e4b986-aede-4e7b-9299-d567ef51157a)

### Data EOQ
![Screenshot (188)](https://github.com/Rosyiii/Sistem-Informasi-Inventory/assets/87105307/c54c77b0-b7e3-4329-baa6-dce260a203de)

### Detail EOQ
![Screenshot (189)](https://github.com/Rosyiii/Sistem-Informasi-Inventory/assets/87105307/4e0b2893-584a-482b-a3a3-6ac544264e8d)
