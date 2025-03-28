<?php
    include 'db_connect.php';

    if (isset($_GET['fetch'])) {
        $sql = "SELECT ArtistID, Name, DateOfBirth, Gender, ContactInfo, AvailabilityStatus FROM Artist"; 
        $result = mysqli_query($conn, $sql);

        $artists = [];
        if ($result && mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $artists[] = $row;
            }
        }

        mysqli_close($conn);
        echo json_encode($artists);
        exit;
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <link rel="stylesheet" href="admin.css"> 
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body class="admin-page">
    <header>
        <h1>Forondo Artist Management Excellence (FAME)</h1>
        <nav>
            <a href="index.php">Home</a>
            <a href="artists.php">Artists</a>
            <a href="event_booking.php">Book an Event</a>
            <a href="financials.php">Financial Reports</a>
        </nav>
    </header>

    <main>
        <h2>Admin Panel</h2>
        
        <h2>Add/Edit Artist</h2>
        <form id="artistForm">
            <input type="hidden" name="artist_id" id="artist_id">
            
            <label for="name">Artist Name:</label>
            <input type="text" name="name" id="name" placeholder="Enter artist's name" required>

            <label for="contact">Contact Info:</label>
            <input type="text" name="contact" id="contact" placeholder="Enter contact info" required>

            <label for="availability">Availability:</label>
            <select name="availability" id="availability">
                <option value="Available">Available</option>
                <option value="Unavailable">Unavailable</option>
            </select>

            <label for="gender">Gender:</label>
            <select name="gender" id="gender">
                <option value="M">Male</option>
                <option value="F">Female</option>
                <option value="Other">Other</option>
            </select>

            <label for="dob">Date of Birth:</label>
            <input type="date" name="dob" id="dob" required>

            <button type="submit" name="add_artist" class="add-btn">Add Artist</button>
            <button type="submit" name="edit_artist" class="edit-btn">Edit Artist</button>
        </form>

        <h2>Artists List</h2>
        <table>
            <thead>
                <tr>
                    <th>ID</th><th>Name</th><th>Contact</th><th>Availability</th><th>Gender</th><th>Date of Birth</th><th>Actions</th>
                </tr>
            </thead>
            <tbody id="artistTable"></tbody>
        </table>
    </main>

    <script>
        $(document).ready(function() {
            loadArtists(); 

            $("#artistForm button").click(function(e) {
                e.preventDefault();
                let action = $(this).attr("name"); 
                let formData = $("#artistForm").serialize() + "&" + action + "=true"; 

                $.post("admin_functions.php", formData, function(response) {
                    alert(response);
                    loadArtists();
                    $("#artistForm")[0].reset();
                    $("#artist_id").val("");
                });
            });

            $(document).on("click", ".editBtn", function() {
                let artist = $(this).data();
                $("#artist_id").val(artist.id);
                $("#name").val(artist.name);
                $("#contact").val(artist.contact);
                $("#availability").val(artist.availability);
                $("#gender").val(artist.gender);
                $("#dob").val(artist.dob);
            });

            $(document).on("click", ".deleteBtn", function() {
                if (!confirm("Are you sure?")) return;
                let artistId = $(this).data("id");

                $.post("admin_functions.php", { delete_artist: true, artist_id: artistId }, function(response) {
                    alert(response);
                    loadArtists();
                });
            });

            function loadArtists() {
                $.get("admin_functions.php", { fetch_artists: true }, function(data) {
                    $("#artistTable").html(data);
                });
            }
        });
    </script>
</body>
</html>
