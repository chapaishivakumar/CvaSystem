<?php
$activePage = '';
$basePath = '../';
require '../db.php';
$stmt = $pdo->query("SELECT r.*, rt.name as type_name FROM rooms r JOIN room_types rt ON r.room_type_id = rt.id");
$rooms = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html>
<head>
  <title>部屋管理（管理用）</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
<?php require '../partials/navigation.php'; ?>
<div class="container">
  <h2>部屋管理</h2>
  <a href="add_room.php" class="btn btn-success mb-2">新規追加</a>
  <table class="table table-bordered">
    <tr><th>ID</th><th>部屋番号</th><th>タイプ</th><th>操作</th></tr>
    <?php foreach($rooms as $room): ?>
      <tr>
        <td><?= $room['id'] ?></td>
        <td><?= htmlspecialchars($room['room_number']) ?></td>
        <td><?= htmlspecialchars($room['type_name']) ?></td>
        <td>
          <a href="edit_room.php?id=<?= $room['id'] ?>" class="btn btn-sm btn-warning">編集</a>
          <a href="delete_room.php?id=<?= $room['id'] ?>" class="btn btn-sm btn-danger">削除</a>
        </td>
      </tr>
    <?php endforeach; ?>
  </table>
</div>
</body>
</html>
