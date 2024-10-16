# Pertemuan 2: Login Form

## Objective
Kita akan menggabungkan beberapa materi pada pertemuan pertama untuk membuat sebuah halaman yang berisikan form login sederhana.

## The HTML
Halaman ini akan berisikan sebuah form dengan 2 input, username dan password, serta satu tombol login. Untuk men-generate kode HTML nya pada visual studio code kita bisa menggunakan syntax: `form>h1{Login Form}+(.form-group>label+input)*2+.form-group>button`.
Yang akan menghasilkan HTML berikut
```html
<form action="">
    <h1>Login Form</h1>
    <div class="form-group"><label for=""></label><input type="text"></div>
    <div class="form-group"><label for=""></label><input type="text"></div>
    <div class="form-group"><button></button></div>
</form>
```

## The CSS
Kita akan memulai dengan menggunakan reset css
```css
*, *:before, *:after { margin: 0 auto; padding: 0; box-sizing: border-box; }
```
Kemudian kita akan memberikan background image pada body html, serta membuat elemen body menjadi grid dengan satu item (form) dan kita tempatkan di tengah dengan properti `place-items`.
```css
    body {
      display: grid;
      place-items: center;
      background: url(./images/galaxy-unsplash.jpg) no-repeat center;
      background-size: cover;
      color: white;
    }
```
Untuk form, kita akan memberikan box hitam semi transparan, serta shadow tipis agar background belakang sedikit terlihat.
```css
form {
    background: rgba(0, 0, 0, 0.35);
    box-shadow: 0 5px 15px rgba(0, 0, 0, .35);

    width: 500px;
    padding: 30px;

    border-radius: 30px;
}
```
Untuk konten dari form kita akan menggunakan css berikut
```css
h1 {
    color: white;
    text-transform: uppercase;
    text-align: center;
    margin-bottom: 1.5em;
}

div.form-group {
    margin-bottom: 15px;
    display: flex;
    flex-direction: column;
    gap: 7px;
}

label {
    color: #FFF;
    text-transform: uppercase;
    font-size: .7em;
}

input {
    background: #fff;
    border-radius: 5px;
    padding: 5px 10px;
    border: 0;
}

button {
    background: #FC0;
    padding: 15px 30px;
    border-radius: 5px;
    border: 0;
    color: #444;
    cursor: pointer;
}
```

Sebagai referensi bisa dilihat pada [halaman](pert2/index.html) berikut.