<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Cart</title>
    <link rel="stylesheet" href="/styles.css">
</head>
<body>
    <?php include "../app/views/components/header.php"; ?>
    <h1>Your Shopping Cart</h1>

    <?php if (empty($data['books'])): ?>
        <p>Your cart is empty. </p>
    <?php else: ?>
        <ul> 
            <?php foreach ($data['books'] as $items): ?>
                <li>
                    <strong><?= htmlspecialchars($items['book']['title']) ?></strong>
                    <p>Author: <?= htmlspecialchars($items['book']['author']) ?></p>
                    <p>Price: <?= htmlspecialchars($items['book']['price']) ?></p>
                    <p>Quantity: <?= htmlspecialchars($items['book']['quantity']) ?></p>
                </li>
            <?php endforeach; ?>
        </ul>
        <a href="/checkout">Proceed to Checkout</a>
        <form action="/cart/clear" method="POST">
            <button type="submit">Clear Cart</button>
        </form>
    <?php endif; ?>

    <?php include "../app/views/components/footer.php"; ?>
</body>
</html>