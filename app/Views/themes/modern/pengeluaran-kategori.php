<?php
helper('html');
$formData = $form_input ?? [];
$categoryId = (int) ($formData['id_pengeluaran_kategori'] ?? $formData['id'] ?? 0);
$isActive = ($formData['aktif'] ?? 'Y') === 'Y' || ($formData['aktif'] ?? '') === '1';
?>
<div class="container-fluid py-3">
	<div class="d-flex flex-wrap justify-content-between align-items-center gap-3 mb-4">
		<div>
			<h3 class="h4 mb-1">Kategori Biaya Operasional</h3>
			<p class="text-muted mb-0">Kelompokkan pengeluaran agar mudah dipantau.</p>
		</div>
		<a href="<?= base_url('pengeluaran') ?>" class="btn btn-outline-secondary"><i class="fas fa-arrow-left me-2"></i>Daftar Biaya</a>
	</div>

	<?php if (!empty($success)) { ?>
		<div class="alert alert-success" role="status"><?= esc($success) ?></div>
	<?php } ?>
	<?php if (!empty($error)) { ?>
		<div class="alert alert-danger" role="alert"><?= esc($error) ?></div>
	<?php } ?>

	<div class="row g-4">
		<?php if (has_permission('create') || has_permission('update_all')) { ?>
			<div class="col-12 col-xl-4">
				<div class="card h-100">
					<div class="card-header"><h5 class="card-title mb-0"><?= $categoryId ? 'Edit Kategori' : 'Kategori Baru' ?></h5></div>
					<div class="card-body">
						<form method="post" action="<?= base_url('pengeluaran-kategori') ?>">
							<?= csrf_field() ?>
							<input type="hidden" name="action" value="save">
							<input type="hidden" name="id" value="<?= $categoryId ?>">
							<div class="mb-3">
								<label class="form-label" for="nama-kategori">Nama kategori</label>
								<input class="form-control" id="nama-kategori" name="nama_kategori" maxlength="100" value="<?= esc($formData['nama_kategori'] ?? '') ?>" placeholder="Contoh: Listrik dan Air" required>
							</div>
							<div class="mb-3">
								<label class="form-label" for="deskripsi-kategori">Keterangan</label>
								<textarea class="form-control" id="deskripsi-kategori" name="deskripsi" rows="3" maxlength="255" placeholder="Opsional"><?= esc($formData['deskripsi'] ?? '') ?></textarea>
							</div>
							<div class="form-check form-switch mb-4">
								<input class="form-check-input" type="checkbox" id="kategori-aktif" name="aktif" value="1" <?= $isActive ? 'checked' : '' ?>>
								<label class="form-check-label" for="kategori-aktif">Aktif dan tersedia untuk transaksi</label>
							</div>
							<div class="d-flex gap-2">
								<button class="btn btn-primary" type="submit"><i class="fas fa-save me-2"></i>Simpan</button>
								<?php if ($categoryId) { ?><a class="btn btn-outline-secondary" href="<?= base_url('pengeluaran-kategori') ?>">Batal</a><?php } ?>
							</div>
						</form>
					</div>
				</div>
			</div>
		<?php } ?>

		<div class="col-12 <?= has_permission('create') || has_permission('update_all') ? 'col-xl-8' : '' ?>">
			<div class="card">
				<div class="card-header"><h5 class="card-title mb-0">Daftar Kategori</h5></div>
				<div class="card-body">
					<div class="table-responsive">
						<table class="table table-hover align-middle mb-0">
							<thead><tr><th>Nama Kategori</th><th>Keterangan</th><th>Status</th><th class="text-end">Aksi</th></tr></thead>
							<tbody>
								<?php if (empty($kategori)) { ?>
									<tr><td colspan="4" class="text-center text-muted py-5">Belum ada kategori biaya. Buat kategori pertama untuk mulai mencatat transaksi.</td></tr>
								<?php } else { foreach ($kategori as $item) { ?>
									<tr>
										<td class="fw-semibold"><?= esc($item['nama_kategori']) ?></td>
										<td><?= esc($item['deskripsi'] ?: '-') ?></td>
										<td><span class="badge <?= $item['aktif'] === 'Y' ? 'text-bg-success' : 'text-bg-secondary' ?>"><?= $item['aktif'] === 'Y' ? 'Aktif' : 'Nonaktif' ?></span></td>
										<td class="text-end text-nowrap">
											<?php if (has_permission('update_all')) { ?><a class="btn btn-sm btn-outline-primary" href="<?= base_url('pengeluaran-kategori?edit=' . $item['id_pengeluaran_kategori']) ?>" title="Edit kategori"><i class="fas fa-pen"></i></a><?php } ?>
											<?php if (has_permission('delete_all')) { ?>
												<form method="post" action="<?= base_url('pengeluaran-kategori') ?>" class="d-inline" onsubmit="return confirm('Hapus kategori ini?')">
													<?= csrf_field() ?><input type="hidden" name="action" value="delete"><input type="hidden" name="id" value="<?= $item['id_pengeluaran_kategori'] ?>">
													<button class="btn btn-sm btn-outline-danger" type="submit" title="Hapus kategori"><i class="fas fa-trash"></i></button>
												</form>
											<?php } ?>
										</td>
									</tr>
								<?php } } ?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>