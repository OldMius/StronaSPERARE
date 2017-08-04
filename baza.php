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
		
		<form action="laczenie.php" method="post">
			<h1>Program BAZA SPERARE</h1>
			<p>Kartoteka</p>
			<input type="submit" value="Pacjenci" size="30"/></br></br>
		
			<input type="submit" value="Pracownicy" size="30"/></br></br>
			
			<input type="submit" value="Kontrahenci" size="30"/></br></br>
		</form>
		
	</div>
</div>

</body>

</html>