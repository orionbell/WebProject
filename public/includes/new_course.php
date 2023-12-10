<?php
require_once "dbh.php";

if(isset($_POST['new_course']))
{
<<<<<<< HEAD:public/includes/new_course.php
    $old_name = $_POST['old_course_name'];
    $new_name = $_POST['new_course_name'];
=======
    $name = $_POST['course_name'];
>>>>>>> e67bbfd19c5a6e26c7ea12963d45fe972b547895:includes/new_course.php
    $price = $_POST['course_price'];
    $topic = $_POST['course_topic'];
    $discount = $_POST['course_discount'];
    $image = $_POST['course_image'];
    $description = $_POST['course_description'];
    $subjects = $_POST['course_subjects'];
    $subjects = serialize(preg_split ('/\n/', $subjects));
<<<<<<< HEAD:public/includes/new_course.php
    $course_info = course_config($old_name,$new_name,$price,$topic,$discount,$image,$description,$subjects);
=======
    $course_info = course_config($name,$price,$topic,$discount,$image,$description,$subjects);
>>>>>>> e67bbfd19c5a6e26c7ea12963d45fe972b547895:includes/new_course.php
    $topic = $course_info['course_topic'];
    header("Location: ../courses.php?course=".$topic);
}