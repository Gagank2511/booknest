<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Books</title>
    <link rel="stylesheet" href="/styles.css">
</head>
<body>
<?php include "../app/views/components/header.php"; ?>

    <h1>Manage Books</h1>
    <ul>
        <?php foreach ($data['books'] as $book): ?>
            <li>
                <?= htmlspecialchars($book['title'], ENT_QUOTES, 'UTF-8') ?>
                <a href="/admin/deleteBook/<?= htmlspecialchars($book['id'], ENT_QUOTES, 'UTF-8') ?>">Delete Book</a>
            </li>
        <?php endforeach; ?>
    </ul>
    <a href="admin/addBook">Add New Book</a>
    <?php include "../app/views/components/footer.php"; ?>
</body>
</html>