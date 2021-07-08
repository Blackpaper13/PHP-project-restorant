<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Pelanggan extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		check_ban();
		check_not_login();
		check_admin();
		$this->load->model(['customer_m','user_m']);
	}

	public function index()
	{
		$data['row'] = $this->customer_m->get();
		$this->template->load('template', 'customer/customer_data', $data);
	}

	public function add(){
		$customer = new stdClass();
		$customer->customer_id = null;
		$customer->name = null;
        $customer->gender = null;
		$customer->phone = null;
		$customer->address = null;
		$customer->email = null;
		$customer->status_pesan = null;
		$customer->nomor_meja = null;
		$data = array(
			'page' => 'add',
			'row' => $customer
		);
		$this->template->load('template', 'customer/customer_form', $data);
	}

	public function edit($id){
		$query = $this->customer_m->get($id);
		if($query->num_rows() > 0)
		{
			$customer = $query->row();
			$data = array(
				'page' => 'edit',
				'row' => $customer
			);
			$this->template->load('template', 'customer/customer_form', $data);
		}else{
			echo "<script> alert('Data Tidak ditemukan');";
			echo "window.location='".site_url('customer')."';</script>";
		}
	}

	public function process(){
		$post = $this->input->post(null,TRUE);
		if(isset($_POST['add']))
		{
			$this->customer_m->add($post);
		}else if(isset($_POST['edit']))
		{
			$this->customer_m->edit($post);
		}

		if($this->db->affected_rows() > 0)
			 {
				echo "<script> 
				alert('Data customer berhasil di ditambahkan');</script>";
			}
				 echo "<script>window.location='".site_url('customer')."';</script>";

	}

	public function del($id)
	{
		$this->customer_m->del($id);
		if($this->db->affected_rows() > 0)
			 {
				echo "<script> 
				alert('Data customer berhasil di dihapus');</script>";
			}
				 echo "<script>window.location='".site_url('customer')."';</script>";
	}

	public function cari() 
	{
		$this->load->view('customer/customer_data');
	}
	
	public function hasil()
	{
		$data['cari'] = $this->user_m->cariOrang();
		$this->load->view('customer/customer_result', $data);
	}

	function barcode_qrcode($id){
		$data['row'] = $this->customer_m->get($id)->row();
		$this->template->load('template', 'customer/barcode_qrcode', $data);
	}

	function barcode_print($id)
	{ 
		$data['row'] = $this->customer_m->get($id)->row();
		$html = $this->load->view('customer/barcode_print',$data,true);
		$this->fungsi->PdfGenerator($html,'barcode-'.$data['row']->customer_id,'A4','potrait');

	}

	function qrcode_print($id)
	{ 
		$data['row'] = $this->customer_m->get($id)->row();
		$html = $this->load->view('customer/qrcode_print',$data,true);
		$this->fungsi->PdfGenerator($html,'QrCode-'.$data['row']->customer_id,'A4','potrait');

	}

}
