<?php

$cookie_name = "user";
$cookie_value = "john doe";

setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/");
?>

<html>
<body>
    <?php 
    if(!isset($_COOKIE[$cookie_name])){
        echo "kakan som heter '" , $cookie_name , "' finns inte.";

    }else{
        echo "kakan som heter '" , $cookie_name , "' finns";
        echo "värdet är " , $_COOKIE[$cookie_name];
    }
?>
</body>
</html>
