<?php
    session_start();
    require_once "dbh.php";
    require_once "errors.php";
    if (!isset($_SESSION['username']) || !isset($_SESSION['subcourse'])) {
        header("Location: ../login.php");
    }else{
        $username = $_SESSION["username"];
        $subcourse = $_SESSION['subcourse'];
        unset($_SESSION['subcourse']);
        add_course_to_user($username,$subcourse);
    }
