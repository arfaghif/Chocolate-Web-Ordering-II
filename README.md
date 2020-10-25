# Deskripsi Aplikasi Web
Aplikasi web ini digunakan oleh Willy Wangky Chocolate Factory untuk menghubungkan admin Willy Wangky dengan pembeli coklat pada penjualan daring. Web ini dapat diakses oleh dua jenis akun: user dan superuser. User adalah pembeli coklat, dan superuser adalah admin dari Willy Wangky yang dapat menambahkan coklat ke database.

Terdapat halaman register, login, dashboard untuk menampilkan daftar coklat, pencarian coklat, dan laman untuk menampilkan detail coklat. Setelah login/register, akun bertipe user dapat mengakses pembelian coklat dan laman riwayat transaksi, sementara akun bertipe superuser dapat melakukan penambahan stock coklat dan mengakses laman penambahan coklat baru. Pengguna tidak dapat mendaftar sebagai superuser, karena superuser ditambahkan secara manual pada basis data. Pada basis data, Type super user adalah 0 sementara type user adalah 1

Masa berlaku akses akun maksimal adalah 24 jam. Setelah itu, pengguna harus melakukan login ulang untuk kembali mengakses web. Web juga memfasilitasi pilihan untuk logout dari akun jika telah selesai mengakses web.

# Daftar Requirements
Sistem dapat melakukan register untuk pengguna
Sistem dapat melakukan login untuk pengguna
Sistem dapat melakukan pencarian chocolate
Sistem dapat menampilkan detail chocolate yang akan dibeli
Sistem dapat melakukan transaksi jual beli produk
Sistem dapat menampilkan histori pembelian produk
Sistem dapat menambahkan produk chocolate yang akan dijual
Sistem dapat menambahkah jumlah stock produk yang tersedia

# Prerequisites
PHP
MySql
Browser support JavaScript

# Cara Instalasi
Clone repository gitlab
Masuk ke folder App
Import database choc.sql pada folder Database
Buka folder Controller/logreg
Buka config.php
Sesuaikan host, user database, password database, dan nama database
Jalankan server dan MySql Xampp
# Cara Menjalankan Server
Buka Command Prompt
Arahkan ke folder App
Ketik “php -S localhost:8000”
Enter 
Jalankan URL yang ditampilkan pada command prompt

# Screenshot Tampilan Aplikasi

## Login & Register Page
### Login
![login](layar/login.png)
### Register
![register](layar/register.png)


## Dashboard & Search Result 
### User
![dashboard user](layar/dashboard_user.png)
### Superuser
![dashboard superuser](layar/dashboard_admin.png)
### Search Result
![search](layar/search_result.png)

## Choco Detail
### User
![buy detail](layar/choco_detail_user.png)
### Superuser
![add detail] (layar/choco_detail_admin.png)

## Buy Chocolate 
![buy choco](layar/buy_choco.png)

## Add chocolate 
![add choco](layar/add_amount_chocolate.png)
### Success add page
![add choco](layar/add_amount_chocolate.png)

## History
![history](layar/history.png)

## Add New Chocolate
![Add new chocolate](layar/add_new_chocolate.png)

