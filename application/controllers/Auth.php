<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function login()
	{
		check_already_login();
		check_ban();
		$this->load->view('login');
	}

	public function process()
	{
		$post = $this->input->post(null, TRUE);
		if(isset($post['login'])){
			$this->load->model('user_m');
			$query = $this->user_m->login($post);
			if($query->num_rows() > 0)
			{
				$row = $query->row();
				$params = array(
					'userid' => $row->user_id,
					'level' => $row->level
				);
				if($row->status_kerja == 1){
					echo "<script>
				alert('Maaf Anda telah diban dari Admin.  ke login dulu ya');
				window.location='".site_url('auth/login')."';
				</script>";
				}else{
				$this->session->set_userdata($params);
				echo "<script>
				alert('selamat, login berhasil');
				window.location='".site_url('dashboard')."';
				</script>";
				}
			}else{
				echo "<script>
				alert('maaf, username/password anda salah.  ke login dulu ya');
				window.location='".site_url('auth/login')."';
				</script>";
			}
		}

	}

	public function logout()
	{
		$params = array('userid', 'level');
		$this->session->unset_userdata($params);
		redirect('auth/login');
	}

	
}
