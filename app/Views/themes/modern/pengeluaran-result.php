<?php helper('html'); ?>
<div class="container-fluid py-3">
	<div class="d-flex flex-wrap justify-content-between align-items-center gap-3 mb-4">
		<div>
			<h3 class="h4 mb-1">Biaya Operasional</h3>
			<p class="text-muted mb-0">Catat dan pantau pengeluaran bisnis.</p>
		</div>
		<div class="d-flex flex-wrap gap-2">
			<a href="<?= base_url('pengeluaran-kategori') ?>" class="btn btn-outline-secondary"><i class="fas fa-tags me-2"></i>Kategori Biaya</a>
			<?php if (has_permission('create')) { ?><a href="<?= base_url('pengeluaran?form=1') ?>" class="btn btn-primary"><i class="fas fa-plus me-2"></i>Catat Biaya</a><?php } ?>
		</div>
	</div>

	<?php if (!empty($notice)) { ?>
		<div class="alert alert-<?= esc($notice['status']) ?>" role="status"><?= esc($notice['message']) ?></div>
	<?php } ?>

	<div class="row g-3 mb-4">
		<div class="col-12 col-md-6">
			<div class="card h-100"><div class="card-body">
				<div class="text-muted small mb-1">Total pengeluaran pada periode</div>
				<div class="h4 mb-0">Rp <?= format_number((int) $summary['total_pengeluaran']) ?></div>
			</div></div>
		</div>
		<div class="col-12 col-md-6">
			<div class="card h-100"><div class="card-body">
				<div class="text-muted small mb-1">Jumlah transaksi</div>
				<div class="h4 mb-0"><?= format_number($summary['jumlah_transaksi']) ?></div>
			</div></div>
		</div>
	</div>

	<div class="card">
		<div class="card-header d-flex flex-wrap justify-content-between align-items-center gap-3">
			<h5 class="card-title mb-0">Daftar Transaksi</h5>
			<form method="get" action="<?= base_url('pengeluaran') ?>" class="d-flex flex-wrap align-items-end gap-2">
				<div><label class="form-label small mb-1" for="start-date">Dari</label><input class="form-control" type="date" id="start-date" name="start_date" value="<?= esc($start_date) ?>" required></div>
				<div><label class="form-label small mb-1" for="end-date">Sampai</label><input class="form-control" type="date" id="end-date" name="end_date" value="<?= esc($end_date) ?>" required></div>
				<button class="btn btn-outline-primary" type="submit"><i class="fas fa-filter me-2"></i>Filter</button>
			</form>
		</div>
		<div class="card-body">
			<div class="table-responsive">
				<table class="table table-hover align-middle mb-0">
					<thead><tr><th>Tanggal</th><th>Nama Biaya</th><th>Kategori</th><th>Metode</th><th>No. Bukti</th><th class="text-end">Jumlah</th><th class="text-end">Aksi</th></tr></thead>
					<tbody>
						<?php if (empty($expenses)) { ?>
							<tr><td colspan="7" class="text-center text-muted py-5">Belum ada transaksi pada periode ini.</td></tr>
						<?php } else { foreach ($expenses as $expense) { ?>
							<tr>
								<td class="text-nowrap"><?= date('d-m-Y', strtotime($expense['tgl_pengeluaran'])) ?></td>
								<td class="fw-semibold"><?= esc($expense['nama_pengeluaran']) ?><?php if (!empty($expense['catatan'])) { ?><div class="small text-muted fw-normal"><?= esc($expense['catatan']) ?></div><?php } ?></td>
								<td><?= esc($expense['nama_kategori']) ?></td>
								<td><?= esc($expense['metode_pembayaran']) ?></td>
								<td><?= esc($expense['no_bukti'] ?: '-') ?></td>
								<td class="text-end text-nowrap">Rp <?= format_number((int) $expense['jumlah']) ?></td>
								<td class="text-end text-nowrap">
									<?php if (has_permission('update_all')) { ?><a class="btn btn-sm btn-outline-primary" href="<?= base_url('pengeluaran?edit=' . $expense['id_pengeluaran']) ?>" title="Edit transaksi"><i class="fas fa-pen"></i></a><?php } ?>
									<?php if (has_permission('delete_all')) { ?>
										<form method="post" action="<?= base_url('pengeluaran') ?>" class="d-inline" onsubmit="return confirm('Hapus transaksi biaya ini?')">
											<?= csrf_field() ?><input type="hidden" name="action" value="delete"><input type="hidden" name="id" value="<?= $expense['id_pengeluaran'] ?>">
											<button class="btn btn-sm btn-outline-danger" type="submit" title="Hapus transaksi"><i class="fas fa-trash"></i></button>
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