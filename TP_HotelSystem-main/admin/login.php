<?php
require '../db.php';
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
$error = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $stmt = $pdo->prepare("SELECT id, name, email, password, role, status FROM users WHERE email = ? LIMIT 1");
    $stmt->execute([trim($_POST['email'] ?? '')]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
    $password = $_POST['password'] ?? '';
    if ($user && $user['role'] === 'admin' && $user['status'] === 'active' && (password_verify($password, $user['password']) || hash_equals((string) $user['password'], $password))) {
        session_regenerate_id(true);
        $_SESSION['user_id'] = (int) $user['id'];
        $_SESSION['user_name'] = $user['name'];
        $_SESSION['user_role'] = 'admin';
        header('Location: bookings.php');
        exit;
    }
    $error = '管理者アカウントでログインしてください。';
}
?>
<!DOCTYPE html>
<html lang="ja"><head><meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1"><title>管理者ログイン | CVA / 自然</title><link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"></head>
<body><main class="container" style="max-width:480px;padding-top:120px"><div class="bg-light p-4 border-top border-secondary border-4"><a href="../index.php" class="text-dark text-decoration-none fw-bold">CVA / 自然</a><h1 class="h3 mt-4">管理者ログイン</h1><?php if ($error): ?><div class="alert alert-danger"><?= htmlspecialchars($error) ?></div><?php endif; ?><form method="post"><label class="form-label">メールアドレス</label><input class="form-control mb-3" type="email" name="email" required><label class="form-label">パスワード</label><input class="form-control mb-3" type="password" name="password" required><button class="btn btn-dark w-100" type="submit">管理画面へログイン</button></form><a class="btn btn-outline-secondary w-100 mt-3" href="../index.php">Homeへ戻る</a><p class="small text-secondary mt-4 mb-0">デモ：admin@example.com / admin-demo</p></div></main></body></html>
