<?php
include "connect.php";

session_start();

$daySelected = $_SESSION['daySelected'];
$semester = $_SESSION['semester'];

$weekN = $_GET['weekN'];
$courseN = $_GET['courseN'];
$coursN = strtolower($courseN);
$classN = $_GET['classN'];
$semester = $_GET['semester'];
$self_reg = $_GET['self_reg'];

$sql  = "DELETE FROM $coursN WHERE weekNo = $weekN AND classN = '$classN' AND weekDay = '$daySelected' AND semester = '$semester' AND self_reg = '$self_reg' ";

$result = mysqli_query($conn, $sql);


$arryOfCourses = array();
    
    $arryOfCourses = $_SESSION['arryOfCourses']; //bsse or etc
    $size = sizeof($arryOfCourses);

    mysqli_select_db($conn, "ajax_demo");
foreach ($arryOfCourses as $courses){
    $sql = "SELECT * FROM $courses WHERE weekDay = '" . $daySelected . "'";
    
    $result = mysqli_query($conn,$sql);
    
    while ($row = mysqli_fetch_array($result)) {
        echo '<div class="todayItem"> ';
        echo '<div id="del"> <img onclick="delbtn('. $row["weekNo"] .',' ."'" . $row["classN"] . "'" . ',' ."'" . $courses . "'".',' ."'" . $row["semester"] . "'". ',' ."'" . $row["self_reg"] . "'" . ')"
        id = "delBTN" src="https://cdn-icons-png.flaticon.com/512/1828/1828843.png" alt="" width="20px"></div>';
        echo '<img src="icons/add.png" alt="" width="40px">';
        echo "<h1>" . $courses."</h1>";
        echo "<h2>" . $row['semester'] . " ";
        if($row['self_reg']==1) echo "Self". "</h2>";
        else echo "Regular" . "</h2>";
        echo "<h2>" . $row['classN'] . "</h2>";
        echo "<h4>" . $row['teacherN'] . "</h4>";
        echo "<h5>" . $row['roomN'] . "</h5>";
        echo "<h5>" . $row['time'] . "</h5>";
        echo "<h6> Week " . $row['weekNo'] . "</h6>";
        echo '<div id="update"> <h3 id = "updateBTN">Update</h3> </div>';
        echo "</div>";
    }
}

?>