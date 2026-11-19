<?php
namespace App\Models;

class LteModel extends \App\Models\BaseModel
{
    public function __construct() {
		parent::__construct();
	}

    public function getOrderName() {
        return 'Penjualan Barang';}
}