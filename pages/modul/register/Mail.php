<?php 
	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\Exception;

	require './lib/mail/Exception.php';
	require './lib/mail/PHPMailer.php';
	require './lib/mail/SMTP.php';

	class Mail
	{
		public function sendMail($to, $name, $subject, $message)
		{
			$mail = new PHPMailer();

			try {
			    $mail->isSMTP(true);   
			    $mail->SMTPAuth   = true;                         
			    $mail->SMTPSecure = 'tls';         
			    $mail->Host       = 'smtp.gmail.com';       
			    $mail->Port       = 587;                                   
			    $mail->Username   = "im.acidopal@gmail.com";      
			    $mail->Password   = "Aghni1724";                   
			    $mail->From = "im.acidopal@gmail.com";
			    $mail->FromName = "Naufal Rasyid";

			    $mail->SMTPOptions = array(
			    	'ssl' => array(
			    		'verify_peer' => false, 
			    		'verify_peer_name' => false, 
			    		'allow_self_signed' => true, 
			    	)
			    );

			    $mail->addAddress($to, $name);     
			    $mail->isHTML(true);             
			    $mail->Subject = $subject;
			    $mail->Body    = $message;
			    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

			    $mail->SMTPDebug = 0;                    				

			    $mail->send();
			    // echo 'Message has been sent';
			} catch (Exception $e) {
			    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
			}
		}
	}
 ?>