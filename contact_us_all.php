<?php

/* Check all form inputs using check_input function */
$name=$_POST["name"];
$subject =$_POST["subject"];
$email=$_POST["email"];
$phone=$_POST["phone"];
$message=$_POST["message"];

// If e-mail is not valid show error message 
if (!preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/", $email))
{
    show_error("E-mail address not valid");
}

$servername = "localhost";
$username = "id7478338_root";
$password = "xraps";
$dbname = "id7478338_messages";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "INSERT INTO received (name, email, phone, subject, message)
VALUES ('$name','$email','$phone','$subject','$message')";

if (mysqli_query($conn, $sql)) {
    echo "Message Sent Succesfully. Thank you!";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);


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
$email = $_POST['email'];
$message = $_POST['message'];
$subject = $_POST['subject'];
$phone = $_POST['phone'];
	
// Create the email and send the message
$to = 'hokagenaruto304@gmail.com'; // Add your email address. This is where the form will send a message to.
$email_subject = "SPARX Contact Form:  $name ".": $subject";
$email_body = "You have received a new message from your website contact form.\n\n"."Here are the details:\n\nName: $name\nEmail: $email\nPhone No: $phone\n\nMessage:\n$message";
$headers = "From: noreply@sparx.lk.com\n"; // This is the email address the generated message will be from. We recommend using something like noreply@yourdomain.com.
$headers .= "Reply-To: $email";	
mail($to,$email_subject,$email_body,$headers);
return true;			


?>