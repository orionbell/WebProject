<?php
session_start();
    if (isset($_POST["submit"])) {
        $name = $_POST["usernamemail"];
        $pwd = $_POST["password"];


        require_once "dbh.php";
        require_once "errors.php";
        if (empty_login_inputs($name,$pwd)) {
            header("Location: ../login.php?error=EmptyInputs");
            exit();
        }
        login($name,hash('md5',$pwd));
    }