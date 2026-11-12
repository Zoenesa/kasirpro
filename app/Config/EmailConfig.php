<?php

namespace Config;

class EmailConfig
{

	public $provider = 'Standard';
	// public $provider = 'Google';
	// public $provider = 'AmazonSES';

	public $client = [
		'standard' => [
			'host' => 'mail.cepatonline.com', 'username' => 'admin@cepatonline.com', 'password' => 'pYils}w}dyCo'
		], 'google' => [
			'client_id' => '', 'client_secret' => '', 'refresh_token' => ''
		], 'ses' => [
			'username' => '', 'password' => ''
		]
	];

	// Disesuaikan dengan konfigurasi username
	public $from = 'admin@cepatonline.com';
	public $fromTitle = 'Cepatonline.com';
	public $emailSupport = 'admin@cepatonline.com';
}
