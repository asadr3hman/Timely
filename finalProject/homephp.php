<?php
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
            width: 80%;
            flex-wrap: wrap;
        }

        .todayItem {
            margin: 1%;
            width: 25%;
            padding: 5% 2%;
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
    </style>
</head>

<body>
    <?php

    session_start();
    $class = $_SESSION['classN'];
    $className = strtoupper($class);
    $q = $_GET['q'];//Day

    if (!$conn) {
        die('Could not connect: ' . mysqli_error($conn));
    }

    mysqli_select_db($conn, "ajax_demo");
    $sql = "SELECT classN, teacherN, roomN, time FROM $className WHERE weekDay = '" . $q . "' ORDER BY time DESC;";
    // $subject = "";
    // $teacher = "";
    // $roomNo = "";
    // $time = "";
    
    $result = mysqli_query($conn,$sql);
    
    while ($row = mysqli_fetch_array($result)) {
        echo '<div class="todayItem"> <img src="icons/add.png" alt="" width="40px">';
        echo "<h2>" . $row['classN'] . "</h2>";
        echo "<h4>" . $row['teacherN'] . "</h4>";
        echo "<h5>" . $row['roomN'] . "</h5>";
        echo "<h5>" . $row['time'] . "</h5>";
        echo "</div>";
    }
    

    // $out = '<div class="todayItem">
    // <img src="icons/add.png" alt="" width="40px">
    // <h2>' . $subject . '</h2>
    // <h4>' . $teacher . '</h4>
    // <h5>' . $roomNo . '</h5>
    // <h5>' . $time . '</h5></div>';

    // while ($row = mysqli_fetch_array($result)) {
    //     echo "hello";
    //     $subject = $row['classN'];
    //     $teacher = $row['teacherN'];
    //     $roomNo = $row['roomN'];
    //     $time = $row['time'];
    // }


    // echo '<div class="todayItem">
    //                 <img src="icons/add.png" alt="" width="40px">
    //                 <h2>HRM</h2>
    //                 <h4>Ms.Iqsa</h4>
    //                 <h5>CL-10</h5>
    //                 <h5>09:30</h5>                    
    //             </div>
    //             <div class="todayItem">
    //                 <img src="icons/add.png" alt="" width="40px">
    //                 <h2>HRM</h2>
    //                 <h4>Ms.Iqsa</h4>
    //                 <h5>CL-10</h5>
    //                 <h5>09:30</h5>                    
    //             </div>'

    //     echo "<table>
    // <tr>
    // <th>classN</th>
    // <th>teacherN</th>
    // <th>roomN</th>
    // <th>time</th>
    // </tr>";
    //     while ($row = mysqli_fetch_array($result)) {
    //         echo "<tr>";
    //         echo "<td>" . $row['classN'] . "</td>";
    //         echo "<td>" . $row['teacherN'] . "</td>";
    //         echo "<td>" . $row['roomN'] . "</td>";
    //         echo "<td>" . $row['time'] . "</td>";
    //         echo "</tr>";
    //     }
    //     echo "</table>";
    //     mysqli_close($conn);
    ?>
</body>

</html>