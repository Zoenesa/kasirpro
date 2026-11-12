<?php
$invoice = $order['order'] ?? [];
$customer = $order['customer'] ?? [];
$details = $order['detail'] ?? [];
$payments = $order['bayar'] ?? [];
$printer = $setting_printer ?? [];
$paperWidth = (float) ($printer['paper_width'] ?? 241);
$paperHeight = (float) ($printer['paper_height'] ?? 279);
$marginTop = (float) ($printer['margin_top'] ?? 8);
$marginRight = (float) ($printer['margin_right'] ?? 8);
$marginBottom = (float) ($printer['margin_bottom'] ?? 8);
$marginLeft = (float) ($printer['margin_left'] ?? 8);
$autoPageBreak = ($printer['auto_page_break'] ?? 'Y') === 'Y';
$showMultiplier = ($setting_kasir['qty_pengali'] ?? 'N') === 'Y';
$lineWidth = max(64, min(120, (int) floor(($paperWidth - $marginLeft - $marginRight) / 2.54 * 10)));
$divider = str_repeat('-', $lineWidth);
$center = static function (string $text) use ($lineWidth): string {
	return str_pad($text, $lineWidth, ' ', STR_PAD_BOTH);
};
$right = static function (string $text) use ($lineWidth): string {
	return str_pad($text, $lineWidth, ' ', STR_PAD_LEFT);
};
$wrap = static function ($text) use ($lineWidth): string {
	$text = trim((string) $text);
	return $text === '' ? '' : wordwrap($text, $lineWidth, "\n", true);
};

$lines = [];
$lines[] = $center(strtoupper((string) ($identitas['nama'] ?? '')));
foreach ([$identitas['alamat'] ?? '', trim(($identitas['nama_kelurahan'] ?? '') . ', ' . ($identitas['nama_kecamatan'] ?? ''), ', '), trim(($identitas['nama_kabupaten'] ?? '') . ', ' . ($identitas['nama_propinsi'] ?? ''), ', ')] as $addressLine) {
	if (trim((string) $addressLine) !== '') {
		$lines[] = $center($wrap($addressLine));
	}
}
if (!empty($identitas['no_telp'])) {
	$lines[] = $center('Telp. ' . $identitas['no_telp']);
}
$lines[] = $divider;
$lines[] = $center('FAKTUR PENJUALAN');
$lines[] = $divider;
$lines[] = 'No. Invoice : ' . ($invoice['no_invoice'] ?? '-');
$lines[] = 'Tanggal     : ' . format_date($invoice['tgl_penjualan'] ?? '');
$lines[] = 'Status      : ' . strtoupper((string) ($invoice['status'] ?? '-'));
$lines[] = 'Pembayaran  : ' . strtoupper((string) ($invoice['jenis_bayar'] ?? '-'));
$lines[] = $divider;
$lines[] = 'PELANGGAN';
$lines[] = $wrap($customer['nama_customer'] ?: 'Umum');
if (!empty($customer['alamat_customer'])) {
	$lines[] = $wrap($customer['alamat_customer']);
}
if (!empty($customer['nama_kecamatan'])) {
	$lines[] = $wrap($customer['nama_kecamatan'] . ', ' . $customer['nama_kabupaten'] . ', ' . $customer['nama_propinsi']);
}
$lines[] = $divider;
$lines[] = 'RINCIAN BARANG';
$lines[] = $divider;

foreach ($details as $index => $item) {
	$nameLines = explode("\n", wordwrap(trim((string) $item['nama_barang']), max(20, $lineWidth - 5), "\n", true));
	$lines[] = str_pad((string) ($index + 1), 3, ' ', STR_PAD_LEFT) . '. ' . array_shift($nameLines);
	foreach ($nameLines as $nameLine) {
		$lines[] = '     ' . $nameLine;
	}
	$quantity = 'Qty ' . format_number($item['qty'], true);
	if ($showMultiplier) {
		$quantity .= ' x ' . format_number($item['qty_pengali'], true) . ($setting_kasir['qty_pengali_suffix'] ?? '');
	}
	$lines[] = '    ' . $quantity . ' @ Rp ' . format_number($item['harga_satuan']);
	$lines[] = '    Diskon Rp ' . format_number($item['diskon']);
	$lines[] = $right('Jumlah Rp ' . format_number($item['harga_neto']));
}

$discount = $invoice['diskon_nilai'] ?? 0;
if (($invoice['diskon_jenis'] ?? '') === '%' && $discount) {
	$discount .= '%';
} else {
	$discount = 'Rp ' . format_number($discount);
}
$balanceLabel = ($invoice['status'] ?? '') === 'lunas' ? 'Kembali' : 'Kurang bayar';
$balance = ($invoice['status'] ?? '') === 'lunas' ? ($invoice['kembali'] ?? 0) : ($invoice['kurang_bayar'] ?? 0);
$lines[] = $divider;
$lines[] = $right('Subtotal      Rp ' . format_number($invoice['sub_total']));
$lines[] = $right('Diskon        ' . $discount);
$lines[] = $right('Penyesuaian   Rp ' . format_number($invoice['penyesuaian']));
if (!empty($invoice['pajak_display_text'])) {
	$lines[] = $right($invoice['pajak_display_text'] . ' ' . format_number($invoice['pajak_persen']) . '%');
}
$lines[] = $divider;
$lines[] = $right('TOTAL         Rp ' . format_number($invoice['neto']));
$lines[] = $right('Dibayar       Rp ' . format_number($invoice['total_bayar']));
$lines[] = $right($balanceLabel . ' Rp ' . format_number($balance));
$lines[] = $divider;
$lines[] = 'PEMBAYARAN';
if (!$payments) {
	$lines[] = 'Belum ada pembayaran.';
} else {
	foreach ($payments as $payment) {
		$lines[] = format_date($payment['tgl_bayar']) . ' - ' . ucfirst($payment['metode_bayar']);
		$lines[] = $right('Rp ' . format_number($payment['jml_bayar']));
	}
}
$lines[] = $divider;
$lines[] = $center('Terima kasih');
if (!empty($setting['footer_text'])) {
	$lines[] = $center($wrap($setting['footer_text']));
}
?>
<!doctype html>
<html lang="id">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Invoice Dot Matrix <?= esc($invoice['no_invoice'] ?? '') ?></title>
	<style>
		@page { size: <?= $paperWidth ?>mm <?= $paperHeight ?>mm; margin: <?= $marginTop ?>mm <?= $marginRight ?>mm <?= $marginBottom ?>mm <?= $marginLeft ?>mm; }
		* { box-sizing: border-box; }
		html, body { margin: 0; padding: 0; color: #000; background: #fff; }
		body { font-family: "Courier New", Courier, monospace; font-size: 9pt; line-height: 1.25; }
		.invoice { width: 100%; }
		pre { margin: 0; font: inherit; white-space: pre-wrap; overflow-wrap: anywhere; }
		@media screen { body { padding: 8mm; } .invoice { max-width: 241mm; margin: 0 auto; } }
		@media print { body { print-color-adjust: exact; -webkit-print-color-adjust: exact; } }
	</style>
</head>
<body onload="window.print()">
	<main class="invoice"><pre><?= esc(implode("\n", $lines)) ?></pre></main>
	<script>window.addEventListener('afterprint', () => setTimeout(() => window.close(), 400));</script>
</body>
</html>