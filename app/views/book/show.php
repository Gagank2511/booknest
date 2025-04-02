<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link rel="stylesheet" href="/styles.css">
</head>

<body>
<?php include "../app/views/components/header.php"; ?>

    <?php if (sizeof($data['book']) == 0) : ?>
        There are no books to show

    <?php
        die();
    endif; ?>
    <h1><?= htmlspecialchars($data['book']['title'], ENT_QUOTES, 'UTF-8') ?></h1>
    <p>Author: <?= htmlspecialchars($data['book']['author'], ENT_QUOTES, 'UTF-8') ?></p>
    <p>Description: <?= htmlspecialchars($data['book']['description'], ENT_QUOTES, 'UTF-8') ?></p>
    <p>Price: $<?= htmlspecialchars($data['book']['price'], ENT_QUOTES, 'UTF-8') ?></p>

    <h2>Leave a Review</h2>
    <form action="/reviews/add/<?= $data['book']['id'] ?>" method="POST">
        <label>Rating:</label>
        <input type="number" name="rating" min="1" max="5" required>

        <label>Comment:</label>
        <textarea name="comment" required></textarea>

        <button type="submit">Submit Review</button>
    </form>

    <h2>Reviews</h2>
    <ul>
        <?php foreach ($data['review'] as $review): ?>
            <li>
                <strong><?= htmlspecialchars($review['rating'],ENT_QUOTES, 'UTF-8') ?> Stars</strong>
                <p><?= htmlspecialchars($review['comment'], ENT_QUOTES, 'UTF-8') ?></p>
            </li>
        <?php endforeach; ?>
    </ul>
    <?php include "../app/views/components/footer.php"; ?>
</body>

</html>