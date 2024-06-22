<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="icon" type="image/svg+xml" href="/public/vite.svg">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ApeEscape</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.0.0/css/all.min.css">
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
    <!-- <header>
        <h1>Welcome To ALBA IULIA</h1>
    </header> -->

    <main>
    

<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "alba_iulia";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM locations";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo '<article class="location">
                <div class="location-top">
                    <h2>' . $row["title"] . '</h2>
                    <p>' . $row["catch_phrase"] . '</p>
                </div>
                <div class="location-icons">
                    <div class="icon" data-content="' . $row["description"] . '"><i class="fas fa-volume-up"></i></div>
                    <div class="icon" data-content="' . $row["short_description"] . '"><i class="fas fa-eye"></i></div>
                    <div class="icon"><a href="' . $row["map_link"] . '" target="_blank"><i class="fas fa-map-marker-alt"></i></a></div>
                    <div class="icon"><a href="' . $row["taxi_link"] . '" target="_blank"><i class="fas fa-taxi"></i></a></div>
                    <div class="icon" data-content="' . $row["ticket_price"] . '"><i class="fas fa-euro-sign"></i></div>
                    <div class="icon" data-content="' . $row["visiting_hours"] . '"><i class="fas fa-clock"></i></div>
                    <div class="icon"><a href="' . $row["nearest_coffee"] . '" target="_blank"><i class="fas fa-coffee"></i></a></div>
                    <div class="icon"><a href="' . $row["more_info_link"] . '" target="_blank"><i class="fas fa-info-circle"></i></a></div>
                    </div>
                    <div class="social-media">
                        ' . (!empty($row["social_media_facebook"]) ? '<a class="icon" href="' . $row["social_media_facebook"] . '" target="_blank"><i class="fab fa-facebook-f"></i></a>' : '') . '
                        ' . (!empty($row["social_media_instagram"]) ? '<a class="icon" href="' . $row["social_media_instagram"] . '" target="_blank"><i class="fab fa-instagram"></i></a>' : '') . '
                        ' . (!empty($row["social_media_youtube"]) ? '<a class="icon" href="' . $row["social_media_youtube"] . '" target="_blank"><i class="fab fa-youtube"></i></a>' : '') . '
                        ' . (!empty($row["social_media_website"]) ? '<a class="icon" href="' . $row["social_media_website"] . '" target="_blank"><i class="fas fa-globe"></i></a>' : '') . '
                        ' . (!empty($row["social_media_tiktok"]) ? '<a class="icon" href="' . $row["social_media_tiktok"] . '" target="_blank"><i class="fab fa-tiktok"></i></a>' : '') . '
                        ' . (!empty($row["social_media_x"]) ? '<a class="icon" href="' . $row["social_media_x"] . '" target="_blank"><i class="fab fa-twitter"></i></a>' : '') . '
                </div>
                <div class="location-content"></div>
              </article>';
    }
} else {
    echo "0 results";
}

$conn->close();
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
