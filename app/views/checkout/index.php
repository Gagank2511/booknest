// app/views/checkout/index.php
<!DOCTYPE html>
<html>
<head>
    <title>Checkout</title>
</head>
<body>
    <h1>Checkout</h1>
    <h2>Your Cart</h2>
    <ul>
        <?php foreach ($data['cartDetails'] as $item): ?>
            <li>
                <?php echo $item['book']['title']; ?> - Quantity: <?php echo $item['quantity']; ?> - Price: $<?php echo $item['book']['price']; ?>
            </li>
        <?php endforeach; ?>
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
        <label for="zip">Zip Code:</label>
        <input type="text" name="zip" required>
        <br>
        <button type="submit">Confirm Order</button>
    </form>
</body>
</html>