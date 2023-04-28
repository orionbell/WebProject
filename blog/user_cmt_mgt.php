<?php
if (isset($_POST["submit"])) {
    if ($_POST["submit"]) {
        if (!empty($_POST["message"]) && !empty($_POST["title"])) {
            echo "test";
            $status = true;
        } else {
            header("Location: ../blog.php");
            $status = false;
        }

    }
}

//! NEED TO FIX TO SUBMIT BUTTON