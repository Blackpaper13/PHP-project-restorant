<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Meja extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		check_ban();
		check_not_login();
		check_admin();
		$this->load->model(['meja_m','user_m']);
	}

	public function index()
	{
		$data['row'] = $this->meja_m->get();
		$this->template->load('template', 'meja/meja_data', $data);
	}

	public function add(){
		$meja = new stdClass();
		$meja->meja_id = null;
		$meja->nomor_meja = null;
		$data = array(
			'page' => 'add',
			'row' => $meja
		);
		$this->template->load('template', 'meja/meja_form', $data);
	}

	public function edit($id){
		$query = $this->meja_m->get($id);
		if($query->num_rows() > 0)
		{
			$meja = $query->row();
			$data = array(
				'page' => 'edit',
				'row' => $meja
			);
			$this->template->load('template', 'meja/meja_form', $data);
		}else{
			echo "<script> alert('Data Tidak ditemukan');";
			echo "window.location='".site_url('meja')."';</script>";
		}
	}

	public function process(){
		$post = $this->input->post(null,TRUE);
		if(isset($_POST['add']))
		{
			$this->meja_m->add($post);
		}else if(isset($_POST['edit']))
		{
			$this->meja_m->edit($post);
		}

		if($this->db->affected_rows() > 0)
			 {
				echo "<script> 
				alert('Data meja berhasil di ditambahkan');</script>";
			}
				 echo "<script>window.location='".site_url('meja')."';</script>";

	}

	public function del($id)
	{
		$this->meja_m->del($id);
		if($this->db->affected_rows() > 0)
			 {
				echo "<script> 
				alert('Data meja berhasil di dihapus');</script>";
			}
				 echo "<script>window.location='".site_url('meja')."';</script>";
	}

	public function cari() 
	{
		$this->load->view('meja/meja_data');
	}
	
	public function hasil()
	{
		$data['cari'] = $this->user_m->cariOrang();
		$this->load->view('meja/meja_result', $data);
	}

	function barcode_qrcode($id){
		$data['row'] = $this->meja_m->get($id)->row();
		$this->template->load('template', 'meja/barcode_qrcode', $data);
	}

	function barcode_print($id)
	{ 
		$data['row'] = $this->meja_m->get($id)->row();
		$html = $this->load->view('meja/barcode_print',$data,true);
		$this->fungsi->PdfGenerator($html,'barcode-'.$data['row']->meja_id,'A4','potrait');

	}

	function qrcode_print($id)
	{ 
		$data['row'] = $this->meja_m->get($id)->row();
		$html = $this->load->view('meja/qrcode_print',$data,true);
		$this->fungsi->PdfGenerator($html,'QrCode-'.$data['row']->meja_id,'A4','potrait');

	}

}
