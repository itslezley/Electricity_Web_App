<!DOCTYPE html>
<html>
<head>
	<title>Feedback</title>
	<link rel="stylesheet" type="text/css" href="css/feedback.css">
  <link rel="stylesheet" type="text/css" href="css/style.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
	<link href="https://fonts.googleapis.com/css?family=Quicksand&display=swap" rel="stylesheet">
	<link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
	<meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0,maximum-scale=1.0">

  <?php
    include 'includes/nav.php';

    ?>

</head>
<body>
	<div class="container">
		<div class="contact-box">
			<div class="left"></div>
			<div class="right">
				<h2>Feedback</h2>
        <form action="backend/feedbackSaver.php" method="POST">
				<input type="text" class="field" name="name" placeholder="Your Name">
				<input type="email" class="field" name="email" placeholder="Your Email">
				<input type="text" class="field" name="phone" placeholder="Phone">
				<textarea placeholder="Message" name="message" class="field"></textarea>
				<button class="btnSend">Send</button>
        </form>
			</div>
		</div>
	</div>

	<p class="dummy"></p>
</body>
<?php
    include 'includes/footer.php';

    ?>
</html>