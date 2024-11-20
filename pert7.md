# Pertemuan 7 - Perbedaan PDO Prepare dan PDO Query

Pada pertemuan ini kita akan membahas singkat mengenai perbedaan antara penggunaan PDO `prepare` dan `query`. Mari bahas langkah demi langkah beserta ilustrasinya.

## Apa itu PDO?
PDO atau PHP Data Objects adalah salah satu metode di PHP untuk mengakses dan berinteraksi dengan database. PDO menyediakan API yang konsisten untuk menghubungkan berbagai jenis database, seperti MySQL, PostgreSQL, SQLite, dll.

Beberapa keuntungan menggunakan PDO antara lain:
1. **API yang konsisten**: Dengan PDO, kita bisa menggunakan kode yang konsisten untuk berbagai jenis database. Jika Anda pindah dari MySQL ke PostgreSQL, misalnya, Anda hanya perlu mengubah pengaturan koneksi tanpa harus mengubah keseluruhan kode.
2. **Error Handling**: PDO mendukung penanganan kesalahan yang lebih baik dengan menggunakan pengecualian (exceptions). Ini memungkinkan Anda untuk menangkap kesalahan dan menanganinya secara efektif sehingga aplikasi tidak crash secara tiba-tiba.
3. **Keamanan**: Salah satu kelebihan utama PDO adalah mendukung `prepared statements`, yang membantu melindungi aplikasi dari serangan injeksi SQL. Injeksi SQL adalah salah satu jenis serangan di mana penyerang menyisipkan kode SQL berbahaya ke dalam aplikasi, biasanya melalui input pengguna. Jika aplikasi tidak menanganinya dengan benar, penyerang bisa mendapatkan akses ke data sensitif atau bahkan menghapus data dari database. Dengan menggunakan PDO, terutama dengan prepare(), kita dapat mencegah injeksi SQL karena input pengguna dipisahkan dari kode SQL. 

## Koneksi Database Menggunakan PDO
Sebelum memulai kita buat dulu sebuah file bernama `Database.php` yang akan berisi definisi dari `class Database`.
```php
<?php
class Database {
    private $pdo;

    public function __construct($dsn, $username, $password = null) {
        $this->pdo = new PDO($dsn, $user, $pass);
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public function query($sql) {
        return $this->pdo->query($sql);
    }

    public function prepare($sql) {
        return $this->pdo->prepare($sql);
    }
}
```
Setelah nya kita bisa melakukan `require 'Database.php'` pada file-file yang membutuhkan koneksi database dan kita instantiate kelas Database nya.

## Perbedaan query() dan prepare() di PDO
### PDO::query():
Ketika menggunakan query(), perintah SQL dieksekusi secara langsung. Ini cocok untuk perintah statis yang tidak melibatkan input pengguna.
Contoh:
```php
$dsn = "mysql:host=localhost;port=3306;dbname=myapp;charset=utf8mb4";
$db = new Database($dsn, 'root');
$result = $db->query("SELECT * FROM users");
```
Walaupun `query()` praktis, metode ini lebih rentan terhadap injeksi SQL jika digunakan dengan melibatkan input dari user karena tidak menyertakan mekanisme sanitasi input secara otomatis.

### PDO::prepare()
Dengan menggunakan `prepare()` memungkinkan kita untuk menggunakan `prepared statements` dengan `parameterisasi`, yang merupakan fitur unggulan PDO. `prepare()` tidak langsung mengeksekusi perintah SQL. Sebaliknya, ia menyusun perintah SQL untuk dieksekusi, di mana nilai-nilai input yang dinamis ditambahkan menggunakan placeholder (`?` atau parameter seperti `:id`).
Nilai-nilai parameter tersebut kemudian diberikan melalui `execute()`, yang memastikan input pengguna disanitasi secara otomatis.
Contoh:
```php
$stmt = $db->prepare("SELECT * FROM users WHERE username = :username");
$stmt->execute(['username' => $_POST['username']);
$result = $stmt->fetchAll();
```
Metode ini mengamankan aplikasi dari injeksi SQL karena PDO memperlakukan nilai-nilai parameter sebagai data, bukan kode SQL.

### Contoh sederhana dari injeksi SQL
```php
// Kode rentan dengan query yang telah disusupkan dengan injeksi SQL
// Misalkan $id itu didapat dari $_GET['id']
$id = "1; DROP TABLE users; --";
$db->query("SELECT * FROM posts WHERE id = '$id'");
```
Kode diatas jika diesekusi akan membuat table `user` hilang.

### Mengamankan kode dengan prepare
```php
$stmt = $db->prepare("SELECT * FROM users WHERE username = :username");
$stmt->execute(['username' => $userInput]);
```
Pada contoh pertama, metode query() akan menjalankan apa pun yang ada di $id. Sedangkan dengan prepare(), PDO mengikat input sebagai parameter dan mengabaikan karakter yang berpotensi membahayakan.

## Kapan Menggunakan query() dan prepare()
1. Gunakan `query()` untuk perintah-perintah SQL yang statis dan tidak melibatkan input pengguna, seperti mengakses tabel konfigurasi atau mengambil nilai konstan.
2. Gunakan `prepare()` ketika menangani input dinamis, terutama data dari pengguna, untuk memastikan input tersebut disanitasi dan mencegah injeksi SQL.

## Kesimpulan
1. Keamanan merupakan prioritas dalam membuat sebuah aplikasi. Memilih `prepare()` sebagai metode standar ketika bekerja dengan input pengguna sangatlah penting untuk melindungi data dan menjaga keamanan aplikasi.
2. Dengan memisahkan logika SQL dari data menggunakan parameter, aplikasi menjadi lebih aman dan lebih mudah untuk dibaca serta dipelihara.
3. PDO memungkinkan kita bekerja dengan koneksi database pada PHP dengan mudah. API yang digunakan tetap sama walaupun kita bekerja dengan driver database yang berbeda-beda.