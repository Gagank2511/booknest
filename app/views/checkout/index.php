<!DOCTYPE html>
<html>
<head>
    <title>Checkout</title>
    <link rel="stylesheet" href="/styles.css">
</head>
<body>
    <?php include "../app/views/components/header.php"; ?>
    <main>
        <button onclick="location.href='/cart'">Back</button>
        <h1>Checkout</h1>
        <ul>
            <?php if (empty($data['cartDetails'])): ?>
                <li>Your cart is empty.</li>
            <?php else: ?>
                <?php foreach ($data ['cartDetails'] as $item): ?>
                    <li>
                        <?php echo $item['book']['title']; ?> - Quantity: <?php echo $item['quantity']; ?> - Price: $<?php echo $item['book']['price']; ?>
                    </li>
                <?php endforeach; ?>
            <?php endif; ?>
        </ul>
        <form action="/checkout/confirm" method="POST">
            <h3>Shipping Information</h3>
            <label for="name">Name:</label>
            <input type="text" name="name" required>
            <br>
            <label for="address">Address:</label>
            <input type="text" name="address" required>
            <br>
            <label for="city">City:</label>
            <input type="text" name="city" required>
            <br>
            <label for="postcode">PCode:</label>
            <input type="text" name="postcode" required>
            <br>
            <button type="submit">Confirm Order</button>
        </form>
    </main>
</body>
    <?php include "../app/views/components/footer.php"; ?>
</html>