<?php
require_once ROOTPATH . 'app/ThirdParty/Tcpdf/tcpdf.php';
require_once ROOTPATH . 'app/Helpers/util_helper.php';

$invoice = $order['order'] ?? [];
$customer = $order['customer'] ?? [];
$details = $order['detail'] ?? [];
$payments = $order['bayar'] ?? [];
$showMultiplier = ($setting_kasir['qty_pengali'] ?? 'N') === 'Y';
$discount = $invoice['diskon_nilai'] ?? 0;
if (($invoice['diskon_jenis'] ?? '') === '%' && $discount) {
	$discount .= '%';
} else {
	$discount = 'Rp ' . format_number($discount);
}
$balanceLabel = ($invoice['status'] ?? '') === 'lunas' ? 'Kembali' : 'Sisa Tagihan';
$balance = ($invoice['status'] ?? '') === 'lunas' ? ($invoice['kembali'] ?? 0) : ($invoice['kurang_bayar'] ?? 0);
$logoPath = ROOTPATH . 'public/images/' . ($setting['logo'] ?? '');
$hasLogo = !empty($setting['logo']) && is_file($logoPath);

$pdf = new \TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, 'A4', true, 'UTF-8', false);
$pdf->SetCreator($identitas['nama'] ?? '');
$pdf->SetAuthor($identitas['nama'] ?? '');
$pdf->SetTitle('Invoice ' . ($invoice['no_invoice'] ?? ''));
$pdf->SetSubject('Invoice Penjualan');
$pdf->SetPrintHeader(false);
$pdf->SetPrintFooter(false);
$pdf->SetMargins(13, 14, 13);
$pdf->SetAutoPageBreak(true, 16);
$pdf->SetFont('helvetica', '', 9);
$pdf->AddPage();

