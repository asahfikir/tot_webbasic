<?php require("views/_partials/_header.php"); ?>
<?php
$post = $db->first("SELECT * FROM posts WHERE id=?", [$_GET['id']]);
?>
<h1 class="text-5xl border-b pb-3 mb-5"><?= $post->title ?></h1>
<p class="mb-5"><?= $post->body ?></p>
<a href="/posts" class="border-t mt-5 pt-5 text-indigo-700">Kembali</a>
<?php require("views/_partials/_footer.php"); ?>
