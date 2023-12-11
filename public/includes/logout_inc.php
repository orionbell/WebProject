<?php
    session_start();
    require_once "dbh.php";
    if(isset($_POST['delete_confirm'])){
        if ($_POST['delete_confirm'] == 'אני רוצה למחוק את המשתמש לצמיתות') {
            header("Location: ../verify.php?type=delete_account");
        }else{
            header("Location: ../profile.php?delete_label?err=str_not_match");
        }
        
    }else{
        session_unset();
        session_destroy();
        header("Location: ../index.php");
    }
