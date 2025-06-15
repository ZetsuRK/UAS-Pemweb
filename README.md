(UAS Project Ahmad Aryobimo 2023E)

📦 Fitur Utama
- CRUD Berita
- Approval Editor
- Role: Admin, Editor, Wartawan, Guest
- Upload Gambar Berita
- Edit Profil + Foto
- Login, Register, Remember Me
- Tampilan menggunakan SB Admin 2
- Berita publik bisa diakses tanpa login

🚀 Cara Menjalankan
- Extract ZIP
- Jalankan:
- composer install
- cp .env.example .env
- php artisan key:generate
- php artisan migrate --seed
- php artisan storage:link
- php artisan serve
