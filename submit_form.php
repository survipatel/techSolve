<?php
$fullname = $phone = $email = $subject =$message = "" ;
$errors = array();

if($_SERVER["REQUEST_METHOD"]=="POST"){
	$fullname = validate_input($_POST['fullname']);
	$phone = validate_input($_POST['phone']);
	$email = validate_input($_POST['email']);
	$subject = validate_input($_POST['subject']);
	$message = validate_input($_POST['message']);


	if(empty($fullname)){
		$errors["fullname"] = "Full name is required";

	}elseif (!preg_match("/^[a-zA-Z\s]+$/", $fullname)){
		$errors["fullname"] = "Only letters and white space allowed";
	}






   if(empty($phone)){
		$errors["phone"] = "Full name is required";
}elseif (!preg_match("/^\d{10}$/", $phone)){
	$errors["phone"] = "Invalid phone number format";
}




if(empty($email)){
		$errors["email"] = "Email is required";
	}
	elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)){
		$errors["email"] = "Invalid email format";
	}

if(empty($message)){
		$errors["message"] = "Message is required";
	}

	if (empty($errors)){


	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "techsolv";







	$conn = new mysqli($servername,$username,$password,$dbname);
	if($conn->connect_error){
		die("Connection failed:" .$conn->connect_error);
	}

	$ip_address = $_SERVER['REMOTE_ADDR'];
	$timestamp = date("Y-m-d H:i:s");

	$sql = "INSERT INTO contact_form(fullname, phone , email, subject, message, ip_address, submission_date)
	VALUES ('$fullname', '$phone', '$email', '$subject', '$message', '$ip_address', '$timestamp')";

	if($conn->query($sql) == TRUE){

	//send email notification 


	$to = "test@techsolvitservice.com";
	$subject = "New Contact Form Submission";
	$message = " You have received a new contact form Submission:\n\n" .
	            "Full Name: $fullname\n".
	             "Phone Number: $phone\n".
	              "Email: $email\n".
	               "Subject: $subject\n".
	                "Message: $message\n".
	                 "IP Address: $ip_address\n".
	                  "Submission Date: $timestamp";

	                mail($to,$subject,$message);
	                echo " Thank you for your Submission";
	                //$conn->close();
	                header("Refresh: 7; URL = contact_form.html");
	                exit();
	}else{
		$errors["database"] = "Error: " .$sql. "<br>" .$conn->error;
	}
	$conn->close();
}
}

function validate_input($data){
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;
}
?>