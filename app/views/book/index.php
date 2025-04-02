<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Catalogue</title>
    <link rel="stylesheet" href="/styles.css">

    
</head>
<body>
    <?php include "../app/views/components/header.php"; ?>
    <main>
        <h1>Book Catalogue</h1>
        <form action="/book/search">
            <input type="text" name="search" placeholder="Search for books..." required>
            <button type="submit">Search</button>
        </form>
        <ul>
            <?php if(empty($data['books'])): ?>
                <li>No books found.</li>
            <?php else: ?>
                <?php foreach ($data['books'] as $book): ?>
                    <li>
                        <a href="/book/show/<?= $book['id'] ?>"><?= htmlspecialchars($book['title'], ENT_QUOTES, 'UTF-8') ?></a> by <?= htmlspecialchars($book['author'], ENT_QUOTES, 'UTF-8') ?>
                    </li>
                <?php endforeach; ?>
            <?php endif; ?>
        </ul>
    </main>
    <?php include "../app/views/components/footer.php"; ?>
</body>

</html>