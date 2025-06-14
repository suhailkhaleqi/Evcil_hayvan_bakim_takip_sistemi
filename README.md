# 🐾 Evcil Hayvan Takip Sistemi

PHP, MySQL ve Bootstrap kullanılarak geliştirilmiş kullanıcı dostu bir evcil hayvan yönetim sistemi.


## ✨ Özellikler
- 🔐 Kullanıcı giriş/kayıt sistemi
- 🐶 Hayvan ekleme/düzenleme/silme (CRUD)
- 📅 Aşı takvimi yönetimi
- 🔍 Kullanıcıya özel hayvan listesi
- 🎨 Bootstrap 5 ile responsive tasarım

## 🛠️ Kurulum

### Gereksinimler
- PHP 7.4+
- MySQL 5.7+
- Apache/Nginx

### Adımlar
1. Veritabanını oluşturun:
   ```sql
   CREATE DATABASE pet_care;
   ```
2. `database.sql` dosyasını içe aktarın
3. Ayarları düzenleyin:
   ```bash
   cp includes/config.example.php includes/config.php
   ```
4. `config.php` dosyasını düzenleyin:
   ```php
   <?php
   $dbhost = 'localhost';
   $dbname = 'pet_care';
   $dbuser = 'kullanici';
   $dbpass = 'sifre';
   ```
5. Tarayıcıda açın:
   ```
   http://localhost/pet_care
   ```

## 📂 Proje Yapısı
```
pet_care/
├── assets/          # CSS/JS dosyaları
├── includes/        # Sistem dosyaları
├── screenshots/     # Ekran görüntüleri
├── index.php        # Ana sayfa
├── login.php        # Giriş sayfası
├── dashboard.php    # Kontrol paneli
└── README.md        # Bu dosya
```

## 📷 Ekran Görüntüleri<br>

## 📷 Giriş sayfası
![image](https://github.com/user-attachments/assets/066a9ec1-89d6-4a6c-89e7-87e9ec8b1f24)
<br>
## 📷 Ana sayfası
![image](https://github.com/user-attachments/assets/dde7e0d9-a4f2-4171-ab92-27f07f630aff)
<br>
## 📷 Hayvan ekleme sayfası
![image](https://github.com/user-attachments/assets/a4b3ca93-3212-49c0-a4b1-779a9f9e4a7c)
<br>
## 📷 kayıt olma sayfası
![image](https://github.com/user-attachments/assets/5731e65f-9a9a-49ef-a406-4440af0076cb)






## 🌐 Demo
[▶️ Proje Videosu](https://youtu.be/örnek-link)  


