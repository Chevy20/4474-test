<?php
    // Include your connection.php here
    include 'connection.php';

    // Get the data sent from the AJAX request
    $wishlist_order = json_decode($_POST['wishlist_order'], true);

    // Update the position of each item in the wishlist table
    $sql = "UPDATE wishlist SET position = ? WHERE user_id = ? AND trip_id = ?";
    $stmt = $connection->prepare($sql);

    if (!$stmt) {
        die("Prepare failed: " . $connection->error);
    }

    foreach ($wishlist_order as $position => $trip_id) {
        $stmt->bind_param("iii", $position, $_SESSION['user_id'], $trip_id);
        $stmt->execute();
    }

    $stmt->close();
    $connection->close();
?>