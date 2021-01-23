<?php
	
	/*
		The Send Mail php Script for Contact Form
		Server-side data validation is also added for good data validation.
	*/
	

	
	$name = $_POST['name'];
	$email = $_POST['email'];
	$subject = $_POST['subject'];
	$message = $_POST['message'];
	
	if( empty($name) ){
		$data['error'] = 'Please enter your name.';
	}else if(filter_var($email, FILTER_VALIDATE_EMAIL) == false){
		$data['error'] = 'Please enter a valid email address.';
	}else if( empty($subject) ){
		$data['error'] = 'Please enter your subject.';
	}else if( empty($message) ){
		$data['error'] = 'The message field is required!';
		
		
		//Place your Email Here
		$recipient = "kelsey.robertson1@gmail.com";
		
		$mailheader = "From: $email \r\n";
		
		if( mail($recipient, $name, $formcontent, $mailheader) == false ){
			$data['error'] = 'Sorry, an error occured!';
	
	}
	
	echo json_encode($data);
	
?>
