<?php

	session_start();
	
	if (!isset($_SESSION['zalogowany']))
	{
		header('Location: index.php');
		exit();
	}
	
?>
<!DOCTYPE HTML>
<html lang="pl">

<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<title>SGGW W Warszawie</title>
		<meta name="description" content="Strona uczelni SGGW w Warszawie" />
	    <link rel="stylesheet" href="style2.css" type="text/css" />
</head>

<body>
	
	<div id="container">
	
		<div id="logo">
				
<?php

	echo "<p>Witaj ".$_SESSION['IMIE']."! ";
?>
			
			
		</div>
		
		<div id="topbar">
			
			<div id="topbarR">
				<span class="bigtitle">Twoje dane</span>
				<div style="height: 15px;"></div>
				Nr albumu: <?php  echo $_SESSION['NRALBUMU']; ?> <br />  
				Imię: <?php  echo $_SESSION['IMIE']; ?> <br /> 
				Nazwisko: <?php  echo $_SESSION['NAZWISKO']; ?>  <br />
				<a href="logout.php">Wyloguj się!</a>
			</div>
				
			<div style="clear:both;"></div>
		</div>
		
		<div id="sidebar">
			<div class="option">uczelnia</div>
			<div class="option">student</div>
			<div class="option">historia</div>
			
		</div>
		
		<div id="content">
			<span class="bigtitle">SGGW W Warszawie</span>
			
			<div class="dottedline"></div>
			
			Szkoła Główna Gospodarstwa Wiejskiego w Warszawie (SGGW) – uniwersytet przyrodniczy[2] w Warszawie, uważany za najstarszy i największy ośrodek tego typu w Polsce. Jego początki sięgają 23 września 1816, kiedy utworzono Instytut Agronomiczny w miejscowości Marymont (obecnie w dzielnicy Bielany). <br /><br />
			(tekst pochodzi z wikipedii) <br /> 
			
		
		</div>	
		
		<div id="footer">
				Łukasz Macierzyński Nr albumu 203781. SGGW w Warszawie
		</div>
	
	</div>
	
</body>
</html>