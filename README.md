## Project Ringkasan

**Nama Proyek**: Laravel Auth

Aplikasi ini adalah API otentikasi sederhana berbasis Laravel yang menggunakan Sanctum untuk manajemen token. Fungsionalitas utama: pendaftaran (`register`), masuk (`login`), logout, dan endpoint profil yang membutuhkan token.

## Dibuat Oleh

- **Nama**: Muhammad Rakha Syamputra
- **NPM**: 23010631250024
- **Kelas**: 6A Sistem Informasi

**Laporan lengkap**: [Klik di sini](https://drive.google.com/file/d/1kQIJwzmwT0yXejMHewbD2N8UH2xXbA1F/view?usp=drive_link)

## Endpoint API

- **POST** [api/register](routes/api.php#L3): Daftar akun baru.
	- Request body (JSON atau form-data): `name`, `email`, `password`
	- Respon sukses: JSON berisi objek user dan pesan sukses.
- **POST** [api/login](routes/api.php#L4): Login dan terima token.
	- Request body: `email`, `password`
	- Respon sukses: `access_token` (plain text token) dan `token_type`.
- **POST** [api/logout](routes/api.php#L7): Logout (harus Authorization Bearer token).
- **GET** [api/profil](routes/api.php#L9): Ambil data profil user (butuh token).

Contoh cURL untuk register:

```bash
curl -X POST http://127.0.0.1:8000/api/register \
	-H "Accept: application/json" \
	-H "Content-Type: application/json" \
	-d '{"name":"Rakha","email":"rakha@example.com","password":"RakhaGans05"}'
```

Catatan: server development dijalankan mis. dengan:

```bash
php -f "c:\\Users\\Rakha\\OneDrive\\Documents\\WSA\\auth-api\\artisan" serve --host=127.0.0.1 --port=8000
```

## Struktur Singkat

- [routes/api.php](routes/api.php#L1-L12): Definisi route API.
- [app/Http/Controllers/Api/AuthController.php](app/Http/Controllers/Api/AuthController.php#L1-L40): Implementasi `register`, `login`, `logout`.
- [app/Models/User.php](app/Models/User.php): Model User.

## NPM / Frontend (skrip dari `package.json`)

Proyek berisi aset Vite/Tailwind untuk frontend (minimal). Skrip `npm` tersedia sebagai berikut:

- `npm run dev` — jalankan Vite untuk development.
- `npm run build` — build aset produksi dengan Vite.

File: [package.json](package.json#L1-L20)

## Persiapan & Menjalankan (singkat)

1. Salin `.env.example` ke `.env` dan atur `DB_*` serta `APP_KEY`.
2. Install dependensi PHP:

```bash
composer install
php artisan key:generate
php artisan migrate
```

3. Install dependensi node (jika pakai frontend aset):

```bash
npm install
npm run dev
```

4. Jalankan server development:

```bash
php artisan serve
```

## Lisensi

Proyek mengikuti lisensi MIT (sesuai dependensi Laravel dan paket terkait).
