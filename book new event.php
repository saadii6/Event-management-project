<?php
    

$servername = "your_database_server";
$username = "mot";
$password = "unlock";
$dbname = "new_events";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$eventName = $_POST['event-name'];
$eventType = $_POST['event-type'];
$eventDate = $_POST['event-date'];
$eventVenue = $_POST['event-venue'];
$email = $_POST['email'];


$sql = "INSERT INTO events (event_name, event_type, event_date, event_venue, email) VALUES ('$eventName', '$eventType', '$eventDate', '$eventVenue', '$email')";

if ($conn->query($sql) === TRUE) {
    echo "Event details saved successfully!";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="book.css">
    <title>Book New Event</title>
</head>

<body>
    <div id="header">
        <div class="container">
            <nav>
                <img src="mlogo.jpg" class="logo">
                <ul>
                    <li><a href="Home.html">Home</a></li>
                    <li><a href="#">About</a></li>
                    <li><a href="#">Upcoming Events</a></li>
                    <li><a href="book new event.html">Book New Event</a></li>
                    <li><a href="contact.html">Contact Us</a></li>
                </ul>
            </nav>
            <div class="header_text">
                <b>We Make You Happy</b>
                <h1> <span style="color: #ffbf00;">CREATING</span> MEMORABLE EVENTS</h1>
                <h2>Book your next Exciting event with us</h2>
                <h1>Event Details</h1>
                <form id="event-form">
                    <label for="event-name">Event Name:</label><br>
                    <input type="text" id="event-name" name="event-name" required><br>
                    <label for="event-type">Event Type:</label><br>
                    <input type="text" id="event-type" name="event-type" required><br>
                    <label for="event-date">Event Date:</label><br>
                    <input type="date" id="event-date" name="event-date" required><br>
                    <label for="event-venue">Event Venue:</label><br>
                    <input type="text" id="event-venue" name="event-venue" required><br>
                    <label for="email">Email:</label><br>
                    <input type="email" id="email" name="email" required><br>
                    <input type="submit" value="Submit">
                </form>


            </div>
        </div>
        <footer>

            <p>© 2024 MOT. All rights reserved.</p>
        </footer>
    </div>

    <script>
        $(document).ready(function() {
            // Intercept form submission
            $('#event-form').submit(function(event) {
                // Prevent the default form submission
                event.preventDefault();

                // Serialize form data
                var formData = $(this).serialize();

                // Send AJAX request to the server
                $.ajax({
                    type: 'POST',
                    url: 'save_event.php', // Change this to the actual path of your PHP file
                    data: formData,
                    success: function(response) {
                        alert(response); // Show a success message
                        // You can also redirect the user or perform other actions on success
                    },
                    error: function(error) {
                        alert('Error saving event details');
                    }
                });
            });
        });
    </script>
    
    


</body>

</html>