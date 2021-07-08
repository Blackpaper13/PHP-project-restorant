<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Order extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		//check_ban();
		check_not_login();
		check_admin();
		$this->load->model(['order_m','customer_m']);
	}

	public function index()
	{
		$data['row'] = $this->order_m->get();
		$this->template->load('template', 'order/order_data', $data);
	}

	public function edit($id)
	{
		$data['row'] = $this->order_m->get($id);
		$data['get_id'] = $id;
		$this->template->load('template', 'order/order_form', $data);
	}

	public function approval($id)
	{
		$a = $this->input->post('[]');
		$b = $this->input->post('status[]');

		$i = 1;
		foreach ($b as $status)
		{
			if(!empty($status))
			{
				$where = [
					'customer_id' =>$customer_id,
				];
				$data = ['status'=>$status];
				$this->order_m->update($where,$data);
				$i++;
			}
		}
		redirect('order');
	}
	
    
}
