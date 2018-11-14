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
        if ( !preg_match("/^[0-9a-zA-Z-'&\s]+$/i",$str) )
        {
            $this->form_validation->set_message('customAlpha','Please enter your valid Company Name');
            return false;
        }
        else{
            return true;
        }
    }
    }
    public function customAlpha1($str) 
    {
        if($str!=null){
        if ( !preg_match("/^[0-9a-zA-Z-'&\s]+$/i",$str) )
        {
            $this->form_validation->set_message('customAlpha1','Please enter your valid Designation');
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
        $this->form_validation->set_rules('first_name', 'first name', 'required|alpha', array('required' => 'Please enter your First Name','alpha' => 'Please enter your valid First Name'));
        $this->form_validation->set_rules('last_name', 'last name', 'required|alpha', array('required' => 'Please enter your Last Name','alpha' => 'Please enter your valid Last Name'));
        $this->form_validation->set_rules('email', 'email address', 'required|valid_email|is_unique[tblinquiries.Email]',array('required' => 'Please enter your Email Address','is_unique' => 'This Email Address submitted this form'));
        $this->form_validation->set_rules('contact', 'contact no.', 'required|numeric|min_length[10]|max_length[10]|is_unique[tblinquiries.ContactNo]',array('is_unique' => 'This Contact Number submitted this form', 'required' => 'Please enter your Contact Number', 'numeric' => 'Please enter your valid Contact Number', 'min_length[10]' => 'Please enter your valid Contact Number', 'max_length[10]' => 'Please enter your valid Contact Number'));
        $this->form_validation->set_rules('company_name', 'company name', 'required|callback_customAlpha', array('required' => 'Please enter your Company Name'));
        $this->form_validation->set_rules('designation', 'designation', 'required|callback_customAlpha1', array('required' => 'Please enter your Designation'));
        $this->form_validation->set_message('validate_member','Member is not valid!');
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
