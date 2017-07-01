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
		$this->db->where(array('Activo'=>1));
		$result=$this->db->get('Empleado');
		return $result->result();
	}
	public function getCategories($value='')
	{
		$result=$this->db->get('Categoria');
		return $result->result();
	}
	public function getProducts($value='')
	{
		$this->db->select('p.Nombre,p.Descripcion,p.Precio,p.Comida,p.Bebida,c.Nombre as Categoria,p.idProducto,c.idCategoria');
		$this->db->join('Categoria c','c.idCategoria=p.Categoria','left');
		$result=$this->db->get('Producto p');
		return $result->result();
	}
	public function addCategory($params)
	{
		if ($params["Nombre"]!="") {
			$id=$this->getId('Categoria');
			$params['idCategoria']=$id;
			$result =$this->db->insert('Categoria',$params);
			if ($result==true) {
				return $this->db->insert_id();
			}
			else{
				return false;
			}
		}
	}
	public function getId($table='')
	{
		$query="SELECT `id".$table."` FROM `".$table."` ORDER BY id".$table." DESC LIMIT 1;";	
		$result=$this->db->query($query);
		//echo $this->db->last_query();
		$result=$result->result_array();
		return $result[0]["id".$table]+1;

	}
	public function deleteCategory($idCategoria=0)
	{
		if ($idCategoria!=0) {
			$this->db->where(array('idCategoria'=>$idCategoria));
			return $this->db->delete('Categoria');
		}
	}
	public function updateCategory($params)
	{
		if ($params["idCategoria"]!=0) {
			$this->db->where(array('idCategoria'=>$params["idCategoria"]));
			unset($params["idCategoria"]);
			return $this->db->update('Categoria',$params);
		}
	}
	public function addProduct($params)
	{
		if ($params["Nombre"]!="") {
			$result =$this->db->insert('Producto',$params);
			if ($result==true) {
				return $this->db->insert_id();
			}
			else{
				return false;
			}
		}
	}
	public function deleteProduct($idProducto=0)
	{
		if ($idProducto!=0) {
			$this->db->where(array('idProducto'=>$idProducto));
			return $this->db->delete('Producto');
		}
	}
	public function updateProduct($params)
	{		
		if ($params["idProducto"]!=0) {
			$this->db->where(array('idProducto'=>$params["idProducto"]));
			unset($params["idProducto"]);
			return $this->db->update('Producto',$params);
		}
	}
	public function addEmployee($params)
	{
		if ($params["Nombre"]!="") {
			$result =$this->db->insert('Empleado',$params);
			if ($result==true) {
				return $this->db->insert_id();
			}
			else{
				return false;
			}
		}
	}
	public function deleteEmployee($idEmpleado=0)
	{
		if ($idEmpleado!=0) {
			$this->db->where(array('idEmpleado'=>$idEmpleado));
			return $this->db->delete('Empleado');
		}
	}
	public function updateEmployee($params)
	{		
		if ($params["idEmpleado"]!=0) {
			$this->db->where(array('idEmpleado'=>$params["idEmpleado"]));
			unset($params["idEmpleado"]);
			return $this->db->update('Empleado',$params);
		}
	}
	public function addEmpleado($params)
	{
		if ($params["Nombre"]!="") {
			return $this->db->insert('Empleado',$params);
		}
	}
	public function deleteEmpleado($idEmpleado=0)
	{
		if ($idEmpleado!=0) {
			$this->db->where(array('idEmpleado'=>$idEmpleado));
			return $this->db->update('Empleado',array('Activo'=>0));
		}
	}
	public function updateEmpleado($params)
	{
		if ($params["idEmpleado"]!=0) {
			$this->db->where(array('idProducto'=>$params["idEmpleado"]));
			unset($params["idEmpleado"]);
			return $this->db->update('Empleado',$params);
		}
	}
	public function getDailyReport()
	{
		date_default_timezone_set('America/Mexico_City');
		$result=$this->db->query('SELECT * FROM ticket t join Empleado e ON e.idEmpleado=t.Empleado WHERE t.`Status`=0 AND DATE_FORMAT(t.Fecha,"%d/%m/%y") = DATE_FORMAT("'.date("Y-m-d H:i:s").'","%d/%m/%y");');
		$data=array();
		$result=$result->result();
		foreach ($result as $key => $value) {
			$this->db->select('p.Nombre as Producto, c.Nombre as Categoria, p.Precio as precio_unitario, d.Subtotal, p.Descripcion as DescripcionProducto, c.Descripcion as DescripcionCategoria, d.Cantidad');
			$this->db->join('Producto p','p.idProducto=d.Producto');
			$this->db->join('Categoria c','c.idCategoria=P.Categoria');
			$this->db->where(array('d.Ticket'=>$value->idTicket));
			$detail=$this->db->get('DetalleTicket d');
			$fecha=date_create($value->Fecha);
			$ticket=array('idTicket'=>$value->idTicket,
						  'Mesa'=>$value->Mesa,
						  'Fecha'=>date_format($fecha,'d/m/Y'),
						  'Hora'=>date_format($fecha,'h:m'),
						  'Empleado'=>$value->Nombre." ".$value->ApellidoPaterno." ".$value->ApellidoMaterno,
						  'Total'=>$value->Total,
						  'FormaPago'=>$value->FormaPago,
						  'Detalle'=>$detail->result());
			array_push($data, $ticket);					  
		}
		return $data;
	}
	public function getMonthlyReport()
	{
		date_default_timezone_set('America/Mexico_City');
		$result=$this->db->query('SELECT * FROM ticket t join Empleado e ON e.idEmpleado=t.Empleado WHERE t.`Status`=0 AND DATE_FORMAT(t.Fecha,"%m/%y") = DATE_FORMAT("'.date("Y-m-d H:i:s").'","%m/%y");');
		$data=array();
		$result=$result->result();
		foreach ($result as $key => $value) {
			$this->db->select('p.Nombre as Producto, c.Nombre as Categoria, p.Precio as precio_unitario, d.Subtotal, p.Descripcion as DescripcionProducto, c.Descripcion as DescripcionCategoria, d.Cantidad');
			$this->db->join('Producto p','p.idProducto=d.Producto');
			$this->db->join('Categoria c','c.idCategoria=P.Categoria');
			$this->db->where(array('d.Ticket'=>$value->idTicket));
			$detail=$this->db->get('DetalleTicket d');
			$fecha=date_create($value->Fecha);			
			$ticket=array('idTicket'=>$value->idTicket,
						  'Mesa'=>$value->Mesa,
						  'Fecha'=>date_format($fecha,'d/m/Y'),
						  'Hora'=>date_format($fecha,'h:m'),
						  'Empleado'=>$value->Nombre." ".$value->ApellidoPaterno." ".$value->ApellidoMaterno,
						  'Total'=>$value->Total,
						  'FormaPago'=>$value->FormaPago,
						  'Detalle'=>$detail->result());
			array_push($data, $ticket);					  
		}
		return $data;
	}
	public function getAnnualReport()
	{
		date_default_timezone_set('America/Mexico_City');
		$result=$this->db->query('SELECT * FROM ticket t join Empleado e ON e.idEmpleado=t.Empleado WHERE t.`Status`=0 AND DATE_FORMAT(t.Fecha,"%y") = DATE_FORMAT("'.date("Y-m-d H:i:s").'","%y");');		
		$data=array();
		$result=$result->result();
		foreach ($result as $key => $value) {
			$this->db->select('p.Nombre as Producto, c.Nombre as Categoria, p.Precio as precio_unitario, d.Subtotal, p.Descripcion as DescripcionProducto, c.Descripcion as DescripcionCategoria, d.Cantidad');
			$this->db->join('Producto p','p.idProducto=d.Producto');
			$this->db->join('Categoria c','c.idCategoria=P.Categoria');
			$this->db->where(array('d.Ticket'=>$value->idTicket));
			$detail=$this->db->get('DetalleTicket d');
			$fecha=date_create($value->Fecha);			
			$ticket=array('idTicket'=>$value->idTicket,
						  'Mesa'=>$value->Mesa,
						  'Fecha'=>date_format($fecha,'d/m/Y'),
						  'Hora'=>date_format($fecha,'h:m'),
						  'Empleado'=>$value->Nombre." ".$value->ApellidoPaterno." ".$value->ApellidoMaterno,
						  'Total'=>$value->Total,
						  'FormaPago'=>$value->FormaPago,
						  'Detalle'=>$detail->result());
			array_push($data, $ticket);					  
		}		
		return $data;
	}
	public function getSpecificReport($params)
	{
		date_default_timezone_set('America/Mexico_City');
		$start=date_create($params["start"]);
		$end=date_create($params["end"]);
		$result=$this->db->query('SELECT * FROM ticket t join Empleado e ON e.idEmpleado=t.Empleado WHERE t.`Status`=0 AND DATE_FORMAT(t.Fecha,"%d/%m/%y") <= DATE_FORMAT("'.date_format($start,"Y-m-d H:m:s").'","%d/%m/%y")  AND DATE_FORMAT(t.Fecha,"%d/%m/%y") >= DATE_FORMAT("'.date_format($start,"Y-m-d H:m:s").'","%d/%m/%y");');
		$data=array();
		$result=$result->result();
		foreach ($result as $key => $value) {
			$this->db->select('p.Nombre as Producto, c.Nombre as Categoria, p.Precio as precio_unitario, d.Subtotal, p.Descripcion as DescripcionProducto, c.Descripcion as DescripcionCategoria, d.Cantidad');
			$this->db->join('Producto p','p.idProducto=d.Producto');
			$this->db->join('Categoria c','c.idCategoria=P.Categoria');
			$this->db->where(array('d.Ticket'=>$value->idTicket));
			$detail=$this->db->get('DetalleTicket d');
			$fecha=date_create($value->Fecha);			
			$ticket=array('idTicket'=>$value->idTicket,
						  'Mesa'=>$value->Mesa,
						  'Fecha'=>date_format($fecha,'d/m/Y'),
						  'Hora'=>date_format($fecha,'h:m'),
						  'Empleado'=>$value->Nombre." ".$value->ApellidoPaterno." ".$value->ApellidoMaterno,
						  'Total'=>$value->Total,
						  'FormaPago'=>$value->FormaPago,
						  'Detalle'=>$detail->result());
			array_push($data, $ticket);					  
		}
		return $data;
	}
	
}