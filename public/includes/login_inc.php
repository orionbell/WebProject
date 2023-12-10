<?php
session_start();
require_once "dbh.php";
require_once "errors.php";
if (isset($_POST["submit"])) {
    if (isset($_POST["password"])) {
        $name = $_POST["usernamemail"];
        $pwd = $_POST["password"];
        if (empty_login_inputs($name,$pwd)) {
            header("Location: ../login.php?error=EmptyInputs");
            exit();
        }
        login($name,hash('sha256',$pwd));
    }else if (!isset($_POST["passwd"])){
        if(empty($_POST["account_reset_mail"])){
            header("Location: ../passwd_reset.php?error=EmptyInputs");
            exit();
        }else if (!usermail_not_unique($_POST["account_reset_mail"])) {
            header("Location: ../passwd_reset.php?error=UserNotExists");
            exit();
        }else{
            $_SESSION['useremail'] = $_POST["account_reset_mail"];
            header("Location: ../verify.php?type=reset_password");
            exit();
        }
    }else{
        if (empty($_POST['passwd']) || empty($_POST['passwd_repet'])) {
            header("Location: ../passwd_reset.php?reset_passwd=1&error=EmptyInputs");
            exit();
        }else if (passwd_not_match($_POST["passwd"],$_POST["passwd_repet"])) {
            header("Location: ../passwd_reset.php?reset_passwd=1&error=PasswdNotMatch");
            exit();
        }else if (passwd_not_strong($_POST["passwd"])) {
            header("Location: ../passwd_reset.php?error=PasswdNotStrong&reset_passwd=1");
            exit();
        }
        $usermail = $_SESSION['resetmail'];
        change_old_passwd(hash('sha256',$_POST['passwd']),$usermail);
        exit();
    }
    
}