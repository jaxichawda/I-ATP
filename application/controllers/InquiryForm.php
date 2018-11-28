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
        $data['country'] = $this->InquiryForm_model->getCountry();
        $this->load->view('InquiryForm',$data);
    }
    public function validFirstname($str) 
    {
        if($str!=null){
        if ( !preg_match("/^[a-zA-Z-'.,&\s]{2,}+$/i",$str) )
        {
            $this->form_validation->set_message('validFirstname','Please enter valid First Name');
            return false;
        }
        else{
            return true;
        }
    }
    }
    public function validLastname($str) 
    {
        if($str!=null){
        if ( !preg_match("/^[a-zA-Z-'.,&\s]{2,}+$/i",$str) )
        {
            $this->form_validation->set_message('validLastname','Please enter valid Last Name');
            return false;
        }
        else{
            return true;
        }
    }
    }
    public function validContact($str) 
    {
        if($str!=null){
        if ( !preg_match("/^[0-9]{10}+$/i",$str) )
        {
            $this->form_validation->set_message('validContact','Please provide valid Mobile Number');
            return false;
        }
        else{
            return true;
        }
    }
    }
    public function validOrganization($str) 
    {
        if($str!=null){
        if ( !preg_match("/^[a-zA-Z-'.,&\s]{2,}+$/i",$str) )
        {
            $this->form_validation->set_message('validOrganization','Please enter valid Organization Name');
            return false;
        }
        else{
            return true;
        }
    }
    }
    public function validDesignation($str) 
    {
        if($str!=null){
        if ( !preg_match("/^[a-zA-Z-'.,&\s]{2,}+$/i",$str) )
        {
            $this->form_validation->set_message('validDesignation','Please enter valid Designation');
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
        $this->form_validation->set_rules('first_name', 'first name', 'required|callback_validFirstname', array('required' => 'Please enter First Name'));
        $this->form_validation->set_rules('last_name', 'last name', 'required|callback_validLastname', array('required' => 'Please enter Last Name'));
        $this->form_validation->set_rules('email', 'email address', 'required|valid_email|is_unique[tblinquiries.Email]',array('required' => 'Please enter Email Address','is_unique' => 'This Email Address submitted this form', 'valid_email' => 'Please enter valid Email Address'));
        $this->form_validation->set_rules('contact', 'contact no.', 'required|callback_validContact|is_unique[tblinquiries.ContactNo]',array('is_unique' => 'This Mobile Number submitted this form', 'required' => 'Please enter Mobile Number'));
        $this->form_validation->set_rules('company_name', 'company name', 'required|callback_validOrganization', array('required' => 'Please enter Organization Name'));
        $this->form_validation->set_rules('designation', 'designation', 'required|callback_validDesignation', array('required' => 'Please enter Designation'));
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
          'StateId'=>$this->input->post('state'),
          'AttendedATP'=>$this->input->post('attend'),
          //'Comments'=>$this->input->post('comments')
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
    public function getState()
    {
        $countryid = $this->input->post('CountryId');
        $value['state'] = $this->InquiryForm_model->getState($countryid);
        echo json_encode($value);
 }
    
}
?>
