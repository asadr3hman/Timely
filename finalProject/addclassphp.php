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
    $img = $_FILES['imagfile'];
    $sql = "INSERT INTO $course (weekNo, classN, teacherN, roomN, time, weekDay, semester, self_reg) VALUE (10, '$subject', '$teacher', '$roomN', '$time', '$daySelected', '$semester', '$s_r' )";

    $isthereQ = "SELECT * FROM subjects WHERE subjectN = '$subject'";
    $res = mysqli_query($conn, $isthereQ);
    if($res->num_rows > 0){
    }
    else{
        $fname = $img['name'];
        $ftemp = $img['tmp_name'];
    
        $destfile = 'icons/'.$fname;
        move_uploaded_file($ftemp, $destfile);
    
        print_r($destfile);
        $insertsubjectQ = "INSERT INTO subjects (subjectImgURL, subjectN, subjectDept, subjectCourse) VALUE ('$destfile', '$subject', 'CS and IT', 'BSSE') " ;
        mysqli_query($conn, $insertsubjectQ);
    }
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