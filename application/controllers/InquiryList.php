<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class InquiryList extends CI_Controller {

    public function __construct(){
        parent::__construct();
    }
	public function index()
	{
        $this->load->database();  
        $this->load->model('InquiryList_model');  
        $data['h']=$this->InquiryList_model->select();  
        $this->load->view('InquiryList', $data);  
    }
}
?>