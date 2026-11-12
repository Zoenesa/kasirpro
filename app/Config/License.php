<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;

class License extends BaseConfig
{
	public $apiBaseUrl;
	public $environment;

	public function __construct()
	{
		parent::__construct();
		$this->apiBaseUrl = env('LICENSE_API_BASE_URL', 'https://wioos.com/api');
		$this->environment = env('LICENSE_ENVIRONMENT', 'production');
	}
}