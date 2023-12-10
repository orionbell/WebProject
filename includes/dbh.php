<?php
if (!isset($_SESSION)) {
    session_start();
}
$db_server_name = 'localhost';
$db_user_name = 'root';
$db_user_passwd = '';
$db_name = 'CS israel';
// Creating connection to the database
$conn = mysqli_connect($db_server_name,$db_user_name,$db_user_passwd,$db_name);
if (!$conn) {
    die("Connection faild: ". mysqli_connect_error());
}
$_SESSION["db_conn"] = $conn;
function add_user($username,$email,$passwd){
    global $conn;
    $user_courses = serialize([]);
    $sql = "INSERT INTO users (user_name,user_email,user_password,user_courses) VALUES (?,?,?,?);";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt,$sql)) {
        echo "Something went wrong :(";
    }else{
        mysqli_stmt_bind_param($stmt,"ssss",$username,$email,$passwd,$user_courses);
        mysqli_stmt_execute($stmt);
        $_SESSION["useremail"] = $email;
        $_SESSION["username"] = $username;
        $_SESSION["user_courses"] = $user_courses;
        header("Location: index.php");
        exit();
    }
}

function login($user,$passwd){
    require_once "./errors.php";
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
            $_SESSION["user_courses"] = get_user_courses($info["user_name"]);
            $_SESSION["verify"] = true;
            header("Location: ../index.php");
            exit();
        }
    }
}

function change_user_info($new_username,$new_email,$is_not_same_name,$is_not_same_email){
    require "errors.php";
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
                    header("Location: ./profile.php?error=EmptyInputs");
                    exit();
                }
                if(invalid_username($new_username) !== false){
                    header("Location: ./profile.php?error=UsernameInvalid");
                    exit();
                }
                if(invalid_email($new_email) !== false){
                    header("Location: ./profile.php?error=EmailInvalid");
                    exit();
                }
                if(username_not_unique($new_username) !== false && $is_not_same_name !== false){
                    header("Location: ./profile.php?error=UsernameNotUniquet");
                    exit();
                }
                if(usermail_not_unique($new_email) !== false && $is_not_same_email !== false){
                    header("Location: ./profile.php?error=UsermailNotUnique");
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
                    header("Location: ./profile.php");
                }   
            }
            else {
                $date = date("d/m/y",strtotime($info["last_info_change"]. ' + 30 days'));
                header("Location: ./profile.php?error=ChangeTimeNotExpired&nextDateToChange=".$date);
            }
        }
}

function get_user_courses($username){
    global $conn;
    $sql = "SELECT user_courses FROM users WHERE user_name = ?;";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt,$sql)) {
        echo "Something went wrong :(";
    }else{
        mysqli_stmt_bind_param($stmt,"s",$username);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        $info = mysqli_fetch_assoc($result);
        return $info["user_courses"];
    }
}

function get_course_info($course_name){
    global $conn;
    $sql = "SELECT * FROM courses WHERE course_name = ?;";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt,$sql)) {
        echo "Something went wrong :(";
    }else{
        mysqli_stmt_bind_param($stmt,"s",$course_name);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        $info = mysqli_fetch_assoc($result);
        return $info;
    }
}

function get_blog_msgs($limit){
    global $conn;
    $sql = "SELECT * FROM blogs LIMIT ?;";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt,$sql)) {
        echo "Something went wrong :(";
    }else{
        mysqli_stmt_bind_param($stmt,"i",$limit);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        while($row = mysqli_fetch_assoc($result)){
            $json[] = $row;
       }
        return $json;
    }
}

