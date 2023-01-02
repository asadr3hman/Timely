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

// <option value="asdlkkf" selected> asdasd</option>


    $sql= "SELECT * FROM departments";

    $result = mysqli_query($conn,$sql);
    echo "<option disabled selected> --Select Department--</option>";
    while ($row = mysqli_fetch_array($result)) {    
        
        echo "<option value = '";
        echo $row['departmentN'] ."' >". $row['departmentN'] . "</option>";
    }

    ?>
</body>

</html>