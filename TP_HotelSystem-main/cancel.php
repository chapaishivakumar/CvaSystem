<?php
require 'db.php';
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
if (empty($_SESSION['user_id'])) {
    header('Location: login.php');
    exit;
}
$bookingId = (int) ($_POST['booking_id'] ?? 0);
if ($bookingId > 0) {
    $stmt = $pdo->prepare("UPDATE bookings SET status = 'cancelled' WHERE id = ? AND user_id = ? AND status IN ('pending', 'confirmed')");
    $stmt->execute([$bookingId, (int) $_SESSION['user_id']]);
}
header('Location: myaccount/bookings.php');
exit;
