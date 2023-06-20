<?php
    include_once('includes/header.php');
    if(!isset($_SESSION["username"])){
        header("Location: login.php");
        exit();
    }
    $username = $_SESSION["username"];
    $useremail = $_SESSION["useremail"];
?>
    <main class="userui_contianer">
        <h2 class="ui_header">הקורסים שלי</h2>
        <h2 class="ui_header">פרטים אישיים</h2>
            <form class="peronal_info_list" method="post" action="includes/change_info_inc.php">
                <label class="name_ui">שם</label>
                <input name="username" class="peronal_info_item" value="<?php echo $username; ?>" spellcheck="false">
                <label class="name_ui">אימייל</label>
                <input name="usermail" class="peronal_info_item" value="<?php echo $useremail; ?>" spellcheck="false">
                <label class="profile-error">
                    <?php
                        if($_GET["error"] == "UsernameNotUnique" ){
                            echo "שם המשתמש תפוס";
                        }else if($_GET["error"] == "UsermailNotUnique" ){
                            echo "המייל כבר בשימוש בחשבון אחר";
                        }else if($_GET["error"] == "UsernameInvalid" ){
                            echo "שם המשתמש אינו תקין";
                        }else if($_GET["error"] == "EmailInvalid" ){
                            echo "המייל אינו תקין";
                        }else if($_GET["error"] == "EmptyInputs"){
                            echo "נא למלא את כל התאים";
                        }else if($_GET["error"] == "ChangeTimeNotExpired"){
                            echo "לא עבר חודש מהפעם הקודמת ששינתה את הפרטים שלך <br>הפעם הבאה שניתן לשנות היא בתאריך ".$_GET["nextDateToChange"];
                        }else{
                            echo $_GET["error"];
                        }
                    ?>
                </label>
                    <input class="change_paswd_btn" id="size" type="submit" value="ערוך">
                    <p class="profile-error">ניתן לשנות את הפרטים כל 30 יום</p> 
                </form>
            </ul>
            <form class="btn-form" action="includes/logout_inc.php">
                    <input class="change_paswd_btn" type="submit" value="התנתקות">
            </form>
    </main>
<?php 
    include_once('includes/footer.php'); 
?>