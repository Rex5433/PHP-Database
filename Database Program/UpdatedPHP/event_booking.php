<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book an Event</title>
    <link rel="stylesheet" href="bookevent.css">
</head>
<body>
    <h1>Manage Events</h1>

    <form action="book_event.php" method="POST">
        <h2>Book a New Event</h2>
        <label for="event">Event Name:</label>
        <input type="text" id="event" name="event" required><br>

        <label for="date">Event Date:</label>
        <input type="date" id="date" name="date" required><br>

        <input type="hidden" name="event_id" id="event_id">
        
        <button type="submit" name="add_event">Book Event</button>
        <button type="submit" name="edit_event">Edit Event</button>
    </form>

    <h2>Existing Events</h2>
    <table border="1">
        <thead>
            <tr>
                <th>Event Name</th>
                <th>Event Date</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($events)): ?>
                <?php foreach ($events as $event): ?>
                <tr>
                    <td><?php echo $event['EventName']; ?></td>
                    <td><?php echo $event['EventDate']; ?></td>
                    <td>

                        <button type="button" onclick="editEvent(<?php echo $event['EventID']; ?>, '<?php echo $event['EventName']; ?>', '<?php echo $event['EventDate']; ?>')">Edit</button>

                        <form action="book_event.php" method="POST" style="display:inline;">
                            <input type="hidden" name="event_id" value="<?php echo $event['EventID']; ?>">
                            <button type="submit" name="delete_event" onclick="return confirm('Are you sure you want to delete this event?')">Delete</button>
                        </form>
                    </td>
                </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="3">No events found.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>

    <script>
        function editEvent(eventID, eventName, eventDate) {
            document.getElementById('event').value = eventName;
            document.getElementById('date').value = eventDate;
            document.getElementById('event_id').value = eventID;
        }
    </script>
</body>
</html>
