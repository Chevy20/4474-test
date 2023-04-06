<?php
    session_start();

    // Include your connection.php here
    include 'connection.php';

    $user_id = $_SESSION['user_id'];
    $trip_id = $_POST['trip_id'];

    // Get the position of the item to be removed
    $sql = "SELECT position FROM wishlist WHERE user_id = ? AND trip_id = ?";
    $stmt = $connection->prepare($sql);
    $stmt->bind_param("ii", $user_id, $trip_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();
    $removed_position = $row['position'];

    // Delete the item from the wishlist
    $sql = "DELETE FROM wishlist WHERE user_id = ? AND trip_id = ?";
    $stmt = $connection->prepare($sql);
    $stmt->bind_param("ii", $user_id, $trip_id);
    $stmt->execute();

    // Update the position values of the remaining items
    $sql = "UPDATE wishlist SET position = position - 1 WHERE user_id = ? AND position > ?";
    $stmt = $connection->prepare($sql);
    $stmt->bind_param("ii", $user_id, $removed_position);
    $stmt->execute();

    $stmt->close();
    $connection->close();
?>