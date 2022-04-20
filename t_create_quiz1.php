<?php
include 'config.php';
if (!isset($_SESSION['login_teacher'])) {
	header('Location: login.php');
}

if (!empty($_POST)) {
	if (!empty($_POST['quiz_name'])) {
		mysqli_query($con, "insert into quiz_list (quiz_name, dept, college, quiz_info ) values ('" . $_POST['quiz_name'] . "', '" . $_POST['dept'] . "', '" . $_POST['college'] . "', '" . $_POST['quiz_info'] . "');");
		echo "<script>alert('Quiz added.')</script>";
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
		}

		.title1 {
			text-align: center;
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
				<li class="nav-item"> <a href="teacher.php" class="nav-link text-white" aria-current="page"> <i class="fa fa-home"></i><span class="ms-2">Home</span> </a> </li>
				<li> <a href="t_quiz.php" class="nav-link text-white"> <i class="fa fa-dashboard"></i><span class="ms-2">Quizzes</span> </a> </li>
				<li> <a href="t_create_quiz.php" class="nav-link active"> <i class="fa fa-dashboard"></i><span class="ms-2">Create Quiz</span> </a> </li>
				<li> <a href="t_result.php" class="nav-link text-white"> <i class="fa fa-first-order"></i><span class="ms-2">Result</span> </a> </li>
				<li> <a href="t_contact.php" class="nav-link text-white"> <span class="ms-2">Contact</span> </a> </li>
			</ul>
			<hr>
			<div class="dropdown"> <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false"> <img src="imgs/user1.png" alt="" width="32" height="32" class="rounded-circle me-2"> <strong> <?php echo "Hi, " . $_SESSION['login_teacher'] ?> </strong> </a>
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
        <table border="1">
            <form action="t_create_quiz.php" method="POST">
                <tr>
                    <th colspan="2"><h2>Enter Quiz Details</h2></th>
    </tr>
    <tr>
    <td><label for="quiz_name" class="col-form-label">Quiz Title</label></td>
    </tr>
    <tr>
    <td><label for="quiz_name" class="col-form-label">Department</label></td>
    </tr>
    <tr>
    <td><label for="quiz_name" class="col-form-label">College</label></td>
    </tr>
    <tr>
    <td><label for="quiz_name" class="col-form-label">Quiz Info</label></td>
    </tr>
    <tr>
        <td><button type="submit" class="btn btn-primary">CREATE</button></td>
    </tr>
    </form>
    </table>

    <!-- Bootstrap -->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>
