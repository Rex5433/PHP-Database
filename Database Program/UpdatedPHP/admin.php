<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
</head>
<body>
    <h1>Admin Panel</h1>
    <h2>Add Artist</h2>
    <form action="../php/admin_functions.php" method="POST">
        <input type="text" name="name" placeholder="Artist Name" required>
        <input type="text" name="contact" placeholder="Contact Info" required>
        <button type="submit" name="add_artist">Add Artist</button>
    </form>
</body>
</html>
