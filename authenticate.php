<?php
session_start();

// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "db_4474";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get the username and password from the form
$userName = $_POST['userName'];
$userPassword = $_POST['userPassword'];

// Prepare and execute the SQL query
$sql = "SELECT user_id FROM Account_info WHERE username = ? AND password = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ss", $userName, $userPassword);
$stmt->execute();
$stmt->bind_result($user_id);
$stmt->fetch();

if ($user_id) {
    // Store user_id in the session and redirect to niagaraFalls.php
    $_SESSION['user_id'] = $user_id;
    header("Location: niagaraFalls.php");
    exit();
} else {
    // Redirect back to login.php with an error message
    header("Location: login.php?error=1");
    exit();
}

$stmt->close();
$conn->close();
?>
