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
	
}