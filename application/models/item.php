<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Item extends CI_Model {
     
	function get_all()
	{
		return $this->db->query("SELECT * FROM products")->result_array();
	}

	function get_item($id)
	{
		return $this->db->query("SELECT * FROM products WHERE id = ?", $id)->row_array();
	}

}
