<?php

defined('BASEPATH') OR exit('No direct script access allowed');

// This can be removed if you use __autoload() in config.php OR use Modular Extensions
/** @noinspection PhpIncludeInspection */
require APPPATH . 'libraries/REST_Controller.php';

/**
 * This is an example of a few basic user interaction methods you could use
 * all done with a hardcoded array
 *
 * @package         CodeIgniter
 * @subpackage      Rest Server
 * @category        Controller
 * @author          Phil Sturgeon, Chris Kacerguis
 * @license         MIT
 * @link            https://github.com/chriskacerguis/codeigniter-restserver
 */
class Ticket extends REST_Controller {

    function __construct()
    {
        // Construct the parent class
        parent::__construct();

        $this->load->model("TicketDao","dao");
    }

    public function getOpenTicketForTable_get()
    {
        $table_id=$this->input->get('table_id');
        $result=$this->dao->getOpenTicket($table_id);
        if ($result!=null) {
            $answer = array('status' => TRUE,'ticket'=>$result );
            $this->response($answer, REST_Controller::HTTP_OK);
        } else {
            $this->response([
                    'status' => false,
                    'message' => 'No data were found'
                ], REST_Controller::HTTP_OK);
        }
    }
    public function createNewTicket_get()
    {
        $table_id=$this->input->get('table_id');
        $result=$this->dao->createNewTicket($table_id);
         if ($result!=false) {
            $answer = array('status' => TRUE);
            $this->response($answer, REST_Controller::HTTP_OK);
        } else {
            $this->response(['status' => false], REST_Controller::HTTP_OK);
        }
    }
    public function addTicketDetail_get()
    {
        $table_id=$this->input->get('table_id');
        $cant=$this->input->get('cant');
        $producto=$this->input->get('producto');
        $prize=$this->input->get('prize');
        $result=$this->dao->addTicketDetail($table_id,$cant,$producto,$prize);
         if ($result!=false) {
            $answer = array('status' => TRUE);
            $this->response($answer, REST_Controller::HTTP_OK);
        } else {
            $this->response(['status' => false], REST_Controller::HTTP_OK);
        }
    }
    public function closeTicket_get()
    {
        $table_id=$this->input->get('table_id');
        $empleado=$this->input->get('empleado');
        $total=$this->input->get('total');
        $formaPago=$this->input->get('formaPago');
        $result=$this->dao->closeTicket($table_id,$empleado,$total,$formaPago);        
        if ($result!=false) {
            $answer = array('status' => TRUE);
            $this->response($answer, REST_Controller::HTTP_OK);
        } else {
            $this->response(['status' => false], REST_Controller::HTTP_OK);
        }
    }
    public function editTicket_get()
    {
        $table_id=$this->input->get('table_id');
        $producto=$this->input->get('producto');
        $total=$this->input->get('total');
        $cant=$this->input->get('cant');
        $result=$this->dao->editTicket($table_id,$producto,$total,$cant);        
        if ($result!=false) {
            $answer = array('status' => TRUE);
            $this->response($answer, REST_Controller::HTTP_OK);
        } else {
            $this->response(['status' => false], REST_Controller::HTTP_OK);
        }
    }
}