<?php
session_start();
require_once "dbh.php";
require_once "errors.php";
if (!check_date()) {
    $date = date("d/m/y",strtotime($_SESSION["last_info_change"]. ' + 30 days'));
    unset($_SESSION["last_info_change"]);
    header("Location: ../profile.php?error=ChangeTimeNotExpired&nextDateToChange=".$date);
    exit();
}
$username = strip_tags($_POST["username"]);
$usermail = strip_tags($_POST["usermail"]);
$is_same_name = false;
$is_same_email = false;
$verify = false;
if($username == $_SESSION["username"]){
    global $is_same_name;
    $is_same_name = true;
}
if($usermail == $_SESSION["useremail"]){
    global $is_same_email;
    $is_same_email = true;
    
}else{
    global $verify;
    $verify = true;
}
if($is_same_name && $is_same_email){
    header("Location: ../profile.php?error=SameInfo");
    exit();
}else{
    $_SESSION['new_username'] = $username;
    $_SESSION['new_useremail'] = $usermail;
    $_SESSION['is_same_name'] = $is_same_name;
    $_SESSION['is_same_email'] = $is_same_email;
    if ($verify) {
        header("Location: ../verify.php?type=new_email");
    }else{
        $_SESSION["dont_verify"] = 1;
        header("Location: ../verify.php?type=new_email");
    }
    
}
