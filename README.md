Saya Ismail Fatih Raihan dengan NIM 2307840 mengerjakan Tugas Praktikum 9 dalam mata kuliah Desain dan Pemrograman Berorientasi Objek untuk keberkahanNya maka saya tidak melakukan kecurangan seperti yang telah dispesifikasikan. Aamiin.  

# Sistem Manajemen Data Mahasiswa

## Pengenalan
Sistem Manajemen Data Mahasiswa adalah aplikasi berbasis web yang dibangun menggunakan pola arsitektur Model-View-Presenter (MVP). Aplikasi ini memungkinkan pengguna untuk melakukan operasi CRUD (Create, Read, Update, Delete) pada data mahasiswa.

## Arsitektur MVP
Aplikasi ini mengimplementasikan pola arsitektur Model-View-Presenter (MVP) yang membagi aplikasi menjadi tiga komponen utama:

### 1. Model
Model bertanggung jawab untuk mengelola data dan logika bisnis. Dalam aplikasi ini, model terdiri dari:
- `Mahasiswa.class.php`: Representasi objek mahasiswa dengan properti dan metode getter/setter.
- `TabelMahasiswa.class.php`: Menangani operasi database untuk entitas mahasiswa.
- `DB.class.php`: Kelas dasar untuk koneksi dan operasi database.

### 2. View
View bertanggung jawab untuk menampilkan data kepada pengguna. Dalam aplikasi ini, view terdiri dari:
- `TampilMahasiswa.php`: Menampilkan daftar mahasiswa, form tambah/edit, dan pesan.
- `KontrakView.php`: Interface yang mendefinisikan metode yang harus diimplementasikan oleh view.
- Template HTML di folder `templates/`.

### 3. Presenter
Presenter bertindak sebagai perantara antara Model dan View. Dalam aplikasi ini, presenter terdiri dari:
- `ProsesMahasiswa.php`: Menghubungkan model dan view, menangani logika aplikasi.
- `KontrakPresenter.php`: Interface yang mendefinisikan metode yang harus diimplementasikan oleh presenter.

## Alur Program

### 1. Alur Utama
1. User mengakses `index.php`
2. `index.php` memuat semua kelas yang diperlukan
3. `TampilMahasiswa` diinisialisasi
4. `ProsesMahasiswa` mengambil data dari database melalui `TabelMahasiswa`
5. Data ditampilkan ke user melalui `TampilMahasiswa`

### 2. Alur Tambah Data
1. User mengklik tombol "Add New Student"
2. `index.php` mengarahkan ke form tambah data
3. User mengisi form dan submit
4. Data dikirim ke `index.php` melalui POST
5. `index.php` membuat objek `Mahasiswa` dan mengisi propertinya
6. `ProsesMahasiswa` menyimpan data ke database melalui `TabelMahasiswa`
7. User diarahkan kembali ke halaman utama dengan pesan sukses/error

### 3. Alur Edit Data
1. User mengklik tombol "Edit" pada baris data
2. `index.php` mengambil ID mahasiswa dan meminta data dari `ProsesMahasiswa`
3. `TampilMahasiswa` menampilkan form edit dengan data yang sudah ada
4. User mengubah data dan submit
5. Data dikirim ke `index.php` melalui POST
6. `ProsesMahasiswa` memperbarui data di database melalui `TabelMahasiswa`
7. User diarahkan kembali ke halaman utama dengan pesan sukses/error

### 4. Alur Hapus Data
1. User mengklik tombol "Delete" pada baris data
2. Konfirmasi muncul, user mengkonfirmasi penghapusan
3. `index.php` mengambil ID mahasiswa
4. `ProsesMahasiswa` menghapus data dari database melalui `TabelMahasiswa`
5. User diarahkan kembali ke halaman utama dengan pesan sukses/error

## Fitur-fitur
1. **Tampilan Data**: Menampilkan daftar mahasiswa dalam tabel responsif
2. **Tambah Data**: Form untuk menambahkan data mahasiswa baru
3. **Edit Data**: Form untuk mengubah data mahasiswa yang sudah ada
4. **Hapus Data**: Menghapus data mahasiswa dengan konfirmasi
5. **Validasi**: Memastikan semua field yang diperlukan diisi
6. **Feedback**: Menampilkan pesan sukses/error setelah operasi CRUD

# Dokumentasi  
https://github.com/user-attachments/assets/90ac2b1d-d57e-4a38-985a-bc904f111a5b



