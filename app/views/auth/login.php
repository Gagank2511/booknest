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
    <main>
        <h2>Login</h2>

        <?php if (!empty($data['error'])): ?>
            <p style="color: red;"><?= htmlspecialchars($data['error'], ENT_QUOTES, 'UTF-8') ?></p>
        <?php endif; ?>

        <form action="/login/authenticate" method="POST">
            <label>Email:</label>
            <input type="email" name="email" id="email" required>

            <label>Password:</label>
            <input type="password" name="password" id="password" required>

            <button type="submit">Login</button>
        </form>
    </main>
</body>
    <?php include "../app/views/components/footer.php"; ?>

</html>