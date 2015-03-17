<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Items extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->output->enable_profiler();
		$this->load->model('Item');
	}

	public function index()
	{
		//if the session total items is not set yet, set it to zero
		if(!$this->session->userdata('total_items'))
		{
			$this->session->set_userdata('total_items', 0);
		}
		//getting all the products from the database
		$array['items'] = $this->Item->get_all();
		$this->load->view('main', $array);
	}

	public function add_item($id)
	{
		//adding the item to our session list and updating the total items counter
		//the session variable should only store the item id number and quantity
		//we do not want to store anything else in session 


		//getting the quantity the user selected from the view page
		$quantity = $this->input->post('quantity');

		//check to see if the session called $id is set 
		//if it is set, we want to add the quantity to the existing session
		if($this->session->userdata($id))
		{
			//save the session $id to a variable
			$old_value = $this->session->userdata($id);
			//set a new variable to equal to the $old value + the $new_value
			$new_value = $old_value + $quantity;
			//reset the session $id with the value of $new_value
			$this->session->set_userdata($id, $new_value);
			//save the total items session as total items
			$total_items = $this->session->userdata('total_items');
			//set the total items session with a value of $total_items + $quantity
			$this->session->set_userdata('total_items', $total_items + $quantity);
		}
		else
		{ 
			//if the session called $id is not set, set the session with the value of quanitity
			$this->session->set_userdata($id, $this->input->post('quantity'));
			//save the total items session as total items
			$total_items = $this->session->userdata('total_items');
			//set the total items session with a value of $total_items + $quantity
			$this->session->set_userdata('total_items', $total_items + $quantity);
		}

		redirect('/');
	}


}

//end of main controller