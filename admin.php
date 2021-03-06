<?php

session_start();

if (!isset($_SESSION['login_admin'])) {
	header('Location: login.php');
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
	<style>

		.page {
			display: flex;
		}
	</style>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Quizard</title>

	<!-- Bootstrap CSS -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

	<!-- CSS -->
	<link rel="stylesheet" href="css/student.css">

	<!-- Bootstrap 5 CSS-->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css">

	<!-- Bootstrap 5 JS-->
	<scriptsrc="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"></script>


	<!-- Icons -->
	<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

	<!-- JS -->
	<!--<link href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js">-->
	<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

</head>

<body>
	<div class="page">
	<div class="d-flex flex-column vh-100 flex-shrink-0 p-3 text-white bg-dark" style="width: 250px;"> <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none"> <svg class="bi me-2" width="40" height="32"> </svg> <span class="fs-4">Quizard!</span> </a>
		<hr>
		<ul class="nav nav-pills flex-column mb-auto">
			<li class="nav-item"> <a href="admin.php" class="nav-link active" aria-current="page"> <span class="ms-2">Home</span> </a> </li>
			<li> <a href="a_student.php" class="nav-link text-white"> <span class="ms-2">Students</span> </a> </li>
			<li> <a href="a_teacher.php" class="nav-link text-white"> <span class="ms-2">Teachers</span> </a> </li>
			
		</ul>
		<hr>
		<div class="dropdown"> <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false"> <img src="imgs/user1.png" alt="" width="32" height="32" class="rounded-circle me-2"><strong> <?php echo "Hi, " . $_SESSION['login_admin'] ?> </strong> </a>
			<ul class="dropdown-menu dropdown-menu-dark text-small shadow" aria-labelledby="dropdownUser1">
				<li>
					<hr class="dropdown-divider">
				</li>
				<li><a class="dropdown-item" href="logout.php">Sign out</a></li>
				<li>
					<hr class="dropdown-divider">
				</li>
			</ul>
		</div>
	</div>

	
</div>



	<!-- Bootstrap -->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>