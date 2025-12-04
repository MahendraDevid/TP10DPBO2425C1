# Janji
Saya Mahendra Devid Putra Anwar mengerjakan evaluasi Tugas Praktikum 10 dalam mata kuliah Desain Pemrograman Berbasis Objek untuk keberkahan-Nya, maka saya tidak melakukan kecurangan seperti yang telah dispesifikasikan. Aamiin.

## 1. Deskripsi Singkat Program
Aplikasi ini adalah sistem manajemen penjualan diecast sederhana yang dirancang untuk mengelola inventaris koleksi mobil mainan (seperti Mini GT, Pop Race, Hot Wheels, Tarmac Works, dll). 

Aplikasi ini dibangun dengan ketentuan teknis sebagai berikut:
* **Bahasa Pemrograman:** PHP Native (Tanpa Framework).
* **Arsitektur:** Menggunakan pola **MVVM (Model–View–ViewModel)**.
* **Fitur:** CRUD (Create, Read, Update, Delete) lengkap untuk 4 entitas data.
* **Routing:** Menggunakan sistem routing terpusat melalui `index.php`.
* **Antarmuka:** Menggunakan struktur view *flat file* (`_list.php` & `_form.php`) dengan template terintegrasi (`header.php` & `footer.php`).

## 2. Desain Program

### A. ERD / Desain Database
<img width="914" height="442" alt="image" src="https://github.com/user-attachments/assets/0cb31e99-60dc-4223-a3bb-822708cf495e" />

Database `diecast_shop` terdiri dari 4 tabel utama dengan struktur atribut sebagai berikut:
1.  **`brands`** (Menyimpan merk diecast)
    * `id_brand` (PK, Auto Increment)
    * `name` (Nama merk, misal: Hot Wheels)

2.  **`series`** (Menyimpan seri dari sebuah brand)
    * `id_series` (PK, Auto Increment)
    * `id_brand` (FK -> brands)
    * `series_name` (Nama seri, misal: Car Culture)

3.  **`products`** (Menyimpan detail produk mobil)
    * `id_product` (PK, Auto Increment)
    * `id_series` (FK -> series)
    * `product_name` (Nama mobil)
    * `scale` (Skala, misal: 1:64)
    * `price` (Harga)

4.  **`customers`** (Menyimpan data pelanggan)
    * `id_customer` (PK, Auto Increment)
    * `name` (Nama pelanggan)
    * `phone` (Nomor telepon)

### B. Relasi Database
* **One-to-Many (Brand → Series):** `series.id_brand` merujuk ke `brands.id_brand`. 
    *(Setiap series pasti memiliki satu brand induk).*
* **One-to-Many (Series → Products):** `products.id_series` merujuk ke `series.id_series`.
    *(Setiap produk diecast terikat pada satu series tertentu).*

## 3. Alur Program
Berikut adalah alur eksekusi program ketika dijalankan oleh pengguna:

1.  **Request Masuk:** Pengguna membuka URL, contoh: `index.php?mod=product&act=form`.
2.  **Routing (`index.php`):** Parameter `mod` menentukan entitas (Brand, Series, Product, atau Customer).
    * Parameter `act` menentukan aksi (index/list, form/add/edit, atau delete).
3.  **Inisialisasi ViewModel:** Router memanggil ViewModel yang sesuai (misal: `ProductViewModel`).
4.  **Logika ViewModel:**
    * Jika **Read**: ViewModel meminta data ke Model, lalu me-load `view_list.php`.
    * Jika **Create/Update**: ViewModel memvalidasi input `POST`, mengirim data ke Model untuk disimpan, lalu redirect.
5.  **Eksekusi Model:** Model menjalankan query SQL ke database `diecast_shop`.
6.  **Tampilan (View):** Hasil akhir ditampilkan ke pengguna menggunakan template (`header.php`, `navigation.php`, `footer.php`).

## 4. Dokumentasi
https://github.com/user-attachments/assets/4d9644b3-3b58-44f8-9322-b2b7b19fd0a4
