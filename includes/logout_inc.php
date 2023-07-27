<?php
    session_start();
    require_once "dbh.php";
    require_once "mail.php";
    if(isset($_POST["delete_account"])){
        $verified = verify_email($_SESSION["useremail"],$_SESSION["pincode"]);
        if (verified) {
            delete_user();
        }       
    }
    session_unset();
    session_destroy();
    header("Location: ../index.php");