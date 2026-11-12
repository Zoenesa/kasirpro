<?php
helper('html');
?>
<div class="product-form-page invoice-settings-page">
	<div class="product-form-page-header">
		<h5 class="product-form-page-title">Pengaturan Dokumen Transaksi</h5>
		<p class="text-muted mb-0 mt-1">Atur identitas, format invoice, dan nomor dokumen penjualan.</p>
	</div>
	<div class="product-form-page-content">
		<?php if (!empty($message)) { show_message($message); } ?>
		<form method="post" action="" class="form-horizontal product-form" enctype="multipart/form-data">
			<section class="product-form-card">
				<div class="bg-lightgrey p-3 ps-4 mb-4 product-form-section-title"><h5 class="mb-0">Identitas dan Footer</h5></div>
				<div class="product-basic-grid">
					<div class="row mb-3 product-field-wide">
						<label class="col-form-label">Logo Invoice</label>
						<div>
							<?php
							if (!empty($setting_invoice['logo'])) {
								$note = '';
								if (file_exists(ROOTPATH . 'public/images/' . $setting_invoice['logo'])) {
									$image = $config->baseURL . 'public/images/' . $setting_invoice['logo'];
								} else {
									$image = $config->baseURL . 'public/images/noimage.png';
									$note = '<small class="text-warning d-block mt-2">File public/images/' . esc($setting_invoice['logo']) . ' tidak ditemukan.</small>';
								}
								echo '<div class="img-choose" style="margin:0 0 10px"><div class="img-choose-container"><img src="' . $image . '?r=' . time() . '" alt="Logo invoice"/><a href="javascript:void(0)" class="remove-img"><i class="fas fa-times"></i></a></div></div>' . $note;
							}
							?>
							<input type="hidden" class="foto-delete-img" name="foto_delete_img" value="0">
							<input type="hidden" class="foto-max-size" name="foto_max_size" value="300000">
							<input type="file" class="file form-control" name="logo" accept=".jpg,.jpeg">
							<?php if (!empty($form_errors['logo'])) { ?><small class="text-danger"><?= esc($form_errors['logo']) ?></small><?php } ?>
							<small class="form-text text-muted">JPG/JPEG, disarankan maksimal 60 x 60 piksel dan ukuran file 300 KB.</small>
							<div class="upload-img-thumb"><span class="img-prop"></span></div>
						</div>
					</div>
					<div class="row mb-3 product-field-wide">
						<label class="col-form-label" for="footer-text">Teks Footer</label>
						<div><textarea id="footer-text" name="footer_text" class="form-control" rows="3"><?= esc(set_value('footer_text', $setting_invoice['footer_text'] ?? '')) ?></textarea></div>
					</div>
				</div>
			</section>

			<section class="product-form-card">
				<div class="bg-lightgrey p-3 ps-4 mb-4 product-form-section-title"><h5 class="mb-0">Invoice Penjualan</h5></div>
				<div class="product-basic-grid">
					<div class="row mb-3">
						<label class="col-form-label" for="nomor-invoice">Nomor Invoice</label>
						<div><input id="nomor-invoice" class="form-control" type="text" name="no_invoice" value="<?= esc(set_value('no_invoice', $setting_invoice['no_invoice'] ?? '')) ?>" required></div>
					</div>
					<div class="row mb-3">
						<label class="col-form-label" for="digit-invoice">Jumlah Digit</label>
						<div>
							<?= options(['name' => 'jml_digit_invoice', 'id' => 'digit-invoice'], ['4' => '4', '5' => '5', '6' => '6'], $setting_invoice['jml_digit'] ?? '6') ?>
							<small class="form-text text-muted">Contoh 6 digit: 000001.</small>
						</div>
					</div>
					<?php
					$templateOptions = [
						'template_1' => 'Template 1',
						'template_2' => 'Template 2',
						'template_3' => 'Modern Minimal',
						'template_4' => 'Ringkasan Pembayaran',
						'template_5' => 'Dot Matrix (Continuous Form)',
					];
					$selectedTemplate = set_value('template_invoice', $setting_invoice['template_invoice'] ?? 'template_1');
					?>
					<div class="row mb-3">
						<label class="col-form-label" for="template-invoice">Template Invoice</label>
						<div>
							<?= options(['name' => 'template_invoice', 'id' => 'template-invoice'], $templateOptions, $selectedTemplate) ?>
							<small class="form-text text-muted">Template Dot Matrix memakai ukuran kertas dan margin dari pengaturan printer.</small>
						</div>
					</div>
				</div>
			</section>

			<section class="product-form-card">
				<div class="bg-lightgrey p-3 ps-4 mb-4 product-form-section-title"><h5 class="mb-0">Nota Retur</h5></div>
				<div class="product-basic-grid">
					<div class="row mb-3">
						<label class="col-form-label" for="nomor-retur">Nomor Nota Retur</label>
						<div><input id="nomor-retur" class="form-control" type="text" name="no_nota_retur" value="<?= esc(set_value('no_nota_retur', $setting_nota_retur['no_nota_retur'] ?? '')) ?>" required></div>
					</div>
					<div class="row mb-3">
						<label class="col-form-label" for="digit-retur">Jumlah Digit</label>
						<div><?= options(['name' => 'jml_digit_nota_retur', 'id' => 'digit-retur'], ['4' => '4', '5' => '5', '6' => '6'], $setting_nota_retur['jml_digit'] ?? '6') ?><small class="form-text text-muted">Contoh 6 digit: 000001.</small></div>
					</div>
				</div>
			</section>

			<section class="product-form-card">
				<div class="bg-lightgrey p-3 ps-4 mb-4 product-form-section-title"><h5 class="mb-0">Nota Transfer Barang</h5></div>
				<div class="product-basic-grid">
					<div class="row mb-3">
						<label class="col-form-label" for="nomor-transfer">Nomor Nota Transfer</label>
						<div><input id="nomor-transfer" class="form-control" type="text" name="no_nota_transfer" value="<?= esc(set_value('no_nota_transfer', $setting_nota_transfer['no_nota_transfer'] ?? '')) ?>" required></div>
					</div>
					<div class="row mb-3">
						<label class="col-form-label" for="digit-transfer">Jumlah Digit</label>
						<div><?= options(['name' => 'jml_digit_nota_transfer', 'id' => 'digit-transfer'], ['4' => '4', '5' => '5', '6' => '6'], $setting_nota_transfer['jml_digit'] ?? '6') ?><small class="form-text text-muted">Contoh 6 digit: 000001.</small></div>
					</div>
				</div>
			</section>

			<div class="product-form-submit">
				<button type="submit" name="submit" value="submit" class="btn btn-primary"><i class="fas fa-save me-2"></i>Simpan Pengaturan</button>
			</div>
			<input type="hidden" name="id" value="<?= esc($_GET['id'] ?? '') ?>">
		</form>
	</div>
</div>