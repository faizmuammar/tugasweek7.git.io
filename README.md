# 🐾 Sistem Kebun Binatang (PHP & MySQL)

Proyek ini adalah aplikasi web sederhana yang dibuat menggunakan **PHP Native** dan **MySQL**, yang menampilkan data hewan dari sebuah database bernama `db_kebunbinatang`.

---

## 📁 Struktur Folder

```
├── index.php
├── koneksi.php
├── db_kebunbinatang.sql
```

---

## ⚙️ Deskripsi File

* **index.php**
  Halaman utama untuk menampilkan data hewan yang diambil dari database.
  Menggunakan koneksi dari file `koneksi.php`.

* **koneksi.php**
  File ini berisi konfigurasi koneksi ke database MySQL (host, username, password, dan nama database).

* **db_kebunbinatang.sql**
  File SQL untuk membuat database dan tabel `hewan`.
  Gunakan file ini untuk mengimpor struktur dan data awal ke dalam MySQL.

---

## 🐘 Cara Menjalankan di Laragon / XAMPP

1. **Letakkan proyek di folder server lokal**

   * Salin folder ini ke:

     ```
     C:\laragon\www\
     ```

     atau

     ```
     C:\xampp\htdocs\
     ```

2. **Import database**

   * Buka `phpMyAdmin`.
   * Buat database baru dengan nama:

     ```
     db_kebunbinatang
     ```
   * Klik tab **Import** dan unggah file `db_kebunbinatang.sql`.

3. **Konfigurasi koneksi**

   * Buka file `koneksi.php` dan sesuaikan dengan pengaturan lokalmu:

     ```php
     $host = "localhost";
     $user = "root";
     $pass = "";
     $db   = "db_kebunbinatang";
     ```

4. **Jalankan aplikasi**

   * Aktifkan Apache dan MySQL di Laragon / XAMPP.
   * Buka browser dan kunjungi:

     ```
     http://localhost/nama_folder_project/
     ```

---

## 🧩 Fitur Utama

* Menampilkan daftar hewan dari database.
* Koneksi database dengan PHP MySQLi.
* Struktur kode sederhana dan mudah dipahami (cocok untuk latihan OOP dasar PHP).

---

## 🧑‍💻 Pengembang

Dibuat oleh **Faiz**
Sebagai latihan dasar pemrograman PHP dan manajemen database MySQL.
