<?php
session_start();

	if(!isset($_SESSION['zalogowany']))
	{
		header('Location: logowanie.php');
		exit();
	}
?>

<!DOCTYPE HTML>
<html lang="pl">

<head>
	<meta charset="utf-8" />
	<title>SPERARE >> Poradnia</title>
	
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	
	<link rel="stylesheet" href="style.css" type="text/css" />
	

</head>

<body>

<div id="container">
		<div class="gui">

		<?php
			echo "</br>Witaj: ".$_SESSION['user'].' *** --[ <a href="logout.php">Wyloguj się!</a> ]-- '.'  -- [ <a href="zmianadanych.php">Zmiana Danych!</a> ] -- </br></p>';
			echo "ID: ".$_SESSION['id']."</br>";
			echo "uprawnienia: ".$_SESSION['privilages']."</br>";
			echo "Firma: ".$_SESSION['firma']."</br>";
		?>
		
		<br></br>
		<h1>Program BAZA SPERARE</h1>
		
		<div class="MidBarLL">
			<form action="nowypacjent.php" method="get">
				
				<p>Kartoteka</p>
				
				<input type="submit" name="button1" value="Nowy Pacjent" size="30" title="Zaarejestruj nowego pacjenta"/></br></br>
			</form>
			
			<form action="nowyplatnik.php" method="get">
				<input type="submit" value="Nowy Płatnik" size="30" title="Zarejestruj nowego płatnika - odbiorcę faktur"/></br></br>
			</form>
			
			<form action="nowypracownik.php" method="get">
				<input type="submit" value="Nowy Pracownik" size="30"/></br></br>
			</form>
			
			<form action="kontakty.php" method="get">
				<input type="submit" value="Kontakty" size="30" title="Dane kontaktowe: e-mail, tel., itp."/></br></br>
			</form>
		</div>
		
		<div class="MidBarRR">
			<p>Faktury</p>
			
			<form action="faktura.php" method="get">	
				<input type="submit" name="button1" value="Wystaw fakturę" size="30"/></br></br>
			</form>
			
			<form action="danefirmy.php" method="get">
				<input type="submit" value="Zmień dane firmy" size="30" title="Aktualizuj dane firmy"/></br></br>
			</form>
		
		</div>
		
	</div>
</div>

</body>

</html>