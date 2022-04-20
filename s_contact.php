<?php
include 'config.php';
if (!isset($_SESSION['login_student'])) {
	header('Location: login.php');
}
 
if (!empty($_POST)) {
	if (!empty($_POST['user_name'])) {
		mysqli_query($con, "insert into contact (user_name, c_msg ) values ('" . $_POST['user_name'] . "', '" . $_POST['c_msg'] . "');");
		echo "<script>alert('Message sent.')</script>";
	} else {
		echo "<script>alert('Please provide all inputs.')</script>";
	}
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Quizard</title>
	<style>
		.page {
			display: flex;
			align: center;
		}
	</style>

	<!-- Bootstrap CSS -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

	<!-- CSS -->
	<link rel="stylesheet" href="css/student.css">

	<!-- Bootstrap 5 CSS-->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css">

	<!-- Bootstrap 5 JS-->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js">

	<!-- Icons -->
	<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

	<!-- JS -->
	<link href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js">

</head>

<body>
	<div class="page">
		<div class="d-flex flex-column vh-100 flex-shrink-0 p-3 text-white bg-dark" style="width: 250px;"> <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none"> <svg class="bi me-2" width="40" height="32"> </svg> <span class="fs-4">Quizard!</span> </a>
			<hr>
			<ul class="nav nav-pills flex-column mb-auto">
				<li class="nav-item"> <a href="student.php" class="nav-link text-white" aria-current="page"> <i class="fa fa-home"></i><span class="ms-2">Home</span> </a> </li>
				<li> <a href="s_quiz.php" class="nav-link text-white"> <i class="fa fa-dashboard"></i><span class="ms-2">Quizzes</span> </a> </li>
				<li> <a href="s_result.php" class="nav-link text-white"> <i class="fa fa-first-order"></i><span class="ms-2">Result</span> </a> </li>
				<li> <a href="s_contact.php" class="nav-link active"> <i class="fa fa-cog"></i><span class="ms-2">Contact</span> </a> </li>
			</ul>
			<hr>
			<div class="dropdown"> <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false"> <img src="imgs/user1.png" alt="" width="32" height="32" class="rounded-circle me-2"> <strong> <?php echo "Hi, " . $_SESSION['login_student'] ?></strong> </a>
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

		
		<form method="post" action="s_contact.php" style="align: center;"> 
			<div class="container py-5 d-flex align-items-center justify-content-center" style="margin-left: 200px;">
				<div class="card bg-secondary text-dark" style="border-radius: 1rem;">
					<div class="card-body p-5 text-center" >
						<div class="form-outline form-white mb-4">
							<label for="user_name" class="form-label">Username</label><br>
							<select id="user_name" name="user_name" class="form-control">
								<option></option>
								<option value=<?= $_SESSION['luser']['username']; ?>><?php echo $_SESSION['login_student'] . " " . $_SESSION['luser']['last_name']?></option>
								<option value="Anounymous">Anounymous</option>
							</select>
						</div>
						<div class="form-outline form-white mb-4">
							<label for="c_msg" class="form-label">Message</label>
							<input type="text" class="form-control" id="c_msg" name="c_msg">
						</div>
									
						<button class="btn btn-outline-light px-5" type="submit" name="login">Submit</button>
								
					</div>
				</div>
			</div>
		</form>
		
	</div>
	
		<!-- Bootstrap -->
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>