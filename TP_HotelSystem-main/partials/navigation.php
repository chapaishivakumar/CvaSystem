<?php
if (session_status() === PHP_SESSION_NONE) {
  session_start();
}
$activePage = $activePage ?? '';
$basePath = $basePath ?? '';
$navItems = [
    'home' => ['label' => 'ホーム', 'href' => 'index.php'],
    'rooms' => ['label' => '客室を探す', 'href' => 'rooms.php'],
    'facilities' => ['label' => '施設・サービス', 'href' => 'facilities.php'],
    'events' => ['label' => 'イベント情報', 'href' => 'events.php'],
    'about' => ['label' => '会社概要', 'href' => 'about.php'],
    'contact' => ['label' => 'お問い合わせ', 'href' => 'contact.php'],
];
  if (!empty($_SESSION['user_id'])) {
    $navItems['account'] = ['label' => 'マイページ', 'href' => 'myaccount/bookings.php'];
  }
?>
<style>body { padding-top: 72px; padding-bottom: 64px; } .brand-logo { display: inline-block; color: #1d7b7e; font-weight: 800; letter-spacing: .08em; } .global-footer { position: fixed; right: 0; bottom: 0; left: 0; z-index: 1020; background: rgba(250,248,243,.97); }</style>
<nav class="navbar navbar-expand-lg fixed-top border-bottom bg-light">
  <div class="container py-2">
    <a class="navbar-brand fw-bold" href="<?= $basePath ?>index.php"><span class="brand-logo">CVA</span> / 自然</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNav" aria-label="メニュー"><span class="navbar-toggler-icon"></span></button>
    <div class="collapse navbar-collapse" id="mainNav">
      <div class="navbar-nav ms-auto align-items-lg-center gap-lg-2">
        <?php foreach ($navItems as $key => $item): ?>
          <a class="nav-link <?= $activePage === $key ? 'active fw-bold text-primary' : '' ?>" href="<?= $basePath . $item['href'] ?>" <?= $activePage === $key ? 'aria-current="page"' : '' ?>><?= htmlspecialchars($item['label']) ?></a>
        <?php endforeach; ?>
        <?php if (!empty($_SESSION['user_id'])): ?>
          <span class="small text-secondary ms-lg-2"><?= htmlspecialchars($_SESSION['user_name']) ?> さん</span>
          <a class="btn btn-outline-secondary btn-sm" href="<?= $basePath ?>logout.php">ログアウト</a>
        <?php else: ?>
          <a class="btn btn-outline-primary btn-sm ms-lg-2" href="<?= $basePath ?>login.php">ログイン</a>
        <?php endif; ?>
      </div>
    </div>
  </div>
</nav>
<footer class="global-footer border-top py-3"><div class="container d-flex flex-column flex-md-row justify-content-between gap-1 small text-secondary"><span>CVA / 自然　© 2026 CVA</span><span>運営：Ｂ＆Ｐ株式会社</span></div></footer>
