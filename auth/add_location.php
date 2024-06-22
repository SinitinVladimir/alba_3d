<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: auth.php");
    exit();
}

// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "alba_iulia";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $short_description = $_POST['short_description'];
    $catch_phrase = $_POST['catch_phrase'];
    $ticket_price = $_POST['ticket_price'];
    $visiting_hours = $_POST['visiting_hours'];
    $more_info_link = $_POST['more_info_link'];
    $map_link = $_POST['map_link'];
    $taxi_link = $_POST['taxi_link'];
    $social_media_facebook = $_POST['social_media_facebook'];
    $social_media_instagram = $_POST['social_media_instagram'];
    $social_media_youtube = $_POST['social_media_youtube'];
    $social_media_website = $_POST['social_media_website'];
    $social_media_tiktok = $_POST['social_media_tiktok'];
    $social_media_x = $_POST['social_media_x'];
    $location_coordinates = $_POST['location_coordinates'];
    $location_camera_type = $_POST['location_camera_type'];
    $expiration_date = $_POST['expiration_date'];
    $nearest_coffee = $_POST['nearest_coffee'];

    $stmt = $conn->prepare("INSERT INTO locations (title, description, short_description, catch_phrase, ticket_price, visiting_hours, more_info_link, map_link, taxi_link, social_media_facebook, social_media_instagram, social_media_youtube, social_media_website, social_media_tiktok, social_media_x, location_coordinates, location_camera_type, expiration_date, nearest_coffee) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssssssssssssssssss", $title, $description, $short_description, $catch_phrase, $ticket_price, $visiting_hours, $more_info_link, $map_link, $taxi_link, $social_media_facebook, $social_media_instagram, $social_media_youtube, $social_media_website, $social_media_tiktok, $social_media_x, $location_coordinates, $location_camera_type, $expiration_date, $nearest_coffee);

    if ($stmt->execute()) {
        header("Location: locations.php");
    } else {
        $error = "Error: " . $stmt->error;
    }
    $stmt->close();
}
$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Location</title>
    <link rel="stylesheet" type="text/css" href="authstyles.css">

</head>
<body>
    <h2>Add Location</h2>
    <form method="post" action="add_location.php">
        <label for="title">Title:</label>
        <input type="text" id="title" name="title" required><br><br>
        <label for="description">Description:</label>
        <textarea id="description" name="description" required></textarea><br><br>
        <label for="short_description">Short Description:</label>
        <textarea id="short_description" name="short_description"></textarea><br><br>
        <label for="catch_phrase">Catch Phrase:</label>
        <input type="text" id="catch_phrase" name="catch_phrase"><br><br>
        <label for="ticket_price">Ticket Price:</label>
        <input type="text" id="ticket_price" name="ticket_price"><br><br>
        <label for="visiting_hours">Visiting Hours:</label>
        <input type="text" id="visiting_hours" name="visiting_hours"><br><br>
        <label for="more_info_link">More Info Link:</label>
        <input type="text" id="more_info_link" name="more_info_link"><br><br>
        <label for="map_link">Map Link:</label>
        <input type="text" id="map_link" name="map_link"><br><br>
        <label for="taxi_link">Taxi Link:</label>
        <input type="text" id="taxi_link" name="taxi_link"><br><br>
        <label for="social_media_facebook">Facebook:</label>
        <input type="text" id="social_media_facebook" name="social_media_facebook"><br><br>
        <label for="social_media_instagram">Instagram:</label>
        <input type="text" id="social_media_instagram" name="social_media_instagram"><br><br>
        <label for="social_media_youtube">YouTube:</label>
        <input type="text" id="social_media_youtube" name="social_media_youtube"><br><br>
        <label for="social_media_website">Website:</label>
        <input type="text" id="social_media_website" name="social_media_website"><br><br>
        <label for="social_media_tiktok">TikTok:</label>
        <input type="text" id="social_media_tiktok" name="social_media_tiktok"><br><br>
        <label for="social_media_x">X:</label>
        <input type="text" id="social_media_x" name="social_media_x"><br><br>
        <label for="location_coordinates">Location Coordinates:</label>
        <input type="text" id="location_coordinates" name="location_coordinates"><br><br>
        <label for="location_camera_type">Camera Type:</label>
        <input type="text" id="location_camera_type" name="location_camera_type"><br><br>
        <label for="expiration_date">Expiration Date:</label>
        <input type="date" id="expiration_date" name="expiration_date"><br><br>
        <label for="nearest_coffee">Nearest Coffee:</label>
        <input type="text" id="nearest_coffee" name="nearest_coffee"><br><br>
        <input type="submit" value="Add Location">
    </form>
</body>
</html>
