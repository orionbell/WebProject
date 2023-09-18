<?php
    session_start();
    require_once "dbh.php";
    if(isset($_POST["delete_account"])){
             
    }
    session_unset();
    session_destroy();
    header("Location: ../index.php");