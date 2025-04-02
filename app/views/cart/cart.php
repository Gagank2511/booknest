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
    <main>
        <h1>Your Shopping Cart</h1>
        <button onclick="location.href='/book'">Back</button>
        <a href="/cart/getCartItems"></a>

        <?php if (empty($data['books'])): ?>
            <p>Your cart is empty. </p>
        <?php else: ?>
            <ul> 
                <?php 
                
                foreach ($data['books'] as $items): ?>
                    <li>
                        <strong><?= htmlspecialchars($items['book']['title'], ENT_QUOTES, 'UTF-8') ?></strong>
                        <p>Author: <?= htmlspecialchars($items['book']['author'], ENT_QUOTES, 'UTF-8') ?></p>
                        <p>Price: <?= htmlspecialchars($items['book']['price'], ENT_QUOTES, 'UTF-8') ?></p>
                        <p>Quantity: <?= htmlspecialchars($items['quantity'], ENT_QUOTES, 'UTF-8') ?></p>
                    </li>
                <?php endforeach; ?>
            </ul>
            <a href="/checkout">Proceed to Checkout</a>
            <form action="/cart/cart" method="POST">
                <button type="submit">Clear Cart</button>
            </form>
        <?php endif; ?>
    </main>
</body>
    <?php include "../app/views/components/footer.php"; ?>
</html>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const cartLink = document.getElementById('cart-link');
    const cartCount = document.getElementById('cart-count');

    // Function to update cart count
    function updateCartCount(count) {
        cartCount.textContent = count;
    }

    // Add event listener to the add to cart form
    const addToCartForms = document.querySelectorAll('form[action="/cart/addToCart"]');
    addToCartForms.forEach(form => {
        form.addEventListener('submit', function(event) {
            event.preventDefault(); // Prevent default form submission

            const formData = new FormData(form);
            fetch(form.action, {
                method: 'POST',
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    updateCartCount(data.cartCount); // Update cart count dynamically
                    alert('Item added to cart!');
                } else {
                    alert('Failed to add item to cart.');
                }
            })
            .catch(error => console.error('Error:', error));
        });
    });
});
</script>