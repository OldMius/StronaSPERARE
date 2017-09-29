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

	<form method="post" action="bazafaktura.php">
	
	<div id="container">
		<div class="gui">
			
				
					<h1>Wprowadź dane pacjenta</h1>
					
					<label>Nazwisko: </label>
					<input type="text" name="nazwisko" autocomplete="off" >
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