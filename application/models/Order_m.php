<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Order_m extends CI_Model {

    public function get($id = null) {
        $this->db->select('*');
        $this->db->from('t_order');
        if($id != null)
        {
            $this->db->where('customer_id', $id);
        }
        $query = $this->db->get();
        return $query;
    }


    public function edit($post)
    {
        $params = [
            'name_pesanan' => $post['nama_pesanan'],
            'jumlah_pesanan' => $post['jumlah_pesanan'],
            'status' => $post['status'],
            
        ];
        $this->db->where('customer_id', $post['customer_id']);
        $this->db->update('t_order', $params);
    }

    public function update($data,$where)
    {
        $this->db->where($where)
                 ->update($data);
                 return TRUE;
    }
    


}