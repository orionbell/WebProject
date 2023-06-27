<?php 
    include_once('includes/header.php');
    $subcourse = $_GET["subcourse"];
    echo '<h2 class="subheader">'.$subcourse.'</h2>';
    $descript = "Lorem ipsum dolor sit amet consectetur adipisicing elit. Laudantium vero odit numquam! Quos accusantium harum dolor beatae adipisci, velit temporibus inventore necessitatibus, vero praesentium culpa mollitia est et corporis tempora ullam! Necessitatibus accusamus voluptatem consequatur dicta illum eligendi facere, tempore, fuga rem voluptatum perferendis quae excepturi et, libero velit iusto quod aspernatur tenetur ex officia porro? Alias porro odit maiores debitis a nihil dolorum dolorem mollitia neque sunt dignissimos reiciendis omnis sed molestiae, illo fugiat ut repudiandae pariatur quasi assumenda nemo nostrum quidem tenetur. Quas sed, nemo voluptatibus id aliquid voluptates omnis, laborum reiciendis necessitatibus, incidunt laboriosam. Tempore, itaque modi.";
    $course_img = "imgs/pic.jpg";
?>
<?php
    if (isset($_GET["watch"])) {
        echo '<main class="course_container">
                <div class="videolist_container">
                    <div class="course_video_container">
                            <iframe class="video_box" src="https://drive.google.com/file/d/16D_c9RJH0SlHDjOhPriEtyRZ_QnZFS6M/preview" width="640" height="480" allow="autoplay"></iframe>
                    </div>
                    <div class="playlist_videos_container">
                        <div class="course_list_item" >
                            <img src="./imgs/pic.jpg" alt="not found :(">
                            <p class="descpt">Lorem ipsum dolor sit amet consectetur </p>
                        </div>
                        <div class="course_list_item" >
                            <img src="./imgs/pic.jpg" alt="not found :(">
                            <p class="descpt">Lorem ipsum dolor sit amet consectetur </p>
                        </div>
                        <div class="course_list_item" >
                            <img src="./imgs/pic.jpg" alt="not found :(">
                            <p class="descpt">Lorem ipsum dolor sit amet consectetur </p>
                        </div>
                        <div class="course_list_item" >
                            <img src="./imgs/pic.jpg" alt="not found :(">
                            <p class="descpt">Lorem ipsum dolor sit amet consectetur </p>
                        </div>
                        <div class="course_list_item" >
                            <img src="./imgs/pic.jpg" alt="not found :(">
                            <p class="descpt">Lorem ipsum dolor sit amet consectetur </p>
                        </div>
                        <div class="course_list_item" >
                            <img src="./imgs/pic.jpg" alt="not found :(">
                            <p class="descpt">Lorem ipsum dolor sit amet consectetur </p>
                        </div>
                        <div class="course_list_item" >
                            <img src="./imgs/pic.jpg" alt="not found :(">
                            <p class="descpt">Lorem ipsum dolor sit amet consectetur </p>
                        </div>
                        <div class="course_list_item" >
                            <img src="./imgs/pic.jpg" alt="not found :(">
                            <p class="descpt">Lorem ipsum dolor sit amet consectetur </p>
                        </div>
                        <div class="course_list_item" >
                            <img src="./imgs/pic.jpg" alt="not found :(">
                            <p class="descpt">Lorem ipsum dolor sit amet consectetur </p>
                        </div>
                        <div class="course_list_item" >
                            <img src="./imgs/pic.jpg" alt="not found :(">
                            <p class="descpt">Lorem ipsum dolor sit amet consectetur </p>
                        </div>
                        <div class="course_list_item" >
                            <img src="./imgs/pic.jpg" alt="not found :(">
                            <p class="descpt">Lorem ipsum dolor sit amet consectetur </p>
                        </div>
                    </div>
                </div>
                <div class="exercises">
            
                </div>
            </main>';
    }else{
        echo "
        <div class='desc'>
            <img src='$course_img' alt='' class='course_img'>
            <p class='desc_text'>$descript</p>
        </div>
        <div class='buy_container'>
            <form action='' method='post' class='buy_form'>
                <input class='buy_btn' type='submit' value='קנה'>
            </form>
        </div>";
    }
?>
<?php 
    include_once('includes/footer.php'); 
?>