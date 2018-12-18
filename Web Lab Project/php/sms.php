<?php

session_start();
ob_start();


if ($_POST['check_name']!=null && $_POST['check_date']!=null && $_POST['check_phone']!=null )
{
    $check_name = $_POST['check_name'];
    $check_date = $_POST['check_date'];
    $temp=$_POST['check_phone'];
    $check_phone = "961$temp";

    if($_POST['check_comment']!=null )
    {
		$check_comment=$_POST['check_comment'];
		$s="the $check_date - with Note: $check_comment - And for more info contact our support team 71062186";

    }else{
		$check_comment="null";
		$s="the $check_date - And for more info contact our support team 71062186";

    }

    
	// Authorisation details.
	$username = "michelazzam@hotmail.com";
	$hash = "ce52883c8ca61b9ab7b5edfe647e2d2b88d790788c63d2f736d2b592590bcafd";


	// Config variables. Consult http://api.txtlocal.com/docs for more info.
	$test = "0";

	// Data for text message. This is the text message data.
	$sender = $_SESSION['comp_name']; // This is who the message appears to be from.
	$numbers = $check_phone; // A single number or a comma-seperated list of numbers
	$message = "Thank you $check_name for registering in our SPA package! - $s";
	// 612 chars or less
	// A single number or a comma-seperated list of numbers
	$message = urlencode($message);
	// $data = $message." name=".$check_name."on the".$check_date." ".$check_phone;
// die("$data");

	$data = "username=".$username."&hash=".$hash."&message=".$message."&sender=".$sender."&numbers=".$numbers."&test=".$test;

    $ch = curl_init('http://api.txtlocal.com/send/?');
	curl_setopt($ch, CURLOPT_POST, true);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	$result = curl_exec($ch); // This is the result from the API
	curl_close($ch);

    header('Location: ../index.php');

} else {
    die("Dont try to miss around bro ;)-00");
}

?>