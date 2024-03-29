<?php defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		check_ban();
		check_not_login();
		check_admin();
		$this->load->model('user_m');
		$this->load->library('form_validation');
	}

	public function index()
	{
        $data['row'] = $this->user_m->get();
		$this->template->load('template', 'user/user_data', $data);
	}

	public function add()
	{
		
		$this->form_validation->set_rules('fullname', 'Name', 'trim|required|min_length[5]');
		$this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[5]|is_unique[user.username]');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[8]');
		$this->form_validation->set_rules('passconf', 'Password Confirmation', 'trim|required|min_length[8]|matches[password]');
		$this->form_validation->set_rules('address', 'Alamat', 'trim|required');
		$this->form_validation->set_rules('level', 'Position Job', 'required');
		$this->form_validation->set_rules('status_kerja', 'Status Kerja', 'required');

		$this->form_validation->set_message('required', '%s masih kosong, silakan isi');
		$this->form_validation->set_message('is_unique', '%s sudah dipakai, silakan ganti username yang baru');
		$this->form_validation->set_message('min_length', '{field} kurang dari 8, silakan isi');

		$this->form_validation->set_error_delimiters('<span class="help-block">','</span>');

				if ($this->form_validation->run() == FALSE){
					$this->template->load('template', 'user/user_form_add'); 
                }
                else {
                      $post = $this->input->post(null,TRUE);
					  $this->user_m->add($post);
					  if($this->db->affected_rows() > 0)
					  {
							echo "<script> 
							alert('Data User Pekerja berhasil di Tambahkan');</script>";
					  }
					  echo "<script>window.location='".site_url('user')."';</script>";
                }

		
	}

	public function cari() 
	{
		$this->load->view('user/user_data');
	}
	
	public function hasil()
	{
		$data['cari'] = $this->user_m->cariOrang();
		$this->load->view('user/user_result', $data);
	}

	public function del()
	{
		$id = $this->input->post('user_id');
		$this->user_m->del($id);

		if($this->db->affected_rows() > 0)
			 {
				echo "<script> 
				alert('Data User Pekerja berhasil di dihapus');</script>";
			}
				 echo "<script>window.location='".site_url('user')."';</script>";
	}
	

	public function edit($id)
	{
		
		
		$this->form_validation->set_rules('fullname', 'Name', 'trim|required|min_length[5]');
		$this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[5]|callback_username_check');
		if($this->input->post('password'))
		{
			$this->form_validation->set_rules('password', 'Password', 'trim|min_length[8]');
			$this->form_validation->set_rules('passconf', 'Password Confirmation', 'trim|min_length[8]|matches[password]');
		}

		if($this->input->post('passconf'))
		{
			$this->form_validation->set_rules('passconf', 'Password Confirmation', 'trim|min_length[8]|matches[password]');
		}
		
		$this->form_validation->set_rules('address', 'Alamat', 'trim');
		$this->form_validation->set_rules('level', 'Position Job', 'required');
		$this->form_validation->set_rules('status_kerja', 'Status Kerja', 'required');

		$this->form_validation->set_message('required', '%s masih kosong, silakan isi');
		$this->form_validation->set_message('is_unique', '%s sudah dipakai, silakan ganti username yang baru');
		$this->form_validation->set_message('min_length', '{field} kurang dari 8, silakan isi');

		$this->form_validation->set_error_delimiters('<span class="help-block">','</span>');

				if ($this->form_validation->run() == FALSE){
					$query = $this->user_m->get($id);
					if($query->num_rows() > 0)
					{
						$data['row'] = $query->row();
						$this->template->load('template', 'user/user_form_edit', $data); 
					}else{
						echo "<script> 
							alert('Data Tidak ditemukan');";
							echo "window.location='".site_url('user')."';</script>";
					}
					
                }
                else {
                      $post = $this->input->post(null,TRUE);
					  $this->user_m->edit($post);
					  if($this->db->affected_rows() > 0)
					  {
							echo "<script> 
							alert('Data User Pekerja berhasil di edit');</script>";
					  }
					  echo "<script>window.location='".site_url('user')."';</script>";
                }

		
	}
	function username_check(){
		$post = $this->input->post(null, TRUE);
		$query = $this->db->query("SELECT * FROM user WHERE username = '$post[username]' AND user_id != '$post[user_id]'");
		if($query->num_rows() > 0)
		{
			$this->form_validation->set_message('username_check','{field} ini sudah dipakai, silakan diganti');
			return FALSE;
		}else{
			return TRUE;
		}
	}

	/*public function print(){

	}*/

}
