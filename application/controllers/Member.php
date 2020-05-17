<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Member extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		is_login();
		$this->load->model('ProductModel');
		$this->load->model('BookedModel');
	}

	public function index()
	{
		$this->session->set_userdata('dataBooked', sync($this->session->userdata('id')));
		$data['products'] = $this->ProductModel->readAllProducts();
		$data['bases'] = $this->ProductModel->readAllBases();
		$data['merks'] = $this->ProductModel->readAllMerks();
		$this->load->view('homepage', $data);
	}

	public function live_select()
	{
		$base = $this->input->get('base');
		$merk = $this->input->get('merk');
		if ($base != 'All' && $merk != 'All') {
			$data['products'] = $this->ProductModel->liveSelectTwo($base, $merk);
		} else {
			if ($base == 'All' && $merk == 'All') {
				$data['products'] = $this->ProductModel->readAllProducts();
			} else {
				if ($base != 'All')
					$data['products'] = $this->ProductModel->liveSelectOne("product.base = $base");
				else
					$data['products'] = $this->ProductModel->liveSelectOne("product.merk = $merk");
			}
		}
		$this->load->view('templates/product', $data);
	}

	public function booked()
	{
		$bookedData = $this->BookedModel->readAllBooked($this->session->userdata('id'));
		for ($i = 0; $i < count($bookedData); $i++) {
			$bookedData[$i]['deadline'] = date('d M Y H:i', $bookedData[$i]['deadline']);
		}
		$data['booked'] = $bookedData;
		$this->load->view('booked', $data);
	}

	public function book()
	{
		$limit = $this->BookedModel->countBooked($this->session->userdata('id'));
		if ($limit == 3) {
			$this->session->set_flashdata('alert', '<script>
			Swal.fire({
				title: "Max Booking 3!",
				icon: "error",
			})
			</script>');
			redirect('member');
		}
		$data = [
			'id_user' => $this->session->userdata('id'),
			'code' => substr(strtoupper($this->session->userdata('name')), 0, 4) . substr(time(), 4),
			'id_product' => $this->input->get('id'),
			'deadline' => time() + 86400,
		];
		$affectedRows = $this->BookedModel->createBooking($data);

		if ($affectedRows) {
			$dataBooked = $this->session->userdata('dataBooked') + 1;
			$this->session->set_userdata('dataBooked', $dataBooked);
			redirect('member/booked');
		} else {
			redirect('member');
		}
	}
}
