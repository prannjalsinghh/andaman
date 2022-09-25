<?php
session_start();
if(isset($_POST['phone'])){
if(empty($_POST['name'])  &&
   empty($_POST['email']) &&
   empty($_POST['phone']) &&
   !filter_var($_POST['email'],FILTER_VALIDATE_EMAIL) &&  empty($_POST['nPeople']) && empty($_POST['date']))
   {
    header('Location:index.php');
   }
    
$name = $_POST['name'];
$email_address = $_POST['email'];
$phno=$_POST['phone'];
$date=$_POST['date'];
$nPeople=$_POST['nPeople'];
// $message = $_POST['msg'];
    
$to = 'sales@andamanoceantours.com';
// $to = 'arijitdhar04@gmail.com';
$email_subject = "Website Contact Form: $name" ;
$email_body = "You have received a new booking message from your website http://andamantour.in/ \n\n"."Here are the details:\n
---------------------------------------\n
Name = $name\n
---------------------------------------\n
Email = $email_address\n
---------------------------------------\n
Phone Number = $phno\n
---------------------------------------\n
Travel Date = $date\n
---------------------------------------\n
Number Of People = $nPeople\n
---------------------------------------";
$headers = "From: noreply@andamanoceantours.com\n";
$headers .= "Reply-To: $email_address"; 

// echo $name;
mail($to,$email_subject,$email_body,$headers) or die("Error!");
// return "ok";
//$message = "<h2>Thank you For Submitting Your Request. Our Team Members Will Reach You Soon</h2>" . " -" . "<a href='http://ladakhtourguru.com' style='text-decoration:none;color:#d60c0c; font-weight: 700;'> Return Home</a>";

echo "submitted";
    
} else {
    header('Location:index.php');
}
?>