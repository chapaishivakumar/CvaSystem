<?php $activePage = 'about'; ?>
<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>会社概要 | CVA / 自然</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
  <style>
    :root { --ink: #edf4f3; --muted: #afc2c2; --dark: #102b31; --panel: #173b43; --accent: #61b9c0; --gold: #e3b477; }
    * { box-sizing: border-box; }
    body { margin: 0; color: var(--ink); background: var(--dark); font-family: Arial, sans-serif; }
    .company-hero { padding: 125px 0 70px; background: radial-gradient(circle at 75% 20%, #28505a 0, var(--dark) 48%); }
    .eyebrow { color: var(--gold); font-size: .78rem; font-weight: 700; letter-spacing: .16em; }
    .company-hero h1, .profile-copy h2, .company-info h2 { font-family: Georgia, serif; }
    .company-hero h1 { max-width: 760px; font-size: clamp(2.7rem, 6vw, 5.8rem); line-height: 1.05; }
    .company-hero p, .profile-copy p { color: var(--muted); line-height: 1.9; }
    .profile { overflow: hidden; background: var(--panel); border: 1px solid #2d5a62; }
    .profile-copy { padding: 54px 9%; }
    .profile-photo { width: 100%; height: 100%; min-height: 520px; object-fit: cover; object-position: center top; background: #244950; }
    .profile-name { display: inline-block; margin-top: 18px; padding: 12px 20px; color: #102b31; background: var(--accent); font-size: 1.15rem; font-weight: 700; }
    .company-info { height: 100%; padding: 42px; background: var(--panel); border: 1px solid #2d5a62; }
    .info-row { display: grid; grid-template-columns: 150px 1fr; gap: 20px; padding: 17px 0; border-bottom: 1px solid #315b62; }
    .info-row dt { color: var(--gold); font-weight: 700; }
    .info-row dd { margin: 0; color: var(--muted); }
    .info-row a { color: var(--ink) !important; }
    .map-frame { width: 100%; min-height: 420px; border: 0; filter: grayscale(.25) saturate(.8); }
    @media (max-width: 767px) { .profile-copy { padding: 38px 28px; } .profile-photo { min-height: 400px; } .company-info { padding: 28px 20px; } .info-row { grid-template-columns: 1fr; gap: 5px; } }
  </style>
</head>
<body>
<?php require 'partials/navigation.php'; ?>
<header class="company-hero"><div class="container"><div class="eyebrow">COMPANY / ABOUT CVA</div><h1 class="mt-3">人と企業をつなぎ、<br>信頼の未来をつくる。</h1><p class="lead mt-4 mb-0">Ｂ＆Ｐ株式会社が運営する、CVA / 自然の会社情報をご案内します。</p></div></header>
<main>
  <section class="container py-5"><div class="row g-0 profile align-items-stretch"><div class="col-lg-5"><img class="profile-photo" src="image/bibek.png" alt="代表取締役 ブタトキ ビベク"></div><div class="col-lg-7 profile-copy"><div class="eyebrow">GREETING</div><h2 class="display-5 mt-3">代表挨拶</h2><p class="mt-4">Ｂ＆Ｐ株式会社のホームページをご覧いただき、ありがとうございます。</p><p>弊社は「人と企業をつなぐ、信頼のパートナー」をモットーに、有料職業紹介事業を通じて、社会に貢献することを目指しています。少子高齢化や多様な働き方への浸透が進む中、求職者一人ひとりの可能性を最大限に引き出し、企業が求める人材とのマッチングを実現してまいります。</p><p>求職者と企業の未来をつなぐパートナーとして、誠実で柔軟な対応を心がけています。</p><div class="profile-name">代表取締役：ブタトキ ビベク</div></div></div></section>
  <section class="container pb-5"><div class="row g-4"><div class="col-lg-6"><div class="company-info"><div class="eyebrow">CORPORATE PROFILE</div><h2 class="h2 mt-3">会社情報</h2><dl class="mt-4 mb-0"><div class="info-row"><dt>会社名</dt><dd>Ｂ＆Ｐ株式会社</dd></div><div class="info-row"><dt>代表取締役</dt><dd>ブタトキ ビベク</dd></div><div class="info-row"><dt>設立</dt><dd>2025年2月</dd></div><div class="info-row"><dt>所在地</dt><dd>〒812-0036<br>福岡県福岡市博多区上呉服町10番30号 富田ビル2階</dd></div><div class="info-row"><dt>資本金</dt><dd>500万円</dd></div><div class="info-row"><dt>法人番号</dt><dd>9290001108994</dd></div><div class="info-row"><dt>電話番号</dt><dd><a href="tel:0922358834">092-235-8834</a></dd></div></dl></div></div><div class="col-lg-6"><div class="company-info"><div class="eyebrow">ACCESS</div><h2 class="h2 mt-3">アクセス</h2><p class="mt-4 mb-3" style="color:var(--muted)">福岡県福岡市博多区上呉服町10番30号 富田ビル2階</p><iframe class="map-frame" title="Ｂ＆Ｐ株式会社の所在地地図" src="https://www.google.com/maps?q=福岡県福岡市博多区上呉服町10番30号富田ビル2階&output=embed" loading="lazy" allowfullscreen></iframe></div></div></div></section>
+</main>
+</body>
+</html>
