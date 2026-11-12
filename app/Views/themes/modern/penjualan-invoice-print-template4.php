<?php
$invoice = $order['order'] ?? [];
$customer = $order['customer'] ?? [];
$details = $order['detail'] ?? [];
$payments = $order['bayar'] ?? [];
$showMultiplier = ($setting_kasir['qty_pengali'] ?? 'N') === 'Y';
$discount = $invoice['diskon_nilai'] ?? 0;
if (($invoice['diskon_jenis'] ?? '') !== '%' && $discount) {
	$discount = 'Rp ' . format_number($discount);
} elseif ($discount) {
	$discount .= '%';
} else {
	$discount = 'Rp 0';
}
$balanceLabel = ($invoice['status'] ?? '') === 'lunas' ? 'Kembalian' : 'Kurang Bayar';
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
		@page { size: A4; margin: 12mm; }
		* { box-sizing: border-box; }
		body { margin: 0; color: #28343b; font-family: Arial, Helvetica, sans-serif; font-size: 11px; }
		.sheet { max-width: 820px; margin: 0 auto; }
		.topbar { display: flex; justify-content: space-between; gap: 20px; padding: 22px; color: #fff; background: #18364a; border-bottom: 5px solid #e0a449; }
		.company { display: flex; align-items: center; gap: 14px; }
		.company img { width: 58px; height: 58px; object-fit: contain; padding: 4px; background: #fff; border-radius: 4px; }
		.company h1 { margin: 0 0 7px; font-size: 18px; }
		.company p { margin: 3px 0; color: #d8e3e9; line-height: 1.4; }
		.invoice-box { min-width: 190px; padding-left: 18px; border-left: 1px solid #7290a2; text-align: right; }
		.invoice-box .label { margin: 0 0 8px; color: #e9b963; font-size: 11px; font-weight: bold; letter-spacing: 1px; }
		.invoice-box .number { margin: 0 0 6px; font-size: 17px; font-weight: bold; }
		.invoice-box p { margin: 4px 0; color: #d8e3e9; }
		.status { display: inline-block; margin-top: 7px; padding: 4px 9px; color: #18364a; background: #f0c875; border-radius: 2px; font-weight: bold; }
		.parties { display: grid; grid-template-columns: 1fr 1fr; gap: 18px; margin: 20px 0; }
		.panel { padding: 13px 15px; background: #f4f7f8; border-top: 2px solid #e0a449; }
		.panel h2 { margin: 0 0 9px; color: #18364a; font-size: 11px; text-transform: uppercase; }
		.panel p { margin: 4px 0; line-height: 1.4; }
		.items { width: 100%; border-collapse: collapse; }
		.items th { padding: 9px 7px; color: #fff; background: #31566c; text-align: left; }
		.items td { padding: 8px 7px; border-bottom: 1px solid #d9e1e5; vertical-align: top; }
		.items tbody tr:nth-child(even) { background: #f7f9fa; }
		.right { text-align: right !important; white-space: nowrap; }
		.summary { display: grid; grid-template-columns: 1fr 290px; gap: 22px; margin-top: 18px; }
		.payment-list { width: 100%; border-collapse: collapse; }
		.payment-list th, .payment-list td { padding: 7px 6px; border-bottom: 1px solid #d9e1e5; text-align: left; }
		.payment-list th { color: #31566c; background: #eef3f5; }
		.totals { width: 100%; padding: 12px 14px; background: #f4f7f8; border: 1px solid #d9e1e5; }
		.totals td { padding: 5px 0; }
		.totals .final td { padding: 10px 0 7px; color: #18364a; border-top: 2px solid #e0a449; font-size: 16px; font-weight: bold; }
		.signatures { display: grid; grid-template-columns: 1fr 1fr; gap: 24px; margin-top: 28px; text-align: center; }
		.signatures div { min-height: 64px; padding-top: 7px; border-top: 1px solid #9baab1; }
		.footer { margin-top: 17px; padding-top: 9px; color: #66757c; border-top: 1px solid #d9e1e5; text-align: center; }
		@media print { body { print-color-adjust: exact; -webkit-print-color-adjust: exact; } }
	</style>
</head>
<body onload="window.print()">
	<main class="sheet">
		<header class="topbar">
			<div class="company">
				<?php if ($logo && is_file($logoPath)) { ?><img src="<?= esc(base_url('public/images/' . $logo), 'attr') ?>" alt="Logo usaha"><?php } ?>
				<div>
					<h1><?= esc($identitas['nama'] ?? '') ?></h1>
					<p><?= esc($identitas['alamat'] ?? '') ?></p>
					<p><?= esc(trim(($identitas['nama_kelurahan'] ?? '') . ', ' . ($identitas['nama_kecamatan'] ?? ''), ', ')) ?></p>
					<p><?= esc(trim(($identitas['nama_kabupaten'] ?? '') . ', ' . ($identitas['nama_propinsi'] ?? ''), ', ')) ?></p>
				</div>
			</div>
			<div class="invoice-box">
				<p class="label">FAKTUR PENJUALAN</p>
				<p class="number"><?= esc($invoice['no_invoice'] ?? '') ?></p>
				<p><?= esc(format_date($invoice['tgl_penjualan'] ?? '')) ?></p>
				<span class="status"><?= esc(strtoupper($invoice['status'] ?? '')) ?></span>
			</div>
		</header>

		<section class="parties">
			<div class="panel">
				<h2>Pelanggan</h2>
				<p><strong><?= esc($customer['nama_customer'] ?: 'Umum') ?></strong></p>
				<p><?= esc($customer['alamat_customer'] ?? '-') ?></p>
				<?php if (!empty($customer['nama_kecamatan'])) { ?><p><?= esc($customer['nama_kecamatan'] . ', ' . $customer['nama_kabupaten'] . ', ' . $customer['nama_propinsi']) ?></p><?php } ?>
			</div>
			<div class="panel">
				<h2>Detail transaksi</h2>
				<p><strong>Tanggal:</strong> <?= esc(format_date($invoice['tgl_penjualan'] ?? '')) ?></p>
				<p><strong>Jenis pembayaran:</strong> <?= esc(strtoupper($invoice['jenis_bayar'] ?? '-')) ?></p>
				<p><strong>Petugas:</strong> <?= esc($petugas['nama'] ?? '-') ?></p>
			</div>
		</section>

		<table class="items">
			<thead><tr><th>No</th><th>Barang</th><th class="right">Qty</th><?php if ($showMultiplier) { ?><th class="right"><?= esc($setting_kasir['qty_pengali_text']) ?></th><?php } ?><th class="right">Harga</th><th class="right">Diskon</th><th class="right">Jumlah</th></tr></thead>
			<tbody>
				<?php foreach ($details as $index => $item) { ?>
					<tr><td><?= $index + 1 ?></td><td><?= esc($item['nama_barang']) ?></td><td class="right"><?= format_number($item['qty'], true) ?></td><?php if ($showMultiplier) { ?><td class="right"><?= format_number($item['qty_pengali'], true) . esc($setting_kasir['qty_pengali_suffix']) ?></td><?php } ?><td class="right">Rp <?= format_number($item['harga_satuan']) ?></td><td class="right">Rp <?= format_number($item['diskon']) ?></td><td class="right">Rp <?= format_number($item['harga_neto']) ?></td></tr>
				<?php } ?>
			</tbody>
		</table>

		<section class="summary">
			<div>
				<div class="panel"><h2>Pembayaran</h2>
					<?php if (empty($payments)) { ?><p>Belum ada pembayaran.</p><?php } else { ?>
						<table class="payment-list"><thead><tr><th>Tanggal</th><th>Metode</th><th class="right">Nominal</th></tr></thead><tbody>
							<?php foreach ($payments as $payment) { ?><tr><td><?= esc(format_date($payment['tgl_bayar'])) ?></td><td><?= esc(ucfirst($payment['metode_bayar'])) ?></td><td class="right">Rp <?= format_number($payment['jml_bayar']) ?></td></tr><?php } ?>
						</tbody></table>
					<?php } ?>
				</div>
				<div class="signatures"><div>Pelanggan<br><br><?= esc($customer['nama_customer'] ?: 'Umum') ?></div><div>Petugas<br><br><?= esc($petugas['nama'] ?? '-') ?></div></div>
			</div>
			<table class="totals">
				<tr><td>Subtotal</td><td class="right">Rp <?= format_number($invoice['sub_total']) ?></td></tr>
				<tr><td>Diskon</td><td class="right"><?= esc($discount) ?></td></tr>
				<tr><td>Penyesuaian</td><td class="right">Rp <?= format_number($invoice['penyesuaian']) ?></td></tr>
				<?php if (!empty($invoice['pajak_display_text'])) { ?><tr><td><?= esc($invoice['pajak_display_text']) ?></td><td class="right"><?= format_number($invoice['pajak_persen']) ?>%</td></tr><?php } ?>
				<tr class="final"><td>Total</td><td class="right">Rp <?= format_number($invoice['neto']) ?></td></tr>
				<tr><td>Dibayar</td><td class="right">Rp <?= format_number($invoice['total_bayar']) ?></td></tr>
				<tr><td><?= esc($balanceLabel) ?></td><td class="right">Rp <?= format_number($balance) ?></td></tr>
			</table>
		</section>
		<footer class="footer"><?= nl2br(esc($setting['footer_text'] ?? '')) ?></footer>
	</main>
	<script>window.addEventListener('afterprint', () => setTimeout(() => window.close(), 400));</script>
</body>
</html>