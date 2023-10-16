<?php
    include_once('includes/header.php');
    if (!isset($_SESSION['resetpasswd'])) {
        header("Location: index.php");
    }
?>
    <form action="includes/login_inc.php" method="post" class="signlogin_form">
        <h2 class="signin_title">איפוס סיסמה</h2>
        <?php if (isset($_GET['reset_passwd'])): ?>
        <input type="password" name="passwd" class="signlogin_inputs" placeholder="סיסמה" spellcheck="false">
        <input type="password" name="passwd_repet" class="signlogin_inputs" placeholder="אישור סיסמה" spellcheck="false">
        <p class="error">
            <?php
                if (isset($_GET["error"])) {
                    if($_GET["error"] == "EmptyInputs"){
                        echo "נא למלא את כל התאים";
                    }else if($_GET["error"] == "PasswdNotMatch" ){
                        echo "הסיסמאות אינן תואמות";
                    }else if($_GET["error"] == "PasswdNotStrong" ){
                        echo "הסיסמה צריכה להיות באורך של לפחות 9 תווים";
                    }
                }
            ?>
        </p>
        <?php else: ?>
        <input type="email" name="account_reset_mail" class="signlogin_inputs" placeholder="איימל" spellcheck="false">
        <p class="error">
            <?php
                if (isset($_GET["error"])) {
                    if($_GET["error"] == "UserNotExists"){
                        echo "המייל לא קיים במערכת";
                    }else if($_GET["error"] == "EmptyInputs"){
                        echo "! זהו שדה חובה";
                    }
                }
            ?>
        </p>
        <?php endif ?>
        <input type="submit" name="submit" value="המשך" class="signlogin_inputs">
    </form>
<?php
    include_once('includes/footer.php');
?>