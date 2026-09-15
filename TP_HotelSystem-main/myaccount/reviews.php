<?php
$activePage = 'account';
$basePath = '../';
require '../db.php';
session_start();
$redirect = '../login.php';
if (empty($_SESSION['user_id'])) {
  header('Location: ' . $redirect);
  exit;
}
$user_id = (int) $_SESSION['user_id'];
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $room_id = $_POST['room_id'];
  $rating = $_POST['rating'];
  $comment = $_POST['comment'];
  $stmt = $pdo->prepare("INSERT INTO reviews (user_id, room_id, rating, comment) VALUES (?, ?, ?, ?)");
  $stmt->execute([$user_id, $room_id, $rating, $comment]);
  echo "<div class='alert alert-success'>レビューを投稿しました。</div>";
}
?>
<!DOCTYPE html>
<html>
<head>
  <title>レビュー投稿</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
<?php require '../partials/navigation.php'; ?>
<div class="container">
  <h2>レビュー投稿</h2>
  <form method="POST">
    <label>部屋ID: <input type="number" name="room_id" required></label><br>
    <label>評価: <input type="number" name="rating" min="1" max="5" required></label><br>
    <label>コメント: <textarea name="comment" required></textarea></label><br>
    <button type="submit" class="btn btn-primary">投稿</button>
  </form>
</div>
</body>
</html>
