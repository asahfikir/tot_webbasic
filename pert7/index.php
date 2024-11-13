<?php
require "Database.php";
$dsn = "mysql:host=localhost;port=3306;dbname=myapp;charset=utf8mb4";

/* cara 1 - memberikan nilai default pada parameter get */
// if (isset($_GET['id'])):
//     $id = $_GET['id'];
// else:
//     $id = 1;
// endif;

/* cara 2 - memberikan nilai default pada parameter get */
$id = isset($_GET['id']) ? $_GET['id'] : 1;

$db = new Database($dsn, "root");
// $result = $db->prepare("SELECT * FROM posts WHERE id=?", [$id]);
echo "SELECT * FROM posts WHERE id={$id}";
$result = $db->query("SELECT * FROM posts WHERE id={$id}");

/*
Cara test: http://localhost:8000/?id=1 OR 1=1--
*/


echo "<h1>My Blog Posts</h1>";
echo "<hr />";
echo "<ul>";
foreach($result as $post): 
    echo "<li>";
    echo "<h2>$post->title</h2>";
    echo "<p>".strip_tags($post->body)."</p>";
    echo "</li>";
endforeach;
echo "</ul>";
?>