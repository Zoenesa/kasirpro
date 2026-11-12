
<div class="card">
	<div class="card-header">
		<div class="card-title">
			<h5 class="card-title">Contoh</h5>
		</div>
	</div>
	<div class="card-body">
		<div class="form-group row mb-3">
			<label class="col-sm-3 col-md-2 col-lg-3 col-xl-2 col-form-label">Tanggal</label>
			<div class="col-sm-6">
				<input class="form-control flatpickr tanggal-invoice flatpickr text-end" type="text" name="tgl_invoice" value="<?= date('d-m-Y') ?>" required="required" />
			</div>
			<div class="col-m-3">
				<button class="btn btn-primary" id="btnTest">Simpan</button>
			</div>
		</div>
	</div>
</div>


<form action="" method="post" class="form-horizontal" id="form-penjualan">
	<div class="row-mb-3">

	</div>
</form>

<script>
	$(document).undelegate('#btnTest', 'click').delegate('#btnTest', 'click', function() {
		bootbox.dialog({
			title: 'Test',
			message: 'Tanggal : ' + $('.tanggal-invoice').val(),
			buttons: {
				ok: {
					label: 'OK',
					className: 'btn-primary'
				}
			}
		});

	});
	$(function() {
		$('.flatpickr').flatpickr({
			enableTime: false,
			dateFormat: "d-m-Y",
			defaultDate: "today"
		});
	});
	</script>