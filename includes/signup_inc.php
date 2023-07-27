<?php
session_start();
    if (isset($_POST["submit"])) {
        $name = $_POST["username"];
        $mail = $_POST["email"];
        $pwd = $_POST["password"];
        $rt_pwd = $_POST["retype_password"];
        require_once "dbh.php";
        require_once "errors.php";
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
        header("Location: ../signin.php?sendcode");
        $pincode = rand(100000,999999);
        $_SESSION["pincode"] = $pincode;
    }else if(isset($_POST["verify"])) {
        require_once "dbh.php";
        $pincode = $_SESSION["pincode"];
        if ($pincode == $_POST["pin"]) {
            add_user($_SESSION["username"],$_SESSION["useremail"],hash("md5",$_SESSION["userpassword"]));
            unset($_SESSION["pincode"]);
            unset($_SESSION["username"]);
            unset($_SESSION["useremail"]);
            unset($_SESSION["userpassword"]);
            exit();
        }else if(empty($_POST["pin"])){
            header("Location: ../signin.php?error=EmptyInputs");
        }else{
            header("Location: ../signin.php?error=PinNotMatch");
        }
    }else{
        header("Location: ../signin.php");
        exit();
    }
