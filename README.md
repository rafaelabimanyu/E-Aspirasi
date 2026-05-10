# E-Aspirasi 🏛️

**E-Aspirasi** adalah portal digital pelayanan publik yang dibangun untuk menjembatani komunikasi antara masyarakat dan instansi pemerintah. Sistem ini dirancang sebagai wadah terpadu untuk penyampaian pengaduan, aspirasi, dan informasi secara transparan, aman, dan dapat dilacak.

Dengan mengusung desain yang modern, responsif, dan *light-mode only*, aplikasi ini memberikan pengalaman pengguna (UX) yang setara dengan produk *enterprise Software as a Service* (SaaS), memastikan setiap warga negara dapat mengakses layanan publik dengan mudah.

---

## 🌟 Fitur Utama

- **Manajemen Pengaduan Real-time**: Pelaporan masalah atau aspirasi dengan fitur pelacakan status (Menunggu, Diproses, Selesai).
- **Tracking ID**: Setiap laporan dibekali ID unik untuk memudahkan pelacakan progres secara anonim (jika diinginkan).
- **Warta Komunitas (Sistem Berita)**: Publikasi pengumuman, berita instansi, dan edukasi publik yang terintegrasi dengan data realistis.
- **Dashboard Statistik Live**: Visualisasi data real-time penanganan laporan secara transparan.
- **Role-Based Access Control (RBAC)**: Pemisahan hak akses yang tegas antara Masyarakat, Petugas, dan Administrator.
- **Arsitektur Modular**: Halaman publik (Landing Page) dibangun menggunakan pendekatan komponen, mempermudah skalabilitas UI.

---

## 🛠️ Spesifikasi Teknologi (Tech Stack)

Aplikasi ini dikembangkan menggunakan teknologi modern standar industri:

| Kategori | Teknologi Utama | Keterangan |
| :--- | :--- | :--- |
| **Backend Framework** | Laravel 11/12 | Kerangka kerja PHP yang *robust* dan aman. |
| **UI Framework** | Tailwind CSS v4 | *Utility-first CSS framework* (Light Mode Only, gaya desain biru profesional). |
| **JavaScript / Interaktivitas** | Alpine.js | Digunakan untuk komponen reaktif ringan (seperti *dropdown* dan *accordion* FAQ). |
| **Visualisasi Data** | Chart.js | Rendering grafik statistik di dashboard admin. |
| **Notifikasi** | SweetAlert2 | *Popup* alert interaktif dan modern. |
| **Animasi UI** | AOS (Animate on Scroll) | Memberikan transisi elemen halus saat pengguna melakukan *scrolling* di Landing Page. |

---

## 🏗️ Struktur Arsitektur Modular (Landing Page)

Untuk mencegah *spaghetti code* dan mempermudah pemeliharaan, halaman depan (`welcome.blade.php`) telah direfaktor menggunakan arsitektur komponen. Seluruh komponen berada di dalam direktori `resources/views/components/landing/`:

1. **`navbar.blade.php`**: Menu navigasi utama. Dilengkapi *event listener* transisi *scroll* (berubah dari transparan menjadi solid putih dengan *shadow*).
2. **`hero.blade.php`**: Area visual utama (Gaya SaaS) dengan *Call to Action* (CTA) "Buat Laporan" yang menonjol dan gambar Unsplash.
3. **`features.blade.php`**: Menampilkan alur pelayanan ("Cara Kerja") secara *step-by-step* menggunakan ikon.
4. **`stats.blade.php`**: Komponen *Bento-grid* yang menampilkan data statistik penanganan laporan secara dinamis.
5. **`news-section.blade.php`**: Grid artikel/warta yang menampilkan gambar secara proporsional dengan efek *hover zoom*.
6. **`faq.blade.php`**: Seksi *Frequently Asked Questions* interaktif menggunakan fungsi *toggle* Alpine.js.
7. **`footer.blade.php`**: Kaki halaman minimalis yang mencakup informasi kontak dinas terkait dan *placeholder* peta.

### Alur Data (Controller ke View)
Data dinamis (seperti statistik dan daftar berita terbaru) disuntikkan dari `Route` atau `Controller` menuju view utama `welcome.blade.php`. View utama kemudian mendistribusikan variabel tersebut ke dalam komponen menggunakan *array passing*:

