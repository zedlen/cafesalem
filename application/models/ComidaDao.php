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
		$this->db->where(array('Comida'=>1));
		$this->db->order_by('Nombre');
		$result=$this->db->get('Producto');
		return $result->result();
	}
	public function getAllFoodCategories($value='')
	{
		$this->db->select('c.Nombre,c.idCategoria');
		$this->db->where(array('p.Comida'=>1));
		$this->db->join('Producto p','p.Categoria=c.idCategoria');
		$this->db->group_by('c.idCategoria');
		$result=$this->db->get('Categoria c');
		return $result->result();
	}
}