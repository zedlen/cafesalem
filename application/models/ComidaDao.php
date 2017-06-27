<?php
/**
* 
*/
class ComidaDao extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
	}
	public function getAllFood($value='')
	{
		$names = array(8,9,10,11,12);
		$this->db->where_in('Categoria', $names);
		$result=$this->db->get('Producto');
		return $result->result();
	}
	public function getAllFoodCategories($value='')
	{
		$names = array(8,9,10,11,12);
		$this->db->where_in('idCategoria', $names);
		$result=$this->db->get('Categoria');
		return $result->result();
	}
}