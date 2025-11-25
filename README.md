# Laravel Company Profile Website 🏢
[![Laravel](https://img.shields.io/badge/Laravel-10.0-FF2D20?style=for-the-badge&logo=laravel&logoColor=white)](https://laravel.com)
[![PHP](https://img.shields.io/badge/PHP-8.1-777BB4?style=for-the-badge&logo=php&logoColor=white)](https://php.net)
[![MySQL](https://img.shields.io/badge/MySQL-00000F?style=for-the-badge&logo=mysql&logoColor=white)](https://mysql.com)
[![JavaScript](https://img.shields.io/badge/JavaScript-F7DF1E?style=for-the-badge&logo=javascript&logoColor=black)](https://javascript.com)

## 📝 Deskripsi
Website company profile dinamis yang dibangun menggunakan Laravel framework. Dilengkapi dengan sistem manajemen konten yang mudah digunakan dan tampilan yang responsif untuk berbagai perangkat.

## ✨ Fitur

- Frontend
  - ✅ Halaman Home/Landing Page
  - 📱 Halaman About Us
  - 🛍️ Halaman Services/Products
  - 📸 Halaman Portfolio/Gallery
  - 📞 Halaman Contact
  - 📰 Halaman Blog/News
  - 💼 Halaman Career

- Backend/Admin Panel
  - 📊 Dashboard Admin
  - 👥 Manajemen User & Role
  - 📑 Manajemen Konten Website
  - 🎯 Manajemen Banner/Slider
  - 📝 Manajemen Blog/News
  - 🖼️ Manajemen Gallery
  - 📨 Manajemen Contact Form
  - ⚙️ Pengaturan Website

## 🛠️ Teknologi
- Laravel 10.x
- PHP 8.1
- MySQL Database
- Bootstrap 5
- jQuery
- HTML5 & CSS3
- JavaScript

## 📋 Persyaratan Sistem
- PHP >= 8.1
- Composer
- MySQL
- Node.js & NPM

## 🚀 Instalasi

1. Clone repository
```bash
git clone https://github.com/ndrzy30/laravel-company-website.git
cd laravel-company-website
```

2. Install dependencies
```bash
composer install
npm install
```

3. Setup environment
```bash
cp .env.example .env
php artisan key:generate
```

4. Setup database di file .env
```bash
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=laravel_company
DB_USERNAME=root
DB_PASSWORD=
```

5. Jalankan migrasi dan seeder
```bash
php artisan migrate
php artisan db:seed
```

6. Jalankan aplikasi
```bash
php artisan serve
npm run dev
```

## 👨‍💻 Penggunaan
1. Akses aplikasi melalui http://localhost:8000
2. Untuk akses admin:
```bash
URL     : /admin/login
Email   : admin@admin.com
Password: admin123
```

## 📊 Struktur Database
~ users
~ roles
~ pages
~ posts
~ categories
~ products
~ galleries
~ banners
~ contacts
~ settings

## 🤝 Kontribusi
Kontribusi selalu welcome! Untuk berkontribusi:
```bash
1. Fork repository
2. Buat branch baru (git checkout -b feature/AmazingFeature)
3. Commit perubahan (git commit -m 'Add some AmazingFeature')
4. Push ke branch (git push origin feature/AmazingFeature)
5. Buat Pull Request
```

## 📝 Lisensi
Distributed under the MIT License. See LICENSE for more information.

## 📫 Kontak
Project Link: https://github.com/ndrzy30/laravel-company-website
[![Instagram](https://img.shields.io/badge/Instagram-%23E4405F.svg?&style=for-the-badge&logo=instagram&logoColor=white)](https://instagram.com/ndrzyy_99)














