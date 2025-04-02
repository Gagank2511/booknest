<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="/styles.css">
</head>

<body>
    <?php include "../app/views/components/header.php"; ?>
    <main>
        <h2>Welcome, <?= htmlspecialchars($data['user'], ENT_QUOTES, 'UTF-8') ?>!</h2>
        <p>You are now logged in.</p>
        
        <h3>Available Books</h3>
        <ul>
            <?php if (empty($data['books'])): ?>
                <li>No books available.</li>
                <?php else: ?>
                    <?php foreach ($data['books'] as $book): ?>
                        <li>
                            <a href="/book/show/<?= $book['id'] ?>"><?= htmlspecialchars($book['title'], ENT_QUOTES, 'UTF-8') ?></a> by <?= htmlspecialchars($book['author'], ENT_QUOTES, 'UTF-8') ?></a>
                        </li>
                    <?php endforeach; ?>
            <?php endif; ?>
        </ul>
        <a href="/login/logout">Logout</a>
    </main>
    
</body>
    <?php include "../app/views/components/footer.php"; ?>
</html>