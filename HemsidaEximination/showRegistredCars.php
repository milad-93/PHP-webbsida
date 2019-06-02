<?php
session_start();

include_once "databasConnection.php";

if (!isset($_SESSION["currentLoggedInUser"]))
{
  header("Location: login.php");
  
}
  
?>

<!DOCTYPE HTML>
<html>
<head>

<link rel="stylesheet" type="text/css" href="design.css">
    
    <style type="text/css">
    table{
        border-collapse: collapse;
        width: 100%;
        color: #d96459;
        font-family: monospace;
        font-size:  25px;
        text-align: left;
    }
    th{
        background-color: #d96459;
        color :white;
    }
    tr:nth-child(even) {background-color:#f2f2f2}

    </style>

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

  <h1 >Registrerade bilar för service</h1>
<?php
      $db= mysqli_connect('localhost',"mima0019", "S12hiraz!", "mima0019")
      or die ("sorry you didnt connect"); //kontaktar databasen

      $sqlget= "SELECT * FROM BilartillSalu";
      $sqldata= mysqli_query($db,$sqlget) or die('gick ej att konakta databasen')  ;

  echo "<table><tr>

    <th>Regnr</th>
    <th>Märke</th>
    <th>Modell</th>
    <th>Växellåda</th>
    <th>Miltal</th>
    <th>Kostnad</th>
    </tr>";

    while($row = mysqli_fetch_array($sqldata, MYSQLI_ASSOC))
    {

        echo "<tr><td>"

        . $row["Regnr"]. "</td><td>"
        .  $row["Marke"]. "</td><td>"
        .  $row["Modell"]. "</td><td>"
        .  $row["Vaxellada"]. "</td><td>"
         .  $row["Miltal"]. "</td><td>"
         .  $row["Kostnad"]. "</td><td>"
          ."</td></tr>";
    }

    echo "</table>";




?>

</body>

</html>
