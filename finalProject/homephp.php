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
    </style>
</head>

<body>
    <?php
    session_start();
    $class = $_SESSION['classN']; //bsse or bsit etc
    $rollN = $_SESSION['rollNo'];
    $className = strtoupper($class);
    $q = $_GET['q'];//Day

    if (!$conn) {
        die('Could not connect: ' . mysqli_error($conn));
    }

    mysqli_select_db($conn, "ajax_demo");
    $sql = "SELECT classN, teacherN, roomN, time FROM $className WHERE weekDay = '" . $q . "'";
    
    $result = mysqli_query($conn,$sql);
    
    while ($row = mysqli_fetch_array($result)) {
        echo '<div class="todayItem"> <img src="icons/add.png" alt="" width="40px">';
        echo "<h2>" . $row['classN'] . "</h2>";
        echo "<h4>" . $row['teacherN'] . "</h4>";
        echo "<h5>" . $row['roomN'] . "</h5>";
        echo "<h5>" . $row['time'] . "</h5>";
        echo "</div>";
    }
    ?>
</body>

</html>