function create_blog_post($title,$content,$img,$profile,$published){
    global $conn;
    $sql = "INSERT INTO blogs (title,content,img,profile_img,published) VALUES (?,?,?,?,?);";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt,$sql)) {
        echo "Something went wrong :(";
    }else{
        mysqli_stmt_bind_param($stmt,"sssss",$title,$content,$img,$profile,$published);
        mysqli_stmt_execute($stmt);
        header("Location: ./blog.php");
        exit();
    }
}
function delete_blog_post($id){
    global $conn;
    $sql = "DELETE FROM blogs WHERE id = ?;";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt,$sql)) {
        echo "Something went wrong :(";
    }else{
        mysqli_stmt_bind_param($stmt,"s",$id);
        mysqli_stmt_execute($stmt);
        header("Location: ./blog.php");
        exit();
    }
}
function add_course_to_user($course_name){
    
}
function delete_user_from_db($usermail){
    global $conn;
    $sql = "DELETE FROM users WHERE user_email = ?;";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt,$sql)) {
        echo "Something went wrong :(";
    }else{
        mysqli_stmt_bind_param($stmt,"s",$usermail);
        mysqli_stmt_execute($stmt);
        session_unset();
        session_destroy();
        header("Location: ./index.php");
        exit();
    }
}

function change_old_passwd($new_passwd,$user_mail)
{
    global $conn;
    $sql = "UPDATE users SET user_password = ?  WHERE user_email = ?;";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt,$sql)) {
        echo "Something went wrong :(";
    }
    else{
        mysqli_stmt_bind_param($stmt,"ss",$new_passwd,$user_mail);
        mysqli_stmt_execute($stmt);
        if(isset($_SESSION["useremail"])) unset($_SESSION["useremail"]);
        header("Location: ../login.php?email=".$user_mail);
        exit();
    }
}
function edit_course($name,$price,$topic,$discount,$image,$description,$subjects)
{
    global $conn;
    if(!($price == '')){

    }
    else{
        $sql2 = "UPDATE courses SET course_name = ?, course_price = ?, course_topic = ?, course_discount = ?, course_image = ?, course_description = ?, course_subjects = ? ";
    }
    $sql2 = $sql2 . 'WHERE course_name = ?;';
    $stmt2 = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt2,$sql2)) {
        echo "Something went wrong :(";
    }else{
        mysqli_stmt_bind_param($stmt,"sssssss",$price,$topic,$discount,$image,$description,$subjects,$name);
        mysqli_stmt_execute($stmt);
        header("Location: ../index.php");
        exit();
    }
}

function get_all_topic_courses($topic){
    global $conn;
    $sql = "SELECT * FROM courses WHERE course_topic = ?;";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt,$sql)) {
        echo "Something went wrong :(";
    }else{
        mysqli_stmt_bind_param($stmt,"s",$topic);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        $rows = [];
        while($row = mysqli_fetch_assoc($result)){
            array_push($rows,$row);
        }
        return $rows;
    }
}
function create_course($name,$price,$topic,$discount,$image,$description,$subjects)
{
    global $conn;
    $sql = "INSERT INTO courses (course_name,course_price,course_topic,course_discount,course_image,course_description,course_subjects) VALUES (?,?,?,?,?,?,?);";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt,$sql)) {
        echo "Something went wrong :(";
    }else{
        mysqli_stmt_bind_param($stmt,"sssssss",$name,$price,$topic,$discount,$image,$description,$subjects);
        mysqli_stmt_execute($stmt);
        header("Location: ../index.php");
        exit();
    }
}
function course_config($name,$price,$topic,$discount,$image,$description,$subjects)
{
    global $conn;
    $course_exists = false;
    $sql = "SELECT * FROM courses WHERE course_name = ?";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt,$sql)) {
        echo "Something went wrong :(";
    }else{
        mysqli_stmt_bind_param($stmt,"s",$name);
        mysqli_stmt_execute($stmt);
        $res = mysqli_stmt_get_result($stmt);
        if(mysqli_num_rows($res) > 0){
            $course_exists = true;
        }
    }

    if($course_exists){
        edit_course($name,$price,$topic,$discount,$image,$description,$subjects);
    }else{
        create_course($name,$price,$topic,$discount,$image,$description,$subjects);
    }
    $course_info = get_course_info($course_name);
    return $course_info;
}
