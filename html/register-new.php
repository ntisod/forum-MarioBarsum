<!DOCTYPE html>

<html lang="sv">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Userdata</title>
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
        <link rel="stylesheet" href="./userdata.css">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,300italic,400italic,500,700' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">

    </head>
    <body>
        <div class="overlay"></div>
            <div class="modal position">
                <img src="https://www.dropbox.com/s/poqtu9ihb4xsmq3/mn-logo.png?raw=1" class="logo">
                <div class="brand login-text">
                    Sign in with your email or username<br><br>
                    <strong>OR</strong><br><br> Use Facebook secure login for quick access to your account.
                </div>
                <button class="brand login flat-button facebook">Continue with Facebook</button>
                <div class="form position">
                    <a href="#"><button class="close">x</button></a>
                    <div class="form-inner">
                        <!-- Tabs-->
                        <div class="tabs">
                        <ul class="tabs">
                            <li class="current" data-tab="member">
                            <a href="#member">I am a member</a>
                            </li>
                            <li data-tab="new">
                            <a href="#new">I am new here</a>
                            </li>
                        </ul>
                        <!--Login Form -->
                        <div class="form-content current" id="member">
                            <form id="sign-in">
                            <input type="email" name="login-id" id="user" placeholder="USERNAME / EMAIL" class="field" required>
                            <input type="password" name="usrpw" placeholder="PASSWORD" class="field" required>
                            <div class="clear"></div>
                            <input type="checkbox" name="rmbrme" id="custom-check" class="check"><label for="custom-check" class="check-label secondary-text">Remember me</label><a href=""><span class="forgot secondary-text">Forgot password?</span></a>
                            <button id="submit" name="sign-in-button" class="flat-button signin">Log In</button>
                            </form>
                        </div>
                        require("../templates/userdata.php");
                    </div>
                </div>
            </div>
        </div>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
        <script src="userdata.js"></script>
    </body>
    </html>