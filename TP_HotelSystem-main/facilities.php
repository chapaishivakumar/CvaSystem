<?php $activePage = 'facilities'; ?>
<!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>施設・サービス | CVA / 自然</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
	<style>
		body { margin: 0; color: #18343a; background: #f4efe6; font-family: Arial, sans-serif; }
		.hero { padding: 120px 0 80px; color: #fff; background: linear-gradient(90deg, rgba(13,49,55,.86), rgba(13,49,55,.2)), url('https://images.unsplash.com/photo-1540555700478-4be289fbecef?auto=format&fit=crop&w=1800&q=85') center/cover; }
		.hero h1, .facility-card h2 { font-family: Georgia, serif; }
		.eyebrow { color: #f3c5a7; font-size: .76rem; font-weight: 700; letter-spacing: .16em; }
		.facility-card { height: 100%; overflow: hidden; background: #fffdf8; border: 0; box-shadow: 0 10px 26px rgba(24,52,58,.08); }
		.facility-card img { width: 100%; height: 210px; object-fit: cover; }
		.facility-card .icon { display: inline-grid; width: 46px; height: 46px; place-items: center; margin-top: -26px; color: #fff; background: #1d7b7e; border: 4px solid #fffdf8; border-radius: 50%; font-size: 1.25rem; position: relative; }
		.facility-card p { color: #607477; line-height: 1.8; }
		.service-row { padding: 24px 0; border-bottom: 1px solid #c8d6d2; }
		.service-symbol { width: 42px; color: #d8795f; font-size: 1.5rem; }
	</style>
</head>
<body>
<?php require 'partials/navigation.php'; ?>
<header class="hero"><div class="container"><div class="eyebrow">FACILITIES & SERVICES</div><h1 class="display-3 mt-3">滞在を整える、<br>ささやかな心配り。</h1><p class="lead mt-3 mb-0">自然の中で、心と身体をゆっくり休めるための設備をご用意しています。</p></div></header>
<main class="container py-5">
	<div class="row g-4">
		<div class="col-md-4"><article class="facility-card"><img src="https://images.unsplash.com/photo-1544161515-4ab6ce6db874?auto=format&fit=crop&w=900&q=85" alt="温泉"><div class="px-4 pb-4"><span class="icon"><i class="bi bi-droplet" aria-hidden="true"></i></span><h2 class="h3 mt-3">温泉</h2><p>海を眺めながら、旅の疲れをゆっくり流せます。</p></div></article></div>
		<div class="col-md-4"><article class="facility-card"><img src="https://images.unsplash.com/photo-1533089860892-a7c6f0a88666?auto=format&fit=crop&w=900&q=85" alt="朝食"><div class="px-4 pb-4"><span class="icon"><i class="bi bi-cup-hot" aria-hidden="true"></i></span><h2 class="h3 mt-3">朝食</h2><p>地元の食材を使った、身体にやさしい朝食をご用意します。</p></div></article></div>
		<div class="col-md-4"><article class="facility-card"><img src="https://images.unsplash.com/photo-1497366754035-f200968a6e72?auto=format&fit=crop&w=900&q=85" alt="ラウンジ"><div class="px-4 pb-4"><span class="icon"><i class="bi bi-book" aria-hidden="true"></i></span><h2 class="h3 mt-3">ラウンジ</h2><p>読書や仕事にも使える、静かな共用スペースです。</p></div></article></div>
	</div>
	<div class="mt-5"><div class="service-row d-flex align-items-center"><i class="bi bi-wifi service-symbol" aria-hidden="true"></i><div><h2 class="h5 mb-1">無料Wi-Fi</h2><p class="mb-0 text-secondary">館内全域でご利用いただけます。</p></div></div><div class="service-row d-flex align-items-center"><i class="bi bi-car-front service-symbol" aria-hidden="true"></i><div><h2 class="h5 mb-1">駐車場</h2><p class="mb-0 text-secondary">宿泊者専用駐車場を無料でご利用いただけます。</p></div></div></div>
</main>
</body>
</html>
