<?php defined('BASEPATH') OR exit('No direct script access allowed');

class sale_m extends CI_Model {

    public function invoice_no() {
        $sql = "SELECT MAX(MID(invoice,9,5)) AS invoice_no 
                FROM t_sale 
                WHERE MID(invoice,4,7) = DATE_FORMAT(CURDATE(),'%d%m%y')";
        $query = $this->db->query($sql);
        if($query->num_rows() > 0){
            $row = $query->row();
            $n = ((int)$row->invoice_no) + 1;
            $no = sprintf("%'.04d", $n);
        }else{
            $no = "0001";
        }
        $invoice = "AKB-".date('dmy').$no;
        return $invoice;
    }
}