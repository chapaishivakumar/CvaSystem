<?php
require '../db.php';
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
if (empty($_SESSION['user_id']) || ($_SESSION['user_role'] ?? '') !== 'admin') {
    header('Location: login.php');
    exit;
}
$stmt = $pdo->query("SELECT b.*, r.room_number, rt.name AS room_type, rt.price, u.name AS customer_name, u.email FROM bookings b JOIN rooms r ON b.room_id = r.id JOIN room_types rt ON r.room_type_id = rt.id JOIN users u ON b.user_id = u.id ORDER BY b.created_at DESC");
$bookings = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="ja"><head><meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1"><title>予約管理 | 管理者</title><link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"></head>
<body><main class="container py-5"><div class="d-flex justify-content-between align-items-center mb-4"><div><a href="../index.php" class="text-dark text-decoration-none">CVA / 自然</a><h1 class="h2 mt-3">予約管理</h1></div><a href="../logout.php" class="btn btn-outline-secondary">ログアウト</a></div><?php if (!$bookings): ?><div class="alert alert-info">現在、予約はありません。</div><?php else: ?><div class="table-responsive"><table class="table align-middle"><thead><tr><th>顧客</th><th>部屋</th><th>宿泊日</th><th>人数</th><th>リクエスト</th><th>状態</th><th>操作</th></tr></thead><tbody><?php foreach ($bookings as $booking): ?><tr><td><?= htmlspecialchars($booking['customer_name']) ?><br><small><?= htmlspecialchars($booking['email']) ?></small></td><td><?= htmlspecialchars($booking['room_type']) ?><br><?= htmlspecialchars($booking['room_number']) ?><br><small><?= number_format((float) $booking['price']) ?>円/泊</small></td><td><?= htmlspecialchars($booking['check_in']) ?> ～ <?= htmlspecialchars($booking['check_out']) ?></td><td><?= (int) $booking['guests'] ?>名</td><td><?= htmlspecialchars($booking['special_request'] ?: 'なし') ?></td><td><span class="badge text-bg-secondary"><?= htmlspecialchars($booking['status']) ?></span></td><td><form action="update_booking.php" method="post" class="d-flex flex-wrap gap-1"><input type="hidden" name="booking_id" value="<?= (int) $booking['id'] ?>"><?php if ($booking['status'] === 'pending'): ?><button class="btn btn-sm btn-success" name="status" value="confirmed">承認する</button><?php elseif ($booking['status'] === 'confirmed'): ?><button class="btn btn-sm btn-outline-secondary" name="status" value="pending">承認を取り消す</button><button class="btn btn-sm btn-warning" name="status" value="completed">完了</button><?php endif; ?><?php if ($booking['status'] !== 'cancelled' && $booking['status'] !== 'completed'): ?><button class="btn btn-sm btn-danger" name="status" value="cancelled">キャンセル</button><?php endif; ?></form></td></tr><?php endforeach; ?></tbody></table></div><?php endif; ?></main></body></html>
