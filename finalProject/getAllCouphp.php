
<?php
//get all courses in sidepanel of admin
include "connect.php";


$adminDep = "CS and IT";
session_start();
$adminDep = $_SESSION['adminDept'];
$adminDep = strtoupper($adminDep);


$sql= "SELECT courseN FROM courses WHERE courseDep = '$adminDep'";

$result = mysqli_query($conn, $sql);

$arryOfCourses = array();

while ($row = mysqli_fetch_array($result)) {
    echo '<li class="sub"><a href="#">'.$row["courseN"].'</a></li>';
    array_push($arryOfCourses, $row['courseN']);
}
$_SESSION['arryOfCourses'] = $arryOfCourses; //using in queury to get tables

?>

