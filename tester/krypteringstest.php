<?php


$password = "lösen0Rd";

$hashed = password_hash($password, PASSWORD_DEFAULT);

echo $hashed;


$db_pw = "";

$verified = password_verify($password, $db_pw);

if($verified) {
    echo "Grattis, du är inloggad!";
}else{
    echo "fel lösenord, eller användar namn.";
}