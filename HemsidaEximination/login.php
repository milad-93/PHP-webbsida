<?php
session_start();

include_once "databasConnection.php"; //PDO FÖR LOGIN

if (isset($_POST["login_btn"]))
{
  $sql = "SELECT * FROM users WHERE username = ? AND password = ?;";
  $stmt = $db->prepare($sql);
  $stmt->execute([$_POST["username"], $_POST["password"]]);

  if ($row = $stmt->fetch()) //Tar emot en rad från databasen och sparar i en variabel.
  {
    $_SESSION["currentLoggedInUser"] = $row["username"];
    
    header("Location: showRegistredCars.php");
  }

  else {
       echo "<script>alert('Felaktig inloggning, försök igen!');</script>";
  }  
  
    

}

?>
<!DOCTYPE HTML>
<HTML>
<head>
    <link rel="stylesheet" type="text/css" href="design.css">
    <link rel="stylesheet" type="text/css" href="regSign.css">
    <title >Logga in- anställd</title>
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
      <a  href="login.php">Logga in</a>
      <a href="logout.php">Logga ut</a>
      
    </div>
  </div> 
</div>


      
      
      
    <form method="post" action="login.php">

    <div class="container">
    <h1>Logga in anställd</h1>
    
    <hr>

    <label for="username"><b>Användarnamn</b></label>
    <input type="text" placeholder="Fyll i ditt användarnamn" name="username" required>
    
                                                                   
    <label for="password"><b>Lösenord</b></label>
    <input type="password" placeholder="Fyll i ditt lösenord" name="password" required>

    <button type="submit" name= "login_btn" class="login_btn">Logga in</button>
    </div>
        
        <div class="container signin">
    <p> inte registrerad anställd? <a href="register.php">registrera anställd</a>.</p>
  </div>


      </form>

   
    
    </form>
  </body>
</HTML>




