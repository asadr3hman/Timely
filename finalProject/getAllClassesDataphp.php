<?php
//show content of adminhome mainArea
include 'connect.php';

?>

<!DOCTYPE html>
<html>
<head>
    <style>
        .todayItems {
            display: flex;
            padding: 3% 5%;
            justify-content: center;
            width: 100%;
            flex-wrap: wrap;
        }

        .todayItem {
            margin: 1%;
            width: 200px;
            padding: 20px;
            border-radius: 5%;
            display: flex;
            flex-direction: column;
            align-items: center;
            box-shadow: 2px 2px 10px rgb(194, 194, 194);
            background-color: var(--secondry);
        }

        .todayItem>* {
            padding: 3px;
            text-align: center;
        }
        #del{
            visibility: hidden;
            display: flex;
            justify-content: flex-end;
            width: 100%;
        }
        #update{
            visibility: hidden;
            display: flex;
            justify-content: center;
            width: 90%;
        }
    </style>
    
</head>

<body>
    <?php
    $arryOfCourses = array();
    session_start();
    $arryOfCourses = $_SESSION['arryOfCourses']; //bsse or etc
    $size = sizeof($arryOfCourses);
    $q = $_GET['q'];//Day


    $_SESSION['daySelected'] = $q;

    mysqli_select_db($conn, "ajax_demo");


    foreach ($arryOfCourses as $courses){
        $sql = "SELECT * FROM $courses WHERE weekDay = '" . $q . "'";
        
        $result = mysqli_query($conn,$sql);
        
        while ($row = mysqli_fetch_array($result)) {
            $getIMG = "SELECT subjectImgURL FROM subjects WHERE subjectN = '". $row['classN'] . "'";
            $resultIMG = mysqli_query($conn, $getIMG);
            $img = "https://cdn-icons-png.flaticon.com/512/4173/4173686.png";
            while ($imagRow = mysqli_fetch_array($resultIMG)){
                $img = $imagRow['subjectImgURL'];
            }
            echo '<div class="todayItem"> ';
            echo '<div id="del"> <img onclick="delbtn('. $row["weekNo"] .',' ."'" . $row["classN"] . "'" . ',' ."'" . $courses . "'".',' ."'" . $row["semester"] . "'". ',' ."'" . $row["self_reg"] . "'" . ')"
            id = "delBTN" src="https://cdn-icons-png.flaticon.com/512/1828/1828843.png" alt="" width="20px"></div>';
            echo '<img src="' . $img . '" alt="" width="50px">';
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
</body>
</html>