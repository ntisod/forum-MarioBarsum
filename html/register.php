<?php
    $nameErr = $lastnameErr = $emailErr = $pwErr = "";
    $name = $lastname = $email = $password = "";
    $err=false;

  //kontroll om man kommer till sidan för första gången
  if(!$_SERVER["REQUEST_METHOD"]=="POST"){
      //visa tomt formulär
      echo "Första gången";
      require("../templates/userdata.php");

  }else {//annars
    //kontrollera om formuläret är rätt ifyllt
    echo "andra gången";

    if (empty($_POST["login-id"])) {
      $nameErr = "login-id is required";
      $err = true;
    } else {
      $name = test_input($_POST["login-id"]);
      // check if name only contains letters and whitespace
      if (!preg_match("/^[a-zA-Z0-9åäöÅÄÖ ]*$/",$name)) {
        $nameErr = "Only letters and white space allowed";
        $err = true;
      }
    }
    
    if (empty($_POST["Lastname"])) {
      $lastnameErr = "Lastname is required";
      $err = true;
    } else {
      $lastname = test_input($_POST["Lastname"]);
      // check if name only contains letters and whitespace
      if (!preg_match("/^[a-zA-Z0-9åäöÅÄÖ ]*$/",$lastname)) {
        $lastnameErr = "Only letters and white space allowed";
        $err = true;
      }
    }
  
    if (empty($_POST["email"])) {
      //Tom i ifyllning
      $emailErr = "Email is required";
      $err = true;
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


    //kontrollera om formuläret är rätt ifyllt
    if(!$err){

        //visa välkomstmeddelande
        echo "Jippi!!";
/*        //Spara värdena till fil
        $myfile = fopen("users.txt", "w") or die("Unable to open file!");
        $txt = $name . ";";
        fwrite($myfile, $txt);
        $txt = $email . ";";
        fwrite($myfile, $txt);
        $txt = $password . ";";
        fwrite($myfile, $txt);
        fclose($myfile); */
        
      try {
        require("../includes/settings.php");
        //Anslut till databasen. 
        $conn = new PDO("mysql:host=$servername;dbname=$dbname;charset=utf8", $username, $dbpassword);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        //Skapa SQL-kommando
        $sql = "INSERT INTO users (Name, Lastname, email, regdate, password) VALUES ('$name', '$lastname', '$email', NOW(), '$hashed')";
        echo $sql;
        
        // use exec() because no results are returned
        $conn->exec($sql);
        echo "New record created successfully";
      }
      catch(PDOException $e)
      {
        echo $sql . "<br>" . $e->getMessage();
      }
      
      $conn = null;
        


        //Ange sessionsvariabel
        //$_SESSION["user"]=$_POST["user"];
        //Skicka vidare till lämplig sida
        //header("Location: index.php");
    } else {//annars
      echo "Error!!!";
      //visa formulär med värden ifyllda
      require("../templates/userdata.php");  
    }
  }
 

  function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
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