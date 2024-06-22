<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="icon" type="image/svg+xml" href="/public/vite.svg">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vite App</title>
    <link rel="stylesheet" href="style.css">

    <script type="importmap">
        {
            "imports": {
                "three": "/node_modules/three/build/three.module.js",
                "GLTFLoader": "/node_modules/three/examples/jsm/loaders/GLTFLoader.js",
                "OrbitControls": "/node_modules/three/examples/jsm/controls/OrbitControls.js"
            }
        }
    </script>
</head>

<body>
    <canvas id="bg"></canvas>
    <header>
        <h1>Welcome To ALBA IULIA</h1>
    </header>

    <main>
    <?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "alba_iulia";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch data from database
$sql = "SELECT * FROM locations";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo '<article class="location">
                <div class="location-top">
                    <h2>' . $row["title"] . '</h2>
                    <p>' . $row["catch_phrase"] . '</p>
                    <p>' . $row["description"] . '</p>
                    <p>' . $row["short_description"] . '</p>
                </div>
                <div class="location-bottom">
                    <p><strong>Ticket Price:</strong> ' . $row["ticket_price"] . '</p>
                    <p><strong>Visiting Hours:</strong> ' . $row["visiting_hours"] . '</p>
                    <p><a href="' . $row["more_info_link"] . '" target="_blank">More Info</a></p>
                    <p><a href="' . $row["map_link"] . '" target="_blank">View on Map</a></p>
                    <p><strong>Nearest Coffee:</strong> ' . $row["nearest_coffee"] . '</p>
                    <p><a href="' . $row["taxi_link"] . '" target="_blank">Taxi</a></p>
                    <div class="social-media-links">
                        ' . (!empty($row["social_media_facebook"]) ? '<a href="' . $row["social_media_facebook"] . '" target="_blank">Facebook</a> ' : '') . '
                        ' . (!empty($row["social_media_instagram"]) ? '<a href="' . $row["social_media_instagram"] . '" target="_blank">Instagram</a> ' : '') . '
                        ' . (!empty($row["social_media_youtube"]) ? '<a href="' . $row["social_media_youtube"] . '" target="_blank">YouTube</a> ' : '') . '
                        ' . (!empty($row["social_media_website"]) ? '<a href="' . $row["social_media_website"] . '" target="_blank">Website</a> ' : '') . '
                        ' . (!empty($row["social_media_tiktok"]) ? '<a href="' . $row["social_media_tiktok"] . '" target="_blank">TikTok</a> ' : '') . '
                        ' . (!empty($row["social_media_x"]) ? '<a href="' . $row["social_media_x"] . '" target="_blank">X</a> ' : '') . '
                    </div>
                </div>
              </article>';
    }
} else {
    echo "0 results";
}

$conn->close();
?>
        ?>
    </main>

    <div id="camera-position" style="position: absolute; top: 10px; left: 10px; color: white; background: rgba(0, 0, 0, 0.5); padding: 5px; border-radius: 5px; z-index: 3;">
        Camera Position: 
    </div>
    <div id="interaction-switch" style="position: absolute; top: 50px; left: 10px; color: white; background: rgba(0, 0, 0, 0.5); padding: 5px; border-radius: 5px; z-index: 3;">
        Interaction Mode: <input type="checkbox" id="toggleMode"> List/Scroll
    </div>
    <script type="module" src="/main.js"></script>
</body>
</html>
