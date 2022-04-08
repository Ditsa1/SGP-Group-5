<?php

session_start();

if(!isset($_SESSION['login_admin']))
{
    header('Location: login.php');
}

include 'config.php';
if(count($_POST)>0){
	if($_POST['type']==1){
		$username=$_POST['username'];
		$first_name=$_POST['first_name'];
		$last_name=$_POST['last_name'];
		$dept=$_POST['dept'];
		$college=$_POST['college'];
		$password=$_POST['password'];
		$role="student";
		$sql = "INSERT INTO `login`( `username`, `first_name`, `last_name`, `dept`, `college`, `password`, `role`) 
		VALUES ('$username','$first_name','$last_name','$dept', '$college', '$password', '$role')";
		if (mysqli_query($con, $sql)) {
			echo json_encode(array("statusCode"=>200));
		} 
		else {
			echo "Error: " . $sql . "<br>" . mysqli_error($con);
		}
		mysqli_close($con);
	}
}
if(count($_POST)>0){
	if($_POST['type']==2){
		$id=$_POST['id'];
		$username=$_POST['username'];
		$first_name=$_POST['first_name'];
		$last_name=$_POST['last_name'];
		$dept=$_POST['dept'];
		$college=$_POST['college'];
		$password=$_POST['password'];
		$role="student";
		$sql = "UPDATE `login` SET `username`='$username',`first_name`='$first_name',`last_name`='$last_name',`dept`='$dept',`college`='$college',`password`='$password',`role`='$role' WHERE id=$id";
		if (mysqli_query($con, $sql)) {
			echo json_encode(array("statusCode"=>200));
		} 
		else {
			echo "Error: " . $sql . "<br>" . mysqli_error($con);
		}
		mysqli_close($con);
	}
}
if(count($_POST)>0){
	if($_POST['type']==3){
		$id=$_POST['id'];
		$sql = "DELETE FROM `login` WHERE id=$id ";
		if (mysqli_query($con, $sql)) {
			echo $id;
		} 
		else {
			echo "Error: " . $sql . "<br>" . mysqli_error($con);
		}
		mysqli_close($con);
	}
}
if(count($_POST)>0){
	if($_POST['type']==4){
		$id=$_POST['id'];
		$sql = "DELETE FROM login WHERE id in ($id)";
		if (mysqli_query($con, $sql)) {
			echo $id;
		} 
		else {
			echo "Error: " . $sql . "<br>" . mysqli_error($con);
		}
		mysqli_close($con);
	}
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

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Quizard</title>
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" href="css/style.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<script src="ajax.js"></script>

</head>
<body>
<div class="page">
    <div class="d-flex flex-column vh-100 flex-shrink-0 p-3 text-white bg-dark" style="width: 250px;"> <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none"> <svg class="bi me-2" width="40" height="32"> </svg> <span class="fs-4">Quizard!</span> </a>
        <hr>
        <ul class="nav nav-pills flex-column mb-auto">
            <li class="nav-item"> <a href="admin.php" class="nav-link text-white" aria-current="page"> <i class="fa fa-home"></i><span class="ms-2">Home</span> </a> </li>
            <li> <a href="a_student.php" class="nav-link active"> <i class="fa fa-dashboard"></i><span class="ms-2">Students</span> </a> </li>
            <li> <a href="a_teacher.php" class="nav-link text-white"> <i class="fa fa-dashboard"></i><span class="ms-2">Teachers</span> </a> </li>
            <li> <a href="a_result.php" class="nav-link text-white"> <i class="fa fa-first-order"></i><span class="ms-2">Result</span> </a> </li>
        
        </ul>
        <hr>
        <div class="dropdown"> <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false"> <img src="https://github.com/mdo.png" alt="" width="32" height="32" class="rounded-circle me-2"> <strong> <?php echo "Hi, ".$_SESSION['login_admin'] ?> </strong> </a>
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
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-6">
						<h2>Manage <b>Students</b></h2>
					</div>
					<div class="col-sm-6">
						<a href="#addStudentModal" class="btn btn-success" data-toggle="modal"><i class="material-icons"></i> <span>Add New Student</span></a>
						<a href="JavaScript:void(0);" class="btn btn-danger" id="delete_multiple"><i class="material-icons"></i> <span>Delete</span></a>						
					</div>
                </div>
            </div>
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
						<th>
							<span class="custom-checkbox">
								<input type="checkbox" id="selectAll">
								<label for="selectAll"></label>
							</span>
						</th>
						<th>NO.</th>
                        <th>USERNAME</th>
                        <th>NAME</th>
                        <th>SURNAME</th>
                        <th>DEPT.</th>
						<th>COLLEGE</th>
                        <th>PASSWORD</th>
                        <th>ROLE</th>
                        <th>ACTION</th>
                    </tr>
                </thead>
				<tbody>
				
				<?php
				$result = mysqli_query($con,"SELECT * FROM login where role='student'");
					$i=1;
					while($row = mysqli_fetch_array($result)) {
				?>
				<tr id="<?php echo $row["id"]; ?>">
				<td>
							<span class="custom-checkbox">
								<input type="checkbox" class="user_checkbox" data-user-id="<?php echo $row["id"]; ?>">
								<label for="checkbox2"></label>
							</span>
						</td>
					<td><?php echo $i; ?></td>
					<td><?php echo $row["username"]; ?></td>
					<td><?php echo $row["first_name"]; ?></td>
					<td><?php echo $row["last_name"]; ?></td>
					<td><?php echo $row["dept"]; ?></td>
					<td><?php echo $row["college"]; ?></td>
					<td><?php echo $row["password"]; ?></td>
					<td><?php echo $row["role"]; ?></td>
					<td>
						<a href="#editStudentModal" class="edit" data-toggle="modal">
							<i class="material-icons update" data-toggle="tooltip" 
							data-id="<?php echo $row["id"]; ?>"
							data-username="<?php echo $row["username"]; ?>"
							data-first_name="<?php echo $row["first_name"]; ?>"
							data-last_name="<?php echo $row["last_name"]; ?>"
							data-dept="<?php echo $row["dept"]; ?>"
							data-college="<?php echo $row["college"]; ?>"
							data-password="<?php echo $row["password"]; ?>"
							data-role="<?php echo $row["role"]; ?>"
							title="Edit"></i>
						</a>
						<a href="#deleteStudentModal" class="delete" data-id="<?php echo $row["id"]; ?>" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" 
						 title="Delete"></i></a>
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
	<div id="addStudentModal" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<form id="user_form">
					<div class="modal-header">						
						<h4 class="modal-title">Add Student</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
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
						<div class="form-group">
							<label>ROLE</label>
							<input type="text" id="role" name="role" class="form-control" required>
						</div>					
					</div>
					<div class="modal-footer">
					    <input type="hidden" value="1" name="type">
						<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
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
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
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
						<div class="form-group">
							<label>ROLE</label>
							<input type="text" id="role_u" name="role" class="form-control" required>
						</div>							
					</div>
					<div class="modal-footer">
					<input type="hidden" value="2" name="type">
						<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
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
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
					</div>
					<div class="modal-body">
						<input type="hidden" id="id_d" name="id" class="form-control">					
						<p>Are you sure you want to delete these records?</p>
						<p class="text-warning"><small>This action cannot be undone.</small></p>
					</div>
					<div class="modal-footer">
						<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
						<button type="button" class="btn btn-danger" id="delete">Delete</button>
					</div>
				</form>
			</div>
		</div>
	</div>

    <!-- Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</body>
</html>    