<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class InquiryForm extends CI_Controller {

    public function __construct(){
        parent::__construct();
  		$this->load->helper('url');
  	 	$this->load->model('InquiryForm_model');
        $this->load->library('session');
    }
	public function index()
	{
		$this->load->view('InquiryForm');
    }
    public function customAlpha($str) 
    {
        if($str!=null){
        if ( !preg_match('/^[a-z .,\-]+$/i',$str) )
        {
            return false;
        }
        else{
            return true;
        }
    }
    }
    public function addInquiry(){
        $data=array('success'=>false,'message'=>array());
        $this->load->library('form_validation');
        $this->form_validation->set_rules('first_name', 'first name', 'required|alpha');
        $this->form_validation->set_rules('last_name', 'last name', 'required|alpha');
        $this->form_validation->set_rules('email', 'email address', 'required|valid_email|is_unique[tblinquiries.Email]',array('is_unique' => 'This Email already exists.'));
        $this->form_validation->set_rules('contact', 'contact no.', 'required|numeric|min_length[10]|max_length[10]|is_unique[tblinquiries.ContactNo]',array('is_unique' => 'This Contact already exists.'));
        $this->form_validation->set_rules('company_name', 'company name', 'required|callback_customAlpha');
        $this->form_validation->set_rules('designation', 'designation', 'required|callback_customAlpha');
       // $this->form_validation->set_rules('attend', 'attended ATP', 'required');

        $this->form_validation->set_error_delimiters('<span class="error_span">', '</span>');
        
        if($this->form_validation->run()){
        //$data['success']=true;
         $user=array(
          'FirstName'=>$this->input->post('first_name'),
          'LastName'=>$this->input->post('last_name'),
          'Email'=>$this->input->post('email'),
          'CompanyName'=>$this->input->post('company_name'),
          'Designation'=>$this->input->post('designation'),
          'ContactNo'=>$this->input->post('contact'),
          'AttendedATP'=>$this->input->post('attend'),
          'Comments'=>$this->input->post('comments')
            );
            //print_r($user);
            if($this->InquiryForm_model->addInquiry($user)){
                if($this->InquiryForm_model->sendEmail($this->input->post('email'))){
                    $data['success']=true;
                }
                else{
                    $data=array('success'=>2,'message'=>'Something went wrong!! Please try again.');
                }
            }
            
        }
        else{
            foreach($_POST as $key => $value){
                    $data['messages'][$key]=form_error($key);
                }
        }
        echo json_encode($data);
    }
    
}
?>
