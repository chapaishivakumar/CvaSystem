<?php require 'db.php'; $activePage = 'home'; ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>CVA / 自然 | 海辺のホテル予約</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=DM+Serif+Display&family=Manrope:wght@400;500;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
  <style>
    :root { --ink: #18343a; --muted: #61767a; --sea: #1d7b7e; --sand: #f4efe6; --coral: #d8795f; }
    * { box-sizing: border-box; }
    body { margin: 0; color: var(--ink); background: var(--sand); font-family: Manrope, sans-serif; }
    .navbar { background: rgba(250,248,243,.92); }
    .brand, h1, h2 { font-family: 'DM Serif Display', serif; }
    .brand { color: var(--ink); font-size: 1.45rem; text-decoration: none; letter-spacing: .02em; }
    .hero { min-height: 660px; padding: 130px 0 100px; color: white; background: linear-gradient(90deg, rgba(13,49,55,.82), rgba(13,49,55,.25)), url('https://images.unsplash.com/photo-1566073771259-6a8506099945?auto=format&fit=crop&w=1800&q=85') center/cover; }
    .eyebrow { color: #f3c5a7; font-size: .76rem; font-weight: 700; letter-spacing: .18em; text-transform: uppercase; }
    .hero h1 { max-width: 650px; font-size: clamp(3rem, 7vw, 6.5rem); line-height: .98; }
    .hero p { max-width: 500px; color: #e8efed; font-size: 1.08rem; }
    .search-panel { margin-top: 54px; padding: 22px; color: var(--ink); background: #fffdf8; border-top: 4px solid var(--coral); box-shadow: 0 18px 45px rgba(13,49,55,.22); }
    .search-panel label { color: var(--muted); font-size: .73rem; font-weight: 700; letter-spacing: .08em; text-transform: uppercase; }
    .form-control { border-color: #d8e0dc; border-radius: 2px; padding: .8rem; }
    .btn-sea { border: 0; border-radius: 2px; background: var(--sea); color: white; padding: .8rem 1.5rem; font-weight: 700; }
    .btn-sea:hover { background: #155f62; color: white; }
    .section { padding: 90px 0; }
    .section-label { color: var(--coral); font-size: .75rem; font-weight: 700; letter-spacing: .16em; text-transform: uppercase; }
    .feature { border-top: 1px solid #cbd8d4; padding-top: 20px; }
    .feature h3 { font-size: 1rem; font-weight: 700; }
    .feature p { color: var(--muted); font-size: .9rem; line-height: 1.8; }
    .info-card { height: 100%; overflow: hidden; background: #fffdf8; border: 0; box-shadow: 0 10px 26px rgba(24,52,58,.08); }
    .info-card img { width: 100%; height: 210px; object-fit: cover; }
    .info-card .card-body { padding: 24px; }
    .info-card h3 { font-family: 'DM Serif Display', serif; }
    .info-card p { color: var(--muted); line-height: 1.8; }
    .event-date { color: var(--coral); font-size: .76rem; font-weight: 700; letter-spacing: .12em; text-transform: uppercase; }
    .place-card { border-top: 1px solid #cbd8d4; padding-top: 18px; }
    .place-card img { width: 100%; height: 150px; object-fit: cover; }
    .cta { background: var(--ink); color: white; }
    .cta p { color: #bdd0ce; }
    footer { padding: 28px 0; color: #718184; font-size: .82rem; }
    @media (max-width: 768px) { .hero { min-height: 760px; padding-top: 100px; } .search-panel { margin-top: 35px; } .section { padding: 65px 0; } }
  </style>
</head>
<body>
  <?php require 'partials/navigation.php'; ?>
  <main>
    <section class="hero"><div class="container"><div class="eyebrow">A slower stay by the sea</div><h1 class="mt-3">波の音から、<br>旅をはじめる。</h1><p class="mt-4">海と街のあいだにある、静かなホテル。今日の気分に合う一室を見つけてください。</p>
      <div class="search-panel"><form action="rooms.php" method="POST" class="row g-3 align-items-end"><div class="col-12 col-md-3"><label for="check_in">チェックイン</label><input id="check_in" type="date" name="check_in" class="form-control mt-2" required></div><div class="col-12 col-md-3"><label for="check_out">チェックアウト</label><input id="check_out" type="date" name="check_out" class="form-control mt-2" required></div><div class="col-12 col-md-2"><label for="guests">宿泊人数</label><input id="guests" type="number" name="guests" class="form-control mt-2" min="1" value="2" required></div><div class="col-12 col-md-4"><button class="btn-sea w-100" type="submit">空室を検索する　→</button></div></form></div>
    </div></section>
    <section class="section"><div class="container"><div class="row g-5 align-items-end"><div class="col-lg-5"><div class="section-label">The Nagi experience</div><h2 class="display-4 mt-3">旅の余白を、<br>心地よく。</h2></div><div class="col-lg-6 offset-lg-1"><p class="lead">チェックインからチェックアウトまで、気持ちがほどける時間を。眺望、食事、滞在のペースまで、あなたらしい旅を支えます。</p></div></div><div class="row g-4 mt-5"><div class="col-md-4"><div class="feature"><h3>空室をリアルタイム検索</h3><p>希望の日程と人数から、予約可能な客室をすぐに比較できます。</p></div></div><div class="col-md-4"><div class="feature"><h3>滞在に合わせた客室</h3><p>広さ、眺望、設備を詳しく見ながら、ぴったりの部屋を選べます。</p></div></div><div class="col-md-4"><div class="feature"><h3>予約をかんたん管理</h3><p>マイページから予約の確認、キャンセル、レビュー投稿ができます。</p></div></div></div></div></section>
    <section class="section pt-0"><div class="container"><div class="d-flex justify-content-between align-items-end mb-4"><div><div class="section-label">Special rooms</div><h2 class="display-5 mt-2">特別な一室。</h2></div><a class="text-dark" href="rooms.php">客室一覧を見る　→</a></div><div class="row g-4"><div class="col-md-6"><article class="info-card"><img src="https://images.unsplash.com/photo-1582719478250-c89cae4dc85b?auto=format&fit=crop&w=1000&q=85" alt="プレミアムスイート"><div class="card-body"><div class="event-date">Limited stay</div><h3 class="h3 mt-2">プレミアムスイート</h3><p>海を望むリビングとバルコニー。大切な記念日にもおすすめの期間限定客室です。</p><a class="btn btn-outline-dark rounded-0" href="room_detail.php?id=2">客室の詳細を見る</a></div></article></div><div class="col-md-6"><article class="info-card"><img src="https://images.unsplash.com/photo-1590490360182-c33d57733427?auto=format&fit=crop&w=1000&q=85" alt="デラックスツイン"><div class="card-body"><div class="event-date">Quiet comfort</div><h3 class="h3 mt-2">デラックスツイン</h3><p>海側の窓とゆったりしたベッド。自然を感じながら過ごす、落ち着いた客室です。</p><a class="btn btn-outline-dark rounded-0" href="room_detail.php?id=1">客室の詳細を見る</a></div></article></div></div></div></section>
    <section class="section" style="background:#e7eee9"><div class="container"><div class="d-flex justify-content-between align-items-end mb-4"><div><div class="section-label">What's happening</div><h2 class="display-5 mt-2 mb-0">館内イベント情報。</h2></div><a class="text-dark" href="events.php">イベント一覧を見る　→</a></div><div class="row g-4 align-items-stretch"><div class="col-md-4 d-flex"><article class="info-card w-100"><div class="card-body d-flex flex-column"><div class="event-date">Every morning</div><h3 class="h4 mt-2">海辺の朝食会</h3><p>地元の食材を使った朝食を、ラウンジでお楽しみください。</p><span class="small text-secondary mt-auto">7:00 - 10:00　／　1F ラウンジ</span></div></article></div><div class="col-md-4 d-flex"><article class="info-card w-100"><div class="card-body d-flex flex-column"><div class="event-date">Saturday night</div><h3 class="h4 mt-2">星空ナイト</h3><p>スタッフが季節の星を案内する、宿泊者限定の夜の時間です。</p><span class="small text-secondary mt-auto">20:00 -　／　屋上テラス</span></div></article></div><div class="col-md-4 d-flex"><article class="info-card w-100"><div class="card-body d-flex flex-column"><div class="event-date">Seasonal</div><h3 class="h4 mt-2">自然のワークショップ</h3><p>季節の草花や香りに触れる、小さな体験を開催しています。</p><span class="small text-secondary mt-auto">開催日はフロントでご案内</span></div></article></div></div></div></section>
    <section class="section"><div class="container"><div class="section-label">Around CVA</div><h2 class="display-5 mt-2 mb-4">ホテルから行ける場所。</h2><div class="row g-4"><div class="col-md-4"><div class="place-card"><img src="https://images.unsplash.com/photo-1590559899731-a382839e5549?auto=format&fit=crop&w=800&q=85" alt="博多旧市街"><h3 class="h5 mt-3">博多旧市街</h3><p class="small text-secondary">徒歩・バスで約10分。歴史ある寺社と街並みを散策できます。</p></div></div><div class="col-md-4"><div class="place-card"><img src="https://images.unsplash.com/photo-1576675466969-38eeae4b41f6?auto=format&fit=crop&w=800&q=85" alt="海辺の公園"><h3 class="h5 mt-3">海辺の公園</h3><p class="small text-secondary">車で約15分。夕暮れの海と散歩道が楽しめるおすすめスポットです。</p></div></div><div class="col-md-4"><div class="place-card"><img src="https://images.unsplash.com/photo-1548013146-72479768bada?auto=format&fit=crop&w=800&q=85" alt="神社"><h3 class="h5 mt-3">季節の神社めぐり</h3><p class="small text-secondary">周辺の神社をめぐりながら、地域の文化と自然に触れられます。</p></div></div></div></div></section>
    <section class="section cta"><div class="container"><div class="row align-items-center"><div class="col-md-8"><div class="section-label">Your room is waiting</div><h2 class="mt-3">次の休日を、<br>海の近くで。</h2><p class="mt-3 mb-md-0">客室一覧から、設備と料金をじっくりご覧ください。</p></div><div class="col-md-4 text-md-end mt-4 mt-md-0"><a class="btn btn-light rounded-0 px-4 py-3" href="rooms.php">客室一覧を見る　→</a></div></div></div></section>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
