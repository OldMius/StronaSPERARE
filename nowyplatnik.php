<?php
	session_start();
	
	//nie pozwól zmieniać danych niezalogownym
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
	<title>SPERARE >> Operacje na Bazie</title>
	
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<link rel="stylesheet" href="style.css" type="text/css" />
	

</head>

<body>

	<form method="post" action="bazanowyplatnik.php">
	
	<div id="container">
		<div class="gui">
		
			
				
			<h1>Wprowadź dane płatnika</h1>
					
			<label>Nazwa lub Nazwisko i Imię: </label>
			<input type="text" name="nazwa" autocomplete="off" style="width:500px;">
			<br></br>
						
			<label>Adres (ul, nr domu/mieszkania): </label>
			<input type="text" name="adresul" autocomplete="off" >
			<br></br>
						
			<label>Adres - kod i miejscowość:</label>
			<input type="text" name="adreskod" autocomplete="off" style="width:100px;">
			<input type="text" name="adresmiejscowosc" autocomplete="off" style="width:300px;">
			<br></br>
						
			<label>NIP (jeśli płatnik nie jest osobą prywatną):</label><br></br>
			<input type="text" name="nip" autocomplete="off" style="width:100px;">
			<br></br>
						
			<label>Uwagi:</label>
			<textarea name="uwagi" autocomplete="off" style="height:60px; width:500px;" style="vertical-align: text-top;" ></textarea>
			<br></br>
				
	
		</div>
		
	</div>
	
	<div id="footer">
		
			<input type="submit" name="button" value="Zapisz" style="margin-left:30px;"/>
			<br></br>
					
			<button style="margin-left:30px;"><a href="baza.php">Anuluj</a></button>
			<br></br>
		
	</div>	

	</form>
	
</body>

</html>