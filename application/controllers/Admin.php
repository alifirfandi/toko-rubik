<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		is_login();
		is_admin();
		$this->load->model('UserModel');
		$this->load->model('ProductModel');
		$this->load->model('TransactionModel');
		$this->load->model('BookedModel');
		$this->load->model('ContactModel');
	}

	public function index()
	{
		$chart = $this->TransactionModel->readAllTransactions();
		$data['jan'] = 0;
		$data['feb'] = 0;
		$data['mar'] = 0;
		$data['apr'] = 0;
		$data['may'] = 0;
		foreach ($chart as $c) {
			switch (date('m', $c['date'])) {
				case "01":
					$data['jan'] += intval($c['qty']);
					break;
				case "02":
					$data['feb'] += intval($c['qty']);
					break;
				case "03":
					$data['mar'] += intval($c['qty']);
					break;
				case "04":
					$data['apr'] += intval($c['qty']);
					break;
				case "05":
					$data['may'] += intval($c['qty']);
					break;
			}
		}
		$data['rubikSold'] = $this->TransactionModel->rubikSold();
		$data['produkTerakhir'] = $this->ProductModel->readLastProduct();
		$transaksiTerakhir = $this->TransactionModel->readFiveTransactions();
		for ($i = 0; $i < count($transaksiTerakhir); $i++) {
			$transaksiTerakhir[$i]['date'] = date('d/m/Y H:i:s', $transaksiTerakhir[$i]['date']);
		}
		$data['transaksiTerakhir'] = $transaksiTerakhir;
		$this->load->view('dashboard/index', $data);
	}

	// ===========================================================================
	// =============================== Users Section =============================
	// ===========================================================================	

	public function users()
	{
		$data['users'] = $this->UserModel->readAllUsers();
		$this->load->view('dashboard/users', $data);
	}

	public function create_user()
	{
		$this->form_validation->set_rules('username', 'Username', 'is_unique[users.username]', [
            'is_unique' => 'This username already registered!'
        ]);

		if ($this->form_validation->run() == FALSE) {
			$data['roles'] = $this->UserModel->readAllRoles();
			$this->load->view('dashboard/create_user', $data);
		} else {
			if ($this->input->post()) {
				$data = [
					'name' => htmlspecialchars($this->input->post('name', true)),
					'username' => htmlspecialchars($this->input->post('username', true)),
					'password' => password_hash(htmlspecialchars($this->input->post('password')), PASSWORD_DEFAULT),
					'phone' => htmlspecialchars($this->input->post('phone', true)),
					'is_active' => 0,
					'role' => $this->input->post('role'),
				];

				$id = $this->UserModel->createUser($data);

				if ($id) {
					$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Create Account Success! </div>');
					redirect('admin/users');
				} else {
					$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> Create Account Failed! </div>');
					redirect('admin/users');
				}
			}
		}
	}

	public function set_active()
	{
		$id = $this->input->get('id');
		$this->UserModel->setActive($id);
		redirect('admin/users');
	}

	public function set_inactive()
	{
		$id = $this->input->get('id');
		$this->UserModel->setInactive($id);
		redirect('admin/users');
	}

	public function update_user()
	{
		$id = $this->input->get('id');
		$data['roles'] = $this->UserModel->readAllRoles();
		$data['user'] = $this->UserModel->readOneUser($id);
		$this->load->view('dashboard/update_user', $data);

		if ($this->input->post()) {
			$id = $this->input->post('id');
			$data['user'] = $this->UserModel->readOneUser($id);
			$data = [
				'name' => htmlspecialchars($this->input->post('name', true)) ?: $data['user']['name'],
				'username' => htmlspecialchars($this->input->post('username', true)) ?: $data['user']['username'],
				'password' => password_hash(htmlspecialchars($this->input->post('password')), PASSWORD_DEFAULT) ?: $data['user']['password'],
				'phone' => htmlspecialchars($this->input->post('phone', true)) ?: $data['user']['phone'],
				'is_active' => $data['user']['is_active'],
				'role' => $this->input->post('role') ?: $data['user']['role'],
			];

			$id = $this->UserModel->updateUser($id, $data);

			if ($id) {
				$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Update Account Success! </div>');
				if ($this->session->userdata('role') == 1)
					redirect('admin/users');
				else
					redirect('cashier/users');
			} else {
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> Update Account Failed! </div>');
				if ($this->session->userdata('role') == 1)
					redirect('admin/users');
				else
					redirect('cashier/users');
			}
		}
	}

	// ================================================================================
	// ============================= Cashier Section ==================================
	// ================================================================================

	public function cashier()
	{
		$data['products'] = $this->ProductModel->readAllProducts();
		$this->load->view('dashboard/cashier', $data);

		if ($this->input->post()) {
			$idTransaction = "TRX-" . time();
			$cashier = $this->session->userdata('id');
			$date = time();
			$query = '';

			if (isset($this->input->post()['id'])) {
				for ($i = 0; $i < count($this->input->post()['id']); $i++) {
					$id[$i] = $this->input->post()['id'][$i];
				}
				for ($i = 0; $i < count($this->input->post()['qty']); $i++) {
					$qty[$i] = $this->input->post()['qty'][$i];
				}
				for ($i = 0; $i < count($this->input->post()['id']); $i++) {
					if ($i == count($this->input->post()['id']) - 1)
						$query .= "('$idTransaction', $id[$i], $qty[$i], $cashier, $date)";
					else
						$query .= "('$idTransaction', $id[$i], $qty[$i], $cashier, $date),";
				}
			} else {
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> Transaction Failed! </div>');
				redirect('admin/cashier');
			}
			$this->TransactionModel->insertTransaction($query);

			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Transaction Success! </div>');
			redirect('admin/cashier');
		}
	}

	public function live_search()
	{
		$search = $this->input->get('search');
		$data['products'] = $this->ProductModel->liveSearch($search);
		$this->load->view('dashboard/templates/product', $data);
	}

	public function search_booked()
	{
		$search = strtoupper($this->input->get('search'));
		$data['product'] = $this->BookedModel->searchBooked($search);
		if (isset($data['product'])) {
			$data['product']['deadline'] = date('d/m/Y H:i:s', $data['product']['deadline']);
		}
		$this->load->view('dashboard/templates/searchBooked', $data);
	}

	public function accept_booking()
	{
		$id = $this->input->get('id');
		$data = [
			'id' => "TRX-" . time(),
			'id_product' => $this->input->get('product'),
			'qty' => 1,
			'cashier' => $this->session->userdata('id'),
			'date' => time(),
		];
		$this->BookedModel->deleteBooking($id);
		$affectedRows = $this->TransactionModel->insertBooking($data);
		if ($affectedRows) {
			redirect('admin/cashier');
		}
	}

	// ================================================================================
	// =========================== Transactions Section ===============================
	// ================================================================================

	public function transactions()
	{
		$data['transactions'] = $this->TransactionModel->readAllTransactions();
		for ($i = count($data['transactions']) - 1; $i >= 0; $i--) {
			$data['transactions'][$i]['date'] = date('d/m/Y H:i:s', $data['transactions'][$i]['date']);
		}
		$this->load->view('dashboard/transactions', $data);
	}

	// ================================================================================
	// ============================= Product Section ==================================
	// ================================================================================

	public function products()
	{
		$data['products'] = $this->ProductModel->readAllProducts();
		$this->load->view('dashboard/products', $data);
	}

	public function create_product()
	{
		$data['bases'] = $this->ProductModel->readAllBases();
		$data['merks'] = $this->ProductModel->readAllMerks();
		$this->load->view('dashboard/create_product', $data);

		if ($this->input->post()) {
			$upload_image = $_FILES['image']['name'];
			if ($upload_image) {
				$config['allowed_types'] = 'gif|jpg|png';
				$config['max_size']      = '10240';
				$config['upload_path'] = './assets/img/rubik';
				$config['file_name'] = time() . '_' . str_replace(" ", "-", strtolower($upload_image));

				$this->load->library('upload', $config);

				if ($this->upload->do_upload('image')) {
					$image = $this->upload->data('file_name');
				} else {
					echo $this->upload->display_errors();
				}
			}

			$data = [
				'name' 	=> $this->input->post('name', true),
				'price' => $this->input->post('price', true),
				'stok' 	=> $this->input->post('stok', true),
				'base' 	=> $this->input->post('base', true),
				'merk' 	=> $this->input->post('merk', true),
				'img'	=> $image,
			];

			$success = $this->ProductModel->createProduct($data);

			if ($success) {
				$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Create Product Success! </div>');
				redirect('admin/products');
			} else {
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> Create Product Failed! </div>');
				redirect('admin/products');
			}
		}
	}
	public function update_product()
	{
		$id = $this->input->get('id');
		$data['product'] = $this->ProductModel->readOneProduct($id);
		$data['bases'] = $this->ProductModel->readAllBases();
		$data['merks'] = $this->ProductModel->readAllMerks();
		$this->load->view('dashboard/update_product', $data);

		if ($this->input->post()) {
			$id = $this->input->post('id');
			$product = $this->ProductModel->readOneProduct($id);
			$image = '';

			$upload_image = $_FILES['image']['name'];
			if ($upload_image) {
				$config['allowed_types'] = 'gif|jpg|png';
				$config['max_size']      = '10240';
				$config['upload_path'] = './assets/img/rubik';
				$config['file_name'] = time() . '_' . str_replace(" ", "-", strtolower($upload_image));

				$this->load->library('upload', $config);

				if ($this->upload->do_upload('image')) {
					$old_image = $product['img'];
					if ($old_image != 'default.jpg') {
						unlink(FCPATH . 'assets/img/rubik/' . $old_image);
					}
					$image = $this->upload->data('file_name');
				} else {
					echo $this->upload->display_errors();
				}
			}

			$data = [
				'name' 	=> $this->input->post('name', true) ?: $product['name'],
				'price' => $this->input->post('price', true) ?: $product['price'],
				'stok' 	=> $this->input->post('stok', true) ?: $product['stok'],
				'base' 	=> $this->input->post('base', true) ?: $product['base'],
				'merk' 	=> $this->input->post('merk', true) ?: $product['merk'],
				'img'	=> $image != '' ? $image : $product['img'],
			];

			$success = $this->ProductModel->updateProduct($id, $data);

			if ($success) {
				$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Update Product Success! </div>');
				redirect('admin/products');
			} else {
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> Update Product Failed! </div>');
				redirect('admin/products');
			}
		}
	}

	// ===================================================================================
	// ============================= References Section ==================================
	// ===================================================================================

	public function references()
	{
		$data['bases'] = $this->ProductModel->readAllBases();
		$data['merks'] = $this->ProductModel->readAllMerks();
		$this->load->view('dashboard/references', $data);
	}

	public function create_reference()
	{
		$key = "rubik_" . $this->input->post('key');
		$data = [
			$this->input->post('key') => $this->input->post('value'),
		];

		$this->ProductModel->createReference($key, $data);
	}

	public function update_reference()
	{
		$id = $this->input->post('id');
		$key = "rubik_" . $this->input->post('key');
		$data = [
			$this->input->post('key') => $this->input->post('value'),
		];

		$this->ProductModel->updateReference($id, $key, $data);
	}

	// ===================================================================================
	// ================================ Inbox Section ====================================
	// ===================================================================================

	public function inbox()
	{
		$data['inboxes'] = $this->ContactModel->readAllMessage();
		$this->load->view('dashboard/inbox', $data);
	}

	public function delete_inbox()
	{
		$id = $this->input->get('id');
		$affectedRows = $this->ContactModel->deleteMessage($id);

		if ($affectedRows) {
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Delete Message Success! </div>');
			redirect('admin/inbox');
		} else {
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> Delete Message Failed! </div>');
			redirect('admin/inbox');
		}
	}

	public function delete_all()
	{
		$this->ContactModel->deleteAllMessage();
		redirect('admin/inbox');
	}
}
