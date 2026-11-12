<!doctype html>
<html lang="id">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Aktivasi Lisensi - <?= esc($appName) ?></title>
	<link rel="icon" href="<?= base_url('public/images/favicon.png') ?>">
	<link rel="stylesheet" href="<?= base_url('public/vendors/bootstrap/css/bootstrap.css') ?>">
	<style>
		:root {
			--ink: #20313c;
			--muted: #687980;
			--line: #dce5e7;
			--brand: #426783;
			--brand-dark: #315368;
			--canvas: #edf2f1;
		}
		* { box-sizing: border-box; }
		body {
			min-height: 100vh;
			margin: 0;
			display: grid;
			place-items: center;
			padding: 36px;
			background-color: var(--canvas);
			background-image: repeating-linear-gradient(135deg, transparent 0, transparent 27px, rgba(49, 83, 104, .025) 27px, rgba(49, 83, 104, .025) 28px);
			color: var(--ink);
			font-family: "Open Sans", "Segoe UI", sans-serif;
		}
		.license-shell {
			width: min(100%, 940px);
			min-height: 500px;
			display: grid;
			grid-template-columns: minmax(250px, .78fr) minmax(0, 1.22fr);
			background: #fff;
			border: 1px solid rgba(49, 83, 104, .12);
			border-radius: 8px;
			box-shadow: 0 24px 70px rgba(31, 54, 65, .12);
			overflow: hidden;
			animation: enter .42s ease-out both;
		}
		.license-brand {
			padding: 36px 32px;
			display: flex;
			flex-direction: column;
			justify-content: space-between;
			background-color: var(--brand-dark);
			background-image: repeating-linear-gradient(135deg, transparent 0, transparent 31px, rgba(255, 255, 255, .035) 31px, rgba(255, 255, 255, .035) 32px);
			color: #fff;
		}
		.brand-lockup { display: flex; align-items: center; gap: 14px; }
		.brand-logo { display: block; max-width: 132px; max-height: 54px; object-fit: contain; padding: 7px 10px; border-radius: 4px; background: #fff; }
		.brand-name { font-size: 1rem; font-weight: 700; line-height: 1.3; }
		.brand-copy { margin-top: 76px; }
		.brand-kicker { margin: 0 0 14px; color: #b6d8d2; font-size: .74rem; font-weight: 700; text-transform: uppercase; }
		.brand-copy h2 { max-width: 230px; margin: 0; color: #fff; font-size: 1.8rem; font-weight: 600; line-height: 1.22; }
		.brand-footer { margin: 42px 0 0; color: #d2e0e4; font-size: .8rem; }
		.license-content { padding: 56px 62px; display: flex; flex-direction: column; justify-content: center; }
		.eyebrow { margin: 0 0 12px; color: var(--brand); font-size: .74rem; font-weight: 700; text-transform: uppercase; }
		.license-content h1 { margin: 0; color: var(--ink); font-size: 2rem; font-weight: 700; line-height: 1.2; }
		.intro { margin: 12px 0 28px; color: var(--muted); font-size: .95rem; line-height: 1.65; }
		.status-line { margin: -10px 0 24px; color: var(--muted); font-size: .84rem; }
		.status-value { display: inline-block; margin-left: 5px; padding: 4px 9px; border-radius: 3px; background: #f1f4f4; color: var(--ink); font-weight: 700; }
		.form-label { margin-bottom: 8px; color: var(--ink); font-size: .86rem; font-weight: 700; }
		.form-control { min-height: 52px; border: 1px solid #cbd8da; border-radius: 4px; padding: 12px 14px; color: var(--ink); box-shadow: none; }
		.form-control::placeholder { color: #8b999e; }
		.form-control:focus { border-color: var(--brand); box-shadow: 0 0 0 3px rgba(66, 103, 131, .14); }
		.submit-button { min-height: 52px; border: 0; border-radius: 4px; background: var(--brand); color: #fff; font-size: .94rem; font-weight: 700; transition: background-color .16s ease, transform .16s ease; }
		.submit-button:hover { background: var(--brand-dark); color: #fff; transform: translateY(-1px); }
		.form-note { margin: 18px 0 0; color: var(--muted); font-size: .78rem; line-height: 1.55; }
		.form-alert { margin: 0 0 20px; border: 0; border-left: 3px solid; border-radius: 3px; padding: 12px 14px; font-size: .86rem; }
		.form-alert-danger { border-color: #b5413b; background: #fbf0ef; color: #8d302c; }
		.form-alert-success { border-color: #348568; background: #edf7f1; color: #28664f; }
		@keyframes enter { from { opacity: 0; transform: translateY(8px); } to { opacity: 1; transform: translateY(0); } }
		@media (max-width: 700px) {
			body { padding: 18px; }
			.license-shell { min-height: 0; grid-template-columns: 1fr; }
			.license-brand { min-height: 170px; padding: 22px 26px; }
			.brand-copy { margin-top: 24px; }
			.brand-copy h2 { max-width: none; font-size: 1.3rem; }
			.brand-footer { margin-top: 20px; }
			.license-content { padding: 36px 28px 32px; }
		}
		@media (max-width: 420px) {
			body { padding: 12px; }
			.license-brand { min-height: 150px; padding: 19px 20px; }
			.license-content { padding: 30px 20px 24px; }
			.license-content h1 { font-size: 1.7rem; }
		}
	</style>
</head>
<body>
	<main class="license-shell">
		<aside class="license-brand">
			<div class="brand-lockup">
				<?php if (!empty($logoLogin)): ?>
					<img class="brand-logo" src="<?= esc(base_url('public/images/' . rawurlencode($logoLogin))) ?>" alt="">
				<?php endif; ?>
				<span class="brand-name"><?= esc($appName) ?></span>
			</div>
			<div class="brand-copy">
				<p class="brand-kicker">Member Area</p>
				<h2>Lisensi aplikasi</h2>
				<p class="brand-footer">KasirPRO</p>
			</div>
		</aside>

		<section class="license-content" aria-labelledby="license-title">
			<p class="eyebrow">Pengaturan lisensi</p>
			<h1 id="license-title">Aktivasi aplikasi</h1>
			<p class="intro">Masukkan license key KasirPRO dari Member Area untuk melanjutkan.</p>

			<?php if (!empty($error)): ?>
				<div class="form-alert form-alert-danger" role="alert"><?= esc($error) ?></div>
			<?php endif; ?>
			<?php if (!empty($success)): ?>
				<div class="form-alert form-alert-success" role="status"><?= esc($success) ?></div>
			<?php endif; ?>

			<?php if (!empty($current)): ?>
				<p class="status-line">Status lisensi <span class="status-value"><?= esc($current['status']) ?></span></p>
			<?php endif; ?>

			<form method="post" action="<?= esc(base_url('licenses/activate')) ?>">
				<div class="mb-4">
					<label for="license_key" class="form-label">License key</label>
					<input type="text" class="form-control" id="license_key" name="license_key" value="<?= esc($licenseInput ?? '') ?>" placeholder="Masukkan license key" required autocomplete="off" autocapitalize="off" spellcheck="false" autofocus>
				</div>
				<button type="submit" class="btn submit-button w-100">Aktivasi Lisensi</button>
			</form>
			<p class="form-note">Pastikan server dapat terhubung ke Member Area untuk memverifikasi lisensi.</p>
		</section>
	</main>
</body>
</html>