<?php
require '../db.php';
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
if (empty($_SESSION['user_id']) || ($_SESSION['user_role'] ?? '') !== 'admin') {
    header('Location: login.php');
    exit;
}
$bookingId = (int) ($_POST['booking_id'] ?? 0);
$status = $_POST['status'] ?? '';
$allowedStatuses = ['pending', 'confirmed', 'completed', 'cancelled'];
if ($bookingId > 0 && in_array($status, $allowedStatuses, true)) {
    $stmt = $pdo->prepare('UPDATE bookings SET status = ? WHERE id = ?');
    $stmt->execute([$status, $bookingId]);
}
header('Location: bookings.php');
exit;
