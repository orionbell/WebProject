<?php
session_start();
$db_server_name = 'localhost';
$db_user_name = 'root';
$db_user_passwd = 'MysqlServer#yishai';
$db_name = 'CS israel';
require_once "./errors.php";
// Creating connection to the database
$conn = mysqli_connect($db_server_name,$db_user_name,$db_user_passwd,$db_name);
if (!$conn) {
    die("Connection faild: ". mysqli_connect_error());
}
function add_user($username,$email,$passwd){
    global $conn;
    $sql = "INSERT INTO users (user_name,user_email,user_password) VALUES (?,?,?);";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt,$sql)) {
        echo "Something went wrong :(";
    }else{
        mysqli_stmt_bind_param($stmt,"sss",$username,$email,$passwd);
        mysqli_stmt_execute($stmt);
        $_SESSION["username"] = $username;
        $_SESSION["useremail"] = $email;
        header("Location: ../index.php");
        exit();
    }
}

function login($user,$passwd){
    global $conn;
    $sql = "SELECT * FROM users WHERE user_name = ? OR user_email = ? AND user_password = ?;";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt,$sql)) {
        echo "Something went wrong :(";
    }else{
        mysqli_stmt_bind_param($stmt,"sss",$user,$user,$passwd);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        $info = mysqli_fetch_assoc($result);
        if(mysqli_num_rows($result) == 0){
            header("Location: ../login.php?error=WrongLogin");
            exit();
        }else{
            $_SESSION["username"] = $info["user_name"];
            $_SESSION["useremail"] = $info["user_email"];
            header("Location: ../index.php");
            exit();
        }
    }
}
function change_user_info($new_username,$new_email,$is_not_same_name,$is_not_same_email){
    global $conn;
    $sql = "SELECT last_info_change FROM users WHERE user_name = ?;";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt,$sql)) {
        echo "Something went wrong :(";
    }else{
        mysqli_stmt_bind_param($stmt,"s",$_SESSION["username"]);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        $info = mysqli_fetch_assoc($result);
        if(mysqli_num_rows($result) == 0){
            include "logout_inc.php";
            header("Location: ../index.php");
            exit();
        }
            if (strtotime($info["last_info_change"]. ' + 30 days') < strtotime(date("Y-m-d"))) {
                if(empty_login_inputs($new_username,$new_email) !== false){
                    header("Location: ../profile.php?error=EmptyInputs");
                    exit();
                }
                if(invalid_username($new_username) !== false){
                    header("Location: ../profile.php?error=UsernameInvalid");
                    exit();
                }
                if(invalid_email($new_email) !== false){
                    header("Location: ../profile.php?error=EmailInvalid");
                    exit();
                }
                if(username_not_unique($new_username) !== false && $is_not_same_name !== false){
                    header("Location: ../profile.php?error=UsernameNotUniquet");
                    exit();
                }
                if(usermail_not_unique($new_email) !== false && $is_not_same_email !== false){
                    header("Location: ../profile.php?error=UsermailNotUnique");
                    exit();
                }
                $sql2 = "UPDATE users SET user_name = ?, user_email = ? ,last_info_change = ? WHERE user_name = ?;";
                $stmt2 = mysqli_stmt_init($conn);
                if(!mysqli_stmt_prepare($stmt2,$sql2)) {
                    echo "Something went wrong :(";
                }
                else{
                    $today = date("Y-m-d");
                    mysqli_stmt_bind_param($stmt2,"ssss",$new_username,$new_email,$today,$_SESSION["username"]);
                    mysqli_stmt_execute($stmt2);
                    $_SESSION["username"] = $new_username;
                    $_SESSION["useremail"] = $new_email;
                    header("Location: ../profile.php");
                }   
            }
            else {
                $date = date("d/m/y",strtotime($info["last_info_change"]. ' + 30 days'));
                header("Location: ../profile.php?error=ChangeTimeNotExpired&nextDateToChange=".$date);
            }
        }
    }
function add_course_to_user($course_name){
    
}



