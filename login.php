<?php
session_start();

// Define your valid username and password (replace these with your actual credentials)
$valid_username = "your_username";
$valid_password = "your_password";

// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Check if the provided credentials match the valid ones
    if ($username === $valid_username && $password === $valid_password) {
        // Authentication successful
        $_SESSION["username"] = $username;
        header("Location: welcome.php"); // Redirect to a welcome page
        exit();
    } else {
        // Authentication failed
        $error_message = "Invalid username or password. Please try again.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login Form</title>
</head>
<body>
    <h2>Login</h2>
    <form action="" method="POST">
        <label for="username">Username:</label>
        <input type="text" name="username" id="username" required><br><br>
        <label for="password">Password:</label>
        <input type="password" name="password" id="password" required><br><br>
        <input type="submit" value="Login">
    </form>
    
    <?php
    if (isset($error_message)) {
        echo '<p style="color: red;">' . $error_message . '</p>';
    }
    ?>
</body>
</html>
