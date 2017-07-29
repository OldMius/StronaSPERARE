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
	
	

</head>

<body>

	<div id="container">
		<form action="laczenie.php" method="post">
			<h1>LOGOWANIE</h1>
			<p>Użytkownik:</p>
			<input type="text" name="login" />
				<br></br>
			<p>Hasło:</p>
			<input type="text" name="haslo" />
				<br></br>
			<input type="submit" value="Zaloguj" />
		</form>
		
		<?php
		if(isset($_SESSION['blad']))
			{echo $_SESSION['blad'];}		
		?>
	</div>
	

</body>

</html>