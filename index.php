<?php
	
	// check if User Comming from a Request

	if ($_SERVER['REQUEST_METHOD'] == 'POST') {

	// Assign Variables + filter

		$user = filter_var($_POST['username'] , FILTER_SANITIZE_STRING);
		$email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL );
		$cell = filter_var($_POST['cellPhone'] , FILTER_SANITIZE_NUMBER_INT) ;
		$msg = filter_var($_POST['message'] , FILTER_SANITIZE_STRING);

		
		/*
		echo $user . '<br>';
		echo $email . '<br>';
		echo $cell . '<br>';
		echo $msg . '<br>';

		*/
		
	// Creating Array of Errors

		
		$formErrors = array();
			if (strlen($user) <= 3) {
				$formErrors[] = 'Username must be Larger the <strong>3</strong> Characters';
			}
			if (strlen($msg) < 10) {
				$formErrors[] = 'Message can\'t be less than <strong>10</strong> Characters';
			}
			if (strlen($email) < 4) {
				$formErrors[] = 'Email can\'t be <strong>Empty</strong> ';
			}
			if (strlen($cell) < 7) {
				$formErrors[] = 'Mobile Number  can\'t be less than <strong>7</strong> Characters';
			}
			
	

	// if no Errors send to Email
/*
	$headers = 'From : ' . $email . '\r\n';

	if (empty($formErrors)) {
		mail('omaribr9@gmail.com', 'Contact Form', $msg , $headers);
	}*/
	}

?>



<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<title>Contact Form</title>
	<link rel="stylesheet" href="css/bootstrap.min.css" />
	<link rel="stylesheet" href="css/all.min.css"/>
	<link rel="stylesheet" href="css/contact.css"/>
	<link href="https://fonts.googleapis.com/css2?family=Raleway&display=swap" rel="stylesheet">

</head>
<body>

	<!-- Start Form -->

	<div class="container">
			<h1 class="text-center">Contact me</h1>
			

		<form class="contact-form" action="<?php echo $_SERVER['PHP_SELF'] ?>" method='POST'>

			

				<?php
				
				if ( ! empty($formErrors)) { ?>

					<div class="alert alert-danger alert-dismissible" role="alert">
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
   			 				<span aria-hidden="true">&times;</span>
  						</button>

				<?php
					foreach ($formErrors as $errors) {
						echo $errors . '<br/>';
					}
				?>
				</div>
				<?php } ?>


			<div class="form-group">
		
				<input class="username form-control" type="text" name="username" value="<?php if(isset($user)) { echo $user; } ?>" placeholder="Type your Username" />

					<i class="fa fa-user fa-fw"></i>
					<span class="asterisx">*</span>

					<div class="alert alert-danger custom-alert">
						Username must be Larger the <strong>3</strong> Characters
					</div>

			</div>		

			<div class="form-group">

				<input class="email form-control" type="email" name="email" value="<?php if(isset($email)) { echo $email; } ?>"    placeholder="Type your Valid Email" />

					<i class="fa fa-envelope fa-fw"></i>
					<span class="asterisx">*</span>

					<div class="alert alert-danger custom-alert">
						Email can't be  <strong>Empty</strong> 
					</div>

			</div>
						
			<div class="form-group">

				<input class="form-control" type="text" name="cellPhone" value="<?php if(isset($cell)) { echo $cell; } ?>" placeholder="Type your Cell Phone" />

					<i class="fa fa-phone fa-fw"></i>
					<span class="asterisx">*</span>

					 

			</div>

			<div class="msg form-group">
			<textarea name="message" class="form-control" placeholder="Your Message !"><?php if(isset($msg)) { echo $msg; } ?>
				
			</textarea>
								<span class="asterisx">*</span>

					<div class="alert alert-danger custom-alert">
						Message can\'t be less than <strong>10</strong> Characters
					</div>
			</div>

			

			<button class="btn btn-success btn-block" type="submit">Send Message </button>

				<i class="fa fa-paper-plane fa-fw send-icon"></i>
		</form>
	</div>
 
	<script src="js/jquery-1.12.4.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/custom.js"></script>
	

</body>
</html>