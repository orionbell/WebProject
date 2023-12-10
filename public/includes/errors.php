<?php
    require_once "dbh.php";
    function empty_inputs($name,$mail,$pwd,$rt_pwd){
        if(empty($name) || empty($mail) || empty($pwd) || empty($rt_pwd)){
            return true;
        }
        return false;
    }
    function empty_login_inputs($name,$pwd){
        if ( empty($name) || empty($pwd) ) {
            return true;
        }
        return false;
    }
    function passwd_not_match($pwd,$rt_pwd){
        if($pwd != $rt_pwd){
            return true;
        }
        return false;
    }
    function passwd_not_strong($pwd){
        if(strlen($pwd) <= 8){
            return true;
        }
        return false;
    }
    function invalid_username($name){
        if(!preg_match("/^[A-Za-z0-9]*$/",$name)){
            return true;
        }
        return false;
    }
    function invalid_email($mail){
        if(! filter_var($mail,FILTER_VALIDATE_EMAIL)){
            return true;
        }
        return false;
    }

    function username_not_unique($username){
        global $conn;
        $sql = "SELECT * FROM users WHERE user_name = ?";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt,$sql)) {
            echo "Something went wrong :(";
        }else{
            mysqli_stmt_bind_param($stmt,"s",$username);
            mysqli_stmt_execute($stmt);
            $res = mysqli_stmt_get_result($stmt);
            if(mysqli_num_rows($res) > 0){
                return true;
            }
            return false;
        }
    }
    function usermail_not_unique($mail){
        global $conn;
        $sql = "SELECT * FROM users WHERE user_email = ?";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt,$sql)) {
            echo "Something went wrong :(";
        }else{
            mysqli_stmt_bind_param($stmt,"s",$mail);
            mysqli_stmt_execute($stmt);
            $res = mysqli_stmt_get_result($stmt);
            if(mysqli_num_rows($res) > 0){
                return true;
            }
            return false;
        }
    }
