<?php defined('BASEPATH') OR exit('No direct script access allowed');

class meja_m extends CI_Model {

    public function get($id = null) {
        $this->db->select('*');
        $this->db->from('meja');
        if($id != null)
        {
            $this->db->where('meja_id', $id);
        }
        $query = $this->db->get();
        return $query;
    }

    public function add($post)
    {
        $params = [
            'nomor_meja' => $post['nomor_meja']
        ];
        $this->db->insert('meja', $params);
    }

    public function edit($post)
    {
        $params = [
            'nomor_meja' => $post['nomor_meja']
        ];
        $this->db->where('meja_id', $post['id']);
        $this->db->update('meja', $params);
    }

    public function del($id)
	{
		$this->db->where('meja_id', $id);
		$this->db->delete('meja');

	}

    // public function cariOrang()
	// {
	// 	$cari = $this->input->GET('cari', TRUE);
	// 	$data = $this->db->query("SELECT * from meja where name like '%$cari%' OR email like '%$cari%' ");
	// 	return $data->result();
	// }


}