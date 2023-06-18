<?php
session_start();
$db_server_name = 'localhost';
$db_user_name = 'root';
$db_user_passwd = 'MysqlServer#yishai';
$db_name = 'CS israel';

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
function change_user_info($new_data,$type){
    echo "UPDATE users SET username=?, WHERE username=?;";
}
function add_course_to_user($course_name){
    
}



