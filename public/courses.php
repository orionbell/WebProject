<?php 
    include_once('includes/header.php');
    $course = $_GET["course"];
    if(!(in_array($course,scandir("resources"),true)) && $course != 'css and html'){
        //block
        header("Location: index.php");
        die();
    }
    require_once "includes/dbh.php";
    if ($course == 'css and html') {
        $rows1 = get_all_topic_courses('html');
        $rows2 = get_all_topic_courses('css');
        $rows = array_merge($rows1,$rows2);
    }else{
        $rows = get_all_topic_courses($course);
    }
    if(sizeof($rows) > 0):
?>
<?php 
    echo '<h2 class="subheader">'.strip_tags($course).'</h2>'; 
?>
<main class="container">
<?php 

    // $json = file_get_contents('./courses_json/'.$course.'_course.json');
    // $json_decoded = json_decode($json, true);
    
    foreach($rows as $row) {
        $c_name = $row["course_name"];
        $item = '';
        if($row['course_discount'] < 1){
            $item = '
            <a class="course_link" style="text-decoration:none;" href="course.php?subcourse='.$c_name.'">
                <div class="topic_container new_discount" style="color:var(--color'.random_int(1,4).');">
                    <img src="../imgs/'.$row["course_image"].'" alt="linux" class="logo">
                    <p class="title">'.$row["course_name"].'</p>
                </div>
            </a>
        ';
        }else{
           $item = '
            <a class="course_link" style="text-decoration:none;" href="course.php?subcourse='.$c_name.'">
                <div class="topic_container" style="color:var(--color'.random_int(1,4).');">
                    <img src="../imgs/'.$row["course_image"].'" alt="linux" class="logo">
                    <p class="title">'.$row["course_name"].'</p>
                </div>
            </a>
        '; 
        }
        
        echo $item;
    }
?>
</main>
<?php else: ?>
    <h2 class='subheader'>קורסים חדשים יעלו בהקדם</h2>
<?php endif ?>
<?php 
    include_once('includes/footer.php'); 
?>