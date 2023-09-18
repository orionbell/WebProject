<?php
    session_start();
    include_once('includes/header.php');
    if(!isset($_SESSION["username"])){
        header("Location: login.php");
        exit();
    }
    $username = $_SESSION["username"];
    $useremail = $_SESSION["useremail"];
    $user_courses = $_SESSION["user_courses"];
?>
    <main class="userui_contianer">
        <h2 class="ui_header">הקורסים שלי</h2>
            <section class="my_courses_container">
                <?php
                        if (count(unserialize($user_courses)) <= 0) {
                            echo "<h2 class='empty_courses',><a href='./index.php' class'go_buy'>עדין לא קנית אף קורס לצפייה בקורסים לחץ</a></h2>";
                        }else{
                            echo "";
                        }    
                ?>
            </section>
            
        <h2 class="ui_header">פרטים אישיים</h2>
            <form class="peronal_info_list" method="post" action="includes/change_info_inc.php">
                <label class="name_ui" for="usrname">שם</label>
                <input name="username" id="usrname" class="peronal_info_item" value="<?php echo $username; ?>" spellcheck="false">
                <label class="name_ui" for="usrmail">אימייל</label>
                <input name="usermail" id="usrmail" class="peronal_info_item" value="<?php echo $useremail; ?>" spellcheck="false">
                <label class="profile-error">
                    <?php
                        if (isset($_GET["error"])) {
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
                            }else if($_GET["error"] == "SameInfo"){
                                echo "המידע שווה למידע הקודם<br> על מנת לשנות ליחצו על התוכן שאותו אתם רוצים לשנות ועירכו אותו";
                            }else{
                                echo $_GET["error"];
                            }
                        }
                    ?>
                </label>
                    <input class="change_paswd_btn" id="size" type="submit" value="ערוך">
                    <p class="profile-error">ניתן לשנות את הפרטים כל 30 יום</p>
            </form>
            <?php 
                    if($username == "Admin"):
            ?>
                        <br>
                        <div class="profile_blog_btn" id="open_admin_panel" onclick="openAdminPanel()">open admin panel</div>
                        <div id="admin_panel">
                            <h2 class="ui_header">יצירת בלוג חדש</h2>
                            <form class="peronal_info_list" method="post" action="blog.php">
                                <div class="profile_blog_btn" id="blog_open_btn" onclick="editBlogs()">פתח</div>
                                <input name="title" class="peronal_info_item" id="title_input" placeholder="כותרת" spellcheck="false">
                                <input name="content" class="peronal_info_item" id="content_input" placeholder="תוכן הבלוג" spellcheck="false">
                                <div class="profile_blog_btn" id="blog_btn1" onclick="showProfileInput()">הוסף תמונת פרופיל</div>
                                <input name="profile_img" class="peronal_info_item" id="blog_input1" placeholder="שם תמונת הפרופיל" spellcheck="false">
                                <div class="profile_blog_btn" id="blog_btn2" onclick="showImgInput()">הוסף תמונה</div>
                                <input name="img" class="peronal_info_item" id="blog_input2" placeholder="שם התמונה" spellcheck="false">
                                <br>
                                <br>
                                <div class="profile_blog_btn" id="blog_btn3" onclick="showDeleteInput()">מחק בלוג</div>
                                <input name="delete_blog" class="peronal_info_item" type="number" min="0" value="0" id="blog_input3" placeholder="id" spellcheck="false">
                                <input name="new_blog_post" class="profile_blog_btn" id="submit_btn" type="submit" value="שליחה">
                            </form>
                            <h2 class="ui_header">הוספת מקור</h2>
                            <form class="peronal_info_list" method="post" action="resource.php">
                                <div class="profile_blog_btn" id="res_btn1" onclick="showNewResInput(`video`)">סרטון</div>
                                <div class="profile_blog_btn" id="res_btn2" onclick="showNewResInput(`playlist`)">פלייליסט</div>
                                <div class="profile_blog_btn" id="res_btn3" onclick="showNewResInput(`channel`)">ערוץ</div>
                                <input name="input1" class="peronal_info_item" id="res_input1" placeholder="" spellcheck="false">
                                <input name="input2" class="peronal_info_item" id="res_input2" placeholder="" spellcheck="false">
                                <input name="input3" class="peronal_info_item" id="res_input3" placeholder="" spellcheck="false">
                                <select name="categories"class="profile_blog_btn options_continer">
                                        <option>select category</option>
                                        <?php
                                            //getting all the options from the select directory
                                            $directory = './resources';
                                            $categories = array_diff(scandir($directory), array('..', '.'));
                                            foreach ($categories as $category){
                                                echo "<option class='options' value='$category'>$category</option>";
                                            }
                                        ?>
                                </select>
                                <input name="new_resource" id="res_submit" class="profile_blog_btn " type="submit" value="שליחה">
                            </form>
                            <h2 class="ui_header">יצירה או עדכון של קורס</h2>
                            <form class="peronal_info_list" method="post" action="profile.php">
                            <div class="profile_blog_btn" id="course_btn1" onclick="displayCoursePanel()">פתח</div>
                                <input name="" class="peronal_info_item" id="course_input1" placeholder="course name" spellcheck="false">
                                <input name="" class="peronal_info_item" id="course_input2" placeholder="course price" spellcheck="false">
                                <input name="" class="peronal_info_item" id="course_input3" placeholder="course topic" spellcheck="false">
                                <input name="" class="peronal_info_item" id="course_input4" placeholder="course discount" spellcheck="false">
                                <input name="" class="peronal_info_item" id="course_input5" placeholder="course image" spellcheck="false">
                                <input name="" class="peronal_info_item" id="course_input6" placeholder="course description" spellcheck="false">
                                <input name="new_blog_post" id="course_submit" class="profile_blog_btn " type="submit" value="שליחה">
                            </form>
                        </div>
                        <br>
                        ';
<?php endif ?>
            <form class="btn-form" method="post" action="includes/logout_inc.php">
                    <input class="change_paswd_btn profile_btn" type="submit" value="התנתקות">
            </form>
            <form class="btn-form" method="post" action="includes/logout_inc.php">
                <input name="delete_account"class="change_paswd_btn profile_btn" type="submit" value="מחק חשבון">
            </form>
    </main>
    
<?php
    if($username == "Admin"){
        echo '<script src="js/admin_panel.js"></script>';
    }
    include_once('includes/footer.php'); 
?>