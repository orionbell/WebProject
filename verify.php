<?php
    include_once('includes/header.php');
    if (!isset($_SESSION["useremail"])) {
        header("Location: ./index.php");
        exit();
    }
    if(isset($_POST["verify"])) {
        require_once "includes/dbh.php";
        $pincode = $_SESSION["pincode"];
        if ($pincode == $_POST["pin"]) {
            if ($_GET['type'] == 'signin') {
                add_user($_SESSION["username"],$_SESSION["useremail"],hash("sha256",$_SESSION["userpassword"]));
                unset($_SESSION["pincode"]);
                unset($_SESSION["username"]);
                unset($_SESSION["useremail"]);
                unset($_SESSION["userpassword"]);
                exit();
            }else if ($_GET['type'] == 'new_email') {
                if (isset($_SESSION['is_not_same_name'])){
                    change_user_info($_SESSION['new_username'],$_SESSION['new_useremail'],$_SESSION['is_not_same_name'],$_SESSION['is_not_same_email']);
                }else{
                    header("Location: ./index.php");
                }
            }else if ($_GET['type'] == 'delete_account') {
                delete_user_from_db($_SESSION["useremail"]);
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
    if (!isset($_SESSION['ERROR'])) {
        $pincode = rand(100000,999999);
        $_SESSION["pincode"] = $pincode;
        $usrmail = $_SESSION['new_useremail'];
        include_once('includes/mail.php');
        verify_email($usrmail,$_SESSION["pincode"]);
    }
?>
<form action='<?php echo "verify.php?type=".$_GET['type'];?>' method="post" class="signlogin_form">
    <h2 class="signin_title">אישור כתובת האימייל</h2>
    <h6 class="signin_title" style="font-size:1rem;"><?php echo strip_tags($_SESSION['new_useremail'])?> הכנס את הקוד שנשלח לכתובת האימייל <br> על מנת לאשר את הכתובת</h6>
    <input type="text" name="pin" class="signlogin_inputs" placeholder="קוד" pattern="[0-9][0-9][0-9][0-9][0-9][0-9]" spellcheck="false" maxlength="6">
    <p class="error">
        <?php
            if (isset($_GET["error"]) && isset($_SESSION['ERROR'])) {
                if($_GET["error"] == "EmptyInputs"){
                    echo "נא להכניס את הקוד";
                }else if($_GET["error"] == "PinNotMatch" ){
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