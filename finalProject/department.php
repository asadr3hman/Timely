<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "finalpro";

$GLOBALS['conn'] = new mysqli($servername, $username, $password, $dbname);

if($conn->connect_error)
{
	die("connection error". $conn->connect_error);

}
else{
echo " connected successfully with db<br>";
}




$departement_data = "SELECT * FROM 'departments';";
	if($conn->query($departement_data)===TRUE){
		echo "record feteched successfuly";
	}
	else{
		echo "Error".$conn->error;
	}
