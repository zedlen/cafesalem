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
		$this->db->where(array('Bebida'=>1));
		$this->db->order_by('Nombre');
		$result=$this->db->get('Producto');
		return $result->result();
	}
	public function getAllDrinksCategories($value='')
	{		
		$this->db->select('c.Nombre,c.idCategoria');
		$this->db->where(array('p.Bebida'=>1));
		$this->db->join('Producto p','p.Categoria=c.idCategoria');
		$this->db->group_by('c.idCategoria');
		$result=$this->db->get('Categoria c');
		return $result->result();
	}
}