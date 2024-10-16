# Pert. 3: Introduction to PHP

## Memulai Web Server PHP
PHP merupakan bahasa pemrograman yang populer untuk membuat website. File `.php` biasanya dibuka melalui browser. Namun untuk mengeksekusi kode-kode php didalamnya kita harus mengaktifkan webserver PHP. Ada beberapa web server yang biasa digunakan seperti `nginx` atau `apache`. Silahkan lihat dokumentasi masing-masing web server untuk mengetahui cara memulai web server tersebut. Namun jika kita ingin memulai web server sederhana PHP sebenarnya sudah menyediakan fitur tersebut. Pastikan dahulu bahwa PHP sudah berada pada `PATH` operating system anda.
Untuk memulai web server PHP kita akan menggunakan perintah `php -S [host]:[port] -t [target]`. Sebagai contoh:
```bash
php -S localhost:8000 -t .
```
Baris diatas berarti jalankan web server php pada host `localhost` dengan port `8000` dan target folder adalah folder aktif saat ini. Tanda `.` berarti folder yang sedang aktif, anda juga bisa mengisikan jalur folder lain misal jika di Windows `D:\Code\latihanphp` sebagai target nya.

## PHP Tag
File PHP menggunakan ekstensi `.php`. File `.php`  bisa berisikan syntax-syntax `html`. Jika kita ingin memulai kode PHP harus diawali dengan tag `<?php` dan diakhiri dengan `?>`. Sebagai contoh jika kita ingin menuliskan sebuah string didalam kode php kita bisa menuliskannya sebagai berikut:
```php
<body>
   ...
   <?php echo "This is a string"; ?>
   ...
</body>
```
Perhatikan bahwa setiap expression pada kode PHP harus diakhiri dengan tanda petik `;`. 

> Cara lain untuk menuliskan echo pada PHP adalah sebagai berikut:
> <?php= "This is a string"; ?>

## String Concatenation (Penggabungan String)
Pada 