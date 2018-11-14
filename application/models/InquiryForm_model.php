<?php
class InquiryForm_model extends CI_model{
    public function addInquiry($user){

        return $this->db->insert('tblinquiries', $user);
        
        }
        public function sendEmail($receiver){
        
            $message = '<table border="1" cellpadding="0" cellspacing="0" style="border:1px solid rgb(120, 120, 120); color:#000000; font-family:Arial,Helvetica,sans-serif; font-size:15px; line-height:22px; margin:0 auto; width:600px">
            <tbody>
                <tr>
                    <td style="background-color:rgba(180, 180, 180, 0.5); border-bottom:5px solid #0061af; padding:10px"><a href="http://www.theopeneyes.com" target="_blank"><img alt="The OpenEyes Technologies Logo" src="http://www.theopeneyes.com/images/logo-email.png" /></a></td>
                </tr>
                <tr>
                    <td style="padding:10px">
                        <p style="font-family:Calibri,sans-serif">Thank you for giving us the opportunity to present our product demo. It was pleasure having you at the I-ATP event.</p>
                        <p></p>
                        <p style="font-family:Calibri,sans-serif">For our products you can refer attached brochures. To have visual experience, you can visit <a href="http://lms-demo.theopneyes.com/">lms-demo.theopneyes.com</a>.</p>
                        <p></p>
                        <p style="font-family:Calibri,sans-serif">In case of any queries or further information you may <a href="http://theopneyes.com/">reach out</a> to us.</p>
                        <p></p>
                        <p style="font-family:Calibri,sans-serif">Kindly,<br><strong>OpenEyes Software Solutions Pvt. Ltd</strong></p>
                    </td>
                </tr>
                <tr>
                    <td padding:0;"><img src="http://iatp.devbyopeneyes.com/assets/images/footer.jpg" /></td>
                </tr>
            </tbody>
        </table>';
            
            //config email settings
            $config['protocol'] = 'smtp';
            $config['smtp_host'] = 'ssl://smtp.googlemail.com';
            $config['smtp_port'] = '465';
            $config['smtp_user'] = 'myopeneyes3937@gmail.com';
            $config['smtp_pass'] = 'W3lc0m3@2018';  //sender's password
            $config['mailtype'] = 'html';
            $config['charset'] = 'iso-8859-1';
            $config['newline']="\r\n";
            $config['wordwrap'] = 'TRUE';

            // $config['protocol']='mail';
            // $config['smtp_host']='vps40446.inmotionhosting.com';
            // $config['smtp_port']='587';
            // $config['smtp_user']=$smtpEmail;
            // $config['smtp_pass']=$smtpPassword;
            
            $this->email->initialize($config); 
            $this->email->from('myopeneyes3937@gmail.com','ADMIN');
            $this->email->to($receiver);
            $this->email->subject('Thank You for visiting us - OpenEyes Software Solutions Pvt. Ltd');
            $this->email->message($message);
            if($this->email->send()){
                return true;
            }else{
                return false;
            }
            
        }
}
?>