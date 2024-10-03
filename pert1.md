# Pertemuan 1 TOT ITB PalComTech

## Objektif
Pengenalan singkat HTML + CSS, tools yang digunakan serta tips dan tricks HTML CSS dasar.

## Bahasan
1. Emmet
Text editor yang disarankan untuk digunakan adalah `Visual Studio Code` atau `Zed Editor`. Secara default text editor ini memiliki plugin Emmet yang dapat membantu kita mengetik kode dengan lebih cepat menggunakan autosuggestion dari Emmet.

Contoh Penggunaan:
a. Template HTML
Ketikkan `!` pada dokumen HTML kosong dan Emmet akan menghasilkan output berikut:
```html
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
</body>
</html>
```

b. Menghasilkan DOM kompleks secara otomatis
Ketikkan `#container>header+(section#content>aside+main)+footer` dan Emmet akan menghasilkan output berikut:
```html
<div id="container">
    <header></header>
    <section id="content">
        <aside></aside>
        <main></main>
    </section>
    <footer></footer>
</div>
```
Simbol `#` melambangkan atribut `ID` sedangkan `.` melambangkan atribut `class`.

Simbol `+` digunakan untuk menghasilkan elemen yang posisinya setara dengan elemen disebelah kiri. Sebagai contoh `aside.sidebar+main.content` akan menghasilkan `<aside class="sidebar"></aside><main class="content"></main>`.

Simbol `>` digunakan untuk menghasilkan sub elemen dari elemen. Gunakan tanda kurung `(...)` untuk mengelompokkan elemen. Sebagai contoh `header+(section>aside+main)+footer` akan menghasilkan
```html
<header></header>
<section>
    <aside></aside>
    <main></main>
</section>
<footer>
```
Jika tidak dikelompokkan menggunakan tanda kurung `(...)` maka `footer` akan masuk sebagai sub elemen dari `section`.

c. Pengulangan elemen
Untuk membuat banyak elemen sekaligus kita bisa menggunakan simbol `*`. Sebagai contoh `ul>li*3` akan menghasilkan:
```html
<ul>
    <li></li>
    <li></li>
    <li></li>
</ul>
```

d. Menghasilkan filler text
Terkadang kita membutuhkan text dengan sebaran huruf yang cukup untuk mengisi konten sementara. Kita bisa menggunakan `lorem{jumlah kata}` untuk melakukan hal ini. Sebagai contoh `lorem50` akan menghasilkan:
```html
Lorem ipsum dolor, sit amet consectetur adipisicing elit. Animi quo repudiandae exercitationem a iste totam laudantium nostrum et, suscipit voluptas, quisquam maiores, vero id. Minus, commodi esse officiis excepturi inventore ipsum officia accusamus nemo! Minus enim nemo voluptatum temporibus adipisci. Tempore, sapiente! Ab ullam optio labore corrupti pariatur culpa necessitatibus.
```

2. Reset CSS
Secara default setiap browser memiliki styling default yang diterapkan ke setiap halaman web. Dan nilai default ini berbeda-beda untuk tiap browser. Agar tampilan halaman kita seragam, kita bisa menambahkan styling pada halaman web kita yang disebut dengan `Reset CSS`. Salah satu Reset CSS yang bisa kita gunakan adalah `Eric Meyer Reset CSS`. Cukup searching di Google untuk Reset CSS tersebut. Namun jika kita ingin membuat reset css kita sendiri yang paling sederhana adalah sebagai berikut:
```css
*, *:before, *:after {
    /* Reset agar semua margin dan padding menjadi 0, kita dapat menambahkan margin padding manual untuk elemen-elemen lain */
    margin: 0;
    padding: 0;
    /* Memastikan agar lebar dan tinggi konten tidak terpengaruh oleh margin dan padding */
    box-sizing: border-box;
}
```

3. Perbedaan `margin` dan `padding`
`margin` dan `padding` digunakan untuk memberikan jarak antar dua elemen. Perbedaannya terdapat pada posisi jarak yang akan diberikan. Jika kita ingin memberikan jarak luar antar satu elemen dengan elemen lain maka gunakan `margin`. Namun, jika kita ingin memberikan jarak antara elemen dengan elemen yang ada di `dalam`nya maka gunakan `padding`.
```
-----------------              --------------
|               | <- margin -> |            |
|               |              |            |
-----------------              --------------

----------------------------
|            ^             |
|            | padding     |
|  ---------------------   |
|  |                   |   |
|  ---------------------   |
----------------------------
```

4. Layouting menggunakan Flex
Secara default elemen di HTML akan ditampilkan secara vertikal dari atas kebawah. Untuk bisa menampilkan elemen secara horizontal kita dapat menggunakan `flex`. Contoh penggunaan:
```html
<ul>
    <li>Home</li>
    <li>About</li>
</ul>
```
Elemen HTML diatas akan ditampilkan dari atas kebawah, untuk bisa menampilkan secara horizonta kita bisa menambahkan `display: flex` pada elemen pembungkusnya yang dalam hal ini adalah `ul`.
```css
ul {
    display: flex; /* membuat elemen menjadi flex */
    gap: 15px; /* membuat jarak sekitar 15px antar elemen */
}
```