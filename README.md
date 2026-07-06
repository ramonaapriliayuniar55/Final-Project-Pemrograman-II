# 📚 Project Final - Sistem Perpustakaan

**Nama:** Ramona Aprilia Yuniar
**NIM:** 60324039
**Prodi:** Informatika
**Semester:** 4
**Mata Kuliah:** Pemrograman Web II
**Repository:** [https://github.com/ramonaapriliayuniar55/Final-Project-Pemrograman-II.gi]

---

## Dokumentasi Fitur Wajib 

### 1. Authentication System

## Login

Halaman login untuk masuk ke sistem menggunakan email dan password yang sudah terdaftar.

### Screenshot

![](./screenshots/login.png)

## Register

Halaman register untuk membuat akun baru bagi user yang belum memiliki akses ke sistem.

### Screenshot

![](./screenshots/register.png)

## Logout

Proses logout untuk mengakhiri sesi login user.

### Screenshot

![](./screenshots/logout.png)


## Middleware Protection

Jika belum login, middleware akan menolak akses ke halaman terproteksi dan secara otomatis mengalihkan (redirect) user kembali ke halaman login.

### Screenshot

![](./screenshots/login.png)

---

### 2. CRUD Buku Lengkap

## Create Buku

Form untuk menambahkan data buku baru.

### Screenshot

![](./screenshots/createbuku.png)

## Read Buku

Halaman daftar dan detail data buku.

### Screenshot

![](./screenshots/readbuku.png)

## Update Buku

Form untuk mengubah data buku yang sudah ada.

### Screenshot

![](./screenshots/updatebuku.png)

## Delete Buku

Proses menghapus data buku.

### Screenshot

![](./screenshots/deletebuku.png)

## Validation Buku

Validasi input form buku (judul, penulis, stok, dll).

### Screenshot

![](./screenshots/validationbuku.png)

## Search & Filter Buku

Pencarian buku berdasarkan judul/penulis, serta filter berdasarkan kategori/ketersediaan.

### Screenshot

![](./screenshots/searchfilterbuku.png)

---

### 3. CRUD Anggota Lengkap

## Create Anggota

Form untuk menambahkan data anggota baru.

### Screenshot

![](./screenshots/createanggota.png)

## Read Anggota

Halaman daftar dan detail data anggota.

### Screenshot

![](./screenshots/readanggota.png)

## Update Anggota

Form untuk mengubah data anggota.

### Screenshot

![](./screenshots/updateanggota.png)

## Delete Anggota

Proses menghapus data anggota.

### Screenshot

![](./screenshots/deleteanggota.png)

## Date Handling

Penanganan format tanggal (tanggal lahir, tanggal bergabung, dll).

### Screenshot

![](./screenshots/datehandling.png)

## Email & Phone Validation

Validasi format email dan nomor telepon anggota.

### Screenshot

![](./screenshots/emailphonevalidation.png)

---

### 4. Transaksi Peminjaman

## Form Peminjaman

Form untuk mencatat transaksi peminjaman buku oleh anggota.

### Screenshot

![](./screenshots/formpeminjaman.png)

## Auto Update Stok (-1)

Stok buku otomatis berkurang saat buku dipinjam.

### Screenshot

![](./screenshots/autoupdatestokminus.png)

## Generate Kode Transaksi

Kode transaksi dibuat otomatis dan unik setiap peminjaman.

### Screenshot

![](./screenshots/generatekodetransaksi.png)

## Tanggal Kembali Auto (+7 Hari)

Tanggal kembali dihitung otomatis 7 hari dari tanggal pinjam.

### Screenshot

![](./screenshots/tanggalkembaliauto.png)

---

### 5. Pengembalian Buku

## View Detail Transaksi dengan Button "Kembalikan Buku"

Halaman detail transaksi menyediakan tombol *Kembalikan Buku* untuk memproses pengembalian buku.

### Screenshot

![](./screenshots/detailtransaksipeminjaman.png)

## Update Status

Status transaksi berubah dari "Dipinjam" menjadi "Dikembalikan".

### Screenshot

![](./screenshots/updatestatuspengembalian.png)

## Perhitungan Denda (Rp 5.000/hari)

Denda dihitung otomatis berdasarkan jumlah hari keterlambatan.

### Screenshot

![](./screenshots/perhitungandenda.png)

## Auto Update Stok (+1)

Stok buku otomatis bertambah saat buku dikembalikan.

### Screenshot

![](./screenshots/autoupdatestokplus.png)

---

### 6. Dashboard

## Statistics

Minimal 6 statistik ringkas ditampilkan di dashboard (total buku, total anggota, total transaksi, buku terlambat, dll).

### Screenshot

![](./screenshots/dashboardstatistics.png)

## Charts (Line + Pie/Bar)

Grafik tren peminjaman (line chart) dan grafik kategori/status (pie/bar chart).

### Screenshot

![](./screenshots/dashboardcharts.png)

## Recent Data Tables

Tabel data transaksi/aktivitas terbaru.

### Screenshot

![](./screenshots/recentdatatables.png)

## Quick Actions

Tombol akses cepat ke fitur-fitur utama.

### Screenshot

![](./screenshots/quickactions.png)

---

### 7. Global Search

## Search 3 Modules

Pencarian dilakukan di 3 modul sekaligus: buku, anggota, dan transaksi.

### Screenshot

![](./screenshots/globalsearch.png)

## Results dalam Tabs

Hasil pencarian ditampilkan dalam tab terpisah per modul.

### Screenshot

![](./screenshots/resultstabs.png)

## Keyword Highlighting

Kata kunci pencarian ditandai (highlight) pada hasil.

### Screenshot

![](./screenshots/keywordhighlighting.png)

---

### 8. Laporan Transaksi

## Filter (Date, Status, Anggota)

Laporan dapat difilter berdasarkan rentang tanggal, status transaksi, dan anggota.

### Screenshot

![](./screenshots/filterlaporan.png)

## Statistics Summary

Ringkasan statistik ditampilkan di atas tabel laporan.

### Screenshot

![](./screenshots/statisticssummary.png)

## Print-Friendly

Tampilan laporan dioptimalkan untuk dicetak.

### Screenshot

![](./screenshots/printfriendly.png)

---

## Dokumentasi Fitur Tambahan

### 9. Notifikasi Terlambat

## Dashboard Widget Terlambat

Widget khusus di dashboard yang menampilkan jumlah dan daftar transaksi yang sudah melewati tanggal kembali.

### Screenshot

![](./screenshots/widgetterlambat.png)

## Badge Transaksi

Badge "Terlambat X hari" ditampilkan pada baris transaksi yang terlambat di halaman index.

### Screenshot

![](./screenshots/badgeterlambat.png)

---

### 10. Kategori Buku Management

## Kategori Buku

CRUD kategori buku, relasi kategori dengan buku, serta dropdown & filter kategori pada form dan daftar buku.

### Screenshot

![](./screenshots/kategoribuku.png)

---

### 11. Riwayat Peminjaman Anggota

## Riwayat Peminjaman

Menampilkan seluruh riwayat peminjaman buku pada halaman detail anggota, termasuk statistik total pinjam dan total denda.

### Screenshot

![](./screenshots/riwayatpeminjaman.png)

---

## 🛠️ Tech Stack

- **Backend:** Laravel (PHP)
- **Frontend:** Blade, Bootstrap / Tailwind CSS
- **Database:** MySQL

---

## ⚙️ Instalasi

```bash
git clone https://github.com/ramonaapriliayuniar55/Final-Project-Pemrograman-II.git
cd Project_Semester4_SistemPerpustakaan
composer install
npm install
cp .env.example .env
php artisan key:generate
php artisan migrate --seed
npm run dev
php artisan serve
```

Akses aplikasi melalui:
```
http://127.0.0.1:8000
```

---

