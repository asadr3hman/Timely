<?php
include 'connect.php';

$userEnter_email = $_REQUEST['email'];
$userEnter_pass = $_REQUEST['password'];

$sql = "SELECT * FROM studentsinfo WHERE email = '$userEnter_email' AND password = '$userEnter_pass'";

$result = mysqli_query($conn, $sql);
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

        header("Location: home.html");
        exit();
    } else {
        echo "Incorrect email or password <br>" . $conn->error;
    }
}
echo "Incorrect email or password <br>" . $conn->error;
