<?php
require_once "dbh.php";

if(isset($_POST['new_course']))
{
    $name = $_POST['course_name'];
    $price = $_POST['course_price'];
    $topic = $_POST['course_topic'];
    $discount = $_POST['course_discount'];
    $image = $_POST['course_image'];
    $description = $_POST['course_description'];
    $subjects = $_POST['course_subjects'];
    $subjects = serialize(preg_split ('/\n/', $subjects));
    $course_info = course_config($name,$price,$topic,$discount,$image,$description,$subjects);
    $topic = $course_info['course_topic'];
    header("Location: ../courses.php?course=".$topic);
}