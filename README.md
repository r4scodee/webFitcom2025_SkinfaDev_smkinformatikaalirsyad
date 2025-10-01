# 🌱 TaniDigital

TaniDigital adalah sebuah aplikasi berbasis web yang dibuat dengan **PHP OOP** menggunakan konsep **Model-View-Controller (MVC)**.  
Project ini dibuat untuk mempermudah manajemen data dalam dunia pertanian secara digital.

👨‍💻 **Dibuat oleh:**

- Irbadh As-iribuny
- Syafiq Bamazruk

---

## 🚀 Fitur Utama

- Struktur project berbasis **PHP OOP** dengan **MVC Pattern**
- CRUD (Create, Read, Update, Delete) data
- Autoloading class & pemisahan logic (Controller, Model, View)
- Terhubung dengan database MySQL

---

## 📂 Struktur Project

webFitcom2025_SkinfaDev_smkinformatikaalirsyad/
├── app/
│ ├── controllers/
│ │ ├── AuthController.php
│ │ ├── DashboardController.php
│ │ ├── ProductController.php
│ │ └── UserController.php
│ ├── models/
│ │ ├── Product.php
│ │ └── User.php
│ ├── views/
│ │ ├── auth/
│ │ │ ├── login.php
│ │ │ └── register.php
│ │ ├── dashboard/
│ │ │ ├── index.php
│ │ │ └── stats.php
│ │ ├── products/
│ │ │ ├── create.php
│ │ │ ├── edit.php
│ │ │ └── index.php
│ │ └── users/
│ │ ├── edit.php
│ │ └── profile.php
│ └── libs/
│ ├── Controller.php
│ ├── Core.php
│ └── Database.php
├── assets/
│ ├── css/
│ │ └── style.css
│ ├── js/
│ │ └── script.js
│ └── img/
│ └── logo.png
├── config/
│ └── Database.php
├── database/
│ └── tanidigital.sql
├── .htaccess
├── index.php
├── logout.php
├── README.md

---

## ⚙️ Instalasi & Menjalankan Project

### 1️⃣ Clone / Extract Project

Jika project dalam bentuk `.zip`, extract ke folder:

- **Laragon:** `D:\laragon\www\webFitcom2025_SkinfaDev_smkinformatikaalirsyad`
- **XAMPP:** `C:\xampp\htdocs\webFitcom2025_SkinfaDev_smkinformatikaalirsyad`

### 2️⃣ Konfigurasi Database

- Buka file: `database/db_fitcom.sql`
- Silahkan load file .sql yang sudah disediakan ke phpMyAdmin/HeidiSQL untuk membuat database dan tabel project ini.

### Catatan

- Pastikan Apache & MySQL sudah aktif di Laragon/XAMPP
- Jika routing tidak jalan, cek file .htaccess apakah sudah aktif di public/
- Untuk login default, bisa dicek di tabel users pada database
