<?php
class InquiryForm_model extends CI_model{
    public function addInquiry($user){
        return $this->db->insert('tblinquiries', $user);
    }
    public function sendEmail($receiver){
        $path = BASE_URL;
        $message = '
        <table style="font-family:Lucida Grande,Lucida Sans Unicode, Lucida Sans, DejaVu Sans, Verdana, sans-serif; font-size:16px; border:2px solid #ccc; line-height:22px; color:#000; width:700px; margin:0 auto;" cellpadding="0" cellspacing="0" border="0">
            <tr>
                <td background="'.$path.'/assets/images/slider.jpg" style="background:url('.$path.'/assets/images/slider.jpg) top center no-repeat #f4f4f4;" >
                    <table cellpadding="0" cellspacing="0" border="0" style="width:100%; margin:0 auto;">
                        <tr>
                            <td>
                                <table cellpadding="0" cellspacing="0" border="0" style="padding: 10px 10px 0 10px; width:100%; margin:0 auto;">
                                    <tr>
                                        <td><img src="'.$path.'/assets/images/emaillogo.png" alt="" style="width: 100px;" /></td>
                                        <td valign="middle" style="text-align: right"><img src="'.$path.'/assets/images/atp_india_logo.png" alt="" style="width: 120px;" /></td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                        <tr>
                            <td style="padding:10px 0 20px 0; text-align:center;">
                                <table align="center" cellpadding="0" cellspacing="0" border="0" style="width:70%; margin:auto; background: rgba(255,255,255,0.8); text-align: center;">
                                    <tr>
                                        <td style="padding:20px 10px 10px 10px; font-size: 25px; font-weight: bold; color:#0061af;">It was pleasure meeting you at I-ATP.</td>
                                    </tr>
                                    <tr>
                                        <td style="padding:10px;">Thank you for stopping by at our booth and giving us opportunity to share information about us. We hope that you have a fruitful conversation with one of our representatives.</td>
                                    </tr>
                                    <tr>
                                        <td style="padding:10px;">In continuation to that short conversation, we are pleased to share additional information about us through attach documents. In addition, to get a visual experience of one of our flagship products - Learning Management System (LMS), please visit <br><a href="http://lms-demo.theopeneyes.com/">LMS-Demo.TheOpenEyes.com</a>.</td>
                                    </tr>
                                    <tr>
                                        <td style="padding:5px 10px 20px; text-align:center; font-size:14px; line-height:20px;">
                                        Please do not hesitate to contact us in case of any queries or need further information.
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr>
                <td>
                <table cellpadding="0" cellspacing="0" border="0" style="width:100%; margin:0 auto; font-size:13px; line-height:13px; border-top: 2px solid #ccc;">
                    <tr>
                    <td style="padding: 5px 10px; text-align: center; background:#fff;"><img src="'.$path.'/assets/images/microsoft.png" style="width: 165px; vertical-align: middle;" alt="" /></td>
                    <td style="padding: 10px; background:#b0cb1f;">
                        <table cellpadding="0" cellspacing="0" border="0" style="width:100%; margin:0 auto;">
                            <tr>
                                <td><a href="tel:+91 256.298.3937" style="color: #000; text-decoration: none;"><img style="width: 20px; height: 20px; vertical-align: text-bottom;" src="'.$path.'/assets/images/phone.png" alt="" /> +91.265.298.EYES</a></td>
                                <td><a href="mailto:info@theopeneyes.com" style="color: #000; text-decoration: none;"><img src="'.$path.'/assets/images/email.png" style="width: 20px; height: 20px; vertical-align: text-bottom;" alt="" /> info@theopeneyes.com</a></td>
                                <td> <a href="http://www.theopeneyes.com" target="_blank" style="color: #000; text-decoration: none;"><img src="'.$path.'/assets/images/world.png" style="width: 20px; height: 20px; vertical-align: text-bottom;" alt="" /> www.theopeneyes.com</a></td>
                            </tr>
                        </table>
                    </td>
                    </tr>
                    <tr>
                        <td colspan="2" style="background:#0061af; padding: 15px; text-align: center; color: #fff;">Washington DC | Sterling VA | Vadodara, India</td>
                    </tr>
                </table>
                </td>
            </tr>
        </table>
        <p style="font-family:Calibri,sans-serif; font-size:16px">Thank you,<br><strong>OpenEyes Software Solutions Pvt. Ltd</strong></p>
        ';
            
            //config email settings
            $config['protocol'] = 'smtp';
            $config['smtp_host'] = 'ssl://smtp.googlemail.com';
            $config['smtp_port'] = '465';
            $config['smtp_user'] = 'myopeneyes3937@gmail.com';
            $config['smtp_pass'] = 'W3lc0m3@2019';  //sender's password
            $config['mailtype'] = 'html';
            $config['charset'] = 'iso-8859-1';
            $config['newline']="\r\n";
            $config['wordwrap'] = 'TRUE';

            // $config['protocol']='mail';
            // $config['smtp_host']='vps40446.inmotionhosting.com';
            // $config['smtp_port']='587';
            // $config['smtp_user']=$smtpEmail;
            // $config['smtp_pass']=$smtpPassword;

            // $config['protocol']='smtp';
            // $config['smtp_host']='smtpout.secureserver.net';
            // $config['smtp_port']='80';
            // $config['smtp_user']='info@theopeneyes.com';
            // $config['smtp_pass']='W3lc0m3@2018';


            
            $this->email->initialize($config); 
            $this->email->from('info@theopeneyes.com','OpenEyes Software Solutions Pvt. Ltd');
            $this->email->to($receiver);
            $this->email->subject('I-ATP 2018');
            $this->email->message($message);
            $this->email->attach($path.'/assets/brochure/OpenEyes-CapabilityStatement.pdf');
            $this->email->attach($path.'/assets/brochure/OpenEyes-LMS.pdf');
            $this->email->attach($path.'/assets/brochure/OpenEyes-ProjectAndProducts.pdf');
            if($this->email->send()){
                return true;
            }else{
                return false;
            }  
    }
public function getCountry()
{
    $this->db->select('CountryId,CountryName');
    $query = $this->db->get('tblmstcountry');
    $data =  $query->result();
    return $data;
}
public function getCountryID($country)
{
    $this->db->select('CountryId');
    $this->db->where('CountryName', $country);  
    $query = $this->db->get('tblmstcountry');
    $id = $query->result();
    return $id;
}

public function getState($countryid)
{
    $this->db->select('StateName,StateId');
    $this->db->where('CountryId',$countryid);
    $this->db->order_by('StateName','asc');
    $query = $this->db->get('tblmststate');
    $statelist = $query->result();
    return $statelist;
}

}
?>