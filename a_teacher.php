<?php
include 'config.php';
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
		.ms-2, .fs-4, .dropdown {
			font-size: 16px;
			font-family: 'Segoe UI';
		}
	</style>

	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<title>Quizard</title>

	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

	<!-- Bootstrap CSS -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

	<!-- CSS -->
	<link rel="stylesheet" href="css/home.css">
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="css/student.css">

	<!-- JS -->
	<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
	<!-- Bootstrap 5 JS  Bundle with Popper -->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

	<script src="ajax.js"></script>

</head>

<body>
	<div class="page">
		<div class="d-flex flex-column vh-100 flex-shrink-0 p-3 text-white bg-dark" style="width: 250px;">
			<a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
				<svg class="bi me-2" width="40" height="32"> </svg> <span class="fs-4">Quizard!</span>
			</a>
			<hr>
			<ul class="nav nav-pills flex-column mb-auto">
				<li class="nav-item"> <a href="admin.php" class="nav-link text-white" aria-current="page"> <span class="ms-2">Home</span> </a> </li>
				<li> <a href="a_student.php" class="nav-link text-white"> <span class="ms-2">Students</span> </a> </li>
				<li> <a href="a_teacher.php" class="nav-link active"> <span class="ms-2">Teachers</span> </a> </li>
			
			</ul>
			<hr>
			<div class="dropdown"> <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false"> <img src="imgs/user1.png" alt="" width="32" height="32" class="rounded-circle me-2"> <strong> <?php echo "Hi, " . $_SESSION['login_admin'] ?> </strong> </a>
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
			<p id="success"></p>
			<div class="table-wrapper">
				<div class="table-title" style="background-color:#a9a9a9">
					<div class="row">
						<div class="col-sm-6">
							<h2>Manage <b>Teachers</b></h2>
						</div>
						<div class="col-sm-6">
							<!-- Button trigger modal -->
							<button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addStudentModal"><i class="material-icons"></i><span>Add New Teacher</span></button>
							<a href="JavaScript:void(0);" class="btn btn-danger" id="delete_multiple"><i class="material-icons"></i> <span>Delete</span></a>
						</div>
					</div>
				</div>
				<table class="table table-striped table-hover">
					<thead>
						<tr>
							<th style="background-color:#a9a9a9">
								<span class="custom-checkbox">
									<input type="checkbox" id="selectAll">
									<label for="selectAll"></label>
								</span>
							</th>
							<th style="background-color:#a9a9a9">NO.</th>
							<th style="background-color:#a9a9a9">USERNAME</th>
							<th style="background-color:#a9a9a9">NAME</th>
							<th style="background-color:#a9a9a9">SURNAME</th>
							<th style="background-color:#a9a9a9">DEPT.</th>
							<th style="background-color:#a9a9a9">COLLEGE</th>
							<th style="background-color:#a9a9a9">PASSWORD</th>
							<th style="background-color:#a9a9a9">ROLE</th>
							<th style="background-color:#a9a9a9">ACTION</th>
						</tr>
					</thead>
					<tbody>
						<?php
						$result = mysqli_query($con, "SELECT * FROM login where role='teacher'");
						$i = 1;
						while ($row = mysqli_fetch_array($result)) {
						?>
							<tr id="<?php echo $row["user_id"]; ?>">
								<td style="background-color:#dddddd">
									<span class="custom-checkbox">
										<input type="checkbox" class="user_checkbox" data-user-id="<?php echo $row["user_id"]; ?>">
										<label for="checkbox2"></label>
									</span>
								</td>
								<td style="background-color:#dddddd"><?php echo $i; ?></td>
								<td style="background-color:#dddddd"><?php echo $row["username"]; ?></td>
								<td style="background-color:#dddddd"><?php echo $row["first_name"]; ?></td>
								<td style="background-color:#dddddd"><?php echo $row["last_name"]; ?></td>
								<td style="background-color:#dddddd"><?php echo $row["dept"]; ?></td>
								<td style="background-color:#dddddd"><?php echo $row["college"]; ?></td>
								<td style="background-color:#dddddd"><?php echo $row["password"]; ?></td>
								<td style="background-color:#dddddd"><?php echo $row["role"]; ?></td>
								<td style="background-color:#dddddd">
									<a href="#" class="edit" data-bs-toggle="modal" data-bs-target="#editStudentModal">
										<i class="material-icons update" data-toggle="tooltip" data-id="<?php echo $row["user_id"]; ?>" data-username="<?php echo $row["username"]; ?>" data-first_name="<?php echo $row["first_name"]; ?>" data-last_name="<?php echo $row["last_name"]; ?>" data-dept="<?php echo $row["dept"]; ?>" data-college="<?php echo $row["college"]; ?>" data-password="<?php echo $row["password"]; ?>" data-role="<?php echo $row["role"]; ?>" title="Edit"></i>
									</a>
									<a href="#" class="delete" data-id="<?php echo $row["user_id"]; ?>" data-bs-toggle="modal" data-bs-target="#deleteStudentModal"><i class="material-icons" data-toggle="tooltip" title="Delete"></i></a>
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
		<div class="modal fade" id="addStudentModal">
			<div class="modal-dialog">
				<div class="modal-content">
					<form id="user_form">
						<div class="modal-header">
							<h4 class="modal-title">Add Teacher</h4>
							<button type="button" class="btn-close" data-bs-dismiss="modal" ></button>
						</div>
						<div class="modal-body">
							<div class="form-group">
								<label>USERNAME</label>
								<input type="email" id="username" name="username" class="form-control" required>
							</div>
							<div class="form-group">
								<label>NAME</label>
								<input type="text" id="first_name" name="first_name" class="form-control" required>
							</div>
							<div class="form-group">
								<label>SURNAME</label>
								<input type="text" id="last_name" name="last_name" class="form-control" required>
							</div>
							<div class="form-group">
								<label>DEPT.</label>
								<input type="text" id="dept" name="dept" class="form-control" required>
							</div>
							<div class="form-group">
								<label>COLLEGE</label>
								<input type="text" id="college" name="college" class="form-control" required>
							</div>
							<div class="form-group">
								<label>PASSWORD</label>
								<input type="text" id="password" name="password" class="form-control" required>
							</div>
						</div>
						<div class="modal-footer">
							<input type="hidden" value="addStudent" name="type">
							<input type="hidden" value="teacher" name="role">
							<button type="button" class="btn btn-danger" data-bs-dismiss="modal" >Cancel</button>
							<button type="button" class="btn btn-success" id="btn-add">Add</button>
						</div>
					</form>
				</div>
			</div>
		</div>
		<!-- Edit Modal HTML -->
		<div id="editStudentModal" class="modal fade">
			<div class="modal-dialog">
				<div class="modal-content">
					<form id="update_form">
						<div class="modal-header">
							<h4 class="modal-title">Edit User</h4>
							<button type="button" class="btn-close" data-bs-dismiss="modal" ></button>
						</div>
						<div class="modal-body">
							<input type="hidden" id="id_u" name="id" class="form-control" required>

							<div class="form-group">
								<label>USERNAME</label>
								<input type="email" id="username_u" name="username" class="form-control" required>
							</div>
							<div class="form-group">
								<label>NAME</label>
								<input type="text" id="first_name_u" name="first_name" class="form-control" required>
							</div>
							<div class="form-group">
								<label>SURNAME</label>
								<input type="text" id="last_name_u" name="last_name" class="form-control" required>
							</div>
							<div class="form-group">
								<label>DEPT.</label>
								<input type="text" id="dept_u" name="dept" class="form-control" required>
							</div>
							<div class="form-group">
								<label>COLLEGE</label>
								<input type="text" id="college_u" name="college" class="form-control" required>
							</div>
							<div class="form-group">
								<label>PASSWORD</label>
								<input type="text" id="password_u" name="password" class="form-control" required>
							</div>
						</div>
						<div class="modal-footer">
							<input type="hidden" value="editStudent" name="type">
							<button type="button" class="btn btn-danger" data-bs-dismiss="modal" >Cancel</button>
							<button type="button" class="btn btn-info" id="update">Update</button>
						</div>
					</form>
				</div>
			</div>
		</div>
		<!-- Delete Modal HTML -->
		<div id="deleteStudentModal" class="modal fade">
			<div class="modal-dialog">
				<div class="modal-content">
					<form>
						<div class="modal-header">
							<h4 class="modal-title">Delete Student</h4>
							<button type="button" class="btn-close" data-bs-dismiss="modal" ></button>
						</div>
						<div class="modal-body">
							<input type="hidden" id="id_d" name="id" class="form-control">
							<p>Are you sure you want to delete these records?</p>
							<p class="text-warning"><small>This action cannot be undone.</small></p>
						</div>
						<div class="modal-footer">
						<button type="button" class="btn btn-danger" data-bs-dismiss="modal" >Cancel</button>
							<button type="button" class="btn btn-danger" id="delete">Delete</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</body>

</html>