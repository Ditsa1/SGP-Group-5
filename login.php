<?php
session_start();

include 'config.php';

$msg = '';
$role = '';

if (isset($_POST["login"]))
{
    $username = $_POST["username"];
    $password = $_POST["password"];

    $query = "SELECT * FROM login where username = '$username' AND password = '$password'";
    $result = mysqli_query($con, $query);

    if(mysqli_num_rows($result) > 0)
    {
        while($row = $result->fetch_assoc())
        {
            $role = $row["role"];
            if (empty($_POST["username"])) 
            {
                    $msg = "Please enter username.";
            }

            else if($password == $row["password"] AND $username == $row["username"])
            {
                if($role == "admin")
                {
                    $_SESSION['login_admin'] = $row["first_name"];
                    header('Location: admin.php');
                }
                else if($role == "teacher")
                {
                    $_SESSION['login_teacher'] = $row["first_name"];
                    header('Location: teacher.php');
                }
                else
                {
                    $_SESSION['login_student'] = $row["first_name"];
                    header('Location: student.php');
                }
            }
            else
            {
                $msg = "Wrong password, please retry.";
            }
            
        }
    }
}

$con->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="css/home.css">
    <title>Login</title>

</head>
<body>
    <section class="vh-100 gradient-custom">
    <form method="post" action="login.php">
    <div class="container py-5">
        <div class="row d-flex justify-content-center align-items-center">
        <div class="col-12 col-md-8 col-lg-6 col-xl-5">
            <div class="card bg-dark text-white" style="border-radius: 1rem;">
            <div class="card-body p-5 text-center">

                <div class="mb-md-5 mt-md-4 pb-5">

                <h2 class="fw-bold mb-2 text-uppercase">QUIZARD</h2>
                <p class="text-white-50 mb-5">Please enter your username and password.</p>

                <div class="form-outline form-white mb-4">
                    <input type="email" id="typeEmailX" name="username" class="form-control form-control-lg" placeholder="Username"/>
                </div>

                <div class="form-outline form-white mb-4">
                    <input type="password" id="typePasswordX" name="password" class="form-control form-control-lg" placeholder="Password"/>
                </div>

                <?php echo $msg; ?>

                <button class="btn btn-outline-light btn-lg px-5" type="submit" name="login">Login</button>

                <div class="d-flex justify-content-center text-center mt-4 pt-1">
                </div>
                </div>
            </div>
            </div>
        </div>
        </div>
    </div>
    </form>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    
</body>
</html>