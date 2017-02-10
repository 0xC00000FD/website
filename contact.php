<?php
$pageTitle = 'contact';

require('inc/config.php');

// reCaptcha declarations
$publicKey = '6LdlChUUAAAAAMkYKo04YgrE-rlrCM6X4EtYI47N';
$privateKey = '6LdlChUUAAAAAP628ERO4WH5Fs3vCiCPe7M_uYuH';

/************************************************************************/
/************************* Post-form Submition **************************/
/************************************************************************/

// Form Contents
$fromName = null;
$fromEmail = null;
$subject = null;
$body = null;

// If form submitted, process it
if( isset($_POST['submit']) ) {

	// Validate captcha used
	if( $_POST['g-recaptcha-response'] === '' || !isset($_POST['g-recaptcha-response']) ) {
		$error[] = 'Check the captcha box to prove you are not a robot!';
	} else {
		$recaptcha = new \ReCaptcha\ReCaptcha($privateKey);
		$resp = $recaptcha->verify( $_POST['g-recaptcha-response'], $_SERVER['REMOTE_ADDR'] );

		if( !$resp->isSuccess() ) {
			// reCaptcha incorrect
			$error[] = "The captcha was completed incorrectly (Error: $resp->getErrorCodes() ). Please try again.";
		}
	}

	// Validate if email == exist
	if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
		$error[] = 'Please give a valid email address...';
	}

	// Validate if Name == exists
	if(!$_POST['user']) {
		$error[] = 'Please give us your Name...';
	}

	// Validate if at least a Subject or a Message Body has Content
	if(!$_POST['subject']) {
		$error[] = 'Please give us something to read, even just the Subject would do...';
	}

	// Define and Escape Form Contents
	$fromName = htmlspecialchars(strip_tags($_POST['user']));
	$fromEmail = htmlspecialchars(strip_tags($_POST['email']));
	$subject = htmlspecialchars(strip_tags($_POST['subject']));
	$body = htmlspecialchars(strip_tags($_POST['body']));

	// Compose Messages
	$messageAdmin = sprintf('An E-mail was sent using the JSFAR Contact form!<br />%1$s[%2$s] says:<br />%3$s', $fromName, $fromEmail, $body);
	$messageClient = sprintf('Thank you for contacting us! We will get back to you as soon as possible.<br />If you have any further questions feel free to reply to this email to continue the thread<br /><br />Yours faithfully,<br />JSFAR Support<br /><hr><br />You recently sent the following:<br />%s',
		$body);

	// If no errors have been created, carry on
	if( !isset($error) ) {

		// Send Admin E-mail
		$mail = new Mail();
		$mail->setFrom(ROBOMAIL);
		$mail->addAddress(ADMINMAIL);
		$mail->subject($subject);
		$mail->body($messageAdmin);
		$mail->send();

		// Send Client E-mail
		$mail = new Mail();
		$mail->setFrom(ROBOMAIL);
		$mail->addAddress($fromEmail);
		$mail->subject($subject);
		$mail->body($messageClient);
		$mail->send();


		// Manual Submission Checking
		// $success[] = 'Name: ' . $fromName;
		// $success[] = 'E-mail: ' . $fromEmail;
		// $success[] = 'Subject: ' . $subject;
		// $success[] = 'Body: ' . $body;

		$success[] = '<strong>YAY!</strong> Your message has been successfully sent!';

		// Reset Form Contents
		$fromName = null;
		$fromEmail = null;
		$subject = null;
		$body = null;
	}
}
?>
<!DOCTYPE HTML>
<html>
	<head>
<?php include('layout/head.php'); ?>
	</head>
	<body class="homepage">
		<?php include('inc/analytics.php'); ?>
		<div id="wrapper">
			<?php include('layout/header.php'); ?>
			<div id="page">
				<div class="container contact-form">
					<form action="" method="POST">
						<h1>Say Hi!</h1>

						<!-- System Messages -->
						<hr>
						<?php
						// Check for errors
						if(isset($error)) {
							foreach ($error as $error) {
								echo "<div class='alert error-alert'>$error</div>";
							}
						}

						if(isset($success)) {
							foreach ($success as $success) {
								echo "<div class='alert success-alert'>$success</div>";
							}
						}
						?>

						<!-- Name -->
						<div class="form-group">
							<label for="user">Name <span style="color: red;">*</span></label>
							<input id="user" name="user" tabindex="0" placeholder="Jumping Jack Flash" value="<?php echo $fromName; ?>"></input>
						</div>
						
						<!-- E-mail -->
						<div class="form-group">
							<label for="email">E-mail <span style="color: red;">*</span></label>
							<input id="email" name="email" placeholder="random@email.com" value="<?php echo $fromEmail; ?>"></input>
						</div>

						<!-- Subject -->
						<div class="form-group">
							<label for="subject">Subject <span style="color: red;">*</span></label>
							<input id="subject" name="subject" placeholder="Something Concise" value="<?php echo $subject; ?>"></input>
						</div>

						<!-- Body -->
						<div class="form-group">
							<label for="body">Message Body</label>
							<textarea id="body" name="body" cols="40" rows="10" placeholder="Something Less Concise"><?php echo $body; ?></textarea>
						</div>

						<!-- reCaptcha -->
						<div class="g-recaptcha" data-sitekey="<?php echo $publicKey; ?>"></div>

						<!-- Submit -->
						<button type="submit" class="submit" name="submit">Submit</button>
					</form>
				</div>
			</div>

			<?php include('layout/footer.php'); ?>

		</div>
	</body>
	<script src='https://www.google.com/recaptcha/api.js' async defer></script>
</html>