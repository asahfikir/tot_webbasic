<?php require("views/_partials/_header.php"); ?>
<h1 class="text-5xl border-b pb-3 mb-5">Posts</h1>
<ul class="grid grid-cols-2 gap-5">
    <?php
    $posts = $db->query("SELECT * FROM posts");
    foreach($posts as $post): ?>
    <li class="border p-5 rounded shadow-md">
        <h3 class="font-bold"><?= $post->title ?></h3>
        <p><?= $post->body ?></p>
        <div class="text-right border-t pt-5 mt-5">
            <a href="/post?id=<?= $post->id ?>" class="text-indigo-700">
                Baca Selengkapnya ...
            </a>
        </div>
    </li>
    <?php endforeach; ?>
</ul>
<?php require("views/_partials/_footer.php"); ?>
