<?php 
    include_once('header.php');
    $course = $_GET["course"];
    echo '<h2 class="subheader">'.$course.'</h2>';
?>
<main class="container">
<?php 

    $json = file_get_contents('./courses_json/'.$course.'_course.json');
    $json_decoded = json_decode($json, true);
    
    for ($i = 0; $i < count($json_decoded); $i++) {
        $jsonObj = $json_decoded[$i];
        $item = '
        <a class="course_link" style="text-decoration:none;" href="'.$jsonObj["page_link"].'">
            <div class="topic_container test" style="color:'.$jsonObj['color'].';">
                <img src="imgs/'.$jsonObj["image"].'" alt="linux" class="logo">
                <p class="title">'.$jsonObj["title"].'</p>
            </div>
        </a>
        ';
        echo $item;
    }
?>
</main>
<?php 
    include_once('footer.php'); 
?>