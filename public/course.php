<?php 
    include_once('includes/header.php');
    require_once 'includes/dbh.php';
    $subcourse = $_GET["subcourse"];
    $info = get_course_info($subcourse);
    $subcourse_nospaces = str_replace(' ', '',$subcourse);
    $descript = $info["course_description"];
    $course_img = $info["course_image"];
    $total_price = $info["course_price"] * $info["course_discount"];
    $total_price = number_format($total_price,2,".",",");
    $subjects = unserialize($info["course_subjects"]);
    if ($info["course_discount"] < 1) {
        $discount_effect = 'new_btn_discount';
    }else{
        $discount_effect = '';
    }
?>
<?php
    if (isset($_GET["watch"])) {
        echo '<h2 class="subheader" style="margin:0 auto;">'.$subcourse.'</h2>';
        echo '<main class="course_container">
                <div class="videolist_container">
                    <div class="course_video_container">
                            <iframe class="video_box" src="https://drive.google.com/file/d/16D_c9RJH0SlHDjOhPriEtyRZ_QnZFS6M/preview" width="640" height="480" allow="autoplay"></iframe>
                    </div>
                    <div class="playlist_videos_container">
                        <div class="course_list_item" >
                            <img src="../imgs/pic.jpg" alt="not found :(">
                            <p class="descpt">Lorem ipsum dolor sit amet consectetur </p>
                        </div>
                        <div class="course_list_item" >
                            <img src="../imgs/pic.jpg" alt="not found :(">
                            <p class="descpt">Lorem ipsum dolor sit amet consectetur </p>
                        </div>
                        <div class="course_list_item" >
                            <img src="../imgs/pic.jpg" alt="not found :(">
                            <p class="descpt">Lorem ipsum dolor sit amet consectetur </p>
                        </div>
                        <div class="course_list_item" >
                            <img src="../imgs/pic.jpg" alt="not found :(">
                            <p class="descpt">Lorem ipsum dolor sit amet consectetur </p>
                        </div>
                        <div class="course_list_item" >
                            <img src="../imgs/pic.jpg" alt="not found :(">
                            <p class="descpt">Lorem ipsum dolor sit amet consectetur </p>
                        </div>
                        <div class="course_list_item" >
                            <img src="../imgs/pic.jpg" alt="not found :(">
                            <p class="descpt">Lorem ipsum dolor sit amet consectetur </p>
                        </div>
                        <div class="course_list_item" >
                            <img src="../imgs/pic.jpg" alt="not found :(">
                            <p class="descpt">Lorem ipsum dolor sit amet consectetur </p>
                        </div>
                        <div class="course_list_item" >
                            <img src="../imgs/pic.jpg" alt="not found :(">
                            <p class="descpt">Lorem ipsum dolor sit amet consectetur </p>
                        </div>
                        <div class="course_list_item" >
                            <img src="../imgs/pic.jpg" alt="not found :(">
                            <p class="descpt">Lorem ipsum dolor sit amet consectetur </p>
                        </div>
                        <div class="course_list_item" >
                            <img src="../imgs/pic.jpg" alt="not found :(">
                            <p class="descpt">Lorem ipsum dolor sit amet consectetur </p>
                        </div>
                        <div class="course_list_item" >
                            <img src="../imgs/pic.jpg" alt="not found :(">
                            <p class="descpt">Lorem ipsum dolor sit amet consectetur </p>
                        </div>
                    </div>
                </div>
                <div class="exercises">
            </div>
        </main>';
    }else{
        $subjects_list = "";
        foreach ($subjects as $subject) {
            $subjects_list = $subjects_list . "<li class='subject_list_item'>$subject</li>\n";
        }
        echo "
        <div class='desc' style='background-image: url(imgs/$course_img);'>
            <div class='buy_container'>
                <h2 class='subheader' style='margin:0 auto;'>$subcourse</h2>
                <p class='desc_text'>$descript</p>
                <ul class='subj_list'>
                    <p class='desc_text'>נושאים הנלמדים בקורס:</p>
                    $subjects_list
                </ul>
                <form action='' method='post' class='buy_form $discount_effect'>
                    <input class='buy_btn' type='submit' value='קניית קורס $total_price ₪'>
                </form>





            </div>
        </div>
        <br>
        ";
    }
?>
<?php
    include_once('includes/footer.php'); 
?>