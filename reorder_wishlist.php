<?php
require_once 'connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user_id = $_POST['user_id'];
    $trip_order = json_decode($_POST['trip_order'], true);

    // Retrieve the current positions of the user's wishlist items
    $stmt = $connection->prepare("SELECT trip_id, position FROM wishlist WHERE user_id = :user_id");
    $stmt->execute(['user_id' => $user_id]);
    $current_positions = $stmt->fetchAll(PDO::FETCH_KEY_PAIR);

    $connection->beginTransaction();

    $stmt = $connection->prepare("UPDATE wishlist SET position = :position WHERE user_id = :user_id AND trip_id = :trip_id");

    foreach ($trip_order as $index => $trip_id) {
        if (array_key_exists($trip_id, $current_positions)) {
            $stmt->execute([
                'position' => $index + 1,
                'user_id' => $user_id,
                'trip_id' => $trip_id,
            ]);
        }
    }

    $connection->commit();
}
?>