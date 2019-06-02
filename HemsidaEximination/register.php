<?php

  session_start();

  include_once "databasConnection.php"; //PDO FÖR REGISTER


  if (isset($_POST["register_btn"]))
  {
      $sql = "INSERT INTO users (username, email, password) VALUES (?, ?, ?);"; //Dessa tre rader skickar en fråga till databasen med hjälp av PDO.
      $stmt = $db->prepare($sql);
      $stmt->execute([$_POST["username"], $_POST["email"], $_POST["password"]]);
    
      header("location: index.html");
      
      
      
  }

?>

<!DOCTYPE HTML>
<HTML>
<head>
    <link rel="stylesheet" type="text/css" href="design.css">
    <link rel="stylesheet" type="text/css" href="regSign.css">
    <title >Registrera-anställd</title>
</head>
  <body>
      
 <div class="navbar">
  <a href="index.html">Hem</a>
  <a href="carCheckin.php">Checka in din bil - Privatkund</a>
  <a href="register.php">Registrera - Personal</a>  
  <div class="dropdown">
    <button class="dropbtn">Personal 
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-content">
      <a href="showRegistredCars.php">Se registrerade bilar (inloggning krävs)</a>
      <a href="login.php">Logga in</a>
      <a href="logout.php">Logga ut</a>
      
    </div>
  </div> 
</div>


      
    <form method="post" action="register.php">

    <div class="container">
    <h1>Registrera ett konto(endast anställd) krävs verifiering!</h1>
    
    <hr>

    <label for="username"><b>Användarnamn</b></label>
    <input type="text" placeholder="Fyll i ditt användarnamn" name="username" required>
    
    <label for="email"><b>Email</b></label>
    <input type="email" placeholder="fyll i din email" name="email" required>
    
                                                                   
    <label for="password"><b>Lösenord</b></label>
    <input type="password" placeholder="Fyll i ditt lösenord" name="password" required>

    <button type="submit" name= "register_btn" class="register_btn">Register</button>
    </div>

  <div class="container signin">
    <p>Registrerad anställd? <a href="login.php">Logga in</a>.</p>
  </div>
</form>
       
  
  </body>
</HTML>



















