<?php
session_start();
if(isset($_POST['phone'])){
if(empty($_POST['name'])  &&
   empty($_POST['email']) &&
   empty($_POST['phone']) &&
   !filter_var($_POST['email'],FILTER_VALIDATE_EMAIL) &&  empty($_POST['nPeople']) && empty($_POST['date']))
   {
	header('Location:index.html');
   }
	
$name = $_POST['name'];
$email_address = $_POST['email'];
$phno=$_POST['phone'];
$date=$_POST['date'];
$nPeople=$_POST['nPeople'];
	
$to = 'sales@andamanoceantours.com';

$email_subject = "Website Contact Form: $name" +" From Andaman Tours :- Landing Page Form";

$email_body = "You have received a new message from your website contact form.\n\n"."Here are the details:\n
---------------------------------------\n
Name = $name\n
---------------------------------------\n
Email = $email_address\n
---------------------------------------\n
Phone Number = $phno\n
---------------------------------------\n
Number Of People = $nPeople\n
---------------------------------------\n
Date = $date\n
---------------------------------------";
$headers = "From: noreply@mytourguru.com\n";
$headers .= "Reply-To: $email_address";	

// echo $name;
mail($to,$email_subject,$email_body,$headers);
// return "ok";
echo json_encode(array('status' => 'OK'));
}
else{
	header('Location:contact.html');
}
?>
