<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Browse Books</title>
    <link rel="stylesheet" href="/styles.css">
</head>
<body>
<?php include "../app/views/components/header.php"; ?>
    <section class="container">
        <h1>Browse Books</h1>
        <form action="/user/searchBooks" method="POST">
            <input type="text" name="search" placeholder="Search for books.." required>
            <button type="submit">Search</button>
        </form>
        <ul>
            <?php foreach ($data['books'] as $book): ?>
                <li>
                    <strong><?= htmlspecialchars($book['title']) ?></strong> by <?= htmlspecialchars($book['author']) ?>
                    <p><?= htmlspecialchars($book['description']) ?></p>
                    <p>Price: $<?= number_format($book['price'], 2) ?></p>

                </li>
            <?php endforeach; ?>
        </ul>
    </section>
    <?php include "../app/views/components/footer.php"; ?>
</body>
</html>