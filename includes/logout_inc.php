<?php
    require_once "dbh.php";
    if(isset($_POST["delete_account"])){
        //verify email
    }
    session_start();
    session_unset();
    session_destroy();
    header("Location: ../index.php");