<?php
    include_once('includes/header.php');
    
    if (!isset($_SESSION["useremail"])) {
        header("Location: ./index.php");
        exit();
    }
    if (isset($_SESSION['new_useremail'])) {
        $email = $_SESSION['new_useremail'];
    }else{
        $email = $_SESSION['useremail'];
    }
    if (isset($_SESSION['dont_verify'])) 
    {
        unset($_SESSION['dont_verify']);
        require_once "includes/dbh.php";
        change_user_info($_SESSION['new_username'],$_SESSION['new_useremail'],$_SESSION['is_same_name'],$_SESSION['is_same_email']);
    }
    if(isset($_POST["verify"])) {
        require_once "includes/dbh.php";
        $pincode = $_SESSION["pincode"];
        unset($_SESSION['pincode']);
        if ($pincode == $_POST["pin"]) {
            if ($_GET['type'] == 'signin') {
                $username = $_SESSION['username'];
                $useremail = $_SESSION['useremail'];
                $passwd = $_SESSION['userpassword'];
                unset($_SESSION['userpassword']);
                add_user($username,$useremail,hash("sha256",$passwd));
                exit();
            }else if ($_GET['type'] == 'new_email') {
                $new_name = $_SESSION['new_username'];
                $new_email = $_SESSION['new_useremail'];
                $is_same_name = $_SESSION['is_same_name'];
                $is_same_email = $_SESSION['is_same_email'];
                unset($_SESSION["new_username"]);
                unset($_SESSION["new_useremail"]);
                unset($_SESSION["is_same_name"]);
                unset($_SESSION["is_same_email"]);
                change_user_info($new_name,$new_email,$is_same_name,$is_same_email);
                exit();
            }else if ($_GET['type'] == 'delete_account') {
                $useremail = $_SESSION['useremail'];
                delete_user_from_db($useremail);
            }else if ($_GET['type'] == 'reset_password') {
                $_SESSION['resetmail'] = $_SESSION["useremail"];
                unset($_SESSION["useremail"]);
                header("Location: ./passwd_reset.php?reset_passwd=1");
            }
        }else if(empty($_POST["pin"])){
            $_SESSION['ERROR'] = 1;
            header("Location: verify.php?type=".$_GET['type']."&error=EmptyInputs");
        }else{
            $_SESSION['ERROR'] = 1;
            header("Location: verify.php?type=".$_GET['type']."&error=PinNotMatch");
        }
    }
    if (!isset($_SESSION['error'])) {
        $pincode = rand(100000,999999);
        $_SESSION["pincode"] = $pincode;
        include_once('includes/mail.php');
        verify_email($email,$_SESSION["pincode"]);
    }
?>
<form action='<?php echo "verify.php?type=".$_GET['type'];?>' method="post" class="signlogin_form">
    <h2 class="signin_title">אישור כתובת האימייל</h2>
    <h6 class="signin_title" style="font-size:1rem;"><?php echo strip_tags($email)?> הכנס את הקוד שנשלח לכתובת האימייל <br> על מנת לאשר את הכתובת</h6>
    <input type="text" name="pin" class="signlogin_inputs" placeholder="קוד" pattern="[0-9][0-9][0-9][0-9][0-9][0-9]" spellcheck="false" maxlength="6">
    <p class="error">
        <?php
            if (isset($_GET["error"]) && isset($_SESSION['ERROR'])) {
                if($_GET["error"] == "EmptyInputs"){
                    unset($_SESSION["ERROR"]);
                    unset($_GET["error"]);
                    echo "נא להכניס את הקוד";
                }else if($_GET["error"] == "PinNotMatch" ){
                    unset($_SESSION["ERROR"]);
                    unset($_GET["error"]);
                    echo "הקוד אינו תואם למה שנשלח";
                }
            }
        ?>
    </p>
    <input type="submit" name="verify" value="אשר אימייל" class="signlogin_inputs">
</form>
<?php 
    include_once('includes/footer.php'); 
?>