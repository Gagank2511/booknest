<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="/styles.css">
</head>

<body>
<?php include "../app/views/components/header.php"; ?>

    <h2>Register</h2>

    <?php if (!empty($data['error'])): ?>
        <p style="color: red;"><?= htmlspecialchars($data['error'], ENT_QUOTES, 'UTF-8') ?></p>
    <?php endif; ?>

    <form action="/register/store" method="POST">
        <label>Name:</label>
        <input type="text" name="name" id="name" required>

        <label>Email:</label>
        <input type="email" name="email" id="email" required>

        <label>Password:</label>
        <input type="password" name="password" id="password" required>

        <label>Confirm Password:</label>
        <input type="password" name="confirm_password" id="confirm_password" required>

        <button type="submit">Register</button>
    </form>

    <p>Already have an account? <a href="/login">Login here</a></p>
    <?php include "../app/views/components/footer.php"; ?>
</body>

</html>