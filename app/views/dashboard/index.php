<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
</head>

<body>
    <?php include "../app/views/components/header.php"; ?>

    <h2>Welcome, <?= htmlspecialchars($data['user']) ?>!</h2>
    <p>You are now logged in.</p>
    <a href="/login/logout">Logout</a>
    <?php include "../app/views/components/footer.php"; ?>

</body>

</html>