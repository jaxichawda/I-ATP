<?php  
   class InquiryList_model extends CI_Model  
   {  
      function __construct()  
      { 
         parent::__construct();  
      }  
     
      public function select()  
      {  
         $query = $this->db->get('tblinquiries');  
         return $query;  
      }  
   }  
?>  