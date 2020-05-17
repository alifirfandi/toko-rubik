<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cashier extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		is_login();
		is_admin();
		$this->load->model('UserModel');
		$this->load->model('ProductModel');
		$this->load->model('TransactionModel');
	}

	public function users()
	{
		$data['users'] = $this->UserModel->readAllForCashier();
		$this->load->view('dashboard/users', $data);
	}
}
