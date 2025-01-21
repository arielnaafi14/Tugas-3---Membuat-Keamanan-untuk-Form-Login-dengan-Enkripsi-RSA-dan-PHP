# Tugas-3---Membuat-Keamanan-untuk-Form-Login-dengan-Enkripsi-RSA-dan-PHP
Proyek ini bertujuan untuk membuat sistem login yang aman dengan menggunakan enkripsi RSA untuk melindungi data sensitif, seperti password, selama proses transmisi dari klien ke server. Enkripsi RSA memastikan bahwa password yang dikirimkan hanya dapat didekripsi oleh server yang memiliki kunci privat yang valid. Selain itu, dilakukan sanitasi input untuk mencegah serangan SQL Injection dan Cross-Site Scripting (XSS).

# Fitur
* Keamanan dengan RSA: Password dienkripsi menggunakan kunci publik di sisi klien dan didekripsi dengan kunci privat di sisi server.

* Validasi Input: Sistem memvalidasi apakah username dan password yang dimasukkan cocok dengan data di database.

* Sanitasi Input: Mencegah serangan SQL Injection dan XSS dengan menggunakan teknik sanitasi input.

* Notifikasi Dinamis: Memberikan notifikasi keberhasilan atau kegagalan login.

# Struktur Direktori
 ```.
├── index.php         # Halaman login
├── proses.php        # File proses autentikasi
├── koneksi.php       # File koneksi ke database
├── keys/
│   ├── private_key.pem # Kunci privat untuk dekripsi
│   └── public_key.pem  # Kunci publik untuk enkripsi
├── style.css         # File CSS untuk tampilan
└── vendor/           # Folder library eksternal (jika diperlukan)
```
# Penjelasan File
**1. index.php**

Halaman utama tempat pengguna memasukkan username dan password.

- Input username dan password.

- Mengirimkan data ke server menggunakan metode POST.

- Menampilkan notifikasi jika login gagal atau form tidak lengkap.

- Dilakukan sanitasi input untuk mencegah XSS.

**2. proses.php**

File untuk memproses data login dan memvalidasi pengguna.

- Proses Enkripsi dan Dekripsi:

 - Password yang diterima dienkripsi dengan RSA menggunakan kunci publik.

 - Di server, password yang dienkripsi didekripsi menggunakan kunci privat.

- Validasi Database:

 - Data username dan password dikoordinasikan dengan database.

 - Jika valid, pengguna dianggap berhasil login.

- Sanitasi Input:

 - Semua input dari pengguna disanitasi menggunakan fungsi bawaan PHP seperti mysqli_real_escape_string untuk SQL Injection dan htmlspecialchars untuk XSS.

- Notifikasi:

 - Mengatur sesi untuk menyimpan notifikasi, seperti "Berhasil Login" atau "Gagal Login".

**3. koneksi.php**

Mengatur koneksi dengan database menggunakan MySQLi.

- Mendefinisikan variabel mysqli_connect() dengan parameter host, username, password, dan nama database.

- Menyediakan koneksi yang digunakan oleh file proses.php.

**4. Folder keys/**

- private_key.pem: Kunci privat RSA yang digunakan untuk mendekripsi password di server.

- public_key.pem: Kunci publik RSA yang digunakan untuk mengenkripsi password di sisi klien.

# Penjelasan Cara Kerja

**Pengguna Masuk ke Halaman Login (index.php):**

- Mengisi username dan password pada form.

- Data dikirim ke server melalui metode POST ke file proses.php.

**Proses Enkripsi RSA:**

- Di klien, password dienkripsi menggunakan kunci publik RSA (public_key.pem).

- Password yang telah dienkripsi dikirim ke server.

**Proses Dekripsi RSA:**

- Di server, password yang diterima didekripsi menggunakan kunci privat RSA (private_key.pem).

**Validasi Database:**

- Data username dan password yang telah didekripsi dibandingkan dengan data yang ada di database.

- Jika cocok, login berhasil.

- Jika tidak cocok, pengguna diarahkan kembali ke halaman login dengan notifikasi "Gagal Login".

**Sanitasi Input:**

- Setiap input dari pengguna disanitasi sebelum diproses lebih lanjut untuk mencegah SQL Injection dan XSS.
  
# Kontribusi Tim
- Backend     : Zafi Zunaidi Aziz
- Penguji     : Adimas Alif Priarta
- Dokumentasi : Muhammad Ariel Naafi'
