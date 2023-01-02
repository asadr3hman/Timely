<?php
include 'connect.php';


// <li class="sub"><a class="selected" href="#">BSSE</a></li>

$classN="dump";
session_start();
$classN = $_SESSION['classN'];

 echo '<li class="sub"><a class="selected" href="#">'.$classN.'</a></li>';
?>