```blade
<!-- Contoh di welcome.blade.php -->
@include('components.landing.stats', ['totalSelesai' => $totalSelesai, 'totalProses' => $totalProses])
@include('components.landing.news-section', ['news' => $news])
```

---

## 👥 Alur Kerja Aplikasi (Role & Permissions)

Aplikasi ini memisahkan pengguna menjadi tiga *role* utama yang diatur melalui *Middleware* di `routes/web.php`:

### 1. Masyarakat (Pelapor)
- Mendaftar dan mengelola akun pribadi.
- Membuat pengaduan/aspirasi baru.
- Memantau status laporan pribadi.
- Menambahkan tanggapan/balasan pada laporan yang telah direspons.

### 2. Petugas (Operator)
- Mengakses *Dashboard* internal.
- Memverifikasi laporan baru yang masuk.
- Memberikan respons/tanggapan atas laporan masyarakat.
- Mengubah status laporan (Proses $\rightarrow$ Selesai).

### 3. Administrator (Super User)
- Memiliki seluruh akses yang dimiliki Petugas.
- **Manajemen User**: Menambah, mengedit, atau menghapus akun Masyarakat/Petugas.
- **Manajemen Berita**: CRUD (Create, Read, Update, Delete) artikel dan pengumuman untuk publik.
- **Pengaturan Sistem**: Mengonfigurasi profil instansi dan mode pemeliharaan aplikasi.

---

## 🚀 Panduan Instalasi & Setup

Ikuti langkah-langkah berikut untuk menjalankan aplikasi E-Aspirasi di lingkungan lokal (Local Development):

### 1. Kloning & Persiapan *Environment*
Pastikan Anda memiliki PHP (>= 8.2), Composer, dan Node.js terinstal.

```bash
git clone <url-repository>
cd E-Aspirasi
copy .env.example .env
```
Sesuaikan konfigurasi database (`DB_DATABASE`, `DB_USERNAME`, `DB_PASSWORD`) pada file `.env`.

### 2. Instalasi Dependensi
```bash
composer install
npm install
```

### 3. Generate Key & Persiapan Database
```bash
php artisan key:generate
```

### 4. Migrasi & Seeding Data (Sangat Penting)
Untuk memastikan tampilan aplikasi langsung terlihat profesional, kami telah menyertakan `DatabaseSeeder` yang memuat akun *dummy* dan `NewsSeeder` yang mengambil gambar realistis dengan resolusi tinggi langsung dari Unsplash (misal: gambar infrastruktur jalan, medis, dll).

```bash
php artisan migrate:fresh --seed
```

### 5. Kompilasi Aset Frontend (Tailwind v4)
Wajib dijalankan karena aplikasi menggunakan Tailwind CSS.
```bash
# Untuk development
npm run dev

# Untuk production
npm run build
```

### 6. Jalankan Server
```bash
php artisan serve
```
Akses aplikasi melalui `http://localhost:8000`.

---

## 🔧 Panduan Pemeliharaan (Maintenance)

### Modifikasi Tema Warna
Tema utama aplikasi difokuskan pada mode cerah dengan warna primer **Biru Enterprise**. Jika Anda ingin mengubah palet warna dasar (*design tokens*), buka file:
`resources/css/app.css`

Ubah konfigurasi pada *layer utilities* atau base class CSS:
```css
/* Contoh mengubah bayangan card */
.card:hover {
    box-shadow: 0 20px 40px -12px rgba(37, 99, 235, 0.1); /* Sesuaikan rgba dengan warna brand */
}
```

<>

### Menambahkan Komponen Landing Page Baru
Jika instansi membutuhkan blok informasi baru (misal: Profil Kepala Dinas):
1. Buat file baru di `resources/views/components/landing/profil-dinas.blade.php`.
2. Gunakan *class* Tailwind yang ada agar desain tetap konsisten (misal: gunakan `bg-white border border-slate-100 rounded-[2rem]`).
3. Panggil komponen tersebut di dalam `resources/views/welcome.blade.php` pada urutan seksi yang diinginkan:
   ```blade
   @include('components.landing.profil-dinas')
   ```

---
*Dokumentasi ini disusun untuk mempermudah serah terima proyek (handover) kepada tim IT Instansi.*
