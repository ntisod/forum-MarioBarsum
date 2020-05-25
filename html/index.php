<?php

session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>NTI forum</title>
</head>
<body>
<?php
    require'../templates/header.php';
    //Kolla om du är inloggad
    if(isset($_SESSION['user'])){
        //Om inloggad
        echo "<h1>Du är inloggad som {$_SESSION['user']} </h1>";
        //Möjlighet att logga ut
        echo "<p><a href='logout.php'>Logga ut</a></p>";
    }else{
        //Om inte inloggad
        echo "<h1>Du är inte inloggad</h1>";
        //Möjlighet att logga in eller registrera sig
        echo "<p><a href='register.php'>Logga in</a></p>";
        echo "<p><a href='login.php'>Logga in</a></p>";
    }

?>
</body>
</html>
