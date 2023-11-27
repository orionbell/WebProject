<?php
session_start();
require_once "dbh.php";
require_once "errors.php";
$username = strip_tags($_POST["username"]);
$usermail = strip_tags($_POST["usermail"]);
$is_not_same_name = true;
$is_not_same_email = true;
if($username == $_SESSION["username"]){
    global $is_not_same_name;
    $is_not_same_name = false;
}
if($usermail == $_SESSION["useremail"]){
    global $is_not_same_email;
    $is_not_same_email = false;
}
if(!$is_not_same_name && !$is_not_same_email){
    header("Location: ../profile.php?error=SameInfo");
    exit();
}else{
    $_SESSION['new_username'] = $username;
    $_SESSION['new_useremail'] = $usermail;
    $_SESSION['is_not_same_name'] = $is_not_same_name;
    $_SESSION['is_not_same_email'] = $is_not_same_email;
    header("Location: ../verify.php?type=new_email");
}
