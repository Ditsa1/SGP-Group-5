<?php
include 'config.php';
if (!isset($_SESSION['login_student'])) {
	header('Location: login.php');
}
$result = mysqli_query($con, "select * from quiz_list where deleted='No' and dept='" . $_SESSION['luser']['dept'] . "' and college='" . $_SESSION['luser']['college'] . "';");
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Quizard</title>
	<style>
		.block {
			background-color: rgb(182, 182, 212);
			display: flex;
			flex-direction: row;
			justify-content: space-between;
			height: 5rem;
			border: 2px solid black;
			border-radius: 7px;
		}

		.content {
			display: flex;
			flex-direction: column;
		}

		.page {
			display: flex;
		}

		.bt-start {
			width: 50px;
			height: 30px;
			margin-top: 4px;
			margin-right: 4px;
			border: 0px solid transparent;
			border-radius: 5px;
			font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
		}

		.bt-start:hover {
			background-color: rgb(232, 226, 226);
			border: 1px solid gray;
		}

		.code {
			margin-left: 20px;
			height: 3rem;
			margin-top: 15px;
			border: 0px solid transparent;
			border-radius: 5px;
			font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
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
				<li> <a href="s_quiz.php" class="nav-link active"> <i class="fa fa-dashboard"></i><span class="ms-2">Quizzes</span> </a> </li>
				<li> <a href="s_result.php" class="nav-link text-white"> <i class="fa fa-first-order"></i><span class="ms-2">Result</span> </a> </li>
				<li> <a href="s_contact.php" class="nav-link text-white"> <i class="fa fa-cog"></i><span class="ms-2">Contact</span> </a> </li>

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

		<div class="container">
			<div class="content container-lg">
				<br>

				<h3 class="text-center">Quizzes</h3><br>

				<table class="table table-bordered table-hover border border-dark">
					<thead class="table-primary">
						<tr>
							<th style="background-color:#a9a9a9">Sr.</th>
							<th style="background-color:#a9a9a9">Quiz Title</th>
							<th style="background-color:#a9a9a9">Department</th>
							<th style="background-color:#a9a9a9">College</th>
							<th style="background-color:#a9a9a9">Description</th>
							<th style="background-color:#a9a9a9">Action(s)</th>
						</tr>
					</thead>
					<?php
					if (mysqli_num_rows($result) > 0) {
						$i = 1;
						while ($row = $result->fetch_assoc()) {
							$given = $con->query("select * from quiz_given where quiz_id='" . $row['quiz_id'] . "' and user_id='" . $_SESSION['luser']['user_id'] . "';");
							if (mysqli_num_rows($given) > 0) {
								continue;
							}
					?>
							<tr style="border: 1px solid white;">
								<td style="background-color:#dddddd"><?= $i; ?></td>
								<td style="background-color:#dddddd"><?= $row['quiz_name']; ?></td>
								<td style="background-color:#dddddd"><?= $row['dept']; ?></td>
								<td style="background-color:#dddddd"><?= $row['college']; ?></td>
								<td style="background-color:#dddddd"><?= $row['quiz_info']; ?></td>
								<td style="background-color:#dddddd">
									<form method="POST" action="s_take_quiz.php">
										<input type="hidden" name="qid" value="<?= $row['quiz_id']; ?>">
										<button class="btn btn-primary me-2" type="submit" >Take Quiz</button>
									</form>
								</td>
							</tr>
					<?php
							$i++;
						}
					}
					?>
				</table>
			</div>
		</div>
	</div>

	<!-- Bootstrap -->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>