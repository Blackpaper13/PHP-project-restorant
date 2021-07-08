<?php defined('BASEPATH') OR exit('No direct script access allowed');

class item extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		check_ban();
		check_not_login();
		check_admin();
		$this->load->model(['item_m', 'category_m', 'unit_m']);
	}


	public function index()
	{
		$data['row'] = $this->item_m->get();
		$this->template->load('template', 'product/item/item_data', $data);
	}

	public function add(){
		$item = new stdClass();
		$item->item_id = null;
		$item->barcode = null;
        $item->name = null;
        $item->price = null;

		$query_category = $this->category_m->get();

		$query_unit = $this->unit_m->get();
		$unit[null] = '-Pilih-';
		foreach($query_unit->result() as $unt){
			$unit[$unt->unit_id] = $unt->name;
		}
		$data = array(
			'page' => 'add',
			'row' => $item,
			'category' => $query_category,
			'unit' => $unit, 'selected_unit' => null,
		);
		$this->template->load('template', 'product/item/item_form', $data);
	}

	public function edit($id){
		$query = $this->item_m->get($id);
		if($query->num_rows() > 0)
		{
			$item = $query->row();
			$query_category = $this->category_m->get();

				$query_unit = $this->unit_m->get();
				$unit[null] = '-Pilih-';
				foreach($query_unit->result() as $unt){
					$unit[$unt->unit_id] = $unt->name;
				}
			$data = array(
				'page' => 'edit',
				'row' => $item,
				'category' => $query_category,
				'unit' => $unit, 'selected_unit' => $item->unit_id,
			);
			$this->template->load('template', 'product/item/item_form', $data);
		}else{
			echo "<script> alert('Data Tidak ditemukan');";
			echo "window.location='".site_url('item')."';</script>";
		}
	}

	public function process(){
				$config['upload_path']    = './uploads/product/';
                $config['allowed_types']  = 'gif|jpg|png|pdf|jpeg';
                $config['max_size']       = 2048;
				$config['file_name']      = 'item-'.date('ymd'). '-' .substr(md5(rand()),0,10);
				$this->load->library('upload', $config);


		$post = $this->input->post(null,TRUE);
		if(isset($_POST['add']))
		{
			if($this->item_m->check_barcode($post['barcode'])->num_rows() > 0){
				$this->session->set_flashdata('error', "barcode $post[barcode] sudah dipakai. silakan yang lain");
				redirect('item/add');
			}else{
				if(@$_FILES['image']['name'] != null){
					if($this->upload->do_upload('image')){
						$post['image'] = $this->upload->data('file_name');
						$this->item_m->add($post);
						if($this->db->affected_rows() > 0)
							{
								$this->session->set_flashdata('success', 'Data Berhasil disimpan');
							}
				 		redirect('item');
					}else{
						$error = $this->upload->display_error();
						$this->session->set_flashdata('error', $error);
						redirect('item/add');
					}
				}else{
					$post['image'] = null;
					$this->item_m->add($post);
					if($this->db->affected_rows() > 0)
						{
							$this->session->set_flashdata('success', 'Data Berhasil disimpan');
						}
					 redirect('item');
				}	
			}
			
		}else if(isset($_POST['edit']))
		{if($this->item_m->check_barcode($post['barcode'], $post['id'])->num_rows() > 0){
			$this->session->set_flashdata('error', "barcode $post[barcode] sudah dipakai. silakan yang lain");
			redirect('item/edit/' .$post['id']);
		}else{
			if(@$_FILES['image']['name'] != null){
					if($this->upload->do_upload('image')){
						$item = $this->item_m->get($post['id'])->row();
						if($item->image != null){
							$target_file = './uploads/product/'.$item->image;
							unlink($target_file);
						}
						$post['image'] = $this->upload->data('file_name');
						$this->item_m->edit($post);
						if($this->db->affected_rows() > 0)
							{
								$this->session->set_flashdata('success', 'Data Berhasil disimpan');
							}
				 		redirect('item');
					}else{
						$error = $this->upload->display_error();
						$this->session->set_flashdata('error', $error);
						redirect('item/add');
					}
				}else{
					$post['image'] = null;
					$this->item_m->edit($post);
					if($this->db->affected_rows() > 0)
						{
							$this->session->set_flashdata('success', 'Data Berhasil disimpan');
						}
					 redirect('item');
				}
			
			}
		}

		

	}

	public function del($id)
	{
		$item = $this->item_m->get($id)->row();
			if($item->image != null){
				$target_file = './uploads/product/'.$item->image;
				unlink($target_file);
			}
		$this->item_m->del($id);
		if($this->db->affected_rows() > 0)
			 {
				$this->session->set_flashdata('success', 'Data Berhasil dihapus');
			}
            redirect('item');
	}

	function barcode_qrcode($id)
	{
		$data['row'] = $this->item_m->get($id)->row();
		$this->template->load('template', 'product/item/barcode_qrcode', $data);

	}

	function coba_qrcode()
	{
		$result = Endroid\QrCode\Builder\Builder::create()
			->writer(new Endroid\QrCode\Writer\PngWriter())
			->writerOptions([])
			->data('Custom QR code contents')
			->encoding(new Endroid\QrCode\Encoding\Encoding('UTF-8'))
			->errorCorrectionLevel(new Endroid\QrCode\ErrorCorrectionLevel\ErrorCorrectionLevelHigh())
			->size(300)
			->margin(10)
			->roundBlockSizeMode(new Endroid\QrCode\RoundBlockSizeMode\RoundBlockSizeModeMargin())
			->labelText('This is the label')
			->labelFont(new Endroid\QrCode\Label\Font\NotoSans(20))
			->labelAlignment(new Endroid\QrCode\Label\Alignment\LabelAlignmentCenter())
			->build();

				// Directly output the QR code
			header('Content-Type: '.$result->getMimeType());
			echo $result->getString();
	}

	
}
