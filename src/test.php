<?php
    include_once('includes/header.php');
    require_once "includes/dbh.php";
    $rows = get_all_existing_topics();
?>
<h2 class="subheader">קורסים</h2>
<main class="container">
    <?php 
        foreach($rows as $row) {
            $topic = $row["course_topic"];
            $item = '';
            if($row['course_discount'] < 1){
                $item = '
                <a class="course_link" style="text-decoration:none;" href="courses.php?course='.$topic.'">
                    <div class="topic_container new_discount" style="color:var(--color'.random_int(1,4).');">
                        <img src="../imgs/'.$topic.'.png"  alt="linux" class="logo">
                        <p class="title">'.$topic.'</p>
                    </div>
                </a>
            ';
            }else{
               $item = '
                <a class="course_link" style="text-decoration:none;" href="courses.php?course='.$topic.'">
                    <div class="topic_container" style="color:var(--color'.random_int(1,4).');">
                        <img src="../imgs/'.$topic.'.png" alt="'.$topic.'" class="logo">
                        <p class="title">'.$topic.'</p>
                    </div>
                </a>
            '; 
            }
            
            echo $item;
        }
    ?>
</main>
<?php
    include_once('includes/footer.php');
?>
