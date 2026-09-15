<?php $activePage = 'events'; ?>
<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>館内イベント情報 | CVA</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
  <style>
    body { color: #18343a; background: #e7eee9; font-family: Arial, sans-serif; }
    .cva-logo { display: inline-block; color: #61b9c0; font-size: 1.1em; font-weight: 800; letter-spacing: .12em; }
    .event-hero { padding: 125px 0 70px; color: #fff; background: linear-gradient(90deg, rgba(13,49,55,.86), rgba(13,49,55,.2)), url('https://images.unsplash.com/photo-1500530855697-b586d89ba3ee?auto=format&fit=crop&w=1800&q=85') center/cover; }
    .event-card { height: 100%; overflow: hidden; background: #fffdf8; box-shadow: 0 10px 26px rgba(24,52,58,.1); }
    .event-card img { width: 100%; height: 230px; object-fit: cover; }
    .event-card .content { padding: 26px; }
    .event-date { color: #d8795f; font-size: .76rem; font-weight: 700; letter-spacing: .14em; text-transform: uppercase; }
    .event-card p { color: #607477; line-height: 1.8; }
  </style>
</head>
<body>
<?php require 'partials/navigation.php'; ?>
<header class="event-hero"><div class="container"><div class="event-date"><span class="cva-logo">CVA</span> / What's happening</div><h1 class="display-3 mt-3">館内イベント情報。</h1><p class="lead mb-0">滞在の時間を少し豊かにする、季節の催しをご案内します。</p></div></header>
<main class="container py-5"><div class="row g-4"><div class="col-md-4"><article class="event-card"><img src="https://images.unsplash.com/photo-1533089860892-a7c6f0a88666?auto=format&fit=crop&w=1000&q=85" alt="海辺の朝食会"><div class="content"><div class="event-date">Every morning</div><h2 class="h3 mt-2">海辺の朝食会</h2><p>地元の食材を使った朝食を、ラウンジでゆっくりお楽しみください。</p><div class="small text-secondary">7:00 - 10:00 ／ 1F ラウンジ</div></div></article></div><div class="col-md-4"><article class="event-card"><img src="https://images.unsplash.com/photo-1519681393784-d120267933ba?auto=format&fit=crop&w=1000&q=85" alt="星空ナイト"><div class="content"><div class="event-date">Saturday night</div><h2 class="h3 mt-2">星空ナイト</h2><p>スタッフが季節の星をご案内する、宿泊者限定の夜の時間です。</p><div class="small text-secondary">20:00 - ／ 屋上テラス</div></div></article></div><div class="col-md-4"><article class="event-card"><img src="https://images.unsplash.com/photo-1473448912268-2022ce9509d8?auto=format&fit=crop&w=1000&q=85" alt="自然のワークショップ"><div class="content"><div class="event-date">Seasonal</div><h2 class="h3 mt-2">自然のワークショップ</h2><p>季節の草花や香りに触れる、小さな体験を開催しています。</p><div class="small text-secondary">開催日はフロントでご案内</div></div></article></div></div></main>
</body>
</html>
