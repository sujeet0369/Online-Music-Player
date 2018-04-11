<?php
function checkFormUsername($inputText){
$inputText=strip_tags($inputText);
$inputText=str_replace(" ","",$inputText);
return $inputText;

}
function checkFormPassword($inputText){
    $inputText=strip_tags($inputText);
  
    return $inputText;
    
    }
function checkFormString($inputText){
    $inputText=strip_tags($inputText);
    $inputText=str_replace(" ","",$inputText);
    $inputText=ucfirst(strtolower( $inputText));
    return $inputText;
    
    }


if(isset($_POST['registerButton'])) {
    $username=checkFormUsername($_POST['username1']);
    $firstname=checkFormString($_POST['firstname']);
    $lastname=checkFormString($_POST['lastname']);
    $email1=checkFormUsername($_POST['email1']);
    $email2=checkFormUsername($_POST['email2']);
    $password1=checkFormPassword($_POST['givePassword']);
    $password2=checkFormPassword($_POST['confirmPassword']);

    $wasSuccessful= $account->register( $username, $firstname,$lastname,$email1, $email2, $password1,$password2);
    if($wasSuccessful==true){
        $_SESSION['userLoggedin']=$username;
        header("Location: index.php");
    }

    
}






?>
