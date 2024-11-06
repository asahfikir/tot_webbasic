<?php
require "Database.php";
$dsn = "mysql:host=localhost;port=3306;dbname=myapp;charset=utf8mb4";
// $pdo = new PDO($dsn, "root");
// $posts = $pdo->prepare("SELECT * FROM posts");
// $posts->execute();

// $result = $posts->fetchAll(PDO::FETCH_OBJ);

// var_dump($result->title);

$db = new Database($dsn, "root");
$result = $db->query("SELECT * FROM posts");

echo "<h1>My Blog Posts</h1>";
echo "<hr />";
echo "<ul>";
foreach($result as $post): 
    echo "<li>";
    echo "<h2>$post->title</h2>"; ?>
    <div onload="alert(document.cookie)">....</div>
    <?php
    echo "</li>";
endforeach;
echo "</ul>";

$post = $db->singleQuery("SELECT * FROM posts WHERE id=1");
var_dump($post->title);
