<?php helper(['format', 'html']); ?>
<div class="product-detail-page">
	<div class="product-detail-header">
		<div>
			<h1 class="product-detail-title"><?= esc($form_data['nama_barang']) ?></h1>
			<p class="product-detail-code">Kode Barang: <?= esc($form_data['kode_barang'] ?: '-') ?></p>
		</div>
		<div class="product-detail-actions">
			<a class="btn btn-light" href="<?= base_url('barang') ?>"><i class="fas fa-arrow-left me-2"></i>Daftar Barang</a>
			<a class="btn btn-success" href="<?= base_url('barang/edit?id=' . $id) ?>"><i class="fas fa-edit me-2"></i>Edit Produk</a>
		</div>
	</div>

	<div class="product-detail-grid">
		<section class="product-detail-card">
			<h2 class="product-detail-card-title">Informasi Produk</h2>
			<div class="product-detail-card-body">
				<dl class="product-detail-fields">
					<div><dt>Kode Barang</dt><dd><?= esc($form_data['kode_barang'] ?: '-') ?></dd></div>
					<div><dt>Barcode</dt><dd><?= esc($form_data['barcode'] ?: '-') ?></dd></div>
					<div><dt>Kategori</dt><dd><?= esc($nama_kategori) ?></dd></div>
					<div><dt>Satuan</dt><dd><?= esc($nama_satuan) ?></dd></div>
					<div><dt>Berat</dt><dd><?= format_number($form_data['berat']) ?> Gram</dd></div>
					<div><dt>Tanggal Daluarsa</dt><dd><?= !empty($form_data['tgl_daluarsa']) && $form_data['tgl_daluarsa'] != '0000-00-00' ? format_tanggal($form_data['tgl_daluarsa'], 'dd-mm-yyyy') : '-' ?></dd></div>
					<div class="product-detail-field-wide"><dt>Deskripsi</dt><dd><?= nl2br(esc($form_data['deskripsi'] ?: '-')) ?></dd></div>
				</dl>
			</div>
		</section>

		<section class="product-detail-card">
			<h2 class="product-detail-card-title">Gambar Produk</h2>
			<div class="product-detail-card-body">
				<?php if (!empty($form_data['images'])) { ?>
					<div class="product-detail-image-list">
						<?php foreach ($form_data['images'] as $image) {
							$image_path = ROOTPATH . 'public/files/uploads/' . ($image['nama_file'] ?? '');
							$image_url = !empty($image['nama_file']) && is_file($image_path)
								? base_url('public/files/uploads/' . rawurlencode($image['nama_file']))
								: base_url('public/images/filepicker_images/file_not_found.png');
						?>
							<img class="product-detail-image" src="<?= esc($image_url) ?>" alt="<?= esc($image['nama_file'] ?: $form_data['nama_barang']) ?>">
						<?php } ?>
					</div>
				<?php } else { ?>
					<div class="product-detail-empty-image">Belum ada gambar</div>
				<?php } ?>
			</div>
		</section>

		<section class="product-detail-card">
			<h2 class="product-detail-card-title">Stok per Gudang</h2>
			<div class="product-detail-card-body p-0">
				<table class="table table-hover product-detail-stock-table">
					<thead><tr><th>Gudang</th><th>Stok</th></tr></thead>
					<tbody>
						<?php foreach ($gudang as $warehouse) {
							$stock = $stok[$warehouse['id_gudang']]['total_stok'] ?? 0;
						?>
							<tr><td><?= esc($warehouse['nama_gudang']) ?></td><td><?= format_number($stock) ?></td></tr>
						<?php } ?>
					</tbody>
				</table>
			</div>
		</section>

		<section class="product-detail-card">
			<h2 class="product-detail-card-title">Harga</h2>
			<div class="product-detail-card-body p-0">
				<table class="table table-hover product-detail-prices-table">
					<tbody>
						<tr><th>HPP</th><td>Rp <?= format_number($harga_pokok ?: 0) ?></td></tr>
						<?php foreach ($harga_jual as $price) { ?>
							<tr>
								<th><?= esc($price['nama_jenis_harga']) ?><?= $price['default_harga'] == 'Y' ? ' <span class="badge text-bg-success ms-1">Default</span>' : '' ?></th>
								<td>Rp <?= format_number($price['harga'] ?: 0) ?></td>
							</tr>
						<?php } ?>
					</tbody>
				</table>
			</div>
		</section>
	</div>
</div>