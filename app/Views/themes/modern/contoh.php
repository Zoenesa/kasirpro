<div class="row">
	<div class="card">
		<div class="card-header">
			<div class="card-title">
				<h5 class="card-title">Contoh</h5>
			</div>
		</div>
		<div class="card-body">
			<div class="form-group row mb-3">
				<label class="col-sm-3 col-md-2 col-lg-3 col-xl-2 col-form-label">Tanggal</label>
				<div class="col-sm-3">
					<input class="form-control flatpickr tanggal-invoice flatpickr text-end" type="text" name="tgl_invoice" value="<?= date('d-m-Y') ?>" required="required" />
				</div>
				<div class="col-m-4">
					<button class="btn btn-primary" id="btnTest">Modal</button>
				</div>
			</div>
		</div>
	</div>

</div>

<div class="col-lg-12 col-lg-8 mb-4">
			<div class="card" style="height:100%; border-top: 3px solid #007bff;">
				<div class="card-header">
					<div class="card-header-start">
						<h5 class="card-title">Penjualan Barang Minggu ini</h5>
					</div>
				</div>

				<div class="card-body" style="display:flex">
					<?php
					if (empty($datapenjualan)) {
						echo '<div class="alert alert-danger w-100">penjualan minggu ini tidak ditemukan</div>';
					} else {
					?>
						<div class="table-responsive">
							<table class="table table-border table-striped table-hover" data-export-title="Penjualan Barang Minggu ini" id="tablePenjualan">
								<thead>
									<tr>
										<th class="text-center">Id Barang</th>
										<th class="text-center">Nama Barang</th>
									<?php

									
									$custom_date = strtotime( date('d-m-Y', strtotime('2026-11-16'))); 
									$week_start = date('d-m-Y', strtotime('this week monday', $custom_date));
									
									$tgl = '';
									// echo substr($tanggal, 0, -3).PHP_EOL;
									// print_r($arrtgl);
										for ($i=0; $i < 6; $i++) { 
											$custom_date = strtotime( date('d-m-Y', strtotime('2026-11-16'))); 
											$tgl = date('Y-m-d', strtotime($week_start. ' + '. $i. ' days'));
											echo '<th>'.formatTanggalID($tgl, 'eeee').'</th>';
										}
									?>
										<!-- <th>Senin</th>
										<th>Selasa</th>
										<th>Rabu</th>
										<th>Kamis</th>
										<th>Jumat</th>
										<th>Sabtu</th>
										<th>Kamis</th>
										 -->
									</tr>
								</thead>
								<tbody>
									<?php 
										foreach($datapenjualan as $item => $cl){
											echo '<tr>';
											foreach($cl as $col){
												echo '<td class="text-center">'.$col.'</td>';
											}
											echo '</tr>';
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

<span>
	<?php 
	
	?>
</span>


<script>
	
	$(document).ready(function() {
		$('.flatpickr').flatpickr({
			dateFormat: 'd-M-Y',
			locale: 'id',
			autoclose: true,
			defaultDate: '<?= date('d-m-Y') ?>',
		});
	});
	$(document).undelegate('#btnTest', 'click').delegate('#btnTest', 'click', 
	function() 
	{
		bootbox.dialog({
			message: BootboxContent,
			title: "Reschedule Rule",
			buttons: {
				main: {
					label: "OK",
					className: "btn-primary",
					callback: function() {
						var tglresult = $(document).find('#tgl_modal').val();
						// alert(tglresult);
					}
				}}
			})
		});

		function BootboxContent() {
		var frm_str = '<form id="some-form">'
			+ '<div class="form-group">'
			+ '<label for="date">Date</label>'
			+ '<input id="tgl_modal" class="flatpickr span2 form-control input-sm" size="16" placeholder="dd-mm-yyyy" type="text">'
			+ '</div>'
			+ '</form>';

		var object = $('<div/>').html(frm_str).contents();

		object.find('.flatpickr').flatpickr({
			dateFormat: 'd-M-Y',
			locale: 'id',
			autoclose: true,
			defaultDate: '<?= date('d-m-Y') ?>',
		});
		return object;
}
</script>