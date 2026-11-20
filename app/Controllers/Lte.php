<?php
namespace App\Controllers;

use App\Models\LteModel;

Class Lte extends BaseController
{   

	public function __construct()
	{
		parent::__construct();
		$this->model = new LteModel();
		$this->data['title'] = 'Dasbor';
		$this->data['Order'] = $this->model->getOrderName();
	}

    public function index()
    {
		$this->hasPermission('read');		
		echo view('themes/lte/lte_header', $this->data);
		echo view('themes/lte/dasbor', $this->data);
		echo view('themes/lte/lte_footer');
    }
}
