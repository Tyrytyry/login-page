
	
	<?php

	session_start();
	
	if (isset($_POST['NRALBUMU']))
	{
		//Udana walidacja? Załóżmy, że tak!
		$wszystko_OK=true;
		
		//Sprawdź poprawność nickname'a
		$nick = $_POST['IMIE'];
		$NR = $_POST['NRALBUMU'];
		$NAZWISKO = $_POST['NAZWISKO'];
		
		//Sprawdzenie długości nicka
		
		if ((strlen($NR)) != 6 )
		{
			$wszystko_OK=false;
			$_SESSION['e_nralbumu']="nieprawdziwy nr albumu";
		}
		
		if ((strlen($nick)<2) || (strlen($nick)>20))
		{
			$wszystko_OK=false;
			$_SESSION['e_IMIE']="nieprawdziwe imię!";
		}
	
	$haslo1 = $_POST['HASLO1'];
		$haslo2 = $_POST['HASLO2'];
	
	
		if ((strlen($haslo1)<4) )
		{
			$wszystko_OK=false;
			$_SESSION['e_haslo']="Nieprawidłowe hasło.";
		}
	
	if ($haslo1!=$haslo2)
		{
			$wszystko_OK=false;
			$_SESSION['e_haslo']="Hasła są różne";
		}	
	
	if($wszystko_OK==true)
	{	
		
		//Zapamiętaj wprowadzone dane
		$_SESSION['fr_NR'] = $NR;
		$_SESSION['fr_IMIE'] = $nick;
		$_SESSION['fr_NAZWISKO'] = $NAZWISKO;
		$_SESSION['fr_HASLO1'] = $haslo1;
		$_SESSION['fr_HASLO2'] = $haslo2;
	
		
		require_once "connect.php";
		mysqli_report(MYSQLI_REPORT_STRICT);
		
		try 
		{
			$polaczenie = new mysqli($host, $db_user, $db_password, $db_name);
			if ($polaczenie->connect_errno!=0)
			{
				throw new Exception(mysqli_connect_errno());
			}
			else
			{
			

				//Czy nick jest już zarezerwowany?
				$rezultat = $polaczenie->query("SELECT IDOSOBY FROM osoba WHERE NRALBUMU='$NR'");
				
				if (!$rezultat) throw new Exception($polaczenie->error);
				
				$ile_takich_nickow = $rezultat->num_rows;
				if($ile_takich_nickow>0)
				{
					$wszystko_OK=false;
					$_SESSION['e_nralbumu']="konto z takim nr już istnieje.";
				}
				
				if ($wszystko_OK==true)
				{
					//Hurra, wszystkie testy zaliczone, dodajemy gracza do bazy
					
					if ($polaczenie->query("INSERT INTO osoba VALUES (NULL, '$NR', '$haslo1', '$nick', '$NAZWISKO')"))
					{
						$_SESSION['udanarejestracja']=true;
						header('Location: stronka.php');
					}
					else
					{
						throw new Exception($polaczenie->error);
					}
					
				}
				
				$polaczenie->close();
			}
			
		}
		catch(Exception $e)
		{
			echo $e;
		}
	
	
	
		
	} 
	
	}
?>


<!DOCTYPE HTML>
<html lang="pl">
<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<title>SGGW W Warszawie</title>
	    <link rel="stylesheet" type="text/css" href="style.css">   
	<style>	
		.error
{
	color:red;
	margin-top: 10px;
	margin-bottom: 10px;
}
		</style>
</head>
    <body>
    <div class="register-box">
    <img src="avatar.png" class="avatar">
        <h1>Załóż konto w SGGW</h1>
            <form method="post">
			<p>Nr albumu</p>
            <input type="text" name="NRALBUMU" placeholder="Wpisz Nr albumu">
			<?php
			if(isset($_SESSION['e_nralbumu']))
           {
	echo '<div class="error">'.$_SESSION['e_nralbumu'].'</div>';
	unset($_SESSION['e_nralbumu']);

		   }
			?>
			<p>Imię</p>
			<input type="text" name="IMIE" placeholder="Wpisz imię">
			<?php
			if(isset($_SESSION['e_IMIE']))
           {
	echo '<div class="error">'.$_SESSION['e_IMIE'].'</div>';
	unset($_SESSION['e_IMIE']);

		   }
			?>
			<p>Nazwisko</p>
			<input type="text" name="NAZWISKO" placeholder="Wpisz Nazwisko">
            <p>Hasło</p>
            <input type="password" name="HASLO1" placeholder="Wpisz hasło">
			
			<?php
			if (isset($_SESSION['e_haslo']))
			{
				echo '<div class="error">'.$_SESSION['e_haslo'].'</div>';
				unset($_SESSION['e_haslo']);
			}
		?>		
			<p>Powtórz hasło</p>
            <input type="password" name="HASLO2" placeholder="Powtórz hasło">
            <input type="submit" name="submit" value="załóż konto">
       	
			<p><a href="index.php">Masz już konto?<br />Zaloguj się</a></p>
            </form> 
        
        
        </div>
    
    </body>
</html>

