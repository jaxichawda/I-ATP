<?php  
   class InquiryList_model extends CI_Model  
   {  
      function __construct()  
      { 
         parent::__construct();  
      }  
     
      public function select()  
      {  
         $this->db->select('FirstName,LastName,Email,ContactNo,CompanyName,Designation,StateName,CountryAbbreviation,AttendedATP');
         $this->db->from('tblinquiries');
         $this->db->join('tblmststate','tblinquiries.StateId=tblmststate.StateId');
         $this->db->join('tblmstcountry','tblmstcountry.CountryId=tblmststate.CountryId');
         $query = $this->db->get();  
         return $query;  
      }  
   }  
?>  