# Tugas-3---Membuat-Keamanan-untuk-Form-Login-dengan-Enkripsi-RSA-dan-PHP

Pendahuluan

Proyek ini bertujuan untuk membuat sistem login yang aman dengan menggunakan enkripsi RSA untuk melindungi data sensitif, seperti password, selama proses transmisi dari klien ke server. Enkripsi RSA memastikan bahwa password yang dikirimkan hanya dapat didekripsi oleh server yang memiliki kunci privat yang valid.

Fitur

Keamanan dengan RSA: Password dienkripsi menggunakan kunci publik di sisi klien dan didekripsi dengan kunci privat di sisi server.

Validasi Input: Sistem memvalidasi apakah username dan password yang dimasukkan cocok dengan data di database.

Notifikasi Dinamis: Memberikan notifikasi keberhasilan atau kegagalan login.

Struktur Direktori

.
├── index.php         # Halaman login
├── proses.php        # File proses autentikasi
├── koneksi.php       # File koneksi ke database
├── keys/
│   ├── private_key.pem # Kunci privat untuk dekripsi
│   └── public_key.pem  # Kunci publik untuk enkripsi
├── style.css         # File CSS untuk tampilan
└── vendor/           # Folder library eksternal (jika diperlukan)

Penjelasan File

1. index.php

Halaman utama tempat pengguna memasukkan username dan password.

Input username dan password.

Mengirimkan data ke server menggunakan metode POST.

Menampilkan notifikasi jika login gagal atau form tidak lengkap.

2. proses.php

File untuk memproses data login dan memvalidasi pengguna.

Proses Enkripsi dan Dekripsi:

Password yang diterima dienkripsi dengan RSA menggunakan kunci publik.

Di server, password yang dienkripsi didekripsi menggunakan kunci privat.

Validasi Database:

Data username dan password dikoordinasikan dengan database.

Jika valid, pengguna dianggap berhasil login.

Notifikasi:

Mengatur sesi untuk menyimpan notifikasi, seperti "Berhasil Login" atau "Gagal Login".

3. koneksi.php

Mengatur koneksi dengan database menggunakan MySQLi.

Mendefinisikan variabel mysqli_connect() dengan parameter host, username, password, dan nama database.

Menyediakan koneksi yang digunakan oleh file proses.php.

4. Folder keys/

private_key.pem: Kunci privat RSA yang digunakan untuk mendekripsi password di server.

public_key.pem: Kunci publik RSA yang digunakan untuk mengenkripsi password di sisi klien.

Cara Kerja

Pengguna Masuk ke Halaman Login (index.php):

Mengisi username dan password pada form.

Data dikirim ke server melalui metode POST ke file proses.php.

Proses Enkripsi RSA:

Di klien, password dienkripsi menggunakan kunci publik RSA (public_key.pem).

Password yang telah dienkripsi dikirim ke server.

Proses Dekripsi RSA:

Di server, password yang diterima didekripsi menggunakan kunci privat RSA (private_key.pem).

Validasi Database:

Data username dan password yang telah didekripsi dibandingkan dengan data yang ada di database.

Jika cocok, login berhasil.

Jika tidak cocok, pengguna diarahkan kembali ke halaman login dengan notifikasi "Gagal Login".

Prasyarat

XAMPP atau server lokal lain yang mendukung PHP dan MySQL.

OpenSSL yang terinstal di server PHP untuk enkripsi dan dekripsi RSA.

Database dengan tabel tb_users yang memiliki kolom:

username (VARCHAR)

password (VARCHAR)

Instalasi

Clone Repository:

git clone https://github.com/your-repo/web_login_rsa.git

Buat Database:

Buat database di MySQL dengan nama web_login.

Tambahkan tabel tb_users dengan struktur berikut:

CREATE TABLE tb_users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL,
    password VARCHAR(255) NOT NULL
);

Tambahkan data dummy untuk pengujian:

INSERT INTO tb_users (username, password) VALUES ('admin', 'password123');

Konfigurasi Koneksi Database:

Sesuaikan file koneksi.php dengan kredensial database Anda:

$koneksi = mysqli_connect('localhost', 'root', '', 'web_login');

Tambahkan Kunci RSA:

Letakkan file private_key.pem dan public_key.pem di folder keys/.

Jika kunci belum tersedia, buat kunci RSA menggunakan OpenSSL:

openssl genpkey -algorithm RSA -out private_key.pem -pkeyopt rsa_keygen_bits:2048
openssl rsa -pubout -in private_key.pem -out public_key.pem

Uji Aplikasi:

Jalankan server lokal.

Buka browser dan akses http://localhost/web_login/index.php.

Masukkan username dan password untuk login.

Catatan

Pastikan kunci privat disimpan dengan aman dan tidak dapat diakses oleh pihak tidak berwenang.

Jangan hard-code password pengguna di aplikasi.

Gunakan HTTPS untuk melindungi data selama transmisi.

Teknologi yang Digunakan

PHP 7/8

MySQL

OpenSSL
