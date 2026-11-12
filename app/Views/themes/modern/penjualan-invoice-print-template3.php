<?php
$invoice = $order['order'] ?? [];
$customer = $order['customer'] ?? [];
$details = $order['detail'] ?? [];
$payments = $order['bayar'] ?? [];
$showMultiplier = ($setting_kasir['qty_pengali'] ?? 'N') === 'Y';
$discount = $invoice['diskon_nilai'] ?? 0;
if (($invoice['diskon_jenis'] ?? '') !== '%' && $discount) {
	$discount = format_number($discount);
} elseif ($discount) {
	$discount .= '%';
}
$balanceLabel = ($invoice['status'] ?? '') === 'lunas' ? 'Kembali' : 'Sisa Tagihan';
$balance = ($invoice['status'] ?? '') === 'lunas' ? ($invoice['kembali'] ?? 0) : ($invoice['kurang_bayar'] ?? 0);
$logo = $setting['logo'] ?? '';
$logoPath = ROOTPATH . 'public/images/' . $logo;
?>
<!doctype html>
<html lang="id">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Invoice <?= esc($invoice['no_invoice'] ?? '') ?></title>
	<style>
		@page { size: A4; margin: 14mm; }
		* { box-sizing: border-box; }
		body { margin: 0; color: #263238; font-family: Arial, Helvetica, sans-serif; font-size: 12px; }
		.invoice { max-width: 820px; margin: 0 auto; }
		.header { display: flex; justify-content: space-between; gap: 24px; padding-bottom: 18px; border-bottom: 2px solid #087f8c; }
		.brand { display: flex; align-items: center; gap: 14px; min-width: 0; }
		.brand img { width: 64px; height: 64px; object-fit: contain; }
		.brand-name { margin: 0 0 5px; color: #17363a; font-size: 19px; }
		.brand p, .meta p { margin: 3px 0; color: #5c6c70; line-height: 1.4; }
		.meta { min-width: 190px; text-align: right; }
		.meta h1 { margin: 0 0 5px; color: #087f8c; font-size: 26px; letter-spacing: 1px; }
		.meta .number { color: #263238; font-size: 15px; font-weight: bold; }
		.status { display: inline-block; margin-top: 8px; padding: 5px 10px; color: #fff; background: <?= ($invoice['status'] ?? '') === 'lunas' ? '#167c67' : '#b7652b' ?>; border-radius: 3px; font-weight: bold; }
		.section-title { margin: 20px 0 9px; color: #087f8c; font-size: 12px; text-transform: uppercase; }
		.info-grid { display: grid; grid-template-columns: 1.3fr 1fr; gap: 24px; }
		.info p { margin: 4px 0; line-height: 1.45; }
		.muted { color: #6d7c80; }
		table { width: 100%; border-collapse: collapse; }
		.items { margin-top: 18px; }
		.items th { padding: 9px 7px; color: #fff; background: #087f8c; text-align: left; }
		.items td { padding: 8px 7px; border-bottom: 1px solid #dce5e6; vertical-align: top; }
		.items tbody tr:nth-child(even) { background: #f4f8f8; }
		.num { text-align: right !important; white-space: nowrap; }
		.bottom { display: grid; grid-template-columns: 1fr 270px; gap: 24px; margin-top: 18px; }
		.payments th, .payments td { padding: 7px 6px; border-bottom: 1px solid #dce5e6; text-align: left; }
		.payments th { color: #53676b; background: #f0f5f5; }
		.totals td { padding: 6px 0; }
		.totals .grand td { padding-top: 10px; color: #087f8c; border-top: 2px solid #087f8c; font-size: 16px; font-weight: bold; }
		.footer { margin-top: 24px; padding-top: 11px; color: #6d7c80; border-top: 1px solid #dce5e6; text-align: center; }
		@media print { body { print-color-adjust: exact; -webkit-print-color-adjust: exact; } }
	</style>
</head>
<body onload="window.print()">
	<main class="invoice">
		<header class="header">
			<div class="brand">
				<?php if ($logo && is_file($logoPath)) { ?><img src="<?= esc(base_url('public/images/' . $logo), 'attr') ?>" alt="Logo usaha"><?php } ?>
				<div>
					<h2 class="brand-name"><?= esc($identitas['nama'] ?? '') ?></h2>
					<p><?= esc($identitas['alamat'] ?? '') ?></p>
					<p><?= esc(trim(($identitas['nama_kelurahan'] ?? '') . ', ' . ($identitas['nama_kecamatan'] ?? ''), ', ')) ?></p>
					<p><?= esc(trim(($identitas['nama_kabupaten'] ?? '') . ', ' . ($identitas['nama_propinsi'] ?? ''), ', ')) ?></p>
				</div>
			</div>
			<div class="meta">
				<h1>INVOICE</h1>
				<p class="number"><?= esc($invoice['no_invoice'] ?? '') ?></p>
				<p><?= esc(format_date($invoice['tgl_penjualan'] ?? '')) ?></p>
				<span class="status"><?= esc(strtoupper($invoice['status'] ?? '')) ?></span>
			</div>
		</header>

		<section class="info-grid">
			<div class="info">
				<h3 class="section-title">Ditagihkan kepada</h3>
				<p><strong><?= esc($customer['nama_customer'] ?: 'Umum') ?></strong></p>
				<p><?= esc($customer['alamat_customer'] ?? '') ?></p>
				<?php if (!empty($customer['nama_kecamatan'])) { ?><p class="muted"><?= esc($customer['nama_kecamatan'] . ', ' . $customer['nama_kabupaten'] . ', ' . $customer['nama_propinsi']) ?></p><?php } ?>
			</div>
			<div class="info">
				<h3 class="section-title">Informasi transaksi</h3>
				<p><span class="muted">Tanggal:</span> <?= esc(format_date($invoice['tgl_penjualan'] ?? '')) ?></p>
				<p><span class="muted">Pembayaran:</span> <?= esc(strtoupper($invoice['jenis_bayar'] ?? '-')) ?></p>
				<p><span class="muted">Petugas:</span> <?= esc($petugas['nama'] ?? '-') ?></p>
			</div>
		</section>

		<table class="items">
			<thead><tr><th>No</th><th>Deskripsi</th><th class="num">Qty</th><?php if ($showMultiplier) { ?><th class="num"><?= esc($setting_kasir['qty_pengali_text']) ?></th><?php } ?><th class="num">Harga</th><th class="num">Diskon</th><th class="num">Total</th></tr></thead>
			<tbody>
				<?php foreach ($details as $index => $item) { ?>
					<tr><td><?= $index + 1 ?></td><td><?= esc($item['nama_barang']) ?></td><td class="num"><?= format_number($item['qty'], true) ?></td><?php if ($showMultiplier) { ?><td class="num"><?= format_number($item['qty_pengali'], true) . esc($setting_kasir['qty_pengali_suffix']) ?></td><?php } ?><td class="num">Rp <?= format_number($item['harga_satuan']) ?></td><td class="num">Rp <?= format_number($item['diskon']) ?></td><td class="num">Rp <?= format_number($item['harga_neto']) ?></td></tr>
				<?php } ?>
			</tbody>
		</table>

		<section class="bottom">
			<div>
				<h3 class="section-title">Riwayat pembayaran</h3>
				<?php if (empty($payments)) { ?><p class="muted">Belum ada pembayaran.</p><?php } else { ?>
					<table class="payments"><thead><tr><th>Tanggal</th><th>Metode</th><th class="num">Jumlah</th></tr></thead><tbody>
						<?php foreach ($payments as $payment) { ?><tr><td><?= esc(format_date($payment['tgl_bayar'])) ?></td><td><?= esc(ucfirst($payment['metode_bayar'])) ?></td><td class="num">Rp <?= format_number($payment['jml_bayar']) ?></td></tr><?php } ?>
					</tbody></table>
				<?php } ?>
			</div>
			<table class="totals">
				<tr><td>Subtotal</td><td class="num">Rp <?= format_number($invoice['sub_total']) ?></td></tr>
				<tr><td>Diskon</td><td class="num"><?= esc($discount ?: 'Rp 0') ?></td></tr>
				<tr><td>Penyesuaian</td><td class="num">Rp <?= format_number($invoice['penyesuaian']) ?></td></tr>
				<?php if (!empty($invoice['pajak_display_text'])) { ?><tr><td><?= esc($invoice['pajak_display_text']) ?></td><td class="num"><?= format_number($invoice['pajak_persen']) ?>%</td></tr><?php } ?>
				<tr class="grand"><td>Total</td><td class="num">Rp <?= format_number($invoice['neto']) ?></td></tr>
				<tr><td>Total dibayar</td><td class="num">Rp <?= format_number($invoice['total_bayar']) ?></td></tr>
				<tr><td><?= esc($balanceLabel) ?></td><td class="num">Rp <?= format_number($balance) ?></td></tr>
			</table>
		</section>
		<footer class="footer"><?= nl2br(esc($setting['footer_text'] ?? '')) ?></footer>
	</main>
	<script>window.addEventListener('afterprint', () => setTimeout(() => window.close(), 400));</script>
</body>
</html>