<?php helper('html') ?>
<div class="card-body dashboard">
    <!-- card -->
    <!-- <div class="row">
		<div class="col-12 col-md-12 col-lg-12 col-xl-12 mb-4">
			<div class="card" style="border-top: 3px solid #007bff;">
				<div class="card-header">
					<div class="card-header-start">
						<h6 class="card-title"><i class="fas fa-th"></i> Menu Cepat</h6>
					</div>
				</div>
				<div class="card-body">
					<div class="row">
						<div class="col-lg-2 col-4 mb-2">
							<div class="small-box bg-warning rounded">
								<div class="inner">
									<div class="icon text-center" style="padding: 10px;">
										<i class="fas fa-boxes"></i>
										<h6>Daftar Produk</h6>
									</div>
								</div>
							</div>
						</div>

						<div class="col-lg-2 col-4 mb-2">
							<div class="small-box bg-warning rounded">
								<div class="inner">
									<div class="icon text-center" style="padding: 10px;">
										<i class="fas fa-cart-arrow-down"></i>
										<h6>Daftar Penjualan</h6>
									</div>
								</div>
							</div>
						</div>

						<div class="col-lg-2 col-4 mb-2">
							<div class="small-box bg-warning rounded">
								<div class="inner">
									<div class="icon text-center" style="padding: 10px;">
										<i class="fas fa-money-check"></i>
										<h6>Daftar Pembelian</h6>
									</div>
								</div>
							</div>
						</div>

						<div class="col-lg-2 col-4 mb-2">
							<div class="small-box bg-warning rounded">
								<div class="inner">
									<div class="icon text-center" style="padding: 10px;">
										<i class="fas fa-warehouse"></i>
										<h6>Daftar Gudang</h6>
									</div>
								</div>
							</div>
						</div>

						<div class="col-lg-2 col-4 mb-2">
							<div class="small-box bg-warning rounded">
								<div class="inner">
									<div class="icon text-center" style="padding: 10px;">
										<i class="fas fa-quidditch"></i>
										<h6>Setting Layout</h6>
									</div>
								</div>
							</div>
						</div>

						<div class="col-lg-2 col-4 mb-2">
							<div class="small-box bg-warning rounded">
								<div class="inner">
									<div class="icon text-center" style="padding: 10px;">
										<i class="fas fa-check"></i>
										<h6>setting App</h6>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div> -->

    <!-- / card -->

    <!-- <div class="red-background-container"></div> -->







    <div class="row dashboard-summary">
        <div class="col-lg-3 col-sm-6 col-6 col-xs-12 mb-4">
            <div class="card dashboard-stat dashboard-stat--items">
                <div class="card-body card-stats">
                    <div class="description">
                        <h5 class="card-title h4">
                            <?= !empty($total_item_terjual['jml']) ? format_number($total_item_terjual['jml'], true) : 0 ?>
                        </h5>
                        <p class="card-text">Total Item Terjual</p>

                    </div>
                    <div class="icon">
                        <!-- <i class="fas fa-clipboard-list"></i> -->
                        <i class="material-icons">local_shipping</i>
                    </div>
                </div>
                <div class="card-footer bg-primary">
                    <div class="card-footer-left">
                        <div class="icon me-2">
                            <?php
							if (!empty($total_item_terjual['growth'])) {
								$class = $total_item_terjual['growth'] > 0 ? 'fa-arrow-trend-up' : 'fa-arrow-trend-down';
								echo '<i class="fas ' . $class . '"></i>';
							} else {
								$total_item_terjual = [];
								$total_item_terjual['growth'] = 0;
							}
							?>
                        </div>
                        <p><?= $total_item_terjual['growth'] ? round($total_item_terjual['growth']) . '%' : '-' ?></p>
                    </div>
                    <div class="card-footer-right">
                        <p><?= !empty($list_tahun) ? max($list_tahun) : '' ?></p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-sm-6 col-6 col-xs-12 mb-4">
            <div class="card dashboard-stat dashboard-stat--transactions">
                <div class="card-body card-stats">
                    <div class="description">
                        <h5 class="card-title">
                            <?= !empty($total_jumlah_transaksi['jml']) ? format_number($total_jumlah_transaksi['jml']) : 0 ?>
                        </h5>
                        <p class="card-text">Total Transaksi</p>
                    </div>
                    <div class="icon">
                        <!-- <i class="fas fa-shopping-cart"></i>-->
                        <i class="material-icons">local_mall</i>
                    </div>
                </div>
                <div class="card-footer bg-primary">
                    <div class="card-footer-left">
                        <div class="icon me-2">
                            <?php

							if (!empty($total_jumlah_transaksi['growth'])) {
								$class = $total_jumlah_transaksi['growth'] > 0 ? 'fa-arrow-trend-up' : 'fa-arrow-trend-down';
								echo '<i class="fas ' . $class . '"></i>';
							} else {
								$total_jumlah_transaksi = [];
								$total_jumlah_transaksi['growth'] = 0;
							}
							?>
                        </div>
                        <p><?= $total_jumlah_transaksi['growth'] ? round($total_jumlah_transaksi['growth']) . '%' : '-' ?>
                        </p>
                    </div>
                    <div class="card-footer-right">
                        <p><?= !empty($list_tahun) ? max($list_tahun) : '' ?></p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-sm-6 col-6 col-xs-12 mb-4">
            <div class="card dashboard-stat dashboard-stat--income">
                <div class="card-body card-stats">
                    <div class="description">
                        <h5 class="card-title">
                            <?= !empty($total_nilai_penjualan['jml']) ? format_number($total_nilai_penjualan['jml']) : 0 ?>
                        </h5>
                        <p class="card-text">Total Income</p>
                    </div>
                    <div class="icon">
                        <!-- <i class="fas fa-money-bill-wave"></i> -->
                        <i class="material-icons">payments</i>
                    </div>
                </div>
                <div class="card-footer bg-primary">
                    <div class="card-footer-left">
                        <div class="icon me-2">
                            <?php
							if (!empty($total_nilai_penjualan['growth'])) {
								$class = $total_nilai_penjualan['growth'] > 0 ? 'fa-arrow-trend-up' : 'fa-arrow-trend-down';
								echo '<i class="fas ' . $class . '"></i>';
							} else {
								$total_nilai_penjualan = [];
								$total_nilai_penjualan['growth'] = 0;
							}
							?>
                        </div>
                        <p><?= $total_nilai_penjualan['growth'] ? round($total_nilai_penjualan['growth']) . '%' : '-' ?>
                        </p>
                    </div>
                    <div class="card-footer-right">
                        <p><?= !empty($list_tahun) ? max($list_tahun) : '' ?></p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-sm-6 col-6 col-xs-12 mb-4">
            <div class="card dashboard-stat dashboard-stat--customers">
                <div class="card-body card-stats">
                    <div class="description">
                        <h5 class="card-title">
                            <?= !empty($total_pelanggan_aktif['jml']) ? format_number($total_pelanggan_aktif['jml']) : 0 ?>
                        </h5>
                        <p class="card-text">Total Pelanggan Aktif</p>
                    </div>
                    <div class="icon">
                        <!-- <i class="fas fa-money-bill-wave"></i> -->
                        <i class="material-icons">person</i>
                    </div>
                </div>
                <div class="card-footer bg-primary">
                    <div class="card-footer-left">
                        <div class="icon me-2">
                            <?php
							if (!empty($total_pelanggan_aktif['growth'])) {
								$class = $total_pelanggan_aktif['growth'] > 0 ? 'fa-arrow-trend-up' : 'fa-arrow-trend-down';
								echo '<i class="fas ' . $class . '"></i>';
							} else {
								$total_pelanggan_aktif = [];
								$total_pelanggan_aktif['growth'] = 0;
							}
							?>
                        </div>
                        <p><?= $total_pelanggan_aktif['growth'] ? round($total_pelanggan_aktif['growth']) . '%' : '-' ?>
                        </p>
                    </div>
                    <div class="card-footer-right">
                        <p><?= !empty($list_tahun) ? max($list_tahun) : '' ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Model Penjualan Hari ini -->
    <div class="col-md-12 col-lg-8 mb-4">
        <div class="card" style="height:100%; border-top: 3px solid #007bff;">
            <div class="card-header">
                <div class="card-header-start">
                    <h5 class="card-title">Penjualan Barang Hari ini</h5>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <?php
								$settings = [];
								$column = [
									'no_invoice'=>'No. Invoice',
									'tgl_invoice' => 'Tgl. Invoice', 
									'nama_customer' => 'Nama Customer', 
									'1001' => 'Air RO', 
									'1002' => 'Air isi ulang', 
									'1003' => 'Air Aqua Galon', 
									'1004' => 'Isi Ulang Gas 3Kg',
									'1005' => 'Galon Aqua',
									'jumlah_tagihan'=>'Jumlah',
									'jenis_bayar'=>'Jenis Bayar'
								];

								$settings['order'] = [0, 'asc'];
								$index = 0;
								$th = '';
								foreach ($column as $key => $val) {
									$th .= '<th>' . $val . '</th>';
									if (strpos($key, 'ignore_') !== false) {
										$settings['columnDefs'][] = ["targets" => $index, "orderable" => false];
									}
									$index++;
								}
								$th = '';
								foreach ($baranghariini['field'] as $key => $value) {
									if ($key === 0) {
										continue;
									}
									switch ($value) {
										case '1001':
											$th .= '<th>Air RO</th>';
											break;
										case '1002':
											$th .= '<th>Air isi ulang</th>';
											break;
										case '1003':
											$th .= '<th>Air Aqua galon</th>';
											break;
										case '1004':
											$th .= '<th>Isi Gas 3Kg</th>';
											break;
										case '1005':
											$th .= '<th>Galon Aqua</th>';
											break;
										case 'jumlah_tagihan':
											$th .= '<th>Jumlah</th>';
											break;
										case 'nama_customer':
											$th .= '<th>Customer</th>';
											break;
										case 'no_invoice':
											$th .= '<th>No Invoice</th>';
											break;
										case 'tgl_invoice':
											$th .= '<th>Tgl. Invoice</th>';
											break;
										case 'jenis_bayar':
											$th .= '<th>Jenis Bayar</th>';
											break;
										default:
										$th .= '<th>'. $value.'</th>';
											break;
									}
								}
								?>

                    <table id="tabel-barangharian" class="table display table-striped table-bordered table-hover" style="width:100%">
                        <thead>
                            <tr>
                                <?= $th ?>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
							foreach ($baranghariini['data'] as $item) {
								echo '<tr>';
								foreach ($item as $val)
								{   
									if ($val === $item['id_penjualan'])
                                    {
                                        continue;
                                    }
                                    elseif ($val === $item['tgl_invoice'])
                                    {
                                        echo '<td class="text-end">'.formatTanggalID($val, 'dd-mm-yyyy').'</td>';
                                    }
                                    elseif ($val === $item['nama_customer'])
                                    {
										echo '<td class="text-start">'.$val.'</td>';
									}
                                    elseif ($val === $item['no_invoice'])
                                    {
										echo '<td class="text-end">'.$val.'</td>';
									}
                                    elseif ($val === $item['jenis_bayar'])
                                    {
										echo '<td class="text-start">'.$val.'</td>';
									}
                                    elseif ($val === $item['jumlah_tagihan'])
                                    {
										echo '<td class="text-end">'.number_format($val).'</td>';
									}
									else
                                    {
										echo '<td class="text-end">'.$val.'</td>';
									}
								}
								echo '</tr>';
							}?>
                        </tbody>
                    </table>
                    <?php
								$column_dt = [];
								foreach ($column as $key => $val) {
									$column_dt[] = ['data' => $key];
								}?>
                    <span id="tabel-barangharian-column" style="display:none"><?= json_encode($column_dt) ?></span>
                    <span id="tabel-barangharian-setting" style="display:none"><?= json_encode($settings) ?></span>
                    <span id="tabel-barangharian-url"
                        style="display:none"><?= base_url().'dashboard/ajaxGetBarangHarian' ?></span>
                </div>
            </div>
        </div>
    </div>
    <!-- Model Penjualan Hari ini -->

    <!-- Kuantiti barang mingguan -->
    <div class="col-md-12 col-lg-8 mb-4">
        <div class="card" style="height:100%; border-top: 3px solid #007bff;">
            <div class="card-header">
                <div class="card-header-start">
                    <h5 class="card-title">Kuantiti Barang Mingguan ini</h5>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <?php
								$settings = [];
								$column = [ 
									'nama_barang' => 'Nama Barang', 
									'Senin' => 'Senin', 
									'Selasa' => 'Selasa', 
									'Rabu' => 'Rabu', 
									'Kamis' => 'Kamis', 
									'Jumat' => 'Jumat', 
									'Sabtu' => 'Sabtu', 
									'Minggu' => 'Minggu'
								];

								$settings['order'] = [1, 'asc'];
								$index = 0;
								$th = '';
								foreach ($column as $key => $val) {
									$th .= '<th>' . $val . '</th>';
									if (strpos($key, 'ignore_') !== false) {
										$settings['columnDefs'][] = ["targets" => $index, "orderable" => false];
									}
									$index++;
								}

								?>

                    <table id="tabel-barangmingguan" class="table display table-striped table-hover" style="width:100%">
                        <thead>
                            <tr>
                                <?= $th ?>
                            </tr>
                        </thead>
                        <tbody>


                        </tbody>
                    </table>
                    <?php
						$column_dt = [];
						foreach ($column as $key => $val) {
							$column_dt[] = ['data' => $key];
						}?>
                    <span id="tabel-barangmingguan-column" style="display:none"><?= json_encode($column_dt) ?></span>
                    <span id="tabel-barangmingguan-setting" style="display:none"><?= json_encode($settings) ?></span>
                    <span id="tabel-barangmingguan-url"
                        style="display:none"><?= base_url() . '/dashboard/ajaxgetbarangmingguini' ?></span>
                </div>
            </div>
        </div>
    </div>
    <!-- Kuantiti barang mingguan -->


    <div class="row">
        <div class="col-12 col-md-12 col-lg-12 col-xl-8 mb-4">
            <div class="card" style="border-top: 3px solid #007bff;">
                <div class="card-header">
                    <div class="card-header-start">
                        <h6 class="card-title">Penjualan Perbulan</h6>
                    </div>
                </div>
                <div class="card-body">
                    <div class="dashboard-chart dashboard-chart--line">
                        <canvas id="bar-container" aria-label="Grafik penjualan per bulan"></canvas>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-12 col-lg-12 col-xl-4 mb-4">
            <div class="card" style="height: 100%; border-top: 3px solid #007bff;">
                <div class="card-header">
                    <div class="card-header-start">
                        <h5 class="card-title">Penjualan Per Tahun</h5>
                    </div>
                </div>
                <div class="card-body">
                    <div class="dashboard-chart dashboard-chart--year">
                        <canvas id="chart-total-penjualan" aria-label="Grafik penjualan per tahun"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
	if ($setting_stok['dashboard_show'] == 'Y') {
	?>
    <div class="row">
        <div class="col-md-12 col-lg-4 mb-4">
            <div class="card" style="height:100%; border-top: 3px solid #007bff;">
                <div class="card-header">
                    <div class="card-header-start">
                        <h5 class="card-title">Komposisi Barang</h5>
                    </div>
                </div>
                <div class="card-body" style="display:flex; justify-content: center; align-items: center;">
                    <div class="dashboard-chart dashboard-chart--pie">
                        <?php
							if ($global_jml_barang) {
								echo '<canvas id="pie-container-stok" aria-label="Grafik komposisi stok barang"></canvas>';
							} else {
								echo '<div class="alert alert-danger">Data tidak ditemukan</div>';
							}
							?>

                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-12 col-lg-8 mb-4">
            <div class="card" style="height:100%; border-top: 3px solid #007bff;">
                <div class="card-header">
                    <div class="card-header-start">
                        <h5 class="card-title">Stok Barang</h5>
                    </div>
                    <div class="card-header-end">
                        <?= options(['name' => 'jenis_stok', 'id' => 'jenis-stok'], ['semua_barang' => 'Semua Barang', 'dibawah_stok_minimum' => 'Dibawah Stok Minimum']) ?>
                    </div>
                </div>
                <div class="card-body">
                    <?php
						if (!$global_jml_barang) {
							echo '<div class="alert alert-danger">Data tidak ditemukan</div>';
						} else {

						?>
                    <div class="table-responsive">
                        <?php
								$settings = [];
								$column = [
									'ignore_urut' => 'No', 'nama_barang' => 'Nama Barang', 'stok_minimum' => 'Stok Min', 'stok' => 'Stok', 'ignore_action' => 'Aksi'
								];

								$settings['order'] = [3, 'asc'];
								$index = 0;
								$th = '';
								foreach ($column as $key => $val) {
									$th .= '<th>' . $val . '</th>';
									if (strpos($key, 'ignore_') !== false) {
										$settings['columnDefs'][] = ["targets" => $index, "orderable" => false];
									}
									$index++;
								}

								?>

                        <table id="tabel-stok" class="table display table-striped table-hover" style="width:100%">
                            <thead>
                                <tr>
                                    <?= $th ?>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td colspan="<?= count($column) ?>" class="text-center">Loading data...</td>
                                </tr>
                            </tbody>
                        </table>
                        <?php
								$column_dt = [];
								foreach ($column as $key => $val) {
									$column_dt[] = ['data' => $key];
								}

								?>
                        <span id="tabel-stok-column" style="display:none"><?= json_encode($column_dt) ?></span>
                        <span id="tabel-stok-setting" style="display:none"><?= json_encode($settings) ?></span>
                        <span id="tabel-stok-url" style="display:none"><?= base_url() . '/barang/getDataDT' ?></span>
                    </div>
                    <?php
						}
						?>
                </div>
            </div>
        </div>
    </div>
    <?php
	}
	if ($setting_piutang['notifikasi_show'] == 'Y') { ?>
    <div class="row">
        <div class="col-md-12 col-lg-4 mb-4">
            <div class="card" style="height:100%; border-top: 3px solid #007bff;">
                <div class="card-header">
                    <div class="card-header-start">
                        <h5 class="card-title">Piutang Terbesar</h5>
                    </div>
                </div>
                <div class="card-body d-flex">
                    <?php
						if (empty($piutang_terbesar)) {
							echo '<div class="alert alert-danger w-100">Data tidak ditemukan</div>';
						} else {
						?>
                    <div class="table-responsive">
                        <table class="table table-border table-hover">
                            <thead>
                                <tr>
                                    <th colspan="2">Nama</th>
                                    <th>Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
										if (!empty($piutang_terbesar)) {
											foreach ($piutang_terbesar as $val) {
												if ($val['foto']) {
													$path = ROOTPATH . '/public/images/foto/' . $val['foto'];
													if (!file_exists($path)) {
														$val['foto'] = 'noimage.png';
													}
												} else {
													$val['foto'] = 'noimage.png';
												}
												echo '<tr>
														<td><img src="' . base_url() . '/public/images/foto/' . $val['foto'] . '"></td>
														<td>' . ($val['nama_customer'] ?: 'Umum') . '</td>
														<td class="text-end">' . format_number($val['total_kurang_bayar']) . '</td>
													</tr>';
											}
										}
										?>
                            </tbody>
                        </table>
                    </div>
                    <?php
						}
						?>
                </div>
            </div>
        </div>
        <div class="col-md-12 col-lg-8 mb-4">
            <div class="card" style="height:100%; border-top: 3px solid #007bff;">
                <?php $periode_piutang = $setting_piutang['periode_penjualan_piutang']; ?>
                <div class="card-header">
                    <div class="card-header-start">
                        <h5 class="card-title">Piutang Jatuh Tempo</h5>
                    </div>
                    <div class="card-header-end">
                        <?= options(['name' => 'jatuh_tempo', 'id' => 'jenis-penjualan-jatuh-tempo'], ['' => 'Semua', 'lewat_jatuh_tempo' => 'Lewat ' . $setting_piutang['piutang_periode'] . ' hari', 'akan_jatuh_tempo' => 'Jatuh tempo dalam ' . $setting_piutang['notifikasi_periode'] . ' hari'], @$setting_piutang['default_jatuh_tempo_option']) ?>
                        <input type="hidden" id="piutang-jatuh-tempo-start-date"
                            value="<?= $periode_piutang['start_date'] ?>" />
                        <input type="hidden" id="piutang-jatuh-tempo-end-date"
                            value="<?= $periode_piutang['end_date'] ?>" />
                    </div>
                </div>
                <div class="card-body">
                    <?php
						if (empty($penjualan)) {
							echo '<div class="alert alert-danger">Data tidak ditemukan</div>';
						} else {

						?>
                    <div class="table-responsive">
                        <?php
								$settings = [];
								$column = [
									'ignore_urut' => 'No', 'nama_customer' => 'Nama Customer', 'no_invoice' => 'No. Invoice', 'tgl_penjualan' => 'Tgl. Transkasi', 'neto' => 'Neto', 'kurang_bayar' => 'Kurang'
								];

								$settings['order'] = [3, 'desc'];
								$index = 0;
								$th = '';
								foreach ($column as $key => $val) {
									$th .= '<th>' . $val . '</th>';
									if (strpos($key, 'ignore_search') !== false) {
										$settings['columnDefs'][] = ["targets" => $index, "orderable" => false];
									}
									$index++;
								}

								?>

                        <table id="tabel-penjualan-tempo" class="table display table-striped table-hover"
                            style="width:100%">
                            <thead>
                                <tr>
                                    <?= $th ?>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td colspan="<?= count($column) ?>" class="text-center">Loading data...</td>
                                </tr>
                            </tbody>
                        </table>
                        <?php
								$column_dt = [];
								foreach ($column as $key => $val) {
									$column_dt[] = ['data' => $key];
								}

								?>
                        <span id="penjualan-tempo-column" style="display:none"><?= json_encode($column_dt) ?></span>
                        <span id="penjualan-tempo-setting" style="display:none"><?= json_encode($settings) ?></span>
                        <span id="penjualan-tempo-url"
                            style="display:none"><?= base_url() . '/dashboard/getDataDTPenjualanTempo?start_date=' . $periode_piutang['start_date'] . '&end_date=' . $periode_piutang['end_date'] . '&jatuh_tempo=' . $setting_piutang['default_jatuh_tempo_option'] ?></span>
                    </div>
                    <?php
						}
						?>
                </div>
            </div>
        </div>
    </div>
    <?php
	}
	?>
    <div class="row">
        <div class="col-md-12 col-lg-8 mb-4">
            <div class="card" style="height:100%; border-top: 3px solid #007bff;">
                <div class="card-header">
                    <div class="card-header-start">
                        <h5 class="card-title">Penjualan Barang Terbesar</h5>
                    </div>
                    <div class="card-header-end">
                        <?php
						if (!empty($list_tahun)) {
							echo '<form method="get" action="" class="d-flex">
									' . options(['name' => 'tahun', 'id' => 'tahun-barang-terlaris'], $list_tahun, $tahun) . '
							</form>';
						}
						?>
                    </div>
                </div>
                <div class="card-body">
                    <?php
					if (empty($penjualan)) {
						echo '<div class="alert alert-danger">Data tidak ditemukan</div>';
					} else {

					?>
                    <div class="table-responsive">
                        <?php
							$column = [
								'ignore_search_urut' => 'No', 'nama_barang' => 'Nama Barang', 'harga_satuan' => 'Harga Satuan', 'jml_terjual' => 'Jumlah', 'total_harga' => 'Total', 'kontribusi' => 'Kontribusi'
							];
							$settings = [];
							$settings['order'] = [4, 'desc'];
							$index = 0;
							$th = '';
							foreach ($column as $key => $val) {
								$th .= '<th>' . $val . '</th>';
								if (strpos($key, 'ignore_search') !== false) {
									$settings['columnDefs'][] = ["targets" => $index, "orderable" => false];
								}
								$index++;
							}

							?>

                        <table id="tabel-penjualan-terbesar" class="table display table-striped table-hover"
                            style="width:100%">
                            <thead>
                                <tr>
                                    <?= $th ?>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td colspan="<?= count($column) ?>" class="text-center">Loading data...</td>
                                </tr>
                            </tbody>
                        </table>
                        <?php
							$column_dt = [];
							foreach ($column as $key => $val) {
								$column_dt[] = ['data' => $key];
							}
							?>
                        <span id="penjualan-terbesar-column" style="display:none"><?= json_encode($column_dt) ?></span>
                        <span id="penjualan-terbesar-setting" style="display:none"><?= json_encode($settings) ?></span>
                        <span id="penjualan-terbesar-url"
                            style="display:none"><?= current_url() . '/getDataDTPenjualanTerbesar?tahun=' . (!empty($list_tahun) ? max($list_tahun) : 0) ?></span>
                    </div>
                    <?php
					}
					?>
                </div>
            </div>
        </div>
        <div class="col-md-12 col-lg-4 mb-4">
            <div class="card" style="height:100%; border-top: 3px solid #007bff;">
                <div class="card-header">
                    <div class="card-header-start">
                        <h5 class="card-title">Paling Banyak Terjual</h5>
                    </div>
                    <div class="card-header-end">
                        <?php
						if (!empty($list_tahun)) {
							echo '<form method="get" action="" class="d-flex">
									' . options(['name' => 'tahun', 'id' => 'tahun-item-terjual'], $list_tahun, $tahun) . '
								</form>';
						}
						?>
                    </div>
                </div>
                <div class="card-body" style="display:flex; justify-content: center; align-items: center;">
                    <div class="dashboard-chart dashboard-chart--pie">
                        <?php
						if (!empty($penjualan)) {
							echo '<canvas id="pie-container" aria-label="Grafik barang paling banyak terjual"></canvas>';
						} else {
							echo '<div class="alert alert-danger">Data tidak ditemukan</div>';
						}
						?>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 col-lg-4 mb-4">
            <div class="card" style="height:100%; border-top: 3px solid #007bff;">
                <div class="card-header">
                    <div class="card-header-start">
                        <h5 class="card-title">Kategori Terlaris</h5>
                    </div>
                    <div class="card-header-end">
                        <?php
						if (!empty($list_tahun)) {
							echo '<form method="get" action="" class="d-flex">
										' . options(['name' => 'tahun', 'id' => 'tahun-kategori-terjual'], $list_tahun, $tahun) . '
									</form>';
						}
						?>
                    </div>
                </div>
                <div class="card-body" style="display:flex; justify-content: center; align-items: center;">
                    <div class="dashboard-chart dashboard-chart--pie">
                        <?php
						if (!empty($penjualan)) {
							echo '<canvas id="chart-kategori" aria-label="Grafik kategori terlaris"></canvas>';
						} else {
							echo '<div class="alert alert-danger">Data tidak ditemukan</div>';
						}
						?>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-12 col-lg-4 mb-4">
            <div class="card" style="border-top: 3px solid #007bff;">
                <div class="card-header">
                    <div class="card-header-start">
                        <h5 class="card-title">Penjualan Terbesar</h5>
                    </div>
                    <div class="card-header-end">
                        <?php
						if (!empty($list_tahun)) {
							echo '<form method="get" action="" class="d-flex">
										' . options(['name' => 'tahun', 'id' => 'tahun-kategori-terjual-detail'], $list_tahun, $tahun) . '
									</form>';
						}
						?>
                    </div>
                </div>
                <div class="card-body">
                    <?php
					if (empty($penjualan)) {
						echo '<div class="alert alert-danger">Data tidak ditemukan</div>';
					} else {
					?>

                    <div class="table-responsive">
                        <table class="table table-border table-hover item">
                            <thead>
                                <tr>
                                    <th colspan="2">Nama Kategori</th>
                                    <th>Nilai</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php
									if (!empty($kategori_terjual)) {
										foreach ($kategori_terjual as $val) {
											echo '<tr>
														<td><span class="text-warning h5"><i class="fas fa-folder"></i></span></td>
														<td>' . $val['nama_kategori'] . '</td>
														<td class="text-end">' . format_number($val['nilai']) . '</td>
													</tr>';
										}
									}
									?>
                            </tbody>
                        </table>
                    </div>
                    <?php
					}
					?>
                </div>
            </div>
        </div>
        <div class="col-md-12 col-lg-4 mb-4">
            <div class="card" style="height:100%; border-top: 3px solid #007bff;">
                <div class="card-header">
                    <div class="card-header-start">
                        <h5 class="card-title">Item Terbaru</h5>
                    </div>
                </div>
                <div class="card-body" style="display:flex">
                    <?php
					if (empty($item_terbaru)) {
						echo '<div class="alert alert-danger">Data tidak ditemukan</div>';
					} else {
					?>

                    <div class="table-responsive">
                        <table class="table table-border table-hover item">
                            <tr>
                                <th colspan="2">Nama Barang</th>
                            </tr>

                            <?php
								// echo '<pre>'; print_r($item_terbaru); die;
								foreach ($item_terbaru as $val) {
									$meta_file = json_decode($val['meta_file'] ?? '', true);
									$filename = $val['nama_file'] ?? '';
									$thumbnail = $meta_file['thumbnail']['small']['filename'] ?? $filename;
									$thumbnail_path = ROOTPATH . 'public/files/uploads/' . $thumbnail;
									if (!$thumbnail || !is_file($thumbnail_path)) {
										$thumbnail = $filename && is_file(ROOTPATH . 'public/files/uploads/' . $filename)
											? $filename
											: null;
									}
									$image_url = $thumbnail
										? base_url() . '/public/files/uploads/' . rawurlencode($thumbnail)
										: base_url() . '/public/images/filepicker_images/file_not_found.png';
									echo '<tr>
										<td><img src="' . esc($image_url) . '" alt="' . esc($val['nama_barang'], 'attr') . '"/></td>
										<td>
											<div style="position:relative" class="d-flex justify-content-between align-items-start">
											<span>' . esc($val['nama_barang']) . '</span><span class="badge rounded-pill bg-primary">' . $val['harga_jual'] . '</span>
												</div>
										</td>
									</tr>';
								}
								?>
                        </table>
                    </div>
                    <?php
					}
					?>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 col-lg-4 mb-4">
            <div class="card" style="border-top: 3px solid #007bff;">
                <div class="card-header">
                    <div class="card-header-start">
                        <h5 class="card-title">Pelanggan Terbesar</h5>
                    </div>
                    <div class="card-header-end">
                        <?php
						if (!empty($list_tahun)) {
							echo '<form method="get" action="" class="d-flex">
										' . options(['name' => 'tahun', 'id' => 'tahun-pelanggan-terbesar'], $list_tahun, $tahun) . '
									</form>';
						}
						?>
                    </div>
                </div>
                <div class="card-body" style="display:flex">
                    <?php
					if (empty($pelanggan_terbesar)) {
						echo '<div class="alert alert-danger w-100">Data tidak ditemukan</div>';
					} else {
					?>
                    <div class="table-responsive">
                        <table class="table table-border table-hover">
                            <thead>
                                <tr>
                                    <th colspan="2">Nama</th>
                                    <th>Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
									if (!empty($pelanggan_terbesar)) {
										foreach ($pelanggan_terbesar as $val) {
											if ($val['foto']) {
												$path = ROOTPATH . '/public/images/foto/' . $val['foto'];
												if (!file_exists($path)) {
													$val['foto'] = 'noimage.png';
												}
											} else {
												$val['foto'] = 'noimage.png';
											}
											echo '<tr>
													<td><img src="' . base_url() . '/public/images/foto/' . $val['foto'] . '"></td>
													<td>' . ($val['nama_customer'] ?: 'Umum') . '</td>
													<td class="text-end">' . format_number($val['total_harga']) . '</td>
												</tr>';
										}
									}
									?>
                            </tbody>
                        </table>
                    </div>
                    <?php
					}
					?>
                </div>
            </div>
        </div>
        <div class="col-md-12 col-lg-8 mb-4">
            <div class="card" style="height:100%; border-top: 3px solid #007bff;">
                <div class="card-header">
                    <div class="card-header-start">
                        <h5 class="card-title">Penjualan Terbaru</h5>
                    </div>
                    <div class="card-header-end">
                        <?php
						if (!empty($list_tahun)) {
							echo '<form method="get" action="" class="d-flex">
										' . options(['name' => 'tahun', 'id' => 'tahun-penjualan-terbaru'], $list_tahun, $tahun) . '
									</form>';
						}
						?>
                    </div>
                </div>
                <div class="card-body" style="display:flex">
                    <?php
					if (empty($penjualan)) {
						echo '<div class="alert alert-danger w-100">Data tidak ditemukan</div>';
					} else {
					?>
                    <div class="table-responsive">
                        <table class="table table-border table-hover" data-export-title="Penjualan Terbaru"
                            id="penjualan-terbaru">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Pembeli</th>
                                    <th>Jml. Item</th>
                                    <th>Nilai</th>
                                    <th>Tanggal Transaksi</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td colspan="6">Loading Data...</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <?php
					}
					?>
                </div>
            </div>
        </div>
    </div>
