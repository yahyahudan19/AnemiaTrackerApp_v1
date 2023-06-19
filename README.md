# AnemiaTrackerApp

![AnemiaTrackerApp](anemiatrackerapp.png)

AnemiaTrackerApp adalah aplikasi berbasis website yang dibangun dengan menggunakan framework Laravel 10. Aplikasi ini dirancang khusus untuk melakukan tracking terhadap anemia di kalangan remaja. Dengan menggunakan AnemiaTrackerApp, pengguna dapat memantau dan menganalisis data terkait anemia, serta memperoleh informasi yang berguna dalam upaya pencegahan dan penanganan anemia.

## Fitur Utama

- **Pemantauan Data Anemia:** AnemiaTrackerApp memungkinkan pengguna untuk memasukkan data terkait anemia, seperti tingkat hemoglobin, hasil tes darah, dan riwayat kesehatan. Pengguna dapat mengupdate data secara berkala dan melihat perkembangan anemia mereka dari waktu ke waktu.

- **Grafik dan Statistik:** Aplikasi ini menyediakan grafik dan statistik yang intuitif untuk membantu pengguna memahami data anemia mereka dengan lebih baik. Pengguna dapat melihat tren, perubahan, dan pola yang terjadi dalam tingkat hemoglobin mereka.

- **Notifikasi dan Pengingat:** AnemiaTrackerApp memberikan kemampuan untuk mengatur pengingat dan notifikasi untuk mengingatkan pengguna tentang waktu pemeriksaan, pengambilan suplemen, atau aktivitas kesehatan lainnya yang berhubungan dengan penanganan anemia.

- **Informasi dan Artikel:** Aplikasi ini menyediakan akses mudah ke informasi dan artikel terkait anemia, termasuk penyebab, gejala, dan tips pencegahan. Pengguna dapat memperoleh pengetahuan yang berguna untuk memahami dan mengelola anemia dengan lebih baik.

## Persyaratan Sistem

Sebelum menginstal dan menggunakan AnemiaTrackerApp, pastikan sistem Anda memenuhi persyaratan berikut:

- PHP 8.0 atau versi lebih baru
- Composer
- MySQL atau database lain yang didukung oleh Laravel
- Node.js
- NPM atau Yarn

## Instalasi

Berikut adalah langkah-langkah untuk menginstal AnemiaTrackerApp di proyek Laravel 10 Anda:

1. Clone repositori ini ke direktori proyek Laravel Anda:

   ```bash
   git clone https://github.com/username/AnemiaTrackerApp.git
   ```

2. Masuk ke direktori proyek:

   ```bash
   cd AnemiaTrackerApp
   ```

3. Install semua dependensi menggunakan Composer:

   ```bash
   composer install
   ```

4. Salin file `.env.example` menjadi `.env`:

   ```bash
   cp .env.example .env
   ```

5. Generate kunci aplikasi Laravel:

   ```bash
   php artisan key:generate
   ```

6. Konfigurasikan file `.env` dengan detail database Anda.

7. Jalankan migrasi database dan isi data awal:

   ```bash
   php artisan migrate --seed
   ```

8. Jalankan server pengembangan Laravel:

   ```bash
   php artisan serve
   ```

9. Buka aplikasi di browser dengan mengunjungi `http://localhost:8000`.

## Kontribusi

Kami senang menerima kontribusi dari komunitas untuk meningkatkan AnemiaTrackerApp. Jika Anda ingin berkontribusi, silakan ikuti langkah

-langkah berikut:

1. Fork repositori ini.
2. Buat branch baru untuk fitur atau perbaikan yang akan Anda buat.
3. Lakukan perubahan yang diperlukan.
4. Submit pull request ke branch utama.

## Lisensi

AnemiaTrackerApp dilisensikan di bawah [MIT License](LICENSE). Silakan lihat file LICENSE untuk informasi lebih lanjut.

---

Dengan AnemiaTrackerApp, kami berharap dapat membantu pengguna dalam memantau dan mengelola anemia dengan lebih efektif. Jika Anda memiliki pertanyaan, saran, atau masukan lainnya, jangan ragu untuk menghubungi tim pengembang kami. Terima kasih telah menggunakan AnemiaTrackerApp!

**Tim Pengembang AnemiaTrackerApp**
