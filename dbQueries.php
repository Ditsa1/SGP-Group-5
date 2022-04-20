<?php
include 'config.php';

if (isset($_POST)) {
	switch ($_POST['type']) {
		case 'addStudent':
			$username = $_POST['username'];
			$first_name = $_POST['first_name'];
			$last_name = $_POST['last_name'];
			$dept = $_POST['dept'];
			$college = $_POST['college'];
			$password = $_POST['password'];
			$role = $_POST['role'];
			$sql = "INSERT INTO login(username, first_name, last_name, dept, college, password, role) 
			VALUES ('$username','$first_name','$last_name','$dept', '$college', '$password', '$role')";
			if (mysqli_query($con, $sql)) {
				echo 'success';
			} else {
				echo "Error: " . $sql . "<br>" . mysqli_error($con);
			}
			mysqli_close($con);
			break;
		case 'editStudent':
			$id = $_POST['id'];
			$username = $_POST['username'];
			$first_name = $_POST['first_name'];
			$last_name = $_POST['last_name'];
			$dept = $_POST['dept'];
			$college = $_POST['college'];
			$password = $_POST['password'];
			$sql = "UPDATE login SET username='$username',first_name='$first_name',last_name='$last_name',dept='$dept',college='$college',password='$password' WHERE user_id=$id";
			if (mysqli_query($con, $sql)) {
				echo 'success';
			} else {
				echo "Error: " . $sql . "<br>" . mysqli_error($con);
			}
			mysqli_close($con);
			break;
		case 'deleteStudent':
			$id = $_POST['id'];
			$sql = "DELETE FROM login WHERE user_id='$id' ";
			if (mysqli_query($con, $sql)) {
				echo $id;
			} else {
				echo "Error: " . $sql . "<br>" . mysqli_error($con);
			}
			mysqli_close($con);
			break;
		case 'deleteStudents':
			$id = $_POST['id'];
			$sql = "DELETE FROM login WHERE user_id in ($id)";
			if (mysqli_query($con, $sql)) {
				echo $id;
			} else {
				echo "Error: " . $sql . "<br>" . mysqli_error($con);
			}
			mysqli_close($con);
			break;
		case 'deleteQuiz':
			$id = $_POST['id'];
			$sql = "UPDATE quiz_list SET deleted='Yes' WHERE quiz_id='$id'";
			if (mysqli_query($con, $sql)) {
				echo 'success';
			}
			mysqli_close($con);
			break;
		case 'addQuiz':
			$id = $_POST['id'];
			$sql = "UPDATE quiz_list SET deleted='No' WHERE quiz_id='$id'";
			if (mysqli_query($con, $sql)) {
				echo 'success';
			}
			mysqli_close($con);
			break;
		case 'addQuestion':
			$sql = "insert into ques_list (quiz_id, quiz_que, opta, optb, optc, optd, quiz_ans, difficulty)
			values ('" . $_SESSION['quiz_id'] . "','" . $_POST['quiz_que'] . "','" . $_POST['opta'] . "','" . $_POST['optb'] . "','" . $_POST['optc'] . "','" . $_POST['optd'] . "','" . $_POST['quiz_ans'] . "','" . $_POST['difficulty'] . "')";
			if (mysqli_query($con, $sql)) {
				echo 'success';
			} else {
				echo "Error: " . $sql . "<br>" . mysqli_error($con);
			}
			mysqli_close($con);
			break;
		case 'editQuestion':
			$sql = "UPDATE ques_list SET quiz_que='" . $_POST['quiz_que'] . "',opta='" . $_POST['opta'] . "',optb='" . $_POST['optb'] . "',optc='" . $_POST['optc'] . "',optd='" . $_POST['optd'] . "',quiz_ans='" . $_POST['quiz_ans'] . "',difficulty='" . $_POST['difficulty'] . "'  WHERE ques_id=" . $_POST['id_q'];
			if (mysqli_query($con, $sql)) {
				echo 'success';
			} else {
				echo "Error: " . $sql . "<br>" . mysqli_error($con);
			}
			mysqli_close($con);
			break;
		case 'deleteQuestion':
			$id = $_POST['id'];
			$sql = "DELETE FROM ques_list WHERE ques_id='$id' ";
			if (mysqli_query($con, $sql)) {
				echo $id;
			} else {
				echo "Error: " . $sql . "<br>" . mysqli_error($con);
			}
			mysqli_close($con);
			break;
		case 'deleteQuestions':
			$id = $_POST['id'];
			$sql = "DELETE FROM ques_list WHERE ques_id in ($id)";
			if (mysqli_query($con, $sql)) {
				echo $id;
			} else {
				echo "Error: " . $sql . "<br>" . mysqli_error($con);
			}
			mysqli_close($con);
			break;
		case 'quizResult':
			$tq = count($_POST['ans']);
			$tc = 0;
			$status = 'Total Question: ' . $tq . ' Total Attempted: ' .  count($_POST['q']);

			$sql = "INSERT INTO quiz_ans (user_id, quiz_id, ques_id, stu_ans) VALUES ";
			foreach ($_POST['q'] as $q_id => $q_val) {
				$sql .= "('" . $_POST['user_id'] . "','" . $_POST['quiz_id'] . "','" . $q_id . "','" . $q_val . "'),";
				if ($_POST['ans'][$q_id] == $q_val) {
					$tc ++;
				}
			}
			$sql = substr($sql, 0, -1) . ';';
			
			$con->query($sql);

			$status .= ' Total Correct: ' . $tc . ' Score: ' . number_format((($tc * 100) / $tq), 2);

			$sql = "INSERT INTO quiz_given (user_id, quiz_id, quiz_status) VALUES ('" . $_POST['user_id'] . "','" . $_POST['quiz_id'] . "','$status')";

			$con->query($sql);
			
			echo 'success';

			break;
	}
}
