<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## Panduan Instalasi

Setelah melakukan clone pada aplikasi melalui github, buka direktori project dan buat .env file dengan template dari .env.example sesuai dengan kondisi PC. Apabila sudah selesai, maka bisa menjalankan perintah di bawah secara berurutan.
```
composer install
```

```
php artisan key:generate
```

```
php artisan jwt:secret
```

```
php artisan migrate
```

```
php artisan serve
```

By default, developer bisa mengakses http://localhost:8000 atau http://127.0.0.1:8000

Semua dokumentasi api ada di <a href="https://documenter.getpostman.com/view/26876716/2s93sc5Ccm">https://documenter.getpostman.com/view/26876716/2s93sc5Ccm</a>

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
