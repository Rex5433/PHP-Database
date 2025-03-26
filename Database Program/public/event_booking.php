<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book an Event</title>
</head>
<body>
    <h1>Book an Artist for an Event</h1>
    <form action="../php/book_event.php" method="POST">
        <label for="event">Event Name:</label>
        <input type="text" id="event" name="event" required><br>

        <label for="artist">Artist ID:</label>
        <input type="number" id="artist" name="artist" required><br>

        <label for="date">Event Date:</label>
        <input type="date" id="date" name="date" required><br>

        <button type="submit">Book Event</button>
    </form>
</body>
</html>
