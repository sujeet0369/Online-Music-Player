<?php
if(isset($_POST['loginButton'])) {

$username=$_POST['loginUsername'];
$pass=$_POST['loginPassword'];
$result=$account->login($username,$pass);
if($result==true){
    $_SESSION['userLoggedin']=$username;
    header("Location:index.php");
}
}
?>
