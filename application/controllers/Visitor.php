<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Visitor extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('ProductModel');
		$this->load->model('ContactModel');
	}

	public function index()
	{
		$data['bases'] = $this->ProductModel->readAllBases();
		$data['merks'] = $this->ProductModel->readAllMerks();
		$data['products'] = $this->ProductModel->readAllProducts();
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
	
	public function contact()
	{
		$this->load->view('contact');

		if ($this->input->post()) {
			$name = $this->input->post('firstName', true) . ' ' . $this->input->post('lastName', true);
			$subject = $this->input->post('subject', true);
			$message = $this->input->post('message', true);

			$data = [
				'name' => $name,
				'subject' => $subject,
				'message' => $message
			];

			$id = $this->ContactModel->sendMessage($data);

			if ($id) {
				$this->session->set_flashdata(
					'alert',
					'<script>
					Swal.fire({
						title: "Message Sent!",
						icon: "success",
					})
				</script>'
				);
				redirect('contact');
			}
		}
	}
}
