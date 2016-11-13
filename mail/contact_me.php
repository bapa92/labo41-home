<?php
// Check for empty fields
if(empty($_POST['name'])  		||
   empty($_POST['email']) 		||
   empty($_POST['phone']) 		||
   empty($_POST['message'])	||
   !filter_var($_POST['email'],FILTER_VALIDATE_EMAIL))
   {
	echo "No arguments Provided!";
	return false;
   }
	
$name = $_POST['name'];
$email_address = $_POST['email'];
$phone = $_POST['phone'];
$message = $_POST['message'];
	
// Create the email and send the message
$to = 'kontakt@labo41.pl'; // Add your email address inbetween the '' replacing yourname@yourdomain.com - This is where the form will send a message to.
$email_subject = "LABO 41  Formularz kontaktowy";
$email_body = "Użytkownik  ".$name." poprzez formularz napsisał wiadomość.\r\n"."Treść:\n".$message."\n\nSzczegóły tej wiadmości:\nImię: ".$name."\nEmail: ".$email_address."\nTelefon: ".$phone."\n";
$headers = "From: formularz@labo41.pl\n"; // This is the email address the generated message will be from. We recommend using something like noreply@yourdomain.com.
$headers .= "Reply-To: ".$email_address."\r\n";	
$headers  .= 'MIME-Version: 1.0'."\r\n";
$headers  .= 'Content-type: text/plain; charset=utf-8'."\r\n";
$email = imap_mail($to,$email_subject,$email_body,$headers);
if($email)
	return true;	
else false;
?>