<?php
// start
session_start();
// tar bort variablen
unset($_SESSION['username']);
// förstör den
session_destroy();
// tillbaka till hem och du kane j längre komma åt tabellen med registerade bilar utan att logga in igen:
header("Location: index.html");
exit;
?>


