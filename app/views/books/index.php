<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Catalogue</title>
</head>
<body>
    <h1>Book Catalogue</h1>
    <ul>
        <?php foreach ($data['books'] as $book): ?>
            <li>
                <a href="/books/show/<?= $book['id'] ?>"><?= htmlspecialchars($book['title']) ?></a>
            </li>
        <?php endforeach; ?>
    </ul>
    <?php include "../app/views/components/footer.php"; ?>
</body>

</html>