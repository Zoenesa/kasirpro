<div class="card">
	<div class="card-header">
		<h5 class="card-title mb-0"><?= esc($current_module['judul_module']) ?></h5>
	</div>
	<div class="card-body">
		<?php if (!empty($resetResult)): ?>
			<div class="alert <?= ($resetResult['status'] ?? '') === 'ok' ? 'alert-success' : 'alert-danger' ?>" role="status">
				<?= esc($resetResult['message'] ?? 'Proses reset selesai.') ?>
			</div>
		<?php endif; ?>

		<div class="alert alert-danger" role="alert">
			<strong>Tindakan permanen.</strong> Proses ini menghapus semua barang dan data transaksi terkait, termasuk pembelian, penjualan, retur, pembayaran, dan transfer. Data user, role, pengaturan aplikasi, serta data lain di luar daftar ini tidak dihapus.
		</div>

		<div class="row">
			<div class="col-lg-7">
				<h6>Data yang akan dikosongkan</h6>
				<ul class="mb-4">
					<li>Barang, stok adjustment, harga, dan relasi gambar barang</li>
					<li>Pembelian, detail, retur, pembayaran, dan file transaksi</li>
					<li>Penjualan, detail, retur, pembayaran, dan dokumen retur</li>
					<li>Transfer barang dan detail transfer</li>
				</ul>

				<form id="reset-database-form" method="post" action="<?= esc(base_url('reset-database/execute')) ?>">
					<input type="hidden" name="reset_token" value="<?= esc($resetToken) ?>">
					<div class="form-check mb-4">
						<input class="form-check-input" type="checkbox" name="delete_image" value="Y" id="delete-image">
						<label class="form-check-label" for="delete-image">Hapus file gambar barang dari penyimpanan</label>
						<div class="form-text">Jika tidak dicentang, file gambar tetap tersimpan.</div>
					</div>
					<div class="mb-3">
						<label class="form-label" for="reset-confirmation">Ketik <strong>HAPUS DATA KASIRPRO</strong> untuk mengaktifkan tombol reset</label>
						<input class="form-control" type="text" name="confirmation" id="reset-confirmation" autocomplete="off" spellcheck="false" required>
					</div>
					<button class="btn btn-danger" type="submit" id="reset-submit" disabled>
						<i class="fas fa-triangle-exclamation me-2"></i>Reset Data KasirPRO
					</button>
				</form>
			</div>
		</div>
	</div>
</div>

<script>
(function () {
	const form = document.getElementById('reset-database-form');
	const confirmation = document.getElementById('reset-confirmation');
	const submit = document.getElementById('reset-submit');
	const requiredText = 'HAPUS DATA KASIRPRO';

	confirmation.addEventListener('input', function () {
		submit.disabled = confirmation.value.trim() !== requiredText;
	});

	form.addEventListener('submit', function (event) {
		if (confirmation.value.trim() !== requiredText || !window.confirm('Reset akan menghapus semua barang dan transaksi terkait. Lanjutkan?')) {
			event.preventDefault();
		}
	});
})();
</script>