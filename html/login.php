<?php
session_start();

require("../includes/nti-functions.php");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Inloggning</title>
</head>
<body>

<?php   

  $emailErr = $pwErr = "";
  $email = $password = "";
  $err=false;

  //Hämta hemliga värden
  require("../includes/settings.php");

  if ($_SERVER["REQUEST_METHOD"] == "POST") 
  {

    
        
    if (empty($_POST["email"])) 
    {
      $emailErr = "email is required";
      $err = true;

    } else { //Det finns ett värde
      $email = test_input($_POST["email"]);
      // check if e-mail address is well-formed
      if (!filter_var($email, FILTER_VALIDATE_EMAIL)) 
      {
        $emailErr = "Invalid email format";
        $err = true;
      }else{
        //Kolla om e-posten redan existerar i databasen
        if(!test_if_email_exists($email)){
          $emailErr = "Email doesn't exists";
          $err = true;
        }else{

        if (empty($_POST["password"])) {
          $pwErr = "password is required";
          $err = true;
        } else {
          $password = test_input($_POST["password"]);
        }
  
          //Hämta lösenord från databasen
              //Hämta inställningar
              require("../includes/settings.php");
              try{
                $hashed=get_db_value("users", "password", "email", "$email");
                    //Kontrollera om angivet lösenord stämmer med det i databasen
                    $verified = password_verify($pw, $hashed);
                  //Kontrollera om angivet lösenord stämmer med det i databasen
                  $verified = password_verify($pw, $result['password']);

                  if($verified){
                    $_SESSION['user']=$email;
                      echo "Grattis, du är inloggad!";
                  } else{
                      echo "Fel lösenord, eller användarnamn.";
                      $err=true;
                  }
              }
              catch(PDOException $e)
              {
                  echo $sql . "<br>" . $e->getMessage();
              }
              
              $conn = null;
        }
        
        echo $name . "<br>" . $email . "<br>" . $password  . "<br>";

        }
      }
    }

    if($err)
    {
      require("../templates/loginform.php");  
    }else 
    {
    require("../templates/loginform.php");  
    }

  ?>
    
</body>
</html>