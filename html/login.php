<?php
session_start();
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


    //Hämta hemliga värden
    require("../includes/settings.php");

    if ($_SERVER["REQUEST_METHOD"] == "POST") 
    {

        test_if_email_exists();

        
          } else { //Det finns ett värde
            $email = test_input($_POST["email"]);
            // check if e-mail address is well-formed
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
              $emailErr = "Invalid email format";
              $err = true;
            }else{
              //Kolla om e-posten redan existerar i databasen
              if(test_if_email_exists($email)){
                $emailErr = "Email already exists";
                $err = true;
              }
            }
          }
        
          if (empty($_POST["password"])) {
            $pwErr = "password is required";
            $err = true;
          } else {
            $password = test_input($_POST["password"]);
          }
          $hashed = password_hash($password, PASSWORD_DEFAULT);
          
          echo $name . "<br>" . $email . "<br>" . $password  . "<br>";
    

    }else {
        echo <<<HTML
        <form action="session.php">
        <label for="user" >Ange E-postadress:</label> 
        <input type= "text" name="user">
        <label for="user" >Ange Lösenord:</label> 
        <input type= "text" name="user">
        <input type= "submit" name="logga in">
        </form>
HTML;
    }
    function test_if_email_exists($email){
      //Hämta hemliga värden                            
      require("../includes/settings.php");
  
      //Testa om det går att ansluta till databasen
      try {
        //Skapa anslutningsobjekt
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $dbpassword);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        //Förbered SQL-kommando
        $sql = "SELECT email FROM users WHERE email='$email'  LIMIT 1";
        $stmt = $conn->prepare($sql);
        //Skicka frågan till databasen
        $stmt->execute();
  
        // Ta emot resultatet från databasen
        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
  
        $row1 = $stmt->fetch();
        if(empty($row1)){
            echo "E-postadressen finns inte.";
            return false;
        }
        else{
              echo "E-postadressen finns.";
              return true;
        }
      }
      catch(PDOException $e) {
        //Om något i anslutningen går fel
        echo "Error: " . $e->getMessage();
      }
  
      $conn = null;
    }
?>

    
</body>
</html>