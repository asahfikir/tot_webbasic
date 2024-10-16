<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Latihan PHP</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-blue-500 flex items-center justify-center h-full">
    <?php
    $books = [
        ["title" => "Dark Matters", "author" => "John Doe"],
        ["title" => "Pengenalan Algoritma", "author" => "Jane Doe"],
        ["title" => "Pemrograman PHP Basic", "author" => "Fikri"],
        ["title" => "Pemrograman Berbasis Objek", "author" => "Fikri"],
    ];

    function filterByAuthor($author, $books) {
        $data = [];
        foreach($books as $book):
            // if ($author == $book['author']) $data[] = $book;
            if (str_contains($book['author'], $author)) $data[] = $book;
        endforeach;
        return $data;
    }
    ?>
    <div class="bg-white p-3 rounded-md shadow-md">
        <div class="form-control">
            <form action="">
                <input type="text" class="border-2 py-1 px-3 rounded-md border-slate-500">
            </form>
        </div>
        <h1 class="text-2xl mt-3 mb-2">Available Books</h1>
        <ul class="grid grid-cols-2 gap-3">
            <?php foreach(filterByAuthor('Doe', $books) as $book): ?>
            <li class="border border-slate-300 p-3 rounded-md hover:shadow-xl hover:bg-green-200 transition ease-in-out delay-150">
                <div class="font-bold"><?= $book['title']; ?></div>
                <small><?= $book['author']; ?></small>
            </li>
            <?php endforeach; ?>
        </ul>
    </div>
</body>
</html>