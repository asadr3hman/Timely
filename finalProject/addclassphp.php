<?php
include "connect.php";

session_start();

$daySelected = $_SESSION['daySelected'];

if(isset($_POST['add']))
{
    $course = $_POST['course'];
    $semester = $_POST['semester'];
    $s_r = $_POST['s_r'];
    $subject = $_POST['subject'];
    $teacher = $_POST['teacher'];
    $roomN = $_POST['roomN'];
    $time = $_POST['time'];

    $sql = "INSERT INTO $course (weekNo, classN, teacherN, roomN, time, weekDay, semester, self_reg) VALUE (10, '$subject', '$teacher', '$roomN', '$time', '$daySelected', '$semester', '$s_r' )";
    if($conn->query($sql)===TRUE){
        echo "Record inserted";
    }
    else{
        echo "someting wrong". $conn->error;
    }
}
else
echo "Something went worong :(";

?>