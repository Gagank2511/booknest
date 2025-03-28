<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Book</title>
    <link rel="stylesheet" href="/styles.css">
</head>
<body>
    <?php include "../app/views/components/header.php"; ?>

    <h1>Add New Book</h1>
    <?php if(!empty($data['error'])): ?>
        <p style="color: red;"><?= htmlspecialchars($data['error']) ?></p>
        <?php endif; ?>
        <form action="/admin/addBook" method="POST">
            <label>Title:</label>
            <input type="text" name="title" required>

            <label>Author:</label>
            <input type="text" name="author" required>

            <label>Description:</label>
            <textarea name="description"></textarea>

            <label>Price:</label>
            <input type="number" name="price" step="0.01" required>

            <button type="submit">Add Book</button>

        </form>
        <?php include "../app/views/components/footer.php"; ?>
</body>
</html>