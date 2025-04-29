<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($data['book']['title']) ?></title>
</head>
<body>
    <h1><?= htmlspecialchars($data['book']['title']) ?></h1>
    <p>Author: <?= htmlspecialchars($data['book']['author']) ?></p>
    <p>Description: <?= htmlspecialchars($data['book']['description']) ?></p>
    <p>Price: $<?= htmlspecialchars($data['book']['price']) ?></p>

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
        <?php foreach ($data['reviews'] as $review): ?>
            <li>
                <strong><?= htmlspecialchars($review['rating']) ?> Stars</strong>
                <p><?= htmlspecialchars($review['comment']) ?></p>
            </li>
        <?php endforeach; ?>
    </ul>
</body>
</html>