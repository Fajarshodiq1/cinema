# My Laravel Project

## Deskripsi

Proyek ini dibangun menggunakan Laravel sebagai kerangka kerja utama dengan fitur modern untuk kebutuhan pengembangan web.
Dibangun untuk memenuhi salah satu tugas matakuliah Teknososiopreneur lanjutan

---

## Teknologi yang Digunakan

-   **PHP**: Versi 8.3
-   **Laravel**: Framework backend modern
-   **Filament**: Versi terbaru sebagai library admin panel
-   **Tailwind CSS**: Untuk styling UI yang efisien

---

## Cara Instalasi

Ikuti langkah-langkah berikut untuk menjalankan proyek ini:

### 1. Clone Repository

Jalankan perintah berikut untuk meng-clone repository:

```bash
git clone https://github.com/username/repository-name.git
```

### 2. Masuk ke Direktori Proyek

```bash
cd repository-name
```

### 3. Instal Dependencies

Instal semua dependencies menggunakan Composer dan NPM:

```bash
composer install
npm install
npm run build
```

### 4. Konfigurasi File Environment

Salin file `.env.example` menjadi `.env`:

```bash
cp .env.example .env
```

Edit file `.env` sesuai dengan konfigurasi database Anda:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=nama_database
DB_USERNAME=username
DB_PASSWORD=password
```

### 5. Generate Key

```bash
php artisan key:generate
```

### 6. Migrasi Database

Jalankan migrasi untuk membuat tabel-tabel yang diperlukan:

```bash
php artisan migrate
```

### 7. Jalankan Server Lokal

```bash
php artisan serve
```

Akses proyek Anda di [http://localhost:8000](http://localhost:8000).

---

## Lisensi

Proyek ini menggunakan lisensi MIT. Silakan lihat file `LICENSE` untuk informasi lebih lanjut.
