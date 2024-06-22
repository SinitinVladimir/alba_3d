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

$id = $_GET['id'];

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

    $stmt = $conn->prepare("UPDATE locations SET title=?, description=?, short_description=?, catch_phrase=?, ticket_price=?, visiting_hours=?, more_info_link=?, map_link=?, taxi_link=?, social_media_facebook=?, social_media_instagram=?, social_media_youtube=?, social_media_website=?, social_media_tiktok=?, social_media_x=?, location_coordinates=?, location_camera_type=?, expiration_date=?, nearest_coffee=? WHERE id=?");
    $stmt->bind_param("sssssssssssssssssssi", $title, $description, $short_description, $catch_phrase, $ticket_price, $visiting_hours, $more_info_link, $map_link, $taxi_link, $social_media_facebook, $social_media_instagram, $social_media_youtube, $social_media_website, $social_media_tiktok, $social_media_x, $location_coordinates, $location_camera_type, $expiration_date, $nearest_coffee, $id);

    if ($stmt->execute()) {
        header("Location: locations.php");
    } else {
        $error = "Error: " . $stmt->error;
    }
    $stmt->close();
}

$sql = "SELECT * FROM locations WHERE id = $id";
$result = $conn->query($sql);
$location = $result->fetch_assoc();

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Location</title>
    <link rel="stylesheet" type="text/css" href="authstyles.css">

</head>
<body>
    <h2>Edit Location</h2>
    <form method="post" action="edit_location.php?id=<?php echo $id; ?>">
        <label for="title">Title:</label>
        <input type="text" id="title" name="title" value="<?php echo $location['title']; ?>" required><br><br>
        <label for="description">Description:</label>
        <textarea id="description" name="description" required><?php echo $location['description']; ?></textarea><br><br>
        <label for="short_description">Short Description:</label>
        <textarea id="short_description" name="short_description"><?php echo $location['short_description']; ?></textarea><br><br>
        <label for="catch_phrase">Catch Phrase:</label>
        <input type="text" id="catch_phrase" name="catch_phrase" value="<?php echo $location['catch_phrase']; ?>"><br><br>
        <label for="ticket_price">Ticket Price:</label>
        <input type="text" id="ticket_price" name="ticket_price" value="<?php echo $location['ticket_price']; ?>"><br><br>
        <label for="visiting_hours">Visiting Hours:</label>
        <input type="text" id="visiting_hours" name="visiting_hours" value="<?php echo $location['visiting_hours']; ?>"><br><br>
        <label for="more_info_link">More Info Link:</label>
        <input type="text" id="more_info_link" name="more_info_link" value="<?php echo $location['more_info_link']; ?>"><br><br>
        <label for="map_link">Map Link:</label>
        <input type="text" id="map_link" name="map_link" value="<?php echo $location['map_link']; ?>"><br><br>
        <label for="taxi_link">Taxi Link:</label>
        <input type="text" id="taxi_link" name="taxi_link" value="<?php echo $location['taxi_link']; ?>"><br><br>
        <label for="social_media_facebook">Facebook:</label>
        <input type="text" id="social_media_facebook" name="social_media_facebook" value="<?php echo $location['social_media_facebook']; ?>"><br><br>
        <label for="social_media_instagram">Instagram:</label>
        <input type="text" id="social_media_instagram" name="social_media_instagram" value="<?php echo $location['social_media_instagram']; ?>"><br><br>
        <label for="social_media_youtube">YouTube:</label>
        <input type="text" id="social_media_youtube" name="social_media_youtube" value="<?php echo $location['social_media_youtube']; ?>"><br><br>
        <label for="social_media_website">Website:</label>
        <input type="text" id="social_media_website" name="social_media_website" value="<?php echo $location['social_media_website']; ?>"><br><br>
        <label for="social_media_tiktok">TikTok:</label>
        <input type="text" id="social_media_tiktok" name="social_media_tiktok" value="<?php echo $location['social_media_tiktok']; ?>"><br><br>
        <label for="social_media_x">X:</label>
        <input type="text" id="social_media_x" name="social_media_x" value="<?php echo $location['social_media_x']; ?>"><br><br>
        <label for="location_coordinates">Location Coordinates:</label>
        <input type="text" id="location_coordinates" name="location_coordinates" value="<?php echo $location['location_coordinates']; ?>"><br><br>
        <label for="location_camera_type">Camera Type:</label>
        <input type="text" id="location_camera_type" name="location_camera_type" value="<?php echo $location['location_camera_type']; ?>"><br><br>
        <label for="expiration_date">Expiration Date:</label>
        <input type="date" id="expiration_date" name="expiration_date" value="<?php echo $location['expiration_date']; ?>"><br><br>
        <label for="nearest_coffee">Nearest Coffee:</label>
        <input type="text" id="nearest_coffee" name="nearest_coffee" value="<?php echo $location['nearest_coffee']; ?>"><br><br>
        <input type="submit" value="Update Location">
    </form>
</body>
</html>
