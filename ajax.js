$(document).on("click", ".quiz_submit", function () {
	$.ajax({
		url: "dbQueries.php",
		type: "POST",
		cache: false,
		data: $('#quiz_form').serialize(),
		success: function (result) {
			location.href = 's_quiz.php';
		}
	});
});

$(document).on("click", ".qdelete", function () {
	$('#id_qd').val($(this).data("id"));
});

$(document).on("click", "#qdelete", function () {
	$.ajax({
		url: "dbQueries.php",
		type: "POST",
		cache: false,
		data: {
			type: 'deleteQuestion',
			id: $("#id_qd").val()
		},
		success: function (result) {
			$('#deleteQuestionModal').modal('hide');
			$("#" + result).remove();

		}
	});
});
$(document).on("click", "#delete_multiple_q", function () {
	var que = [];
	$(".que_checkbox:checked").each(function () {
		que.push($(this).data('que-id'));
	});
	if (que.length <= 0) {
		alert("Please select records.");
	}
	else {
		WRN_PROFILE_DELETE = "Are you sure you want to delete " + (que.length > 1 ? "these" : "this") + " row?";
		var checked = confirm(WRN_PROFILE_DELETE);
		if (checked == true) {
			var selected_values = que.join(",");
			console.log(selected_values);
			$.ajax({
				type: "POST",
				url: "dbQueries.php",
				cache: false,
				data: {
					type: 'deleteQuestions',
					id: selected_values
				},
				success: function (response) {
					var ids = response.split(",");
					for (var i = 0; i < ids.length; i++) {
						$("#" + ids[i]).remove();
					}
				}
			});
		}
	}
});

$(document).on('click', '#q_update', function (e) {
	var data = $("#q_update_form").serialize();
	$.ajax({
		data: data,
		type: "post",
		url: "dbQueries.php",
		success: function (result) {
			if (result == 'success') {
				$('#editStudentModal').hide();
				alert('Data updated successfully!');
				location.href = 't_manage_quiz.php';
			}
		}
	});
});

$(document).on('click', '.qupdate', function (e) {
	$('#id_q').val($(this).data("id"));
	$('#quiz_que').val($(this).data("que"));
	$('#opta').val($(this).data("opta"));
	$('#optb').val($(this).data("optb"));
	$('#optc').val($(this).data("optc"));
	$('#optd').val($(this).data("optd"));
	$('#quiz_ans').val($(this).data("qa"));
	$('#difficulty').val($(this).data("qd"));

});


$(document).on('click', '#q-add', function (e) {
	var data = $("#que_add_form").serialize();
	$.ajax({
		data: data,
		type: "post",
		url: "dbQueries.php",
		success: function (result) {
			if (result == 'success') {
				$('#addQuestionModal').modal('hide');
				alert('Question added successfully!');
				location.href = 't_manage_quiz.php';
			}
		}
	});
});

$(document).on('click', '#deleteQuiz', function (e) {
	var quiz_id = $(this).data('qid');
	$.ajax({
		data: {
			type: 'deleteQuiz',
			id: quiz_id
		},
		type: "post",
		url: "dbQueries.php",
		success: function (result) {
			if (result == 'success') {
				location.reload();
			}
		}
	});
});

$(document).on('click', '#addQuiz', function (e) {
	var quiz_id = $(this).data('qid');
	$.ajax({
		data: {
			type: 'addQuiz',
			id: quiz_id
		},
		type: "post",
		url: "dbQueries.php",
		success: function (result) {
			if (result == 'success') {
				location.reload();
			}
		}
	});
});

$(document).on('click', '#btn-add', function (e) {
	var data = $("#user_form").serialize();
	$.ajax({
		data: data,
		type: "post",
		url: "dbQueries.php",
		success: function (result) {
			if (result == 'success') {
				$('#addStudentModal').modal('hide');
				alert('Data added successfully!');
				location.reload();
			}
		}
	});
});

$(document).on('click', '.update', function (e) {
	var id = $(this).attr("data-id");
	var username = $(this).attr("data-username");
	var first_name = $(this).attr("data-first_name");
	var last_name = $(this).attr("data-last_name");
	var dept = $(this).attr("data-dept");
	var college = $(this).attr("data-college");
	var password = $(this).attr("data-password");
	var role = $(this).attr("data-role");
	$('#id_u').val(id);
	$('#username_u').val(username);
	$('#first_name_u').val(first_name);
	$('#last_name_u').val(last_name);
	$('#dept_u').val(dept);
	$('#college_u').val(college);
	$('#password_u').val(password);
	$('#role_u').val(role);
});

$(document).on('click', '#update', function (e) {
	var data = $("#update_form").serialize();
	$.ajax({
		data: data,
		type: "post",
		url: "dbQueries.php",
		success: function (result) {
			console.log('AJAX: ', result);
			if (result == 'success') {
				$('#editStudentModal').hide();
				alert('Data updated successfully!');
				location.reload();
			}
		}
	});
});

$(document).on("click", ".delete", function () {
	var id = $(this).attr("data-id");
	$('#id_d').val(id);

});
$(document).on("click", "#delete", function () {
	$.ajax({
		url: "dbQueries.php",
		type: "POST",
		cache: false,
		data: {
			type: 'deleteStudent',
			id: $("#id_d").val()
		},
		success: function (result) {
			$('#deleteStudentModal').modal('hide');
			$("#" + result).remove();

		}
	});
});
$(document).on("click", "#delete_multiple", function () {
	var user = [];
	$(".user_checkbox:checked").each(function () {
		user.push($(this).data('user-id'));
	});
	if (user.length <= 0) {
		alert("Please select records.");
	}
	else {
		WRN_PROFILE_DELETE = "Are you sure you want to delete " + (user.length > 1 ? "these" : "this") + " row?";
		var checked = confirm(WRN_PROFILE_DELETE);
		if (checked == true) {
			var selected_values = user.join(",");
			console.log(selected_values);
			$.ajax({
				type: "POST",
				url: "dbQueries.php",
				cache: false,
				data: {
					type: 'deleteStudents',
					id: selected_values
				},
				success: function (response) {
					var ids = response.split(",");
					for (var i = 0; i < ids.length; i++) {
						$("#" + ids[i]).remove();
					}
				}
			});
		}
	}
});
$(document).ready(function () {
	// QUIZ
	cq = 0; // current question
	tq = $('.que').length; // total question
	$('.que:not(:first-child)').hide();
	$('#pq').hide();
	if (tq < 2) { $('#nq').hide(); }
	// QUIZ - END

	$('[data-toggle="tooltip"]').tooltip();
	var checkbox = $('table tbody input[type="checkbox"]');
	$("#selectAll").click(function () {
		if (this.checked) {
			checkbox.each(function () {
				this.checked = true;
			});
		} else {
			checkbox.each(function () {
				this.checked = false;
			});
		}
	});
	checkbox.click(function () {
		if (!this.checked) {
			$("#selectAll").prop("checked", false);
		}
	});
});


var cq, tq;
function previousQuestion() {
	$('#nq').show();

	$('#q' + cq).hide();

	cq--;

	if (cq == 0) {
		$('#pq').hide();
	}

	$('#q' + cq).show();

}

function nextQuestion() {
	$('#pq').show();

	$('#q' + cq).hide();

	cq++;

	if (cq == (tq - 1)) {
		$('#nq').hide();
	}

	$('#q' + cq).show();

}