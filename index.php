<?php
session_start();
if (isset($_SESSION['role'])) {
	header('Location: ' . $_SESSION['role'] . '.php');
}
?>
<!doctype html>
<html lang="en">

<head>
	<style>
		.text-body {
			height: 50%;
			
			position: absolute;
			top:0;
			bottom: 0;
			left: 0;
			right: 0;
			
			margin: auto;
		}
	</style>
	
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- Bootstrap CSS -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

	<!-- CSS -->
	<link rel="stylesheet" href="css/home.css">

	<title>Quizard!</title>
</head>

<body>
	
<div class="text-body">
	<h1 class="text-center">QUIZARD</h1>
	<p class="text-center">Your quiz wizard, here to make learning magical!</p><br>
	<p class="text-center">Quizard is an online, interactive and self-adaptive quizzing platform which enables self-paced learning.<br>
		It uses an algorithm which chooses you next question depending on your accuracy in your previous attempts.<br>
		Thus, it is you who decides the difficulty of your next question which keeps quizzing fun and helps you learn confidently.
	</p>

	<div class="d-grid justify-content-md-center">
		<a href="login.php"><button type="button" class="btn btn-outline-dark">Login</button>
	</div>
</div>

	<!-- Bootstrap -->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>