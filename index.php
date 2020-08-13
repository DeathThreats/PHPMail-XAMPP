<?php
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;


if(isset($_POST['submit'])){
	// Load Composer's autoloader
	require 'vendor/autoload.php';

	// Instantiation and passing `true` enables exceptions
	$mail = new PHPMailer(true);

	//Server settings
	$mail->SMTPDebug = 0;                                       // Enable verbose debug output
	$mail->isSMTP();                                            // Send using SMTP
	$mail->Host       = 'smtp.gmail.com';                       // Set the SMTP server to send through
	$mail->SMTPAuth   = true;                                   // Enable SMTP authentication
	$mail->Username   = 'vludenburg@gmail.com';                 // SMTP username
	$mail->Password   = '82&@ueht826Hge';                        // SMTP password
	$mail->SMTPSecure = 'tls';                                  // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
	$mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

	//Recipients
	$mail->setFrom($_POST['email'], $_POST['name']);

	$mail->addAddress('vludenburg@gmail.com');                  // Add a recipient, In this case your email address 

	// Content
	$mail->isHTML(true);                                        // Set email format to HTML
	$mail->Subject = 'Form Submission: ' .$_POST['subject'];
    // $mail->Body    = 'Name: ' .$_POST['name']. '<br>Email: ' .$_POST['email']. '<br>Message: ' .$_POST['message'];
    $mail->Body    = 'Name: ' .$_POST['name']. '<br>Email: ' .$_POST['email']. '<br>Message: ' .$_POST['message'];


	$mail->send();
	echo '<h2 style="color:red">Thank you '.$_POST['name'].', your message has been sent successfully</h2>';
}
?>
<!-- Simple HTML Contact Form -->
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Contact Us</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body style="text-align:center;margin-top:3rem;line-height:3;">
        <!-- Important -->
        <form action="" method="POST">

            <!-- Visitor's Name,input field -->
            <label for="name">Name</label>
                <input name="name" type="text" minlength="3" maxlength="43" required patter="[a-zA-Z0-9]+"><br>

            <!-- Visitor's Email, input field -->
            <label for="email">Email</label>
                <input name="email" type="email" minlength="5" maxlength="43" required=""><br>

            <!-- Visitor's Subject, input field -->
            <label for="subject">Subject</label>
                <input name="subject" type="text" minlength="3" maxlength="43" required patter="[a-zA-Z]+"><br>

            <!-- Visitor's Subject, input field -->
            <label for="message">Message</label><br>
            <textarea name="message" required rows="5" placeholder="Enter your message here..." maxlength="250"></textarea><br>

            <!-- Submit Button -->
            <input type="submit" name="submit" value="Submit">
        </form>
    </body> 
</html>
