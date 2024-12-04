<?php
if ($_SERVER['REQUEST_METHOD'] == "GET"): ?>
    <form action="" method="POST">
        <div><label for="title">Title</label><input type="text" name="title" id="title"></div>
        <div><label for="body">Body</label><textarea name="body" id="body"></textarea></div>
        <div><button>Tambah Post</button></div>
    </form><?php
else:
    // Baca Input yang diberikan oleh user
    $title = strip_tags($_POST['title']);
    $body = strip_tags($_POST['body']);

    // Jalankan Query Insert
    $db->insert("INSERT INTO posts (title, body) VALUES(?, ?)", [$title, $body]);

    // Jika berhasil arahkan kembali ke halaman posts
    header('Location: /posts');
    exit();
endif;