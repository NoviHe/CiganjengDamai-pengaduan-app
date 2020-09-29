<h1 align="center">Ciganjeng Damai (Pengaduan App)</h1>

![Landing Page](https://user-images.githubusercontent.com/46588963/92564710-c95b0d00-f2a3-11ea-9b88-f892385b183f.PNG?raw=true)
![Landing Page](https://user-images.githubusercontent.com/46588963/92564815-f7d8e800-f2a3-11ea-8e7d-7f7ceb3c40a8.PNG?raw=true)

<p align="center">
<img align="center" src="http://ForTheBadge.com/images/badges/built-with-love.svg"> <img align="center" src="http://ForTheBadge.com/images/badges/uses-html.svg"> <img align="center" src="http://ForTheBadge.com/images/badges/makes-people-smile.svg"> <img align="center" src="http://ForTheBadge.com/images/badges/built-by-developers.svg">
</p>

## Tentang Ciganjeng Damai

Ciganjeng Damai merupakan aplikasi pengaduan masyarakat yang dibuat oleh <a href="https://github.com/NoviHe">Novi Herlambang</a>. , Sebuah Website yang bisa melaporkan berbagai kejadian di ciganjeng yang kemudian akan di tanggapi oleh operator.

## Fitur dari Ciganjeng Damai
- Authentikasi Admin, Operator & Masyarakat.
- List & CRUD Petugas, Masyarakat, Pengaduan, Tanggapan.
- Sweet Alert 2 Included.
- Pendataan Dengan Datatable agar lebih cepat & efisien.
- Chart/Grafik Pendapatan Bulanan, Mingguan, Harian (soon) dengan library Chart.JS.
- 3 Hak Akses (Admin, Petugas, Masyarakat,)
- User Settings
- Dan lain-lain

<!-- Mungkin untuk demo nya bisa dilihat :
<a href="https://www.youtube.com/watch?v=AvDDvM2QMeM">Demo Aplikasi Kasir Restoran dengan Laravel</a> -->

### <p>Tanggal Rilis</p>
**Release date : 9 September 2020**
> Anda diperbolehkan untuk fork/clone atau develop project ini dan berikan project stars dan follow akun saya juga oke, karena ini merupakan project kali pertama yang saya buat dengan laravel.

------------
## 💻 Panduan Instalasi Project

1. **Clone Repository**
```bash
git clone https://github.com/NoviHe/CiganjengDamai-pengaduan-app
cd CiganjengDamai-pengaduan-app
composer install
copy .env.example rename->.env
```
2. **Buka ```.env``` lalu ubah baris berikut sesuaikan dengan databasemu yang ingin dipakai**
```
DB_PORT=3306
DB_DATABASE=laravel
DB_USERNAME=root
DB_PASSWORD=
```

3. **Import Database SQL**
```
karena menggunakan migrate kamu hanya perlu mengketikan

php artisan migrate

kemudian untuk memasukan user admin dan operator 

php artisan db:seed PetugasSeeder

kemudian untuk nilai tabel jenis

php artisan db:seed JenisSeeder

```

4. **Jalankan bash**
```bash
php artisan key:generate
php artisan config:cache
php artisan storage:link
php artisan route:clear
```

5. **Jalankan website**
```bash
php artisan serve
```

## 🧑 Pemilik

👤 <a href="https://www.instagram.com/"> **Novi Herlambang**</a>
- Facebook : <a href="https://www.facebook.com/herlambang.kun.3/"> Novi Herlambang</a>
<!-- - LinkedIn : <a href="https://www.linkedin.com/in/ryandinulfatah/"> Novi Herlambang</a> -->

## Contributing
Contributions, issues and feature requests di persilahkan.
Jangan ragu untuk memeriksa halaman masalah jika Anda ingin berkontribusi. **Berhubung Project ini saya sudah selesaikan sendiri, namun banyak fitur yang kalian dapat tambahkan silahkan berkontribusi yaa!**


## License
- Copyright © 2020 Novi herlambang.
- **Ciganjeng Damai is open-sourced software licensed under the MIT license.**

------------

- **Made with ❤️ by Novi Herlambang .**
- Thanks to all
- Ciganjeng Damai is open-sourced software licensed under the MIT license.
