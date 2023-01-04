<?php
include 'connect.php';

$userEnter_email = $_REQUEST['email'];
$userEnter_pass = $_REQUEST['password'];

$sql = "SELECT * FROM studentsinfo WHERE email = '$userEnter_email' AND password = '$userEnter_pass'";//get Student
$sqlAdmin = "SELECT * FROM admin WHERE adminEmail = '$userEnter_email' AND adminP = '$userEnter_pass'";//get admin

$result2 = mysqli_query($conn, $sqlAdmin);
if($result2->num_rows > 0){
    $row = mysqli_fetch_array($result2);
    if ($row['adminEmail'] == $userEnter_email && $row['adminP'] == $userEnter_pass) {
        session_start();
            $_SESSION['adminDept'] = $row['adminDep'];
        header("Location: adminHome.html");
        exit();
    } else {
        echo "Incorrect email or password <br>" . $conn->error;
    }
}


$result = mysqli_query($conn, $sql);

if($result->num_rows > 0){
    while ($row = mysqli_fetch_array($result)) {
        // echo $row['name'] . "<br>";
        // echo $row['rollNo']. "<br>";
        // echo $row['email']. "<br>";
        // echo $row['password']. "<br>";
        if ($row['email'] == $userEnter_email && $row['password'] == $userEnter_pass) {
            session_start();
            $_SESSION['classN'] = $row['course'];
            $_SESSION['self_reg'] = $row['self_reg'];
            $_SESSION['semester'] = $row['semester'];
            $_SESSION['rollNo'] = $row['rollNo'];
            $_SESSION['name'] = $row['name'];
            $_SESSION['semester'] = $row['semester'];
            $_SESSION['department'] = $row['department'];
    
            header("Location: home.html");
            exit();
        } else {
            echo "Incorrect email or password <br>" . $conn->error;
        }
    }
}





echo "Something went wrong plz try again <br>" . $conn->error;
