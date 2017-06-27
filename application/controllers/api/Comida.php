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
class Comida extends REST_Controller {

    function __construct()
    {
        // Construct the parent class
        parent::__construct();

        $this->load->model("ComidaDao","dao");
    }

    public function getAll_get()
    {
        $result=$this->dao->getAllFood();
        if ($result!=null) {
            $answer = array('status' => TRUE,'food'=>$result );
            $this->response($answer, REST_Controller::HTTP_OK);
        } else {
            $this->response([
                    'status' => FALSE,
                    'message' => 'No data were found'
                ], REST_Controller::HTTP_NOT_FOUND);
        }
    }
    public function getCat_get()
    {
        $result=$this->dao->getAllFoodCategories();
        if ($result!=null) {
            $answer = array('status' => TRUE,'cat'=>$result );
            $this->response($answer, REST_Controller::HTTP_OK);
        } else {
            $this->response([
                    'status' => FALSE,
                    'message' => 'No data were found'
                ], REST_Controller::HTTP_NOT_FOUND);
        }
    }
}