<?php
include("includes/config.php");
include("includes/classes/Account.php");
include("includes/classes/Constant.php");
$account=new Account($con);

include("includes/handler/register_handler.php");
include("includes/handler/login_handler.php");
function getInputValue($name){
    if(isset($_POST[$name])){

        echo $_POST[$name];
    }
}




?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />    
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Hard Rock</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css"  href="assets/css/register.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script type="text/javascript" src="assets/js/register.js"></script>
</head>
<body>
    <?php

        if(isset($_POST['registerButton'])) {
            echo '<script>
                    $(document).ready(function() {
                        $("#loginForm").hide();
                        $("#registerForm").show();
                    });
                </script>';
        }
        else {
            echo '<script>
                    $(document).ready(function() {
                        $("#loginForm").show();
                        $("#registerForm").hide();
                    });
                </script>';
        }

    ?>
    <div id="background">
        <div id="loginContainer">
            <div id="inputcontainer">
                
                <form id="loginForm"action="register.php"method="POST">
                <h2>Login to your account</h2>
                <p>
                <?php echo $account->getError(Constant::$loginFailed);?>
                <label for="loginUsername">Username</label>
                <input type="text" id="loginUsername" name="loginUsername"placeholder="e.g myaccount1"value="<?php getInputValue('loginUsername'); ?>"required/>
                </p>
                <p>
                <label for="loginPassword">Password</label>
                <input type="password" id="loginPassword" name="loginPassword"placeholder="your password"required/>
                </p>
                <button type="submit" name="loginButton"value="Login">LOG IN</button>
                    <div class="hasInputText">
                        <span id="hideLogin">Don't have a account yet ? Sign up here.</span>
                    </div>  
                </form>




               
                <form id="registerForm"action="register.php"method="POST">
                <h2>Create your free account</h2>
                <p>
                <?php echo $account->getError(Constant::$userNameInvalid);?>
                <?php echo $account->getError(Constant::$userNameTaken);?>
                <label for="username1">Username</label>
                <input type="text" id="username1" name="username1"placeholder="e.g myaccount1"value="<?php getInputValue('username1'); ?>"required/>
                </p>
                <p>
                <?php echo $account->getError(Constant::$firstNamInvalid);?>
                <label for="firstname">First name</label>
                <input type="text" id="firstname" name="firstname"placeholder="e.g Sanket"value="<?php getInputValue('firstname'); ?>"required/>
                </p>
                <p>
                <?php echo $account->getError(Constant::$lastNamInvalid);?>
                <label for="lastname">Last name</label>
                <input type="text" id="lastname" name="lastname"placeholder="e.g Kumar"value="<?php getInputValue('lastname'); ?>"required/>
                </p>
                <p>
                <?php echo $account->getError(Constant::$emailDontMatch);?>
                <?php echo $account->getError(Constant::$emailInvalid);?>
                <?php echo $account->getError(Constant::$emailTaken);?>
                <label for="email1">Give Email</label>
                <input type="text" id="email1" name="email1"placeholder="e.g kumar@gmail.com"value="<?php getInputValue('email1'); ?>"required/>
                </p>
                <p>

                <label for="email2">Confirm Email</label>
                <input type="text" id="email2" name="email2"placeholder="e.g kumar@gmail.com"value="<?php getInputValue('email2'); ?>"required/>
                </p>
                <p>
                <?php echo $account->getError(Constant::$passwordDontMatch);?>
                <?php echo $account->getError(Constant::$passwordNotAphaNumeric);?>
                <?php echo $account->getError(Constant::$passwordShort);?>
                <label for="givePassword"> Give Password</label>
                <input type="password" id="givePassword" name="givePassword"placeholder="your password"required/>
                </p>
                <p>

                <label for="confirmPassword">Confirm Password</label>
                <input type="password" id="confirmPassword" name="confirmPassword"placeholder="your password"required/>
                </p>
                <button type="submit" name="registerButton"value="Sign up">SIGN UP</button>
                <div class="hasInputText">
                        <span id="hideRegister">Already have account ? Log in here.</span>
                    </div> 
                </form>
            </div>
            <div id="loginText">
				<h1>Get great music, right now</h1>
				<h2>Listen to loads of songs for free</h2>
				<ul>
					<li>Discover music you'll fall in love with</li>
					<li>Create your own playlists</li>
					<li>Follow artists to keep up to date</li>
				</ul>
			</div>
        </div>      
    </div>
</body>
</html>