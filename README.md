# Tugas-3---Membuat-Keamanan-untuk-Form-Login-dengan-Enkripsi-RSA-dan-PHP
Proyek ini bertujuan untuk membuat sistem login yang aman dengan menggunakan enkripsi RSA untuk melindungi data sensitif, seperti password, selama proses transmisi dari klien ke server. Enkripsi RSA memastikan bahwa password yang dikirimkan hanya dapat didekripsi oleh server yang memiliki kunci privat yang valid. Selain itu, dilakukan sanitasi input untuk mencegah serangan SQL Injection dan Cross-Site Scripting (XSS).

# Fitur
* Keamanan dengan RSA: Password dienkripsi menggunakan kunci publik di sisi klien dan didekripsi dengan kunci privat di sisi server.

* Validasi Input: Sistem memvalidasi apakah username dan password yang dimasukkan cocok dengan data di database.

* Sanitasi Input: Mencegah serangan SQL Injection dan XSS dengan menggunakan teknik sanitasi input.

* Notifikasi Dinamis: Memberikan notifikasi keberhasilan atau kegagalan login.
