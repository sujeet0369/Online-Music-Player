<?php
include("includes/config.php");
//session_destroy(); // if active then if we reload page then it will sent back to starting page.
if(isset($_SESSION['userLoggedin'])){
    $userLoggedin=$_SESSION['userLoggedin'];
}
else{

header("Location:register.php");

}

?>



<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Hard Rock</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
</head>
<body>
    <div id="mainContainer">

        <div id="topContainer">
           <?php include("includes/navBarContainer.php");?>
           <div id="mainVeiwContainer">
                <div id="mainContent">