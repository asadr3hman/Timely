<?php
include "connect.php";
?>

<!DOCTYPE html>
<html>
<head>
    <style>
        
    </style>
</head>

<body>
    <?php

    
    $q = $_GET['q'];//course


    $sql= "SELECT * FROM courses where courseDep = '$q'";

    $result = mysqli_query($conn,$sql);
    
    while ($row = mysqli_fetch_array($result)) {
        echo "<option value = '";
        echo $row['courseN'] ."' >". $row['courseN'] . "</option>";
    }

    ?>
</body>

</html>