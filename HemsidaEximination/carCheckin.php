

<?php

if (isset($_POST['register_btn']))
{
    $db = mysqli_connect('localhost', 'Hidden','Hidden!', 'Hidden'); // min kontakt med databasen
   
    
    $sqlinsert = "INSERT INTO BilartillSalu (Regnr, Marke, Modell, Vaxellada, Miltal, Kostnad)
    VALUES ('$_POST[Regnr]','$_POST[Marke]','$_POST[Modell]','$_POST[Vaxellada]', '$_POST[Miltal]','$_POST[Kostnad]')"; // världen som läggs in matchas mot formuläret
    
    
   if(!mysqli_query($db,$sqlinsert)){
       die('Error connecting to database server: tips: registreringsnumret finns nog redan inlagt'); //kollar om det finns värden annars kontaktar den ej
       
   }
    
    
  echo "Din bil är nu inlagd i systemet i väntan på service"; // säger till vad jag lagt in
 }   // end of main ifstatement

   header("index.html"); //refreshar hemsidan efter du lagt in ett värde!;
    
?> 


<html>   
<meta charset="utf-8">

<link rel="stylesheet" type="text/css" href="design.css">
<link rel="stylesheet" type="text/css" href="regSign.css">
<title>Checka in bil</title>

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

  
    
     
  <form method="post" action="carCheckin.php">

    <div class="container">
        <h1>Checka in bilen för service</h1>
    <hr>

        <label for="Regnr"><b>RegNr</b></label>
        <input type="text" placeholder="Fyll i ditt registreringsnummer" name="Regnr" required>

        <label for="Marke"><b>Märke</b></label>
        <input type="text" placeholder="Fyll i märket på bilen" name="Marke" required>    

        <label for="Modell"><b>Modell</b></label>
        <input type="text" placeholder="Fyll i bil modell" name="Modell" required>

        <label for="Vaxellada"><b>Växellåda</b></label>
        <input type="text" placeholder="Fyll växelåde typ Manuell/automat" name="Vaxellada" required>

        <label for="Miltal"><b>Miltal</b></label>
        <input type="text" placeholder="Fyll i hur långt blen åkt i kilometer" name="Miltal" required>

        <label for="Kostnad"><b>Kostnad</b></label>
        <input type="text" placeholder="Fyll i bilens värde" name="Kostnad" required>

        <button type="submit" name= "register_btn" class="register_btn">Checka in för service!</button>
    </div>


</form>

</html>

































