# Yapay Zeka Destekli Geliştirme Kayıtları

## 1. Veritabanı Bağlantı Hatası Çözümü

**Ben**: PDO ile MySQL bağlantısı kurarken "SQLSTATE[HY000] [2002] No such file or directory" hatası alıyorum, nasıl düzeltebilirim?

**AI**: Bu hatayı çözmek için:
```php
// Yanlış:
$db = new PDO('mysql:host=localhost;dbname=pet_care', 'root', '');

// Doğru (Unix için):
$db = new PDO('mysql:host=127.0.0.1;dbname=pet_care', 'root', '');
```
Sebep: Unix sistemlerinde `localhost` yerine `127.0.0.1` kullanılmalıdır.

---

## 2. Bootstrap Form Validasyonu

**Ben**: Bootstrap 5'te form validasyonu nasıl yapılır? PHP ile entegre örnek verebilir misiniz?

**AI**: İşte client-side + server-side entegre örneği:
```html
<form class="needs-validation" novalidate method="POST">
  <div class="mb-3">
    <input type="text" class="form-control" name="pet_name" required>
    <div class="invalid-feedback">Lütfen isim giriniz</div>
  </div>
</form>

<script>
// Client-side validasyon
document.querySelector('.needs-validation').addEventListener('submit', function(e) {
  if (!this.checkValidity()) {
    e.preventDefault()
    e.stopPropagation()
  }
  this.classList.add('was-validated')
})
</script>
```

---

## 3. SQL Injection Koruması

**Ben**: PDO'da prepared statement nasıl kullanılır? Gerçek bir örnekle açıklar mısınız?

**AI**: İşte güvenli veri ekleme örneği:
```php
$stmt = $db->prepare("INSERT INTO pets (name, type, user_id) VALUES (:name, :type, :user_id)");
$stmt->execute([
    ':name' => $_POST['pet_name'],
    ':type' => $_POST['pet_type'],
    ':user_id' => $_SESSION['user_id']
]);
```
Bu yöntem tüm SQL injection risklerini ortadan kaldırır.

---

## 4. Responsive Tablo Tasarımı

**Ben**: Bootstrap 5'te mobil uyumlu scrollable tablo nasıl yapılır?

**AI**: İşte çözüm:
```html
<div class="table-responsive">
  <table class="table">
    <thead>...</thead>
    <tbody>...</tbody>
  </table>
</div>
```
Ek CSS:
```css
@media (max-width: 768px) {
  .table-responsive {
    overflow-x: auto;
  }
}
```

---

## 5. Session Timeout Ayarlama

**Ben**: PHP'de oturum süresini nasıl uzatabilirim?

**AI**: `php.ini` veya runtime ayarı:
```php
// Oturum ömrü (1 saat)
ini_set('session.gc_maxlifetime', 3600);
session_set_cookie_params(3600);

// Oturumu başlat
session_start();
```

---

## 6. Şifre Sıfırlama Sistemi

**Ben**: Kullanıcı şifre sıfırlama için token nasıl oluşturulur?

**AI**: Güvenli token üretimi:
```php
$token = bin2hex(random_bytes(32));
$expires = date('Y-m-d H:i:s', strtotime('+1 hour'));

// Veritabanına kaydet
$db->prepare("UPDATE users SET reset_token=?, token_expires=? WHERE email=?")
   ->execute([$token, $expires, $email]);
```

---

## 7. Dosya Yükleme Güvenliği

**Ben**: PHP'de güvenli profil fotoğrafı yükleme nasıl yapılır?

**AI**: Kontrol listesi:
```php
// 1. Uzantı kontrolü
$allowed = ['jpg', 'jpeg', 'png'];
$ext = strtolower(pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION));

// 2. Boyut kontrolü (max 2MB)
if ($_FILES['file']['size'] > 2097152) die("Dosya çok büyük");

// 3. MIME type kontrolü
$finfo = finfo_open(FILEINFO_MIME_TYPE);
$mime = finfo_file($finfo, $_FILES['file']['tmp_name']);
```

---

## 8. CSRF Koruması

**Ben**: Formlarda CSRF token nasıl uygulanır?

**AI**: İşte implementasyon:
```php
// Sayfa başında
$_SESSION['csrf_token'] = bin2hex(random_bytes(32));

// Form içinde
<input type="hidden" name="csrf_token" value="<?=$_SESSION['csrf_token']?>">

// Kontrol
if ($_POST['csrf_token'] !== $_SESSION['csrf_token']) {
    die("Geçersiz istek!");
}
```