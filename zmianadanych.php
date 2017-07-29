<?php
	session_start();
	
	//nie pozwól zmieniać danych niezalogownym
	if(!isset($_SESSION['zalogowany']))
	{
		header('Location: logowanie.php');
		exit();
	}
	
	
	//sprawdź czy wpisano cokolwiek w pole user
	if(isset($_POST['login']))
	{
		$wszystko_OK=true;
		
		//sprawdzam poprawność nazwy użytkownika
		$nick = $_POST['login'];
		
		//długość nazwy użytkownika
		if((strlen($nick) < 3) || (strlen($nick) > 20))
		{
			$wszystko_OK=false;
			$_SESSION['e_nick']="Nazwa użytkownika musi posiadać od 3 do 20 znaków";
		}
		
		if($wszystko_OK==true)
		{
			
			$_SESSION['i_sukces']="Powodzenie zmiany danych";
			//exit();
		}
		else
		{
			header('Location: zmianadanych.php');
			exit();
		}
	}
?>

<!DOCTYPE HTML>
<html lang="pl">

<head>
	<meta charset="utf-8" />
	<title>SPERARE >> Zmiana danych użytkownika</title>
	
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<link rel="stylesheet" href="style.css" type="text/css" />
	

</head>

<body>

	<div id="container">
		<div class="gui">
			<form method="post">
				<h1>ZMIANA DANYCH</h1>
				<?php
				echo "<p>Użytkownik: ".$_SESSION['user'];
				?>
				<p>(wpisz aktualne dane jeśli pozostaje bez zmian)</p></br>
				<p>Nowa nazwa użytkownika:</p>
				<input type="text" name="login" />
					<br></br>
				<?php
				if(isset($_SESSION['e_nick']))
				{
					echo '<div class="error">'.$_SESSION['e_nick'].'</div>';
					unset($_SESSION['e_nick']);
				}
			
				?>
				
				<p>Hasło:</p>
				<input type="text" name="haslo" />
					<br></br>
				<p>Firma:</p>
				<input type="text" name="firma" />
					<br></br>
				<input type="submit" value="Zmiana" />
				<?php
				if(isset($_SESSION['i_sukces']))
				{
					echo '<div class="error">'.$_SESSION['i_sukces'].'</div>';
					unset($_SESSION['i_sukces']);
				}			
				?>
			</form>
			
			<?php
			if(isset($_SESSION['blad']))
				{echo $_SESSION['blad'];}		
			?>
		</div>
	</div>
	

</body>

</html>