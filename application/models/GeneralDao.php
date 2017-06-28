<?php
/**
* 
*/
class GeneralDao extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
	}
	public function getTables($value='')
	{		
		$result=$this->db->get('Mesa');
		return $result->result();
	}
	public function getEmployees($value='')
	{
		$result=$this->db->get('Empleado');
		return $result->result();
	}
	
}