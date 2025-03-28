<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="/styles.css">
</head>

<body>
<?php include "../app/views/components/header.php"; ?>
    
    <h2>Login</h2>

    <?php if (!empty($data['error'])): ?>
        <p style="color: red;"><?= htmlspecialchars($data['error']) ?></p>
    <?php endif; ?>

    <form action="/login/authenticate" method="POST">
        <label>Email:</label>
        <input type="email" name="email" required>

        <label>Password:</label>
        <input type="password" name="password" required>

        <button type="submit">Login</button>
    </form>
    <?php include "../app/views/components/footer.php"; ?>
</body>

</html>