<?php
include 'config.php';
if (!isset($_SESSION['login_teacher'])) {
	header('Location: login.php');
}
if (!empty($_REQUEST['qid'])) {
	$_SESSION['quiz_id'] = $quiz_id = $_REQUEST['qid'];
}

$quiz = mysqli_fetch_array(mysqli_query($con, "select * from quiz_list where quiz_id=" . $_SESSION['quiz_id']));
$questions = mysqli_query($con, "select * from ques_list where quiz_id=" . $_SESSION['quiz_id']);

?>
<!DOCTYPE html>
<html lang="en">

<head>
	<style>
		.page {
			display: flex;
		}
		.ms-2, .fs-4, .dropdown {
			font-size: 16px;
			font-family: 'Segoe UI';
		}
	</style>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Quizard</title>

	<!-- Bootstrap 5 CSS-->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

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

		/* .bt-start2{
            width: 70px;
            height: 30px;
            margin-top: 4px;
            margin-right: 4px;
            
        } */
		.bt-start {
			width: 70px;
			height: 30px;
			margin-top: 25px;
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

	<!-- CSS -->
	<link rel="stylesheet" href="css/home.css">
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="css/student.css">


	<!-- Icons -->
	<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

	<!-- JS -->
	<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
	<!-- Bootstrap 5 JS  Bundle with Popper -->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

	<script src="ajax.js"></script>
</head>

<body>
	<div class="page">
		<div class="d-flex flex-column vh-100 flex-shrink-0 p-3 text-white bg-dark" style="width: 250px;"> <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none"> <svg class="bi me-2" width="40" height="32"> </svg> <span class="fs-4">Quizard!</span> </a>
			<hr>
			<ul class="nav nav-pills flex-column mb-auto">
				<li class="nav-item"> <a href="teacher.php" class="nav-link text-white" aria-current="page"> <span class="ms-2">Home</span> </a> </li>
				<li> <a href="t_quiz.php" class="nav-link active"> <span class="ms-2">Quizzes</span> </a> </li>
				<li> <a href="t_create_quiz.php" class="nav-link text-white"> <span class="ms-2">Create Quiz</span> </a> </li>
				<li> <a href="t_result.php" class="nav-link text-white"> <span class="ms-2">Result</span> </a> </li>
				<li> <a href="t_contact.php" class="nav-link text-white"> <span class="ms-2">Contact</span> </a> </li>
			</ul>
			<hr>
			<div class="dropdown"> <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false"> <img src="imgs/user1.png" alt="" width="32" height="32" class="rounded-circle me-2"> <strong> <?php echo "Hi, " . $_SESSION['login_teacher'] ?></strong> </a>
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

		<div class="container-fluid">
			<p id="success"></p>

			<div class="table-wrapper">
				<div class="table-title" style="background-color:#a9a9a9">
					<div class="row">
						<div class="col-sm-6">
							<h2>Manage <b>Quiz</b> - <?= $quiz['quiz_name']; ?></h2>
						</div>
						<div class="col-sm-6">
							<!-- Button trigger modal -->
							<button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addQuestionModal"><i class="material-icons"></i><span>Add Question</span></button>
							<a href="JavaScript:void(0);" class="btn btn-danger" id="delete_multiple_q"><i class="material-icons"></i> <span>Delete</span></a>
						</div>
					</div>
				</div>

				<table class="table table-striped table-hover">
					<thead>
						<tr style="border: 1px solid white;">
							<th style="background-color:#a9a9a9">
								<span class="custom-checkbox">
									<input type="checkbox" id="selectAll">
									<label for="selectAll"></label>
								</span>
							</th>
							<th style="background-color:#a9a9a9">NO.</th>
							<th style="background-color:#a9a9a9">Question</th>
							<th style="background-color:#a9a9a9">ACTION</th>
						</tr>
					</thead>
					<tbody>
						<?php
						$i = 1;
						while ($row = mysqli_fetch_array($questions)) {
						?>
							<tr id="<?php echo $row["ques_id"]; ?>">
								<td style="background-color:#dddddd">
									<span class="custom-checkbox">
										<input type="checkbox" class="que_checkbox" data-que-id="<?php echo $row["ques_id"]; ?>">
										<label for="checkbox2"></label>
									</span>
								</td>
								<td style="background-color:#dddddd"><?php echo $i; ?></td>
								<td style="background-color:#dddddd">
									<div><?= $row['quiz_que']; ?></div>
									<ol type="a">
										<li><?= $row['opta']; ?></li>
										<li><?= $row['optb']; ?></li>
										<li><?= $row['optc']; ?></li>
										<li><?= $row['optd']; ?></li>
									</ol>
								</td>
								<td style="background-color:#dddddd">
									<a href="#" class="edit" data-bs-toggle="modal" data-bs-target="#editQuestionModal">
										<i class="material-icons qupdate" data-toggle="tooltip" data-id="<?= $row['ques_id']; ?>" data-que="<?php echo $row["quiz_que"]; ?>" data-opta="<?php echo $row["opta"]; ?>" data-optb="<?php echo $row["optb"]; ?>" data-optc="<?php echo $row["optc"]; ?>" data-optd="<?php echo $row["optd"]; ?>" data-qa="<?php echo $row["quiz_ans"]; ?>" data-qd="<?php echo $row["difficulty"]; ?>" data-opta="<?php echo $row["opta"]; ?>" data-opta="<?php echo $row["opta"]; ?>" title="Edit"></i>
									</a>
									<a href="#" class="qdelete" data-id="<?php echo $row["ques_id"]; ?>" data-bs-toggle="modal" data-bs-target="#deleteQuestionModal"><i class="material-icons" data-toggle="tooltip" title="Delete"></i></a>
								</td>
							</tr>
						<?php
							$i++;
						}
						?>
					</tbody>
				</table>

			</div>
		</div>
		<!-- Add Modal HTML -->
		<div class="modal fade" id="addQuestionModal">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<h4 class="modal-title">Add Question</h4>
						<button type="button" class="btn-close" data-bs-dismiss="modal"></button>
					</div>

					<form id="que_add_form">
						<div class="modal-body">
							<div class="form-group">
								<label class="form-label">Question</label>
								<input name="quiz_que" placeholder="Enter Question" class="form-control" type="text">
							</div>

							<div class="my-2">Options</div>

							<div class="form-group">
								<input class="form-control mb-2" type="text" name="opta" placeholder="A">
								<input class="form-control mb-2" type="text" name="optb" placeholder="B">
								<input class="form-control mb-2" type="text" name="optc" placeholder="C">
								<input class="form-control mb-2" type="text" name="optd" placeholder="D">
							</div>

							<div class="form-group">
								<label class="form-label">Correct Answuer</label>
								<select class="form-select" name="quiz_ans">
									<option selected>Open this select menu</option>
									<option value="1">A</option>
									<option value="2">B</option>
									<option value="3">C</option>
									<option value="4">D</option>
								</select>
							</div>

							<div class="form-group">
								<label class="form-label mt-2">Difficulty Level</label>
								<div class="col-md-12">
									<select class="form-select" name="difficulty">
										<option selected>Open this select menu</option>
										<option value="1">Easy</option>
										<option value="2">Medium</option>
										<option value="3">Hard</option>
									</select>
								</div>
							</div>
						</div>

						<div class="modal-footer">
							<input type="hidden" value="addQuestion" name="type">
							<button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
							<button type="button" class="btn btn-success" id="q-add">Add</button>
						</div>
					</form>
				</div>
			</div>
		</div>
		<!-- Edit Modal HTML -->
		<div id="editQuestionModal" class="modal fade">
			<div class="modal-dialog">
				<div class="modal-content">
					<form id="q_update_form">
						<div class="modal-header">
							<h4 class="modal-title">Edit Question</h4>
							<button type="button" class="btn-close" data-bs-dismiss="modal"></button>
						</div>
						<div class="modal-body">
							<input type="hidden" id="id_q" name="id_q" class="form-control" required>

							<div class="form-group">
								<label class="form-label">Question</label>
								<input id="quiz_que" name="quiz_que" placeholder="Enter Question" class="form-control" type="text">
							</div>

							<div class="my-2">Options</div>

							<div class="form-group">
								<input class="form-control mb-2" type="text" id="opta" name="opta" placeholder="A">
								<input class="form-control mb-2" type="text" id="optb" name="optb" placeholder="B">
								<input class="form-control mb-2" type="text" id="optc" name="optc" placeholder="C">
								<input class="form-control mb-2" type="text" id="optd" name="optd" placeholder="D">
							</div>

							<div class="form-group">
								<label class="form-label">Correct Answuer</label>
								<select class="form-select" id="quiz_ans" name="quiz_ans">
									<option selected>Open this select menu</option>
									<option value="1">A</option>
									<option value="2">B</option>
									<option value="3">C</option>
									<option value="4">D</option>
								</select>
							</div>

							<div class="form-group">
								<label class="form-label mt-2">Difficulty Level</label>
								<div class="col-md-12">
									<select class="form-select" id="difficulty" name="difficulty">
										<option selected>Open this select menu</option>
										<option value="1">Easy</option>
										<option value="2">Medium</option>
										<option value="3">Hard</option>
									</select>
								</div>
							</div>
						</div>

						<div class="modal-footer">
							<input type="hidden" value="editQuestion" name="type">
							<button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
							<button type="button" class="btn btn-info" id="q_update">Update</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
	<!-- Delete Modal HTML -->
	<div id="deleteQuestionModal" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<form>
					<div class="modal-header">
						<h4 class="modal-title">Delete Student</h4>
						<button type="button" class="btn-close" data-bs-dismiss="modal"></button>
					</div>
					<div class="modal-body">
						<input type="hidden" id="id_qd" name="id_qd" class="form-control">
						<p>Are you sure you want to delete these records?</p>
						<p class="text-warning"><small>This action cannot be undone.</small></p>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
						<button type="button" class="btn btn-danger" id="qdelete">Delete</button>
					</div>
				</form>
			</div>
		</div>
	</div>
	</div>
</body>

</html>