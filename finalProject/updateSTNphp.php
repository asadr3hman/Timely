<?php
include "connect.php";

if (isset($_POST['update'])) {

    $name = $_REQUEST['name'];
    $rollNo = $_REQUEST['rollNo'];
    $email = $_REQUEST['email'];
    $user_password = $_REQUEST['password'];
    $user_dep = $_REQUEST['department'];
    $user_cou = $_REQUEST['course'];
    $user_semes = $_REQUEST['semester'];
    $user_self_reg = $_REQUEST['s_r'];

    $sql = "UPDATE studentsinfo SET name = '$name', rollNo = '$rollNo', email = '$email', password = '$user_password', department = '$user_dep', course = '$user_cou', semester = '$user_semes', self_reg = '$user_self_reg' WHERE rollNo = '$rollNo' ";

    $result = mysqli_query($conn, $sql);

    if ($conn->query($sql) === TRUE) {
        echo " record updated";
        header("Location: loginPage.html");
        exit();
    } else {
        echo " Error" . $conn->error;
    }
}
