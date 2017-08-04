<?php

	session_start();
	
	if(isset($_SESSION['zalogowany']) && ($_SESSION['zalogowany']==true))
	{
		header('Location: baza.php');
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
		<form action="laczenie.php" method="post">
			<h1>LOGOWANIE</h1>
			<p>Użytkownik:</p>
			<input type="text" name="login" autocomplete="off" />
				<br></br>
			<p>Hasło:</p>
			<input type="text" name="haslo" autocomplete="off" />
				<br></br>
			<input type="submit" name="button" value="Zaloguj" />
			<button><a href="index.html">Anuluj</a></button>
		</form>
		
		<?php
		if(isset($_SESSION['blad']))
			{echo $_SESSION['blad'];}		
		?>
	</div>
	</div>
	

</body>

</html>