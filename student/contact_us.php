<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact-us</title>

<!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

<!-- CSS -->
<!-- <link rel="stylesheet" href="teacher.css"> -->

<!-- Bootstrap 5 CSS-->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css">

<!-- Bootstrap 5 JS-->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js">

<!-- Icons -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<!-- JS -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js">

<style>
    .nav{
        display: inline inline-flexbox;
    }
</style>





    <style>
        body {
    background-color: whitesmoke;
    padding-top: 70px;
}

h1 {
    font-family: 'Poppins', sans-serif, 'arial';
    font-weight: 300;
    font-size: 42px;
    color: black;
    text-align: center;
}


/* ///// inputs /////*/

input:focus ~ label, textarea:focus ~ label, input:valid ~ label, textarea:valid ~ label {
    font-size: 0.5em;
    color:grey;
    /* top: -5px; */
    -webkit-transition: all 0.225s ease;
    transition: all 0.225s ease;
}

.styled-input {
    float: left;
    width: 500px;
    margin: 1rem 0;
    position: relative;
    border-radius: 4px;
}

@media only screen and (max-width: 768px){
    .styled-input {
        width:100%;
    }
}

.styled-input label {
    color: black;
    padding: 1.3rem 30px 1rem 30px;
    position: absolute;
    top: 10px;
    left: 0;
    -webkit-transition: all 0.25s ease;
    transition: all 0.25s ease;
    pointer-events: none;
}

.styled-input.wide { 
    width: 300px;
    max-width: 100%;
    border-color: black;
}

input,
textarea {
    padding: 30px;
    border: 0;
    width: 60%;
    font-size: .7rem;
    background-color: whitesmoke;
    color: black;
    border-radius: 3px;
    
}

input:focus,
textarea:focus { outline: 0; }

input:focus ~ span,
textarea:focus ~ span {
    width: 100%;
    -webkit-transition: all 0.075s ease;
    transition: all 0.075s ease;
}

textarea {
    width: 100%;
    min-height: 5em;
}

.input-container {
    width: 300px;
    max-width: 100%;
    margin: 20px auto 25px auto;
}

.submit-btn {
    /* float: right; */
    padding: 7px 35px;
    border-radius: 60px;
    display: inline-block;
    background-color: whitesmoke;
    color:black;
    font-size: 15px;
    cursor: pointer;
    box-shadow: 0 2px 5px 0 rgba(0,0,0,0.06),
              0 2px 10px 0 rgba(0,0,0,0.07);
    -webkit-transition: all 300ms ease;
    transition: all 300ms ease;
}

.submit-btn:hover {
    transform: translateY(1px);
    box-shadow: 0 1px 1px 0 rgba(0,0,0,0.10),
              0 1px 1px 0 rgba(0,0,0,0.09);
}

@media (max-width: 768px) {
    .submit-btn {
        width:100%;
        float: none;
        text-align:center;
    }
}

/* input[type=checkbox] + label {
  color: #ccc;
  font-style: italic;
} 

input[type=checkbox]:checked + label {
  color: #f00;
  font-style: normal;
}  */
    </style>
</head>
<body>

    <div class="d-flex flex-column vh-100 flex-shrink-0 p-3 text-white bg-dark" style="width: 250px;"> <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none"> <svg class="bi me-2" width="40" height="32"> </svg> <span class="fs-4">Quizard!</span> </a>
        <hr>
        <ul class="nav nav-pills flex-column mb-auto">
            <li class="nav-item"> <a href="teacher.html" class="nav-link active" aria-current="page"> <i class="fa fa-home"></i><span class="ms-2">Home</span> </a> </li>
            <li> <a href="create_quiz.html" class="nav-link text-white"> <i class="fa fa-dashboard"></i><span class="ms-2">Create Quiz</span> </a> </li>
            <li> <a href="#" class="nav-link text-white"> <i class="fa fa-dashboard"></i><span class="ms-2">Quizzes</span> </a> </li>
            <li> <a href="result.html" class="nav-link text-white"> <i class="fa fa-first-order"></i><span class="ms-2">Result</span> </a> </li>
        
        </ul>
        <hr>
        <div class="dropdown"> <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false"> <img src="https://github.com/mdo.png" alt="" width="32" height="32" class="rounded-circle me-2"> <strong> Teacher </strong> </a>
            <ul class="dropdown-menu dropdown-menu-dark text-small shadow" aria-labelledby="dropdownUser1">
                <li>
                    <hr class="dropdown-divider">
                </li>
                <li><a class="dropdown-item" href="#">Sign out</a></li>
                <li>
                    <hr class="dropdown-divider">
                </li>
            </ul>
        </div>
    </div>





    <div class="container">
        <div class="row">
                <h1>contact us</h1>
        </div>
        <div class="row input-container">
                <div class="col-md-6 col-sm-12">
                    <div class="styled-input">
                        <input type="text" required />
                        <label>Email</label> 
                    </div>
                </div>
                <div class="col-xs-12">
                    <div class="styled-input wide">
                        <textarea required></textarea>
                        <label>Report</label>
                    </div>
                </div>
                <div class="col-xs-12">
                    <div class="btn-lrg submit-btn">Submit</div>
                </div>
        </div>
    </div>
    

 <!-- Bootstrap -->
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>


</body>
</html>