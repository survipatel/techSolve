<?php
$fullname = $phone = $email = $subject =$message = "" ;
$fullname_err = $phone_err = $email_err = $subject_err = $message_err = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

	/*if(empty($fullname)){
		$fullname_err["fullname"] = "Full name is required";

	}elseif (!preg_match("/^[a-zA-Z\s]+$/", $fullname)){
		$fullname_err["fullname"] = "Only letters and white space allowed";
	}*/
 if (empty(trim($_POST["fullname"]))) {
            $fullname_err = "Please enter your first name.";
        } else {
            $fullname = trim($_POST["fullname"]);
        }
	
       // Validate Mobile Number
        if (empty(trim($_POST["phone"]))) {
            $phone_err = "Please enter your mobile number.";
        } elseif (!preg_match("/^[0-9]{10}$/", trim($_POST["phone"]))) {
            $phone_err = "Invalid mobile number format.";
        } else {
            $phone = trim($_POST["phone"]);
        }
     

    if (empty(trim($_POST["email"]))) {
            $email_err = "Please enter your email address.";
        } else {
            $email = trim($_POST["email"]);
            // Check if email address is valid
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $email_err = "Invalid email format.";
            }
        }

	 if (empty(trim($_POST["subject"]))) {
            $subject_err = "Subject field is required.";
        } else {
            $subject = trim($_POST["subject"]);
        }

if (empty(trim($_POST["message"]))) {
            $message_err = "Please type your message.";
        } else {
            $message = trim($_POST["message"]);
        }


    if (empty($fullname_err) && empty($phone_err) && empty($email_err) && empty($subject_err) && empty($message_err)) {


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

	                // $conn->close();
	                header("Refresh: 5; URL = reg.php");
	                exit();
	}else{
		$errors["database"] = "Error: " .$sql. "<br>" .$conn->error;
	}
	$conn->close();
}
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Contact Form</title>
    <style type="text/css">
        .error{
            color: red;
        }
    </style>
</head>
<body>
    <h2>Contact Form</h2>

    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    	<label for="fullname"> Full Name:</label><br>
         	<input type="text" id = "fullname" name="fullname" required><br><br>
         	<span class="error"><?php echo $fullname_err;?></span><br><br>

         	<label for="phone"> Phone Number:</label><br>
         	<input type="text" id = "phone" name="phone" required><br><br>
         	<span class="error"><?php echo $phone_err;?></span><br><br>

         	<label for="email"> Email:</label><br>
         	<input type="text" id = "email" name="email" required><br><br>
         	<span class="error"><?php echo $email_err;?></span><br><br>

         	<label for="subject"> Subject:</label><br>
         	<input type="text" id = "subject" name="subject" required><br><br>
         	<span class="error"><?php echo $subject_err;?></span><br><br>

         	<label for="message"> Message:</label><br>
         	<input type="message" id = "message" name="message"  rows = "4" required><br><br>
         	<span class="error"><?php echo $message_err;?></span><br><br>

         	<input type="submit" name="submit" value="Submit">
         </form>
</body>
</html>