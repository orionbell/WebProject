<?php
    include_once('includes/header.php');
?>
    <form action="includes/login_inc.php" method="post" class="signlogin_form">
        <h2 class="signin_title">כניסה</h2>
        <input type="text" name="usernamemail" class="signlogin_inputs" placeholder="שם משתמש או אימייל">
        <input type="password" name="password" class="signlogin_inputs" placeholder="סיסמה">
        <a href="signin.php" class="already_login_text">צור חשבון</a>
        <p id="error">
            <?php
                if($_GET["error"] == "EmptyInputs"){
                    echo "נא למלא את כל התאים";
                }
                if($_GET["error"] == "WrongLogin"){
                    echo "שם המשתמש או הסיסמה אינם תקינים";
                }
            ?>
        </p>
        <input type="submit" name="submit" value="היכנס" class="signlogin_inputs">
    </form>
<?php 
    include_once('includes/footer.php'); 
?>