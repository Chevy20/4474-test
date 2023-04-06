<?php
    session_start();

    // Include your connection.php here
    include 'connection.php';

    $user_id = $_SESSION['user_id'];
    $trip_id = $_POST['trip_id'];

    // Find the maximum position value in the wishlist table for the user
    $sql = "SELECT MAX(position) AS max_position FROM wishlist WHERE user_id = ?";
    $stmt = $connection->prepare($sql);
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();

    // Increment the maximum position value by 1
    $new_position = $row['max_position'] + 1;

    // Insert the new wishlist item with the new position
    $sql = "INSERT INTO wishlist (user_id, trip_id, position) VALUES (?, ?, ?)";
    $stmt = $connection->prepare($sql);
    $stmt->bind_param("iii", $user_id, $trip_id, $new_position);
    $stmt->execute();

    $stmt->close();
    $connection->close();
?>