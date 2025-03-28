<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Event Booking</title>
    <link rel="stylesheet" href="booking.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    <h1>Event Booking Management</h1>

    <h2>Book an Event</h2>
    <form id="eventForm">
        <input type="hidden" id="event_id" name="event_id">
        
        <label for="event">Event Name:</label>
        <input type="text" id="event" name="event" placeholder="Enter event name" required>

        <label for="date">Event Date:</label>
        <input type="date" id="date" name="date" required>

        <label for="venue">Venue ID:</label>
        <input type="number" id="venue" name="venue" placeholder="Enter venue ID" required>

        <label for="organizer">Organizer ID:</label>
        <input type="number" id="organizer" name="organizer" placeholder="Enter organizer ID" required>

        <button type="submit" name="book_event" class="book-btn">Book Event</button>
        <button type="submit" name="edit_event" class="edit-btn">Edit Event</button>
    </form>

    <h2>Booked Events</h2>
    <table>
        <thead>
            <tr>
                <th>ID</th><th>Event Name</th><th>Date</th><th>Venue ID</th><th>Organizer ID</th><th>Actions</th>
            </tr>
        </thead>
        <tbody id="eventTable"></tbody>
    </table>

    <script>
        $(document).ready(function() {
            loadEvents();

            $("#eventForm button").click(function(e) {
                e.preventDefault();
                let action = $(this).attr("name");
                let formData = $("#eventForm").serialize() + "&" + action + "=true";

                $.post("event_functions.php", formData, function(response) {
                    alert(response);
                    loadEvents();
                    $("#eventForm")[0].reset();
                    $("#event_id").val("");
                });
            });

            $(document).on("click", ".editBtn", function() {
                let event = $(this).data();
                $("#event_id").val(event.id);
                $("#event").val(event.name);
                $("#date").val(event.date);
                $("#venue").val(event.venue);
                $("#organizer").val(event.organizer);
            });

            $(document).on("click", ".deleteBtn", function() {
                if (!confirm("Are you sure?")) return;
                let eventId = $(this).data("id");

                $.post("event_functions.php", { delete_event: true, event_id: eventId }, function(response) {
                    alert(response);
                    loadEvents();
                });
            });

            function loadEvents() {
                $.get("event_functions.php", { fetch_events: true }, function(data) {
                    $("#eventTable").html(data);
                });
            }
        });
    </script>
</body>
</html>
