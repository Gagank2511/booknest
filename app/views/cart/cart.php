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
    <a href="/cart/getCartItems"></a>
    
    <?php if (empty($data['books'])): ?>
        <p>Your cart is empty. </p>
    <?php else: ?>
        <ul> 
            <?php foreach ($data['books'] as $items): ?>
                <li>
                    <strong><?= htmlspecialchars($items['book']['title'], ENT_QUOTES, 'UTF-8') ?></strong>
                    <p>Author: <?= htmlspecialchars($items['book']['author'], ENT_QUOTES, 'UTF-8') ?></p>
                    <p>Price: <?= htmlspecialchars($items['book']['price'], ENT_QUOTES, 'UTF-8') ?></p>
                    <p>Quantity: <?= htmlspecialchars($items['book']['quantity'], ENT_QUOTES, 'UTF-8') ?></p>
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