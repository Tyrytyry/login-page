<?php

	session_start();
	
	if ((isset($_SESSION['zalogowany'])) && ($_SESSION['zalogowany']==true))
	{
		header('Location: stronka.php');
		exit();
	}

?>
<!DOCTYPE HTML>
<html lang="pl">
<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<title>SGGW W Warszawie</title>
	    <link rel="stylesheet" type="text/css" href="style.css">   
</head>
    <body>
    <div class="login-box">
    <img src="avatar.png" class="avatar">
	<h2>SGGW w Warszawie</h2>
        <h1>Zaloguj się</h1>
            <form action="zaloguj.php" method="post">
            <p>Nr Albumu</p>
            <input type="text" name="NRALBUMU" placeholder="wpisz Nr albumu">
            <p>Hasło</p>
            <input type="password" name="HASLO" placeholder="Wpisz haslo">
            <input type="submit" name="submit" value="Zaloguj się">
       	
			<p><a href="register.php">Nie masz jeszcze konta?<br />Załóż teraz</a></p>
			
            </form>
        
        <?php
	if(isset($_SESSION['blad']))	echo $_SESSION['blad'];
?>
        </div>
    
    </body>
</html>