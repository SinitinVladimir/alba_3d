<?php
session_start();

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
    if (isset($_POST['login'])) {
        $user = $_POST['username'];
        $pass = $_POST['password'];

        $stmt = $conn->prepare("SELECT id, password FROM users WHERE username = ?");
        $stmt->bind_param("s", $user);
        $stmt->execute();
        $stmt->store_result();
        $stmt->bind_result($id, $hashed_password);
        $stmt->fetch();

        if ($stmt->num_rows > 0 && password_verify($pass, $hashed_password)) {
            $_SESSION['user_id'] = $id;
            $_SESSION['username'] = $user;
            header("Location: locations.php");
        } else {
            $error = "Invalid username or password!";
        }
        $stmt->close();
    } elseif (isset($_POST['register'])) {
        $user = $_POST['username'];
        $pass = password_hash($_POST['password'], PASSWORD_BCRYPT);

        $stmt = $conn->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
        $stmt->bind_param("ss", $user, $pass);

        if ($stmt->execute()) {
            $success = "Registration successful. Please login.";
        } else {
            $error = "Error: " . $stmt->error;
        }
        $stmt->close();
    }
}
$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Authentication</title>
    <link rel="stylesheet" type="text/css" href="authstyles.css">

</head>
<body>
    <h2>Login</h2>
    <form method="post" action="auth.php">
        <label for="login_username">Username:</label>
        <input type="text" id="login_username" name="username" required><br><br>
        <label for="login_password">Password:</label>
        <input type="password" id="login_password" name="password" required><br><br>
        <input type="submit" name="login" value="Login">
    </form>
    <br>
    <h2>Register</h2>
    <form method="post" action="auth.php">
        <label for="register_username">Username:</label>
        <input type="text" id="register_username" name="username" required><br><br>
        <label for="register_password">Password:</label>
        <input type="password" id="register_password" name="password" required><br><br>
        <input type="submit" name="register" value="Register">
    </form>
    <?php
    if (isset($error)) {
        echo "<p style='color:red;'>$error</p>";
    }
    if (isset($success)) {
        echo "<p style='color:green;'>$success</p>";
    }
    ?>
</body>
</html>
