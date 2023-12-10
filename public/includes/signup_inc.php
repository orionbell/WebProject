<?php
if (!isset($_SESSION)) {
    session_start();
}
require_once "dbh.php";
require_once "errors.php";
if (isset($_POST["submit"])) {
    $name = $_POST["username"];
    $mail = $_POST["email"];
    $pwd = $_POST["password"];
    $rt_pwd = $_POST["retype_password"];
    if(empty_inputs($name,$mail,$pwd,$rt_pwd) !== false){
        header("Location: ../signin.php?error=EmptyInputs");
        exit();
    }
    if(passwd_not_match($pwd,$rt_pwd) !== false){
        header("Location: ../signin.php?error=PasswdNotMatch");
        exit();
    }
    if(invalid_username($name) !== false){
        header("Location: ../signin.php?error=UsernameInvalid");
        exit();
    }
    if(invalid_email($mail) !== false){
        header("Location: ../signin.php?error=EmailInvalid");
        exit();
    }
    if(passwd_not_strong($pwd) !== false){
        header("Location: ../signin.php?error=PasswdNotStrong");
        exit();
    }
    if(username_not_unique($name) !== false){
        header("Location: ../signin.php?error=UsernameNotUnique");
        exit();
    }
    if(usermail_not_unique($mail) !== false){
        header("Location: ../signin.php?error=UsermailNotUnique");
        exit();
    }
    
    $_SESSION["username"] = $name;
    $_SESSION["useremail"] = $mail;
    $_SESSION["userpassword"] = $pwd;
    header("Location: ../verify.php?type=signin");
    exit();
}
