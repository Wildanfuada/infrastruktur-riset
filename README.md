<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework. You can also check out [Laravel Learn](https://laravel.com/learn), where you will be guided through building a modern Laravel application.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains thousands of video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the [Laravel Partners program](https://partners.laravel.com).

### Premium Partners

- **[Vehikl](https://vehikl.com)**
- **[Tighten Co.](https://tighten.co)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Curotec](https://www.curotec.com/services/technologies/laravel)**
- **[DevSquad](https://devsquad.com/hire-laravel-developers)**
- **[Redberry](https://redberry.international/laravel-development)**
- **[Active Logic](https://activelogic.com)**

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
# Sistem Manajemen Infrastruktur Riset dan SDM IPTEK

## 📋 Deskripsi Proyek

Aplikasi web yang dirancang untuk mengelola dan memetakan data **Infrastruktur Riset** dan **Sumber Daya Manusia (SDM)** di bidang **IPTEK** (Ilmu Pengetahuan dan Teknologi). Sistem ini memungkinkan pengguna untuk melakukan pencatatan, pembaruan, pencarian, dan visualisasi data laboratorium penelitian serta tenaga ahli dengan integrasi peta digital.

Aplikasi ini menyediakan antarmuka yang intuitif untuk mendokumentasikan fasilitas penelitian, status akreditasi, dan SDM yang tersedia di berbagai institusi penelitian.

---

## ✨ Fitur Utama

- [x] **Manajemen Infrastruktur Riset** - Tambah, edit, hapus data laboratorium dan fasilitas penelitian
- [x] **Manajemen Data SDM IPTEK** - Kelola data tenaga ahli dan profesional penelitian
- [x] **Pencarian & Filter Lanjutan** - Filter berdasarkan nama, fasilitas, lokasi, lembaga, dan status akreditasi
- [x] **Visualisasi Peta Interaktif** - Tampilkan lokasi infrastruktur dan SDM di peta digital
- [x] **Import/Export Data Excel** - Impor data massal dari file Excel dan ekspor data ke format Excel
- [x] **Sistem Autentikasi User** - Registrasi dan login untuk keamanan data
- [x] **Dashboard Terpadu** - Halaman dashboard untuk overview data keseluruhan
- [x] **Profil Pengguna** - Manajemen akun dan profil pengguna
- [x] **Pagination Data** - Navigasi data dengan pagination yang efisien
- [x] **Responsive Design** - Antarmuka yang responsif untuk desktop dan mobile

---

## 🛠️ Teknologi yang Digunakan

### Backend
- **Framework:** Laravel 12.0
- **PHP Version:** 8.2 atau lebih tinggi
- **Database:** MySQL/SQLite (default SQLite)
- **Web Server:** Apache (via XAMPP) atau PHP Built-in Server

### Frontend
- **CSS Framework:** Tailwind CSS 3.1
- **Build Tool:** Vite 7.0
- **JavaScript Framework:** Alpine.js 3.4
- **HTTP Client:** Axios 1.11

### Library Penting
- **Maatwebsite Excel 3.1** - Import/Export file Excel
- **Laravel Breeze 2.4** - Authentikasi & scaffolding
- **Laravel Tinker 2.10** - Interactive shell

### Development Tools
- **Testing:** PHPUnit 11.5
- **Code Formatting:** Laravel Pint 1.24
- **Database Migration:** Laravel Migration System
- **Task Runner:** Composer Scripts

---

## 📋 Prerequisites

Sebelum memulai, pastikan sistem Anda memiliki:

- **PHP 8.2** atau lebih tinggi
- **Composer** (dependency manager untuk PHP)
- **Node.js & npm** (untuk mengelola frontend dependencies)
- **Git** (untuk version control)
- **Database Driver** (MySQL atau SQLite)
- **XAMPP/Apache Server** (atau web server lainnya)

### Verifikasi Instalasi
```bash
php -v          # Cek versi PHP
composer -v     # Cek Composer
node -v         # Cek Node.js
npm -v          # Cek npm
```

---

## 🚀 Langkah-Langkah Instalasi

### 1. Clone atau Download Repository

```bash
cd c:\xampp\htdocs
git clone <repository-url> infrastruktur-riset
cd infrastruktur-riset
```

### 2. Install Backend Dependencies

```bash
composer install
```

### 3. Install Frontend Dependencies

```bash
npm install
```

### 4. Setup File Environment (.env)

Buat file `.env` dari template:

```bash
cp .env.example .env
```

Atau jika menggunakan Windows PowerShell:

```powershell
Copy-Item .env.example -Destination .env
```

### 5. Generate Application Key

```bash
php artisan key:generate
```

### 6. Konfigurasi Database (lihat bagian Database Configuration di bawah)

### 7. Jalankan Database Migration

```bash
php artisan migrate
```

### 8. Build Frontend Assets

```bash
npm run build
```

### 9. (Opsional) Seed Database dengan Data Dummy

```bash
php artisan db:seed
```

---

## 💾 Konfigurasi Database

### Menggunakan SQLite (Default/Rekomendasi untuk Development)

File `.env`:
```env
DB_CONNECTION=sqlite
DB_DATABASE=/path/to/database/database.sqlite
```

Database SQLite akan otomatis dibuat di folder `database/` dengan nama `database.sqlite`.

### Menggunakan MySQL

Jika ingin menggunakan MySQL, sesuaikan file `.env`:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=infrastruktur_riset
DB_USERNAME=root
DB_PASSWORD=
```

**Langkah-langkah setup MySQL:**

1. Buat database baru di MySQL:
```sql
CREATE DATABASE infrastruktur_riset CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
```

2. Sesuaikan kredensial di file `.env`

3. Jalankan migration:
```bash
php artisan migrate
```

### Struktur Tabel Utama

#### Tabel: `infrastruktur_risets`
| Field | Tipe | Keterangan |
|-------|------|-----------|
| id | Integer | Primary Key |
| nama_laboratorium | String | Nama lab/fasilitas |
| lembaga | String | Institusi/lembaga |
| jenis_akreditasi | String | Jenis akreditasi (nullable) |
| terakreditasi | Boolean | Status akreditasi (default: false) |
| fasilitas | Text | Deskripsi fasilitas |
| lokasi | String | Lokasi/alamat |
| biaya_pengujian | String | Estimasi biaya |
| contact_person | String | Kontak person |
| latitude | Decimal | Koordinat lintang |
| longitude | Decimal | Koordinat bujur |
| timestamps | - | created_at, updated_at |

#### Tabel: `sdm_ipteks`
| Field | Tipe | Keterangan |
|-------|------|-----------|
| id | Integer | Primary Key |
| nama | String | Nama SDM |
| alamat | String | Alamat (nullable) |
| laboratorium | String | Nama lab yang terkait |
| kepakaran | String | Bidang keahlian |
| instansi | String | Institusi asal |
| email | String | Email (unique) |
| kontak | String | Nomor kontak (nullable) |
| latitude | Decimal | Koordinat lintang |
| longitude | Decimal | Koordinat bujur |
| timestamps | - | created_at, updated_at |

---

## 🎯 Cara Menjalankan Aplikasi

### 1. Development Mode (Recommended)

Jalankan semua service secara bersamaan:

```bash
composer run dev
```

Command ini akan menjalankan:
- PHP Development Server (port 8000)
- Queue Listener
- Pail (log viewer)
- Vite Dev Server (Hot Module Replacement)

Akses aplikasi di: **http://localhost:8000**

### 2. Manual Mode (Alternatif)

**Terminal 1 - Start PHP Server:**
```bash
php artisan serve
```

**Terminal 2 - Start Vite Dev Server:**
```bash
npm run dev
```

Aplikasi akan tersedia di: **http://localhost:8000**

### 3. Production Mode

Compile assets untuk production:

```bash
npm run build
```

Kemudian deploy menggunakan web server (Apache, Nginx, dll).

---

## 📱 Struktur Routes

### Public Routes
- `GET /` - Halaman beranda
- `GET /sdm/map` - Peta lokasi SDM
- `GET /infrastruktur/map` - Peta lokasi infrastruktur

### Authenticated Routes (Memerlukan Login)
- `GET /dashboard` - Dashboard utama
- **Infrastruktur:**
  - `GET /infrastruktur` - List infrastruktur (with filter & search)
  - `GET /infrastruktur/create` - Form tambah infrastruktur
  - `POST /infrastruktur` - Simpan infrastruktur baru
  - `GET /infrastruktur/{id}/edit` - Form edit infrastruktur
  - `PATCH /infrastruktur/{id}` - Update infrastruktur
  - `DELETE /infrastruktur/{id}` - Hapus infrastruktur
  - `POST /infrastruktur/import` - Import data dari Excel
  - `GET /infrastruktur/export` - Export data ke Excel

- **SDM:**
  - `GET /sdm` - List SDM
  - `GET /sdm/create` - Form tambah SDM
  - `POST /sdm` - Simpan SDM baru
  - `GET /sdm/{id}/edit` - Form edit SDM
  - `PATCH /sdm/{id}` - Update SDM
  - `DELETE /sdm/{id}` - Hapus SDM
  - `POST /sdm/import` - Import data dari Excel
  - `GET /sdm/export` - Export data ke Excel

- **Profile:**
  - `GET /profile` - Edit profil pengguna
  - `PATCH /profile` - Update profil
  - `DELETE /profile` - Hapus akun

---

## 📂 Struktur Folder

```
infrastruktur-riset/
├── app/
│   ├── Exports/          # Class untuk export Excel
│   ├── Http/
│   │   ├── Controllers/  # Controller aplikasi
│   │   └── Requests/     # Form validation requests
│   ├── Imports/          # Class untuk import Excel
│   ├── Models/           # Database models
│   └── Providers/        # Service providers
├── bootstrap/            # Bootstrap configuration
├── config/               # Configuration files
├── database/
│   ├── factories/        # Model factories
│   ├── migrations/       # Database migrations
│   └── seeders/          # Database seeders
├── public/               # Public assets
├── resources/
│   ├── css/              # Stylesheet
│   ├── js/               # JavaScript
│   └── views/            # Blade templates
├── routes/               # Route definitions
├── storage/              # File storage
├── tests/                # Test files
├── vendor/               # Composer dependencies
├── .env.example          # Environment template
├── composer.json         # PHP dependencies
├── package.json          # NPM dependencies
├── vite.config.js        # Vite configuration
├── tailwind.config.js    # Tailwind CSS config
└── README.md             # Dokumentasi ini
```

---

## 🧪 Testing

Jalankan test suite:

```bash
composer test
```

Atau menggunakan Laravel Artisan secara langsung:

```bash
php artisan test
```

---

## 🔍 Troubleshooting

### Problem: "Class not found" atau error autoload
**Solusi:**
```bash
composer dump-autoload
```

### Problem: Database migration gagal
**Solusi:**
```bash
php artisan migrate:rollback
php artisan migrate
```

### Problem: Assets tidak ter-compile
**Solusi:**
```bash
npm run build
php artisan cache:clear
```

### Problem: Port 8000 sudah digunakan
**Solusi:**
```bash
php artisan serve --port=8001
```

---

## 📞 Support & Kontribusi

Untuk pertanyaan, laporan bug, atau saran, silakan buat issue di repository ini atau hubungi tim pengembang.

---

## 📝 Lisensi

Project ini dilisensikan di bawah MIT License. Silakan lihat file LICENSE untuk detail lengkap.

---

## 👤 Penulis

<div align="center">

**Dibuat oleh**

### Wildan Fuad Azzaki (WFA)

*Full-Stack Laravel Developer & Technical Writer*

---

**Terima kasih telah menggunakan Sistem Manajemen Infrastruktur Riset dan SDM IPTEKS** 🙏

</div>-dan-sdm
