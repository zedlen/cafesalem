<?php
defined('BASEPATH') OR exit('No direct script access allowed');
define('API', 'http://localhost/caffeeSalem/index.php/api/');
class Admin extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{

		$this->load->view('admin/index');
	}
	public function apiConecction()
	{
		$params=$this->input->post();
		$url=$params["url"];
		unset($params["url"]);
		if (sizeof($params)==0) {
			$request=$this->curl->sendGetMethod(API.$url);
		}
		else{
			$request=$this->curl->sendGetMethod(API.$url,$params);	
		}
       	echo "$request";           
	}
}