<!-- Need to add a writng functionality -->
<?php
include_once('includes/header.php');
?>
<!--need to write a way to get notify about new blog message -->
<div class="blog_container">
    <main class="msg_container">
        <h2 class="subheader" style="margin:0 auto;">הודעות ועדכונים</h2>
        <?php
        include_once('./blog/msg_mgt.php');
        ?>
    </main>
    <!-- <section class="user_msg_box">
        <h2 class="subheader">תגובות</h2>
        <form action="blog.php" method="post" class="user_form">
            <input type="text" name="title" class="user_inputs" placeholder="title">
            <textarea name="message" class="user_inputs text_input" placeholder="Message goes in here"></textarea>
            <input type="submit" value="send" name="submit" class="user_inputs">
        </form>
        <div class="comment_container">
            <?php
            
                // if (isset($_POST["submit"])) {
                //     if ($_POST["submit"]) {
                //         if (!empty($_POST["message"]) && !empty($_POST["title"])) {
                //             $json_file = file_get_contents('./blog/comments.json');
                //             $comnt_json = json_decode($json_file,true);
                //             $comnt_json[] = ['title' => $_POST['title'],'date' => date("d/m/Y"), 'content'=> $_POST['message']];
                //             $json_string = json_encode($comnt_json, JSON_PRETTY_PRINT);
                //             file_put_contents('blog/comments.json',$json_string);
                //         } else {
                //             header("Location: blog.php");
                //             $status = false;
                //         }
                //         header('Location: ' . $_SERVER['HTTP_REFERER']);
                //         die();
                //     }
                // }
                // $json_print_file = file_get_contents('./blog/comments.json');
                // $comnt_print_file_json = json_decode($json_print_file,true);
                // for($i = 0; $i < count($comnt_print_file_json); $i++){
                //     $jsonObj = $comnt_print_file_json[$i];
                //     $item = '
                //     <div class="msg_content comment">
                //     <div class="from">
                    
                //     </div>
                //     <h4>' . $jsonObj["date"] . '</h4>
                //         <h2>' . $jsonObj["title"] . '</h2>
                        
                //          <p>' . $jsonObj["content"] . '</p>
                //     </div>
                //     ';
                //     echo $item;
                // }
            ?>
        </div>
    </section> -->
</div>
<?php
include_once('includes/footer.php');
?>