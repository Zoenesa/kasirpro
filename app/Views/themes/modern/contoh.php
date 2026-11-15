
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