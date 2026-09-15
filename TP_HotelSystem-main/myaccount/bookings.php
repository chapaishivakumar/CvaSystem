<?php
$activePage = 'account';
$basePath = '../';
require '../db.php';
session_start();
if (empty($_SESSION['user_id'])) {
  header('Location: ../login.php');
  exit;
}
$user_id = (int) $_SESSION['user_id'];
$stmt = $pdo->prepare("SELECT b.*, r.room_number, rt.name AS room_type, rt.price FROM bookings b JOIN rooms r ON b.room_id = r.id JOIN room_types rt ON r.room_type_id = rt.id WHERE b.user_id=? ORDER BY b.created_at DESC");
$stmt->execute([$user_id]);
$bookings = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>予約管理 | マイページ</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
<?php require '../partials/navigation.php'; ?>
<div class="container py-4">
  <h2>予約履歴</h2>
  <?php if (!$bookings): ?><div class="alert alert-info">予約はまだありません。</div><?php endif; ?>
  <?php foreach($bookings as $b): ?>
    <div class="border rounded p-3 mb-3 bg-light">
      <div class="d-flex flex-wrap justify-content-between gap-2"><strong><?= htmlspecialchars($b['room_type']) ?>（部屋 <?= htmlspecialchars($b['room_number']) ?>）</strong><span class="badge text-bg-secondary">状態：<?= htmlspecialchars($b['status']) ?></span></div>
      <p class="mb-1 mt-2">宿泊日：<?= htmlspecialchars($b['check_in']) ?> ～ <?= htmlspecialchars($b['check_out']) ?></p>
      <p class="mb-1">人数：<?= (int) $b['guests'] ?>名 / 料金目安：1泊 <?= number_format((float) $b['price']) ?>円</p>
      <p class="mb-3">特別リクエスト：<?= htmlspecialchars($b['special_request'] ?: 'なし') ?></p>
      <form action="../cancel.php" method="POST">
        <input type="hidden" name="booking_id" value="<?= $b['id'] ?>">
        <button type="submit" class="btn btn-danger btn-sm">キャンセル</button>
      </form>
    </div>
    <hr>
  <?php endforeach; ?>
</div>
</body>
</html>
