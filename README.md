Proje PHP 7.3 ve Laravel 8 kullanılarak hazırlanmıştır.

Ufak çaplı yetkilendirme sistemi yapılmıştır. Örneğin editör yetkili kullanıcılar yeni kullanıcı ekleyemez ve kendi yazısı dışındaki yazıları silemez veya güncelleyemez.

Veritabanı, yazıların birden fazla kategoriye ait olabileceği ve ana kategorilerin birden fazla alt kategoriye sahip olabileceği şekilde tasarlanmıştır.


Kurulum için gerekli komutlar;

```bash
composer install
```

```bash
cp .env.example .env
```

```bash
php artisan key:generate
```

```bash
npm install
```

```bash
npm run dev
```

```bash
php artisan serve
```
