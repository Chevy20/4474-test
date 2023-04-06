<?php
    session_start();

    // Include your connection.php here
    include 'connection.php';

    $user_id = $_SESSION['user_id'];
    $trip_id = $_POST['trip_id'];

    // Get the current maximum position value
    $sql = "SELECT COALESCE(MAX(position), 0) as max_position FROM wishlist WHERE user_id = ?";
    $stmt = $connection->prepare($sql);
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();
    $max_position = $row['max_position'];

    // Insert the new item with position = max_position + 1
    $new_position = $max_position + 1;
    $sql = "INSERT INTO wishlist (user_id, trip_id, position) VALUES (?, ?, ?)";
    $stmt = $connection->prepare($sql);
    $stmt->bind_param("iii", $user_id, $trip_id, $new_position);
    $stmt->execute();

    $stmt->close();
    $connection->close();
?>