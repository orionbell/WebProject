<?php
session_start();
require_once "dbh.php";
require_once "errors.php";
$username = $_POST["username"];
$usermail = $_POST["usermail"];
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
change_user_info($username,$usermail,$is_not_same_name,$is_not_same_email);
