<?php
include 'config.php';
if (!isset($_SESSION['login_student'])) {
	header('Location: login.php');
}
$quiz = $con->query("select * from quiz_list where quiz_id=" . $_POST['qid'])->fetch_assoc();
$que = $con->query("select * from ques_list where quiz_id=" . $_POST['qid']);
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Quizard</title>
	<style>
		
		.ms-2, .fs-4, .dropdown {
			font-size: 16px;
			font-family: 'Segoe UI';
		}
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

	<!-- Icons -->
	<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>

<body>
	<div class="page">
		<div class="d-flex flex-column vh-100 flex-shrink-0 p-3 text-white bg-dark" style="width: 250px;"> <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none"> <svg class="bi me-2" width="40" height="32"> </svg> <span class="fs-4">Quizard!</span> </a>
			<hr>
			<ul class="nav nav-pills flex-column mb-auto">
				<li class="nav-item"> <a href="student.php" class="nav-link text-white" aria-current="page"> <span class="ms-2">Home</span> </a> </li>
				<li> <a href="s_quiz.php" class="nav-link active"> <span class="ms-2">Quizzes</span> </a> </li>
				<li> <a href="s_result.php" class="nav-link text-white"> <span class="ms-2">Result</span> </a> </li>
				<li> <a href="s_contact.php" class="nav-link text-white"> <span class="ms-2">Contact</span> </a> </li>

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
				<div class="pt-3">
					<h4 class="">Quiz - <?= $quiz['quiz_name']; ?></h4>

					<p><?= $quiz['quiz_info']; ?></p>
				</div>

				<div class="text-end">
					<button class="btn btn-success quiz_submit">SUBMIT</button>
				</div>

				<form id="quiz_form">
					<?php
					$q = 0;
					while ($row = $que->fetch_assoc()) {
					?>
						<div id="q<?= $q; ?>" class="que border">
							<input name="ans[<?= $row['ques_id']; ?>]" type="hidden" value="<?= $row['quiz_ans']; ?>">

							<div class="bg-primary text-white p-2"><strong>Question: </strong><?= $row['quiz_que']; ?></div>

							<ol class="mt-3" type="a">
								<li>
									<div class="form-group">
										<input name="q[<?= $row['ques_id']; ?>]" type="checkbox" value="1">
										<label><?= $row['opta']; ?></label>
									</div>
								</li>

								<li>
									<div class="form-group">
										<input name="q[<?= $row['ques_id']; ?>]" type="checkbox" value="2">
										<label><?= $row['optb']; ?></label>
									</div>
								</li>

								<li>
									<div class="form-group">
										<input name="q[<?= $row['ques_id']; ?>]" type="checkbox" value="3">
										<label><?= $row['optc']; ?></label>
									</div>
								</li>

								<li>
									<div class="form-group">
										<input name="q[<?= $row['ques_id']; ?>]" type="checkbox" value="4">
										<label><?= $row['optd']; ?></label>
									</div>
								</li>
							</ol>

							<div class="bg-primary text-white p-2">Select any one of above options</div>
						</div>
					<?php
						$q++;
					}
					?>
					<input name="type" type="hidden" value="quizResult">
					<input name="user_id" type="hidden" value="<?= $_SESSION['luser']['user_id']; ?>">
					<input name="quiz_id" type="hidden" value="<?= $_POST['qid']; ?>">
				</form>

				<div class="text-end">
					<button id="pq" class="bg-primary text-white" onclick="previousQuestion();">&lt;&lt; Previous</button>
					<button id="nq" class="bg-primary text-white" onclick="nextQuestion();">Next &gt;&gt;</button>
				</div>
			</div>
		</div>
	</div>
	<!-- Bootstrap -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
	<script src="ajax.js"></script>
</body>

</html>