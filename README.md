# Evcil Hayvan Sahiplendirme Platformu 🐾

Bu platform, evcil hayvan sahiplendirme sürecini dijitalleştirerek hem sahiplendirenlerin hem de sahiplenmek isteyenlerin güvenli ve kolay bir şekilde buluşmasını sağlayan bir web uygulamasıdır.

## 🌟 Özellikler

### İlan Yönetimi

-   ✨ Detaylı ilan oluşturma ve düzenleme
-   🔍 Gelişmiş ilan arama ve filtreleme
-   ⭐ Favori ilan kaydetme

### Kullanıcı Sistemi

-   👤 Kullanıcı kaydı ve profil yönetimi
-   📱 İletişim bilgileri yönetimi
-   🔐 Güvenli kimlik doğrulama
-   📨 İlan sahipleriyle iletişim

### Lokasyon Bazlı İşlemler

-   🗺️ Şehir ve ilçe bazlı arama
-   📍 Bölgesel filtreleme
-   🏠 Adres yönetimi

## 💻 Teknik Altyapı

### Kullanılan Teknolojiler

-   Laravel 10.x
-   PHP 8.2+
-   MySQL
-   Blade Template Engine
-   TailwindCSS

### Sistem Gereksinimleri

-   PHP >= 8.2
-   MySQL >= 5.7
-   Composer
-   Node.js & NPM
-   Git

## ⚙️ Kurulum

1. Projeyi klonlayın:

```bash
git clone <proje-url>
cd evcil-hayvan-sahiplendirme
```

2. Bağımlılıkları yükleyin:

```bash
composer install
npm install
```

3. Çevre değişkenlerini ayarlayın:

```bash
cp .env.example .env
php artisan key:generate
```

4. Veritabanını oluşturun:

```bash
php artisan migrate
```

5. Başlangıç verilerini yükleyin:

```bash
php artisan db:seed
```

6. Uygulamayı çalıştırın:

```bash
php artisan serve
npm run dev
```

## 📚 Veritabanı Yapısı

### Ana Tablolar ve İlişkileri

#### users

-   Kullanıcı hesap bilgileri
-   Profil detayları
-   Yetkilendirme bilgileri

#### ads

-   İlan detayları
-   Hayvan bilgileri
-   Sahiplendirme şartları

#### pet_types ve breeds

-   Hayvan türleri
-   Irk bilgileri
-   Tür-ırk ilişkileri

#### cities ve districts

-   Şehir bilgileri
-   İlçe bilgileri
-   Lokasyon hiyerarşisi

#### statuses

-   İlan durumları (Yayında, Beklemede, vb.)
-   Durum geçiş kuralları

## 📝 Lisans

Bu proje MIT lisansı altında lisanslanmıştır. Detaylar için [LICENSE](LICENSE) dosyasına bakınız.
