<?php defined('BASEPATH') OR exit('No direct script access allowed');

class User_m extends CI_Model {



    public function login($post)
    {
        $this->db->select('*');
        $this->db->from('user');
        $this->db->where('username', $post['username']);
        $this->db->where('password', sha1($post['password']));
        $query = $this->db->get();
        return $query;
        
    }

    public function get($id = null) {
        $this->db->select('*');
        $this->db->from('user');
        if($id != null)
        {
            $this->db->where('user_id', $id);
        }
        $query = $this->db->get();
        return $query;
    }

    public function add($post){
        $params['name'] = $post['fullname'];
        $params['username'] = $post['username'];
        $params['password'] = sha1($post['password']);
        $params['address'] = $post['address'];
        $params['level'] = $post['level'];
        $params['status_kerja'] = $post['status_kerja'];

        $this->db->insert('user', $params);
    }

    public function del($id)
	{
		$this->db->where('user_id', $id);
		$this->db->delete('user');

	}

    public function edit($post){
        $params['name'] = $post['fullname'];
        $params['username'] = $post['username'];
        if(!empty($post['password'])){
            $params['password'] = sha1($post['password']);
        }
        $params['address'] = $post['address'];
        $params['level'] = $post['level'];
        $params['status_kerja'] = $post['status_kerja'];
        $this->db->where('user_id', $post['user_id']);
        $this->db->update('user', $params);
    }

    public function cariOrang()
	{
		$cari = $this->input->GET('cari', TRUE);
		$data = $this->db->query("SELECT name,username,tanggal_masuk,status_kerja from user where name like '%$cari%' ");
		return $data->result();
	}


}

//$query = $this->db->query('SELECT * FROM my_table');