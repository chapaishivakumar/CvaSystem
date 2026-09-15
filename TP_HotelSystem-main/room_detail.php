<?php
$activePage = 'rooms';
require 'db.php';
$id = $_GET['id'];
$stmt = $pdo->prepare("SELECT r.*, rt.name as type_name, rt.size, rt.view, rt.amenities, rt.description, rt.price, rt.image_url
                       FROM rooms r JOIN room_types rt ON r.room_type_id=rt.id WHERE r.id=?");
$stmt->execute([$id]);
$room = $stmt->fetch(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html>
<head>
  <title>部屋詳細</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
  <style>.room-photo{width:100%;height:420px;object-fit:cover}.room-copy{max-width:720px}</style>
</head>
<body>
<?php require 'partials/navigation.php'; ?>
<div class="container">
  <img src="<?= htmlspecialchars($room['image_url'] ?: 'https://images.unsplash.com/photo-1566665797739-1674de7a421a?auto=format&fit=crop&w=1200&q=85') ?>" class="room-photo rounded mb-4" alt="<?= htmlspecialchars($room['type_name']) ?>の客室">
  <div class="room-copy"><h2><?= htmlspecialchars($room['type_name']) ?> の詳細</h2>
  <p>広さ: <?= htmlspecialchars($room['size']) ?> / 眺望: <?= htmlspecialchars($room['view']) ?></p>
  <p>アメニティ: <?= htmlspecialchars($room['amenities']) ?></p>
  <p><?= htmlspecialchars($room['description'] ?? '') ?></p>
  <p class="fw-bold">1泊 <?= number_format((float) $room['price']) ?>円</p>
  <form action="book.php" method="POST">
    <input type="hidden" name="room_id" value="<?= $room['id'] ?>">
    <label>チェックイン: <input type="date" name="check_in" required></label><br>
    <label>チェックアウト: <input type="date" name="check_out" required></label><br>
    <label>人数: <input type="number" name="guests" value="1" min="1" required></label><br>
    <label>特別リクエスト: <input type="text" name="special_request"></label><br>
    <button type="submit" class="btn btn-success">予約する</button>
  </form></div>
</div>
</body>
</html>
