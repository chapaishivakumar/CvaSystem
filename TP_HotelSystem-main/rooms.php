<?php
$activePage = 'rooms';
require 'db.php';
 $searched = $_SERVER['REQUEST_METHOD'] === 'POST';
 $check_in = $_POST['check_in'] ?? '';
 $check_out = $_POST['check_out'] ?? '';
 $guests = (int) ($_POST['guests'] ?? 1);
 $rooms = [];
 $error = '';
$specialRoom = null;
$specialStmt = $pdo->query("SELECT rt.*, r.id AS room_id, r.room_number FROM room_types rt JOIN rooms r ON r.room_type_id = rt.id WHERE rt.is_special = 1 AND r.status = 'available' ORDER BY rt.price ASC LIMIT 1");
$specialRoom = $specialStmt->fetch(PDO::FETCH_ASSOC);
if ($searched) {
  if ($check_in >= $check_out) {
    $error = 'チェックアウト日はチェックイン日より後の日付を指定してください。';
  } else {
    $sql = "SELECT r.*, rt.name as type_name, rt.size, rt.view, rt.amenities, rt.image_url, rt.price, rt.capacity
          FROM rooms r
          JOIN room_types rt ON r.room_type_id = rt.id
          WHERE r.status = 'available'
            AND rt.capacity >= ?
            AND r.id NOT IN (
            SELECT room_id FROM bookings
            WHERE (check_in < ? AND check_out > ?) AND status = 'confirmed'
          ) ORDER BY rt.price ASC, r.room_number ASC";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$guests, $check_out, $check_in]);
    $rooms = $stmt->fetchAll(PDO::FETCH_ASSOC);
  }
}
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>客室一覧 | 凪リゾート</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
  <style>.room-image{height:220px;object-fit:cover}</style>
</head>
<body>
<?php require 'partials/navigation.php'; ?>
<div class="container py-4">
  <h2 class="mt-3">部屋検索</h2>
  <?php if ($specialRoom): ?>
    <div class="card border-0 shadow-sm mb-4 overflow-hidden">
      <div class="row g-0 align-items-center">
        <div class="col-md-4"><img src="<?= htmlspecialchars($specialRoom['image_url']) ?>" class="img-fluid h-100" style="object-fit:cover;min-height:210px" alt="<?= htmlspecialchars($specialRoom['name']) ?>"></div>
        <div class="col-md-8 p-4">
          <span class="badge text-bg-warning mb-2">期間限定</span>
          <h3><?= htmlspecialchars($specialRoom['name']) ?></h3>
          <p class="text-secondary mb-2"><?= htmlspecialchars($specialRoom['special_label'] ?: '特別な客室プラン') ?> / 部屋番号 <?= htmlspecialchars($specialRoom['room_number']) ?></p>
          <p class="mb-3"><?= htmlspecialchars($specialRoom['view']) ?>・<?= htmlspecialchars($specialRoom['capacity']) ?>名まで・1泊 <?= number_format((float) $specialRoom['price']) ?>円</p>
          <a href="room_detail.php?id=<?= (int) $specialRoom['room_id'] ?>" class="btn btn-outline-primary">特別客室の詳細を見る</a>
        </div>
      </div>
    </div>
  <?php endif; ?>
  <form method="POST" class="row mb-4">
    <div class="col">
      <label>チェックイン</label>
      <input type="date" name="check_in" class="form-control" value="<?= htmlspecialchars($check_in) ?>" required>
    </div>
    <div class="col">
      <label>チェックアウト</label>
      <input type="date" name="check_out" class="form-control" value="<?= htmlspecialchars($check_out) ?>" required>
    </div>
    <div class="col">
      <label>人数</label>
      <input type="number" name="guests" class="form-control" min="1" value="<?= $guests > 0 ? $guests : 1 ?>" required>
    </div>
    <div class="col">
      <button type="submit" class="btn btn-primary mt-4">検索</button>
    </div>
  </form>
  <?php if ($error): ?>
    <div class="alert alert-danger"><?= htmlspecialchars($error) ?></div>
  <?php elseif ($searched && !empty($rooms)): ?>
    <h3>空室一覧</h3>
    <div class="row">
      <?php foreach ($rooms as $room): ?>
        <div class="col-md-4">
          <div class="card mb-3 h-100">
            <img src="<?= htmlspecialchars($room['image_url'] ?: 'https://images.unsplash.com/photo-1566665797739-1674de7a421a?auto=format&fit=crop&w=1200&q=85') ?>" class="card-img-top room-image" alt="<?= htmlspecialchars($room['type_name']) ?>の客室">
            <div class="card-body">
              <h5 class="card-title"><?= htmlspecialchars($room['type_name']) ?></h5>
              <p class="text-secondary mb-2">部屋番号：<?= htmlspecialchars($room['room_number']) ?></p>
              <p>広さ: <?= htmlspecialchars($room['size']) ?> | 眺望: <?= htmlspecialchars($room['view']) ?></p>
              <p>アメニティ: <?= htmlspecialchars($room['amenities']) ?></p>
              <p>定員: <?= htmlspecialchars($room['capacity']) ?>名</p>
              <p class="fw-bold">1泊 <?= number_format((float) $room['price']) ?>円</p>
              <a href="room_detail.php?id=<?= $room['id'] ?>" class="btn btn-outline-primary">詳細</a>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  <?php elseif ($searched): ?>
    <div class="alert alert-warning">ご指定条件で空室がありません。</div>
  <?php endif; ?>
</div>
</body>
</html>
