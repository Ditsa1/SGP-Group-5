<?php

session_start();

if(!isset($_SESSION['login_teacher']))
{
    header('Location: login.php');
}

if(isset($_POST['name'])){

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
        .block {
            background-color: rgb(182, 182, 212);
            display: flex;
            flex-direction: row;
            justify-content: space-between;
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
        }

        .code {
            margin-left: 20px;
        }

        .title1{
            text-align: center;
        }

        .question{
            display: flex;
        }

        #index{
            width: 50px;
        }

        .option{
            display: flex;
            flex-direction: column;
        }

        .nav>li>a:hover{
            background-color: #7390d8;
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
        
        </ul>
        <hr>
        <div class="dropdown"> <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false"> <img src="https://github.com/mdo.png" alt="" width="32" height="32" class="rounded-circle me-2"> <strong>  <?php echo "Hi, ".$_SESSION['login_teacher'] ?> </strong> </a>
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


        <?php 
        if(isset($_POST['name'])) {
        ?>
            
        <?php } ?>



            <div class="content container-lg">
                <div class="row">
                    <span class="title1 mt-5">
                        <p>Enter Quiz Details</p>
                    </span><br /><br />
                    <div class="col-md-3"></div>
                    <div class="col-md-6">
                        <form class="form-horizontal title1" action="t_create_quiz.php" method="POST">
                            <div class="form-group">
                                <div class="col-md-12">
                                    <input id="name" name="name" placeholder="Enter Quiz title"
                                        class="form-control input-md" type="text">
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-12 question">
                                    <input id="index" name="index" value="1" class="form-control" type="number">
                                    <input id="question" name="question" placeholder="Enter Question" class="form-control input-md" type="text">
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-12 option">
                                    <input class="mt-3" type="text" name="optionA" id="optionA" placeholder="A">
                                    <input class="mt-3" type="text" name="optionB" id="optionB" placeholder="B">
                                    <input class="mt-3" type="text" name="optionC" id="optionC" placeholder="C">
                                    <input class="mt-3" type="text" name="optionD" id="optionD" placeholder="D">
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-12">
                                    <select class="form-select" aria-label="Default select example">
                                        <option selected>Open this select menu</option>
                                        <option value="1">A</option>
                                        <option value="2">B</option>
                                        <option value="3">C</option>
                                        <option value="4">D</option>
                                      </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-12 control-label" for="wrong"></label>
                                <div class="col-md-12">
                                    <select class="form-select" aria-label="Default select example">
                                        <option selected>Open this select menu</option>
                                        <option value="1">Easy</option>
                                        <option value="2">Medium</option>
                                        <option value="3">Hard</option>
                                      </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-12 control-label" for=""></label>
                                <div class="col-md-12">
                                    <a href=""><img src="../add1.png" alt="">Add</a>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-12 control-label" for=""></label>
                                <div class="col-md-12">
                                    <input type="submit" class="btn btn-primary" value="Create"/>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>

    <!-- Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>
