<?php
class Account{
private $con;
private $errorArray;
public function __construct($con){
    $this->con=$con;
$this->errorArray=array();
}
public function register($username,$firstname,$lastname,$email1,$email2,$password1,$password2){
   $this->validateUserName($username);
   $this->validateFirstName($firstname);
   $this->validateLastName($lastname);
   $this->validateEmails($email1,$email2);
   $this->validatePasswords($password1,$password2);
    if(empty($this->errorArray)){
                        //INSERT INTO DATA BASE
        return $this->insertDetails($username,$firstname,$lastname,$email1,$password1);
    }
    else{

        return false;

    }
}

Public function insertDetails($username,$firstname,$lastname,$email1,$password1){
    $encryptedPassword=md5($password1);
    $profilepic="assets/images/profile-pics/head.png";
    $date=date("Y-m-d");
    $result=mysqli_query($this->con,"INSERT INTO users VALUES('','$username','$firstname','$lastname','$email1',' $encryptedPassword',' $date',' $profilepic')");
    return $result;

}

public function getError($error) {
    if(!in_array($error, $this->errorArray)) {
        $error = "";
    }
    return "<span class='errorMessage'>$error</span>";

}

public function login($un,$pw) {

    $pw =md5($pw);
    
    $query = mysqli_query($this->con, "SELECT * FROM users WHERE userName='$un'  AND password='$pw'");

    if(mysqli_num_rows($query) == 1) {
        return true;
    }
    else {
        array_push($this->errorArray, Constant::$loginFailed);
        return false;
    }

}

private function validateUserName($uname){
if(strlen($uname)<5||strlen($uname)>25){
array_push($this->errorArray,Constant::$userNameInvalid);
return;
}
    $userNameCheck=mysqli_query($this->con,"SELECT userName FROM users WHERE userName='$uname'");// TO DO CHECK USER NMAE ALREADY EXIST
    if(mysqli_num_rows($userNameCheck)!=0){
        array_push($this->errorArray,Constant::$userNameTaken);
        return; 
    }
}
private function validateFirstName($fname){
    if(strlen($fname)<2||strlen($fname)>25){
        array_push($this->errorArray,Constant::$firstNamInvalid);
        return;
        }  
}
private function validateLastName($lname){
    if(strlen($lname)<2||strlen($lname)>25){
        array_push($this->errorArray,Constant::$lastNamInvalid);
        return;
    }    
}
private function validateEmails($em1,$em2){

    if($em1!=$em2){
        array_push($this->errorArray,Constant::$emailDontMatch);
        return;
    }
    if(!filter_var($em1,FILTER_VALIDATE_EMAIL)){
        array_push($this->errorArray,Constant::$emailInvalid);
        return;
    }
    // TO DO CHECK email ALREADY EXIST
    $emailCheck=mysqli_query($this->con,"SELECT email FROM users WHERE email='$em1'");
    if(mysqli_num_rows($emailCheck)!=0){
        array_push($this->errorArray,Constant::$emailTaken);
        return; 
    }
}
private function validatePasswords($pass1,$pass2){
    
    if($pass1!=$pass2){
        array_push($this->errorArray,Constant::$passwordDontMatch);
        return;
    }
    if(preg_match('/[^A-Za-z0-9]/',$pass1)){
        array_push($this->errorArray,Constant::$passwordNotAphaNumeric);
        return;
    }
    if(strlen($pass1)<5||strlen($pass1)>30){
        array_push($this->errorArray,Constant::$passwordShort);
        return;
        
        }
}


}
?>