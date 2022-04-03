<?php   
    session_start();
    session_unset();
    session_destroy(); //destroy the session
    header("Location: home.php"); //to redirect back to "home.php" after logging out
?>
