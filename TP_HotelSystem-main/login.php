<?php
require 'db.php';
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$error = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = trim($_POST['email'] ?? '');
    $password = $_POST['password'] ?? '';
    $stmt = $pdo->prepare("SELECT id, name, email, password, status FROM users WHERE email = ? LIMIT 1");
    $stmt->execute([$email]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user && $user['status'] === 'active' && (password_verify($password, $user['password']) || hash_equals((string) $user['password'], $password))) {
        session_regenerate_id(true);
        $_SESSION['user_id'] = (int) $user['id'];
        $_SESSION['user_name'] = $user['name'];
        header('Location: myaccount/bookings.php');
        exit;
    }
    $error = 'メールアドレスまたはパスワードが正しくありません。';
}
?>
<?php $activePage = ''; $basePath = ''; require 'partials/navigation.php'; ?>
<!DOCTYPE html>
<html lang="ja">
<head><meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1"><title>ログイン | 凪リゾート</title><link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"><style>body{background:#f4efe6;color:#18343a}.login-card{max-width:460px;margin:120px auto 40px;background:#fff;padding:36px;border-top:4px solid #d8795f}</style></head>
<body><main class="login-card"><a href="index.php" class="text-dark text-decoration-none fw-bold">CVA / 自然</a><h1 class="h2 mt-5">マイページへログイン</h1><p class="text-secondary">ログインすると、ご自身の予約状況を確認できます。</p><?php if ($error): ?><div class="alert alert-danger"><?= htmlspecialchars($error) ?></div><?php endif; ?><form method="post" class="mt-4"><label class="form-label" for="email">メールアドレス</label><input class="form-control mb-3" id="email" type="email" name="email" value="<?= htmlspecialchars($_POST['email'] ?? '') ?>" required><label class="form-label" for="password">パスワード</label><input class="form-control mb-3" id="password" type="password" name="password" required><button class="btn btn-primary w-100" type="submit">ログイン</button></form><a href="index.php" class="btn btn-outline-secondary w-100 mt-3">Homeへ戻る</a><p class="small text-secondary mt-4 mb-0">デモ：demo@example.com / demo-user</p></main></body></html>
