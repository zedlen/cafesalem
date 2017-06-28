<?php
/**
* 
*/
class TicketDao extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
	}
	public function getOpenTicket($table_id=0)
	{		
		if ($table_id!=0) {
			$this->db->where(array('Mesa'=>$table_id,'Status'=>1));			
			$result=$this->db->get('Ticket');
			$result=$result->result();
			if ($result!=null) {
				$this->db->where(array('Ticket'=>$result[0]->idTicket));
				$this->db->join('Producto p','p.idProducto=d.Producto');			
				$data=$this->db->get('DetalleTicket d');
				$data=$data->result();			
			}
			else{
				$this->createNewTicket($table_id);
				$this->db->where(array('Mesa'=>$table_id,'Status'=>1));			
				$result=$this->db->get('Ticket');
				$result=$result->result();
				$data=array();
			}
			$response=array('idTicket'=>$result[0]->idTicket,
							'Mesa'=>$result[0]->Mesa,
							'Cliente'=>$result[0]->Cliente,
							'Fecha'=>$result[0]->Fecha,
							'Total'=>$result[0]->Total,
							'Detalle'=>$data);
			return $response;
		}
		else{
			return null;
		}
	}
	public function createNewTicket($table_id=0)
	{		
		date_default_timezone_set('America/Mexico_City');
		if ($table_id!=0) {
			$data = array('Fecha' =>date("Y-m-d H:i:s") ,'Cliente'=>1,'Mesa'=>$table_id,'Status'=>1 );
			return $this->db->insert('Ticket',$data);
		}
		return false;
	}
	public function addTicketDetail($table_id=0,$cant,$producto,$prize)
    {
    	if ($table_id!=0) {
    		$ticket=$this->getOpenTicket($table_id);
    		return $this->db->insert('DetalleTicket',array('Ticket'=>$ticket["idTicket"],'Producto'=>$producto,'Cantidad'=>$cant,'Subtotal'=>$prize));
    	}
    	else{
    		return false;
    	}
    }
    public function closeTicket($table_id=0,$empleado,$total,$formaPago)
   	{
    	if ($table_id!=0) {
    		$this->db->where(array('Mesa'=>$table_id,'Status'=>1));
    		return $this->db->update('Ticket',array('Status'=>0,'Empleado'=>$empleado,'Total'=>$total,'FormaPago'=>$formaPago));
    	} else {
    		return false;
    	}
    	
    }	
    public function addTicketDetail($table_id=0,$producto,$total,$cant)
    {
    	if ($table_id!=0) {
    		$ticket=$this->getOpenTicket($table_id);
    		$this->db->where(array('Ticket'=>$ticket["idTicket"],'Producto'=>$producto));
    		return $this->db->update('DetalleTicket',array('Cantidad'=>$cant,'Subtotal'=>$total));
    	}
    	else{
    		return false;
    	}
    }
}