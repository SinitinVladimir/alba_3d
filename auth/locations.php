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

$sql = "SELECT * FROM locations";
$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html>
<head>
    <title>Locations</title>
    <link rel="stylesheet" type="text/css" href="authstyles.css">

</head>
<body>
    <h2>Locations</h2>
    <a href="add_location.php">Add New Location</a>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Title</th>
            <th>Description</th>
            <th>Actions</th>
        </tr>
        <?php while($row = $result->fetch_assoc()): ?>
        <tr>
            <td><?php echo $row['id']; ?></td>
            <td><?php echo $row['title']; ?></td>
            <td><?php echo $row['description']; ?></td>
            <td>
                <a href="edit_location.php?id=<?php echo $row['id']; ?>">Edit</a>
                <a href="delete_location.php?id=<?php echo $row['id']; ?>">Delete</a>
            </td>
        </tr>
        <?php endwhile; ?>
    </table>
    <a href="logout.php">Logout</a>
</body>
</html>

<?php
$conn->close();
?>
