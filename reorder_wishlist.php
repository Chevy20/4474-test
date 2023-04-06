<?php
// Replace with your database connection details
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "db_4474";

// Create a new connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get the JSON payload from the client
$wishlist_data = json_decode(file_get_contents('php://input'), true);
$user_id = // Set the current user's ID here;

// Begin a transaction to update the wishlist items
$conn->begin_transaction();

// Create the temporary table
$conn->query("CREATE TEMPORARY TABLE wishlist_temp LIKE wishlist");

// Prepare the INSERT statement for the temporary table
$insert_sql = "INSERT INTO wishlist_temp SELECT * FROM wishlist WHERE user_id = ? AND trip_id = ?";
$insert_stmt = $conn->prepare($insert_sql);
$insert_stmt->bind_param("ii", $user_id, $trip_id);

foreach ($wishlist_data as $item) {
  $trip_id = $item['trip_id'];

  // Insert the reordered records into the temporary table
  if (!$insert_stmt->execute()) {
    $conn->rollback();
    die("Error updating wishlist: " . $insert_stmt->error);
  }
}

$insert_stmt->close();

// Delete the original records for the current user
$delete_sql = "DELETE FROM wishlist WHERE user_id = ?";
$delete_stmt = $conn->prepare($delete_sql);
$delete_stmt->bind_param("i", $user_id);

if (!$delete_stmt->execute()) {
  $conn->rollback();
  die("Error updating wishlist: " . $delete_stmt->error);
}

$delete_stmt->close();

// Replace the original records with the reordered records
$replace_sql = "INSERT INTO wishlist SELECT * FROM wishlist_temp";
$replace_stmt = $conn->prepare($replace_sql);

if (!$replace_stmt->execute()) {
  $conn->rollback();
  die("Error updating wishlist: " . $replace_stmt->error);
}

$replace_stmt->close();

$conn->commit();

// Drop the temporary table
$conn->query("DROP TEMPORARY TABLE wishlist_temp");

$conn->close();
?>
