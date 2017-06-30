<!DOCTYPE html>
<html>

<?php 
$this->load->view('admin/include/header');
$data=array('maincontent',$maincontent);
$this->load->view('admin/include/sidebar',$data); 
$this->load->view('admin/pages/'.$maincontent); 
$this->load->view('admin/include/footer'); ?>