</div>


<?php
$data_penjualan = [];
$data_total_penjualan = [];
$label_kategori = [];
$jumlah_item_kategori = [];
$jumlah = [];
$nama = [];

if (!empty($penjualan)) {
	foreach ($penjualan as $tahun => $arr) {
		foreach ($arr as $val) {
			$data_penjualan[$tahun][] = $val['total'];
		}
	}

	foreach ($total_penjualan as $tahun => $arr) {
		foreach ($arr as $val) {
			$data_total_penjualan[$tahun] = $val['total'];
		}
	}

	foreach ($item_terjual as $val) {
		$jumlah[] = $val['jml'];
		$nama[] = $val['nama_barang'];
	}

	foreach ($kategori_terjual as $val) {
		$label_kategori[] = $val['nama_kategori'];
		$jumlah_item_kategori[] = $val['jml'];
	}
}
?>

<script type="text/javascript">
let data_penjualan = <?= json_encode($data_penjualan) ?>;
let total_penjualan = <?= json_encode($data_total_penjualan) ?>;
let item_terjual = <?= json_encode($jumlah) ?>;
let item_terjual_label = <?= json_encode($nama) ?>;
let setting_penjualan_tempo = <?= json_encode($setting_piutang) ?>;
let setting_stok = <?= json_encode($setting_stok) ?>;
let stok_barang = <?= !empty($global_stok_barang) ? json_encode(array_values($global_stok_barang)) : '' ?>;
let stok_barang_label =
    <?= !empty($global_stok_barang) ? json_encode(['Barang Dibawah Stok Minimum', 'Barang Diatas Stok Minimum']) : '' ?>;


function dynamicColors() {
    var r = Math.floor(Math.random() * 255);
    var g = Math.floor(Math.random() * 255);
    var b = Math.floor(Math.random() * 255);
    return "rgba(" + r + "," + g + "," + b + ", 0.8)";
}

let label_kategori = '<?= json_encode($label_kategori) ?>';
let jumlah_item_kategori = '<?= json_encode($jumlah_item_kategori) ?>';
</script>