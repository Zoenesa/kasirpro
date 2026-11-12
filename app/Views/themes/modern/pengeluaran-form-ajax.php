<?php
helper('html');
$formData = $form_data ?? [];
$expenseId = (int) ($formData['id_pengeluaran'] ?? $formData['id'] ?? 0);
$selectedCategory = (int) ($formData['id_pengeluaran_kategori'] ?? 0);
$amount = $formData['jumlah'] ?? '';
if (is_numeric($amount) && $amount !== '') {
	$amount = number_format((float) $amount, 0, '.', '');
}
?>
<div class="container-fluid py-3">
	<div class="d-flex flex-wrap justify-content-between align-items-center gap-3 mb-4">
		<div>
			<h3 class="h4 mb-1"><?= $is_edit ? 'Edit Biaya Operasional' : 'Catat Biaya Operasional' ?></h3>
			<p class="text-muted mb-0">Lengkapi informasi transaksi pengeluaran.</p>
		</div>
		<a href="<?= base_url('pengeluaran') ?>" class="btn btn-outline-secondary"><i class="fas fa-arrow-left me-2"></i>Daftar Biaya</a>
	</div>

	<?php if (!empty($form_error)) { ?><div class="alert alert-danger" role="alert"><?= esc($form_error) ?></div><?php } ?>
	<?php if (!empty($notice)) { ?><div class="alert alert-<?= esc($notice['status']) ?>" role="status"><?= esc($notice['message']) ?></div><?php } ?>

	<?php if (empty($categories)) { ?>
		<div class="alert alert-warning">
			Belum ada kategori biaya aktif. Buat kategori terlebih dahulu sebelum mencatat transaksi.
			<a href="<?= base_url('pengeluaran-kategori') ?>" class="alert-link">Kelola kategori biaya</a>.
		</div>
	<?php } else { ?>
		<div class="row justify-content-center">
			<div class="col-12 col-xl-9">
				<div class="card">
					<div class="card-body p-4">
						<form method="post" action="<?= base_url('pengeluaran') ?>">
							<?= csrf_field() ?>
							<input type="hidden" name="action" value="save">
							<input type="hidden" name="id" value="<?= $expenseId ?>">
							<div class="row g-3">
								<div class="col-12 col-md-6">
									<label class="form-label" for="tanggal-biaya">Tanggal pengeluaran</label>
									<input class="form-control" type="date" id="tanggal-biaya" name="tgl_pengeluaran" value="<?= esc($formData['tgl_pengeluaran'] ?? date('Y-m-d')) ?>" required>
								</div>
								<div class="col-12 col-md-6">
									<label class="form-label" for="kategori-biaya">Kategori</label>
									<select class="form-select" id="kategori-biaya" name="id_pengeluaran_kategori" required>
										<option value="">Pilih kategori</option>
										<?php foreach ($categories as $category) { ?>
											<option value="<?= $category['id_pengeluaran_kategori'] ?>" <?= $selectedCategory === (int) $category['id_pengeluaran_kategori'] ? 'selected' : '' ?>><?= esc($category['nama_kategori']) ?></option>
										<?php } ?>
									</select>
								</div>
								<div class="col-12">
									<label class="form-label" for="nama-biaya">Nama biaya</label>
									<input class="form-control" type="text" id="nama-biaya" name="nama_pengeluaran" maxlength="160" value="<?= esc($formData['nama_pengeluaran'] ?? '') ?>" placeholder="Contoh: Pembayaran listrik bulan ini" required>
								</div>
								<div class="col-12 col-md-6">
									<label class="form-label" for="jumlah-biaya">Jumlah (Rp)</label>
									<input class="form-control" type="number" id="jumlah-biaya" name="jumlah" min="1" step="1" value="<?= esc($amount) ?>" placeholder="0" required>
								</div>
								<div class="col-12 col-md-6">
									<label class="form-label" for="metode-pembayaran">Metode pembayaran</label>
									<select class="form-select" id="metode-pembayaran" name="metode_pembayaran" required>
										<?php foreach (['Tunai', 'Transfer', 'QRIS', 'Kartu', 'Lainnya'] as $method) { ?>
											<option value="<?= $method ?>" <?= ($formData['metode_pembayaran'] ?? 'Tunai') === $method ? 'selected' : '' ?>><?= $method ?></option>
										<?php } ?>
									</select>
								</div>
								<div class="col-12">
									<label class="form-label" for="no-bukti">Nomor bukti <span class="text-muted">(opsional)</span></label>
									<input class="form-control" type="text" id="no-bukti" name="no_bukti" maxlength="100" value="<?= esc($formData['no_bukti'] ?? '') ?>" placeholder="Nomor kuitansi atau referensi transfer">
								</div>
								<div class="col-12">
									<label class="form-label" for="catatan-biaya">Catatan <span class="text-muted">(opsional)</span></label>
									<textarea class="form-control" id="catatan-biaya" name="catatan" rows="3" placeholder="Informasi tambahan transaksi"><?= esc($formData['catatan'] ?? '') ?></textarea>
								</div>
							</div>
							<div class="d-flex flex-wrap gap-2 justify-content-end mt-4">
								<a href="<?= base_url('pengeluaran') ?>" class="btn btn-outline-secondary">Batal</a>
								<?php if ($is_edit ? has_permission('update_all') : has_permission('create')) { ?><button class="btn btn-primary" type="submit"><i class="fas fa-save me-2"></i>Simpan Transaksi</button><?php } ?>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	<?php } ?>
</div>