$html = '<style>
body { color:#263238; font-family:helvetica; font-size:9pt; }
.brand { color:#17363a; font-size:15pt; font-weight:bold; }
.muted { color:#65777b; font-size:8pt; }
.title { color:#087f8c; font-size:22pt; font-weight:bold; }
.number { color:#263238; font-size:11pt; font-weight:bold; }
.section { color:#087f8c; font-size:9pt; font-weight:bold; }
th { color:#ffffff; background-color:#087f8c; font-weight:bold; }
.stripe { background-color:#f2f7f7; }
.grand { color:#087f8c; font-size:12pt; font-weight:bold; }
.rule { border-bottom:2px solid #087f8c; }
</style>';
$html .= '<table cellpadding="5" width="100%"><tr>';
if ($hasLogo) {
	$html .= '<td width="17%"><img src="' . esc($logoPath, 'attr') . '" width="58" /></td>';
}
$brandWidth = $hasLogo ? '53%' : '70%';
$html .= '<td width="' . $brandWidth . '"><span class="brand">' . esc($identitas['nama'] ?? '') . '</span><br />'
	. esc($identitas['alamat'] ?? '') . '<br />'
	. esc(trim(($identitas['nama_kelurahan'] ?? '') . ', ' . ($identitas['nama_kecamatan'] ?? ''), ', ')) . '<br />'
	. esc(trim(($identitas['nama_kabupaten'] ?? '') . ', ' . ($identitas['nama_propinsi'] ?? ''), ', ')) . '</td>'
	. '<td width="30%" align="right"><span class="title">INVOICE</span><br /><span class="number">' . esc($invoice['no_invoice'] ?? '') . '</span><br />'
	. esc(format_date($invoice['tgl_penjualan'] ?? '')) . '<br /><b>' . esc(strtoupper($invoice['status'] ?? '')) . '</b></td></tr></table>';
$html .= '<table cellpadding="3" width="100%"><tr><td class="rule"></td></tr></table>';
$html .= '<table cellpadding="5" width="100%"><tr>'
	. '<td width="58%"><span class="section">DITAGIHKAN KEPADA</span><br /><b>' . esc($customer['nama_customer'] ?: 'Umum') . '</b><br />'
	. esc($customer['alamat_customer'] ?? '-') . '<br />'
	. esc(trim(($customer['nama_kecamatan'] ?? '') . ', ' . ($customer['nama_kabupaten'] ?? '') . ', ' . ($customer['nama_propinsi'] ?? ''), ', ')) . '</td>'
	. '<td width="42%"><span class="section">INFORMASI TRANSAKSI</span><br />Tanggal: ' . esc(format_date($invoice['tgl_penjualan'] ?? '')) . '<br />'
	. 'Pembayaran: ' . esc(strtoupper($invoice['jenis_bayar'] ?? '-')) . '<br />Petugas: ' . esc($user_input['nama'] ?? '-') . '</td></tr></table>';

$html .= '<table border="1" cellpadding="5" cellspacing="0" width="100%"><thead><tr>'
	. '<th width="6%" align="center">No</th><th width="' . ($showMultiplier ? '30%' : '36%') . '">Deskripsi</th><th width="9%" align="right">Qty</th>';
if ($showMultiplier) {
	$html .= '<th width="10%" align="right">' . esc($setting_kasir['qty_pengali_text']) . '</th>';
}
$html .= '<th width="13%" align="right">Harga</th><th width="11%" align="right">Diskon</th><th width="' . ($showMultiplier ? '21%' : '25%') . '" align="right">Jumlah</th></tr></thead><tbody>';

foreach ($details as $index => $item) {
	$html .= '<tr class="' . ($index % 2 ? 'stripe' : '') . '"><td align="center">' . ($index + 1) . '</td><td>' . esc($item['nama_barang']) . '</td>'
		. '<td align="right">' . format_number($item['qty'], true) . '</td>';
	if ($showMultiplier) {
		$html .= '<td align="right">' . format_number($item['qty_pengali'], true) . esc($setting_kasir['qty_pengali_suffix']) . '</td>';
	}
	$html .= '<td align="right">' . format_number($item['harga_satuan']) . '</td><td align="right">' . format_number($item['diskon']) . '</td><td align="right">' . format_number($item['harga_neto']) . '</td></tr>';
}
$html .= '</tbody></table>';

$html .= '<table cellpadding="5" width="100%"><tr><td width="58%"><span class="section">RIWAYAT PEMBAYARAN</span><br />';
if ($payments) {
	$html .= '<table border="1" cellpadding="4" cellspacing="0" width="100%"><thead><tr><th>Tanggal</th><th>Metode</th><th align="right">Jumlah</th></tr></thead><tbody>';
	foreach ($payments as $payment) {
		$html .= '<tr><td>' . esc(format_date($payment['tgl_bayar'])) . '</td><td>' . esc(ucfirst($payment['metode_bayar'])) . '</td><td align="right">' . format_number($payment['jml_bayar']) . '</td></tr>';
	}
	$html .= '</tbody></table>';
} else {
	$html .= '<span class="muted">Belum ada pembayaran.</span>';
}
$html .= '</td><td width="42%"><table cellpadding="4" width="100%">'
	. '<tr><td>Subtotal</td><td align="right">' . format_number($invoice['sub_total']) . '</td></tr>'
	. '<tr><td>Diskon</td><td align="right">' . esc($discount) . '</td></tr>'
	. '<tr><td>Penyesuaian</td><td align="right">' . format_number($invoice['penyesuaian']) . '</td></tr>';
if (!empty($invoice['pajak_display_text'])) {
	$html .= '<tr><td>' . esc($invoice['pajak_display_text']) . '</td><td align="right">' . format_number($invoice['pajak_persen']) . '%</td></tr>';
}
$html .= '<tr class="grand"><td>Total</td><td align="right">' . format_number($invoice['neto']) . '</td></tr>'
	. '<tr><td>Total dibayar</td><td align="right">' . format_number($invoice['total_bayar']) . '</td></tr>'
	. '<tr><td>' . esc($balanceLabel) . '</td><td align="right">' . format_number($balance) . '</td></tr>'
	. '</table></td></tr></table>';
$html .= '<table cellpadding="5" width="100%"><tr><td align="center" class="muted">' . nl2br(esc($setting['footer_text'] ?? '')) . '</td></tr></table>';

$pdf->writeHTML($html, true, false, true, false, '');

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