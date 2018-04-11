<?php 
ob_start();
session_start();
$timezone=date_default_timezone_get("Asia/Kolkata");
$con=mysqli_connect("localhost","root","","hard rock");
if(mysqli_connect_errno()){
    echo "Failed to connect:".mysqli_connect_errno();
}




?>