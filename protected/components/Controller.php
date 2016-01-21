<?php
/**
 * Controller is the customized base controller class.
 * All controller classes for this application should extend from this base class.
 */
class Controller extends CController
{
	/**
	 * @var string the default layout for the controller view. Defaults to '//layouts/column1',
	 * meaning using a single column layout. See 'protected/views/layouts/column1.php'.
	 */
	public $layout='//layouts/column1';
	/**
	 * @var array context menu items. This property will be assigned to {@link CMenu::items}.
	 */
	public $menu=array();

	/**
	 * @var array the breadcrumbs of the current page. The value of this property will
	 * be assigned to {@link CBreadcrumbs::links}. Please refer to {@link CBreadcrumbs::links}
	 * for more details on how to specify this property.
	 */
	public $breadcrumbs=array();
	
	
	 public function mailsend($to,$subject,$message){
        $mail=Yii::app()->Smtpmail;
		$em=$_SESSION['user']['Email'];
		$nm=$_SESSION['user']['FirstName'].' '.$_SESSION['user']['LastName'];
        $mail->SetFrom("info@jasonallan.work",$nm." From Music Theme");
        $mail->Subject = "Project Details";
        $mail->MsgHTML($message);
        $mail->AddAddress("support@themusicianstheme.zendesk.com", "");
		$mail->addReplyTo($em,$nm);
        if(!$mail->Send()) {
           // echo "Mailer Error: " . $mail->ErrorInfo;
        }else {
           // echo "Message sent!";
        }
    }
	
	public function mailsendmulti($to,$subject,$message){
        $mail=Yii::app()->Smtpmail;
        $mail->SetFrom("info@jasonallan.work",'Placeholder');
        $mail->Subject    = $subject;
        $mail->MsgHTML($message);
		foreach($to as $t){
			        $mail->AddAddress($t['Email'], "");
		}
        if(!$mail->Send()) {
           // echo "Mailer Error: " . $mail->ErrorInfo;
        }else {
           // echo "Message sent!";
        }
    }
	
	
	
	public function generateRandomString($length = 10) {
    $characters = 'abcdefghijklmnopqrstuvwxyz';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}


    var $skey = "d41d8cd98f00"; // you can change it

    public  function safe_b64encode($string) {
        $data = base64_encode($string);
        $data = str_replace(array('+','/','='),array('-','_',''),$data);
        return $data;
    }

    public function safe_b64decode($string) {
        $data = str_replace(array('-','_'),array('+','/'),$string);
        $mod4 = strlen($data) % 4;
        if ($mod4) {
            $data .= substr('====', $mod4);
        }
        return base64_decode($data);
    }

    public  function encode($value){ 
        if(!$value){return false;}
        $text = $value;
        $iv_size = mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_ECB);
        $iv = mcrypt_create_iv($iv_size, MCRYPT_RAND);
        $crypttext = mcrypt_encrypt(MCRYPT_RIJNDAEL_256, $this->skey, $text, MCRYPT_MODE_ECB, $iv);
        return trim($this->safe_b64encode($crypttext)); 
    }

    public function decode($value){
        if(!$value){return false;}
        $crypttext = $this->safe_b64decode($value); 
        $iv_size = mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_ECB);
        $iv = mcrypt_create_iv($iv_size, MCRYPT_RAND);
        $decrypttext = mcrypt_decrypt(MCRYPT_RIJNDAEL_256, $this->skey, $crypttext, MCRYPT_MODE_ECB, $iv);
        return trim($decrypttext);
    }

	
}