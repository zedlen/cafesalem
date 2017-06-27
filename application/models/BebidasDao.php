<?php
/**
* 
*/
class BebidasDao extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
	}
	public function getAllDrinks($value='')
	{
		$names = array(1,2,3,4,6,7,14);
		$this->db->where_in('Categoria', $names);
		$result=$this->db->get('Producto');
		return $result->result();
	}
	public function getAllDrinksCategories($value='')
	{
		$names = array(1,2,3,4,6,7,14);
		$this->db->where_in('idCategoria', $names);
		$result=$this->db->get('Categoria');
		return $result->result();
	}
}