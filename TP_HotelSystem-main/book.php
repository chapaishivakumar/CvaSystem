<?php
require 'db.php';
session_start();
if (empty($_SESSION['user_id'])) {
	header('Location: login.php');
	exit;
}
$user_id = (int) $_SESSION['user_id'];
$room_id = $_POST['room_id'];
$check_in = $_POST['check_in'];
$check_out = $_POST['check_out'];
$guests = $_POST['guests'];
$special_request = $_POST['special_request'] ?? '';
$stmt = $pdo->prepare("INSERT INTO bookings (room_id, user_id, check_in, check_out, guests, special_request, status) VALUES (?, ?, ?, ?, ?, ?, 'pending')");
$stmt->execute([$room_id, $user_id, $check_in, $check_out, $guests, $special_request]);
echo "予約を受け付けました。マイページよりご確認ください。";
?>
