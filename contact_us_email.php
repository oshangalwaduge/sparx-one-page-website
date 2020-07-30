<?php
// Check for empty fields
if(empty($_POST['name'])  		||
   empty($_POST['email']) 		||
   empty($_POST['phone'])		||
   empty($_POST['message'])		||
   empty ($_POST['subject'])	||
   !filter_var($_POST['email'],FILTER_VALIDATE_EMAIL))
   {
	echo "No arguments Provided!";
	return false;
   }
	
$name = $_POST['name'];
$email_address = $_POST['email'];
$message = $_POST['message'];
$subject = $_POST['subject'];
$phone = $_POST['phone'];
	
// Create the email and send the message
$to = 'hokagenaruto304@gmail.com'; // Add your email address. This is where the form will send a message to.
$email_subject = "SPARX Contact Form:  $name ".": $subject";
$email_body = "You have received a new message from your website contact form.\n\n"."Here are the details:\n\nName: $name\nEmail: $email_address\nPhone No: $phone\n\nMessage:\n$message";
$headers = "From: noreply@sparx.lk\n"; // This is the email address the generated message will be from. We recommend using something like noreply@yourdomain.com.
$headers .= "Reply-To: $email_address";	
mail($to,$email_subject,$email_body,$headers);
return true;	

echo "Message Sent Succesfully. Thank you!";
?>