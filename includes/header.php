<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu+Mono&display=swap" rel="stylesheet">
    <link rel="icon" type="image/x-icon" href="./icon.ico">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/nav.css">
    <link rel="stylesheet" href="./css/main.css">
    <link rel="stylesheet" href="./css/footer.css">
    <link rel="stylesheet" href="./css/blog_msg.css">
    <link rel="stylesheet" href="./css/resource.css">
    <link rel="stylesheet" href="./css/course.css">
    <link rel="stylesheet" href="./css/login_signin.css">
    <link rel="stylesheet" href="./css/profile.css">
    <title>CS israel</title>
</head>
<body>
    <div class="bg"></div>
        <nav class="nav_container" id="navbar">
            <ul class="nav_list">
                <li class="nav_item">
                    <a href="index.php" class="nav_link link1">בית</a>
                </li>
                <li class="nav_item">
                    <a href="https://translate.google.com/" class="nav_link link2">חנות</a>
                </li>
                <li class="nav_item">
                    <a href="resource.php" class="nav_link link3">מקורות</a>
                </li>
                <li class="nav_item">
                    <a href="blog.php" class="nav_link link4">בלוג</a>
                </li>
                <?php
                    if(isset($_SESSION["username"])){
                        echo '<li class="nav_item">
                                <a href="profile.php" class="nav_link link5">המשתמש שלי</a>
                            </li>';
                    }else{
                        echo '<li class="nav_item">
                                <a href="login.php" class="nav_link link5">התחברות</a>
                            </li>';
                    }
                ?>
            </ul>
        </nav>
