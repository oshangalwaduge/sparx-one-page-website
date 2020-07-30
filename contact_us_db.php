<?php

/* Check all form inputs using check_input function */
$name=$_POST["name"];
$subject =$_POST["subject"];
$email=$_POST["email"];
$phone=$_POST["phone"];
$message=$_POST["message"];

/* If e-mail is not valid show error message 
if (!preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/", $email_address))
{
    show_error("E-mail address not valid");
}
*/

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

?>