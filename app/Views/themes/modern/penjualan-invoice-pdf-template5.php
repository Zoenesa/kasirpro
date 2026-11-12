<?php
require_once ROOTPATH . 'app/ThirdParty/Tcpdf/tcpdf.php';
require_once ROOTPATH . 'app/Helpers/util_helper.php';

$invoice = $order['order'] ?? [];
$customer = $order['customer'] ?? [];
$details = $order['detail'] ?? [];
$payments = $order['bayar'] ?? [];
$printer = $setting_printer ?? [];
$paperWidth = (float) ($printer['paper_width'] ?? 241);
$paperHeight = (float) ($printer['paper_height'] ?? 279);
$marginLeft = (float) ($printer['margin_left'] ?? 8);
$marginRight = (float) ($printer['margin_right'] ?? 8);
$marginTop = (float) ($printer['margin_top'] ?? 8);
$marginBottom = (float) ($printer['margin_bottom'] ?? 8);
$autoPageBreak = ($printer['auto_page_break'] ?? 'Y') === 'Y';
$lineWidth = max(64, min(120, (int) floor(($paperWidth - $marginLeft - $marginRight) / 2.54 * 10)));
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
$showMultiplier = ($setting_kasir['qty_pengali'] ?? 'N') === 'Y';

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
$lines[] = str_repeat('-', $lineWidth);
$lines[] = $center('FAKTUR PENJUALAN');
$lines[] = str_repeat('-', $lineWidth);
$lines[] = 'No. Invoice : ' . ($invoice['no_invoice'] ?? '-');
$lines[] = 'Tanggal     : ' . format_date($invoice['tgl_penjualan'] ?? '');
$lines[] = 'Status      : ' . strtoupper((string) ($invoice['status'] ?? '-'));
$lines[] = 'Pembayaran  : ' . strtoupper((string) ($invoice['jenis_bayar'] ?? '-'));
$lines[] = str_repeat('-', $lineWidth);
$lines[] = 'PELANGGAN';
$lines[] = $wrap($customer['nama_customer'] ?: 'Umum');
if (!empty($customer['alamat_customer'])) {
	$lines[] = $wrap($customer['alamat_customer']);
}
if (!empty($customer['nama_kecamatan'])) {
	$lines[] = $wrap($customer['nama_kecamatan'] . ', ' . $customer['nama_kabupaten'] . ', ' . $customer['nama_propinsi']);
}
$lines[] = str_repeat('-', $lineWidth);
$lines[] = 'RINCIAN BARANG';
$lines[] = str_repeat('-', $lineWidth);
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
$lines[] = str_repeat('-', $lineWidth);
$lines[] = $right('Subtotal      Rp ' . format_number($invoice['sub_total']));
$lines[] = $right('Diskon        ' . $discount);
$lines[] = $right('Penyesuaian   Rp ' . format_number($invoice['penyesuaian']));
if (!empty($invoice['pajak_display_text'])) {
	$lines[] = $right($invoice['pajak_display_text'] . ' ' . format_number($invoice['pajak_persen']) . '%');
}
$lines[] = str_repeat('-', $lineWidth);
$lines[] = $right('TOTAL         Rp ' . format_number($invoice['neto']));
$lines[] = $right('Dibayar       Rp ' . format_number($invoice['total_bayar']));
$lines[] = $right($balanceLabel . ' Rp ' . format_number($balance));
$lines[] = str_repeat('-', $lineWidth);
$lines[] = 'PEMBAYARAN';
if (!$payments) {
	$lines[] = 'Belum ada pembayaran.';
} else {
	foreach ($payments as $payment) {
		$lines[] = format_date($payment['tgl_bayar']) . ' - ' . ucfirst($payment['metode_bayar']);
		$lines[] = $right('Rp ' . format_number($payment['jml_bayar']));
	}
}
$lines[] = str_repeat('-', $lineWidth);
$lines[] = $center('Terima kasih');
if (!empty($setting['footer_text'])) {
	$lines[] = $center($wrap($setting['footer_text']));
}

$pdf = new \TCPDF('P', 'mm', [$paperWidth, $paperHeight], true, 'UTF-8', false);
$pdf->SetCreator($identitas['nama'] ?? '');
$pdf->SetAuthor($identitas['nama'] ?? '');
$pdf->SetTitle('Invoice ' . ($invoice['no_invoice'] ?? ''));
$pdf->SetSubject('Invoice Dot Matrix');
$pdf->SetPrintHeader(false);
$pdf->SetPrintFooter(false);
$pdf->SetMargins($marginLeft, $marginTop, $marginRight);
$pdf->SetAutoPageBreak($autoPageBreak, $marginBottom);
$pdf->SetFont('courier', '', 9);
$pdf->AddPage();
$pdf->MultiCell(0, 0, implode("\n", $lines), 0, 'L', false, 1);

$filename = 'Invoice-' . str_replace(['/', '\\'], '_', $invoice['no_invoice'] ?? 'invoice') . '.pdf';
$filepath = ROOTPATH . 'public/tmp/' . $filename;
if (!empty($_GET['email'])) {
	$pdf->Output($filepath, 'F');
	$emailConfig = new \Config\EmailConfig();
	$emailData = [
		'from_email' => $emailConfig->from,
		'from_title' => $emailConfig->fromTitle,
		'to_email' => $_GET['email'],
		'to_name' => $customer['nama_customer'] ?? '',
		'email_subject' => 'Invoice: ' . ($invoice['no_invoice'] ?? ''),
		'email_content' => '<p>Berikut terlampir invoice penjualan Anda.</p>',
		'attachment' => ['path' => $filepath, 'name' => $filename],
	];
	require_once ROOTPATH . 'app/Libraries/SendEmail.php';
	$emailLibrary = new \App\Libraries\SendEmail();
	$emailLibrary->init();
	$result = $emailLibrary->send($emailData);
	delete_file($filepath);
	echo json_encode($result);
	exit;
}

if (($_GET['ajax'] ?? '') === 'true') {
	$pdf->Output($filepath, 'F');
	echo file_get_contents($filepath);
	delete_file($filepath);
} else {
	$pdf->Output($filename, 'D');
}
exit;