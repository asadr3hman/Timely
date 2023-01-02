<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "finalpro";

$conn= new mysqli($servername, $username, $password, $dbname);

if($conn->connect_error)
{
	die("connection error". $conn->connect_error);

}
else{
echo " connected successfully with db<br>";
}

//write data in database
$name="";
$rollNo="";
$email="";
$user_password="";
$user_city="";
$user_gender="";
	$name = $_REQUEST['name'];
    $rollNo = $_REQUEST['rollNo'];
    $email = $_REQUEST['email'];
    $user_password = $_REQUEST['password'];
	$user_dep = $_REQUEST['department'];
	$user_cou = $_REQUEST['course'];
	$user_semes = $_REQUEST['semester'];
	$user_self_reg = $_REQUEST['s_r'];




$sql= "INSERT INTO studentsinfo(name, rollNo, email, password, department, course, semester, self_reg) VALUES ('$name', '$rollNo', '$email', 
			'$user_password','$user_dep','$user_cou', '$user_semes', '$user_self_reg' )";


if($conn->query($sql)===TRUE){
	echo "record inserted <br>";
	session_start();
        $_SESSION['classN'] = $user_cou;
        $_SESSION['self_reg'] = $user_self_reg;
        $_SESSION['semester'] = $user_semes;
        $_SESSION['rollNo'] = $rollNo;
        $_SESSION['name'] = $name;
        $_SESSION['semester'] = $user_semes;
	header("Location: home.html", true, 301);
	exit();
}
else{
	echo "Error".$conn->error;
}


// // read data form 
// 	$sql = "SELECT * FROM studentsinfo ";
// 	if($conn->query($sql)===TRUE){
// 		echo "record feteched successfuly";
// 	}
// 	else{
// 		echo "Error occured" .$conn->error;
// 	}

?>