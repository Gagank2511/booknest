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
        <p style="color: red;"><?= htmlspecialchars($data['error'], ENT_QUOTES, 'UTF-8') ?></p>
        <?php endif; ?>
        <form action="/admin/addBook" method="POST">
            <label for="title">Title:</label>
            <input type="text" name="title" id="title" required>

            <label for="author">Author:</label>
            <input type="text" name="author" id="author">

            <label for="description">Description:</label>
            <textarea name="description" id="description"></textarea>

            <label for="price">Price:</label>
            <input type="number" name="price" id="price" step="0.01" required>

            <button type="submit">Add Book</button>

        </form>
        <?php include "../app/views/components/footer.php"; ?>
</body>
</html>