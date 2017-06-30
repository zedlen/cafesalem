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
class General extends REST_Controller {

    function __construct()
    {
        // Construct the parent class
        parent::__construct();

        $this->load->model("GeneralDao","dao");
    }

    public function getTables_get()
    {
        $result=$this->dao->getTables();
        if ($result!=null) {
            $answer = array('status' => TRUE,'tables'=>$result );
            $this->response($answer, REST_Controller::HTTP_OK);
        } else {
            $this->response([
                    'status' => FALSE,
                    'message' => 'No data were found'
                ], REST_Controller::HTTP_NOT_FOUND);
        }
    }
    public function getEmployees_get($value='')
    {
        $result=$this->dao->getEmployees();
        if ($result!=null) {
            $answer = array('status' => TRUE,'employees'=>$result );
            $this->response($answer, REST_Controller::HTTP_OK);
        } else {
            $this->response([
                    'status' => FALSE,
                    'message' => 'No data were found'
                ], REST_Controller::HTTP_NOT_FOUND);
        }
    }
    public function getCategories_get($value='')
    {
        $result=$this->dao->getCategories();
        if ($result!=null) {
            $answer = array('status' => TRUE,'categories'=>$result );
            $this->response($answer, REST_Controller::HTTP_OK);
        } else {
            $this->response([
                    'status' => FALSE,
                    'message' => 'No data were found'
                ], REST_Controller::HTTP_NOT_FOUND);
        }
    }
    public function getProducts_get($value='')
    {
        $result=$this->dao->getProducts();
        if ($result!=null) {
            $answer = array('status' => TRUE,'products'=>$result );
            $this->response($answer, REST_Controller::HTTP_OK);
        } else {
            $this->response([
                    'status' => FALSE,
                    'message' => 'No data were found'
                ], REST_Controller::HTTP_NOT_FOUND);
        }
    }
    public function addCategory_get()
    {
        $params=$this->input->get();
        $result=$this->dao->addCategory($params);
        if ($result) {
            $answer = array('status' => TRUE );
            $this->response($answer,REST_Controller::HTTP_OK);
        } else {
            $answer = array('status' => FALSE );
            $this->response($answer,REST_Controller::HTTP_OK);
        }
        
    }
    public function deleteCategory_get()
    {
        $params=$this->input->get();
        $result=$this->dao->deleteCategory($params["idCategoria"]);
        if ($result) {
            $answer = array('status' => TRUE );
            $this->response($answer,REST_Controller::HTTP_OK);
        } else {
            $answer = array('status' => FALSE );
            $this->response($answer,REST_Controller::HTTP_OK);
        }
        
    }
    public function editCategory_get()
    {
        $params=$this->input->get();
        $result=$this->dao->editCategory($params);
        if ($result) {
            $answer = array('status' => TRUE );
            $this->response($answer,REST_Controller::HTTP_OK);
        } else {
            $answer = array('status' => FALSE );
            $this->response($answer,REST_Controller::HTTP_OK);
        }
        
    }
    public function addProducto_get()
    {
        $params=$this->input->get();
        $result=$this->dao->addProducto($params);
        if ($result) {
            $answer = array('status' => TRUE );
            $this->response($answer,REST_Controller::HTTP_OK);
        } else {
            $answer = array('status' => FALSE );
            $this->response($answer,REST_Controller::HTTP_OK);
        }
        
    }
    public function deleteProductory_get()
    {
        $params=$this->input->get();
        $result=$this->dao->deleteProductory($params["idProducto"]);
        if ($result) {
            $answer = array('status' => TRUE );
            $this->response($answer,REST_Controller::HTTP_OK);
        } else {
            $answer = array('status' => FALSE );
            $this->response($answer,REST_Controller::HTTP_OK);
        }
        
    }
    public function editProducto_get()
    {
        $params=$this->input->get();
        $result=$this->dao->editProducto($params);
        if ($result) {
            $answer = array('status' => TRUE );
            $this->response($answer,REST_Controller::HTTP_OK);
        } else {
            $answer = array('status' => FALSE );
            $this->response($answer,REST_Controller::HTTP_OK);
        }
        
    }
    public function getDailyReport_get()
    {
        $result=$this->dao->getDailyReport();
        if ($result!=null) {
            $answer = array('status' => TRUE,
                            'tickets'=>$result );
            $this->response($answer,REST_Controller::HTTP_OK);
        } else {
            $answer = array('status' => FALSE );
            $this->response($answer,REST_Controller::HTTP_OK);
        }
        
    }
    public function getMonthlyReport_get()
    {
        $result=$this->dao->getMonthlyReport();
        if ($result!=null) {
            $answer = array('status' => TRUE,
                            'tickets'=>$result );
            $this->response($answer,REST_Controller::HTTP_OK);
        } else {
            $answer = array('status' => FALSE );
            $this->response($answer,REST_Controller::HTTP_OK);
        }
        
    }
    public function getAnnualReport_get()
    {
        $result=$this->dao->getAnnualReport();
        if ($result!=null) {
            $answer = array('status' => TRUE,
                            'tickets'=>$result );
            $this->response($answer,REST_Controller::HTTP_OK);
        } else {
            $answer = array('status' => FALSE );
            $this->response($answer,REST_Controller::HTTP_OK);
        }
        
    }
    public function getSpecificReport_get()
    {
        $params=$this->input->get();
        if (!isset($params["start"])) {
            $answer = array('status' => FALSE,'error'=>'Falta fecha de inicio' );
            $this->response($answer,REST_Controller::HTTP_OK);
        } else {
            if (!isset($params["end"])) {
                $answer = array('status' => FALSE,'error'=>'Falta fecha de fin' );
                $this->response($answer,REST_Controller::HTTP_OK);
            } else {
                $result=$this->dao->getSpecificReport($params);
                if ($result!=null) {
                    $answer = array('status' => TRUE,
                                    'tickets'=>$result );
                    $this->response($answer,REST_Controller::HTTP_OK);
                } else {
                    $answer = array('status' => FALSE );
                    $this->response($answer,REST_Controller::HTTP_OK);
                }
            }
            
        }
        
        
    }
}
