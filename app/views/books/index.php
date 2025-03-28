<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Catalogue</title>
</head>
<body>
    <?php include "../app/views/components/header.php"; ?>

    <h1>Book Catalogue</h1>
    <form action="/books" method="GET">
        <input type="text" name="search" placeholder="Search for books..." required>
        <button type="submit">Search</button>
    </form>
    <ul>
        <?php if(empty($data['books'])): ?>
            <li>No books found.</li>
        <?php else: ?>
            <?php foreach ($data['books'] as $book): ?>
                <li>
                    <a href="/books/show/<?= $book['id'] ?>"><?= htmlspecialchars($book['title']) ?></a> by <?= htmlspecialchars($book['author']) ?>
                </li>
            <?php endforeach; ?>
        <?php endif; ?>
    </ul>
    <?php include "../app/views/components/footer.php"; ?>
</body>

</html>