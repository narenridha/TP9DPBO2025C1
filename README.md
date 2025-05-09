# TP9DPBO2025C1
# Implementasi MVP pada Project Mahasiswa
Saya Narendra Ridha Baihaqi dengan NIM 2308882 mengerjakan Tugas Praktikum 9 dalam mata kuliah Desain dan Pemrograman Berorientasi Objek untuk keberkahanNya maka saya tidak melakukan kecurangan seperti yang telah dispesifikasikan. Aamiin.


## Deskripsi
Project ini merupakan implementasi dari arsitektur Model-View-Presenter (MVP) untuk mengelola data mahasiswa. Aplikasi ini memungkinkan pengguna untuk melakukan operasi CRUD (Create, Read, Update, Delete) pada data mahasiswa yang disimpan dalam database MySQL.

## Struktur Direktori
Berikut adalah struktur direktori dari project ini:

```
index.php
mvp_php.sql
model/
	DB.class.php
	Mahasiswa.class.php
	TabelMahasiswa.class.php
	Template.class.php
presenter/
	KontrakPresenter.php
	ProsesMahasiswa.php
templates/
	add.html
	edit.html
	skin.html
view/
	KontrakView.php
	TampilMahasiswa.php
```

## Penjelasan Komponen

### 1. **Model**
   - **DB.class.php**: Kelas untuk mengelola koneksi dan eksekusi query ke database.
   - **Mahasiswa.class.php**: Kelas yang merepresentasikan entitas mahasiswa dengan atribut-atributnya.
   - **TabelMahasiswa.class.php**: Kelas untuk mengelola operasi database terkait tabel mahasiswa.
   - **Template.class.php**: Kelas untuk mengelola template HTML.

### 2. **Presenter**
   - **KontrakPresenter.php**: Interface yang mendefinisikan kontrak antara presenter dan view.
   - **ProsesMahasiswa.php**: Kelas presenter yang mengelola logika bisnis dan berinteraksi dengan model serta view.

### 3. **View**
   - **KontrakView.php**: Interface yang mendefinisikan kontrak antara view dan presenter.
   - **TampilMahasiswa.php**: Kelas view yang bertanggung jawab untuk menampilkan data mahasiswa dan mengelola interaksi pengguna.

### 4. **Templates**
   - **add.html**: Template untuk menambahkan data mahasiswa.
   - **edit.html**: Template untuk mengedit data mahasiswa.
   - **skin.html**: Template utama untuk menampilkan tabel data mahasiswa.

### 5. **Database**
   - **mvp_php.sql**: File SQL untuk membuat tabel `mahasiswa` dan mengisi data awal.

## Fitur
- **Tambah Data Mahasiswa**: Pengguna dapat menambahkan data mahasiswa baru.
- **Tampilkan Data Mahasiswa**: Menampilkan daftar mahasiswa dalam bentuk tabel.
- **Edit Data Mahasiswa**: Pengguna dapat mengedit data mahasiswa yang sudah ada.
- **Hapus Data Mahasiswa**: Pengguna dapat menghapus data mahasiswa.

## Cara Menjalankan Project

1. **Persiapan Database**
   - Import file `mvp_php.sql` ke database MySQL Anda.
   - Pastikan nama database adalah `db_mvp`.

2. **Konfigurasi Koneksi Database**
   - Pastikan konfigurasi database di file `DB.class.php` sesuai dengan pengaturan server Anda:
     ```php
     var $db_host = 'localhost';
     var $db_user = 'root';
     var $db_password = '';
     var $db_name = 'db_mvp';
     ```

3. **Menjalankan Aplikasi**
   - Letakkan folder project ini di dalam direktori `htdocs` (jika menggunakan XAMPP).
   - Jalankan server Apache dan MySQL melalui XAMPP.
   - Akses aplikasi melalui browser dengan URL: `http://localhost/mvp_php/index.php`.

## Teknologi yang Digunakan
- **PHP**: Bahasa pemrograman untuk backend.
- **MySQL**: Basis data untuk menyimpan data mahasiswa.
- **HTML & CSS**: Untuk tampilan antarmuka pengguna.
- **Bootstrap**: Framework CSS untuk desain responsif.

## Catatan
- Pastikan server Apache dan MySQL berjalan sebelum mengakses aplikasi.
- Jika ada error, periksa kembali konfigurasi database dan file yang di-include.

## dokumentasi


https://github.com/user-attachments/assets/d1ebfd20-9fc6-4fc0-8d76-4d9737883bea

