<?php
namespace App\Controllers;

use App\Models\PenjualanModel;

Class Contoh extends \App\Controllers\BaseController
{
    public function __construct()
    {
        parent::__construct();
        $this->model = new PenjualanModel;
        
		$this->data['site_title'] = 'Development Web Page';
		$this->data['datapenjualan'] = '';
		$this->data['colWeek'] = '';
		$this->addStyle($this->config->baseURL . 'public/vendors/flatpickr/dist/flatpickr.min.css');
		$this->addJs($this->config->baseURL . 'public/vendors/flatpickr/dist/flatpickr.js');
		$this->addJs($this->config->baseURL . 'public/vendors/flatpickr/dist/l10n/id.js');

		$this->addJs($this->config->baseURL . 'public/vendors/bootstrap-datepicker/css/bootstrap-datepicker.css');
		$this->addJs($this->config->baseURL . 'public/vendors/bootstrap-datepicker/js/bootstrap-datepicker.js');

		$this->addJs($this->config->baseURL . 'public/vendors/jwdmodal/jwdmodal.js');
		$this->addStyle($this->config->baseURL . 'public/vendors/jwdmodal/jwdmodal.css');
		$this->addStyle($this->config->baseURL . 'public/vendors/jwdmodal/jwdmodal-loader.css');
		$this->addStyle($this->config->baseURL . 'public/vendors/jwdmodal/jwdmodal-fapicker.css');

		$this->addJs($this->config->baseURL . 'public/themes/modern/js/penjualan.js');
		$this->addStyle($this->config->baseURL . 'public/themes/modern/css/modal-pilih-barang.css');

		$this->addJs($this->config->baseURL . 'public/vendors/jquery.select2/js/select2.full.min.js');
		$this->addStyle($this->config->baseURL . 'public/vendors/jquery.select2/css/select2.min.css');
		$this->addStyle($this->config->baseURL . 'public/vendors/jquery.select2/bootstrap-5-theme/select2-bootstrap-5-theme.min.css');
		$this->addJs($this->config->baseURL . 'public/vendors/filesaver/FileSaver.js');


		$this->addJs($this->config->baseURL . 'public/themes/modern/js/wilayah.js');
		$this->data['setting_kasir'] = $this->getSetting('kasir');
    }

    public function index()
    {
        $this->hasPermissionPrefix('read');
		$this->data['datapenjualan'] = $this->model->getPenjualanMingguIni();
		$this->data['colWeek'] = $this->model->getTanggalMingguIni();
        $this->view('contoh', $this->data);
    }


}
