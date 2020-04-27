<?php

session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Huvudsida</title>
</head>
<body>
<?php
//kolla om du är inloggad

    if(isset($_SESSION['user'])){
        // om inloggad
        echo "<h1>Du är inloggad som {$_SESSION['user']}</h1>";
        // möjlighet att logga ut
        echo "<p><a href='login.php'>logga in</a></p>";
    }else{
        //om du inte inloggad
        echo "<h1>Du är inte inloggad</h1>";
        //möjlighet att logga in eller registrera
        echo "<p><a href='login.php'>logga in</a></p>";
    }


?>
</body>
</html>
