# PORTAL MAPALA GIRIL LOKAL PAKSI

Website Portal Organisasi **MAPALA Giril Lokal Paksi** berbasis Laravel.

## 👨‍💻 Dibuat Oleh

**YUSMAN TELAUMBANUA**

Mahasiswa Informatika

## 📌 Tentang Project

Portal MAPALA Giril Lokal Paksi merupakan website organisasi yang dibuat untuk menyediakan informasi mengenai organisasi, kegiatan, anggota, kepengurusan, berita, galeri, serta pendaftaran anggota baru.

Website ini memiliki halaman publik dan sistem administrasi untuk mengelola data organisasi.

## ✨ Fitur Website

### 🌐 Halaman Publik

* Beranda
* Tentang Organisasi
* Struktur Kepengurusan
* Berita
* Kegiatan
* Galeri
* Kontak
* Pendaftaran Anggota

### 🔐 Admin Panel

* Dashboard Admin
* Manajemen Anggota
* Manajemen Berita
* Manajemen Kategori Berita
* Manajemen Kegiatan
* Manajemen Galeri
* Manajemen Pengurus
* Manajemen Pendaftaran
* Manajemen Pesan Pengunjung

## 🛠️ Teknologi

* PHP
* Laravel
* MySQL / MariaDB
* Bootstrap
* JavaScript
* HTML
* CSS
* XAMPP

## 💻 Cara Menjalankan Project

Clone repository:

```bash
git clone https://github.com/yusman2004/portal-mapala-giril-lokal-paksi.git
```

Masuk ke folder project:

```bash
cd portal-mapala-giril-lokal-paksi
```

Install dependency:

```bash
composer install
```

Salin file environment:

```bash
copy .env.example .env
```

Generate application key:

```bash
php artisan key:generate
```

Atur database pada file `.env`, kemudian jalankan:

```bash
php artisan migrate
```

Jika diperlukan, jalankan seeder:

```bash
php artisan db:seed
```

Buat symbolic link storage:

```bash
php artisan storage:link
```

Jalankan server Laravel:

```bash
php artisan serve
```

Kemudian buka:

```text
http://127.0.0.1:8000
```

## 📂 Struktur Utama

```text
app/
bootstrap/
config/
database/
public/
resources/
routes/
storage/
tests/
```

## 📄 Lisensi

Project ini dibuat untuk keperluan pembelajaran dan pengembangan sistem informasi organisasi.

---

### © 2026 YUSMAN TELAUMBANUA

**Portal MAPALA Giril Lokal Paksi**
