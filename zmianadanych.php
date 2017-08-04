<?php
	session_start();
	
	//nie pozwól zmieniać danych niezalogownym
	if(!isset($_SESSION['zalogowany']))
	{
		header('Location: logowanie.php');
		exit();
	}
	
	require_once "connect.php";
	
	$polaczenie = @new mysqli($host, $user, $password, $db_name);
	
	//sprawdź czy wpisano cokolwiek w pole user
	if(isset($_POST['zmianalogin']))
	{
		$wszystko_OK=true;
		
		//sprawdzam poprawność danych
		$nick = $_POST['zmianalogin'];
		$passw = $_POST['haslo'];
		$firm = $_POST['s_firma'];
		
		if ($_POST['button'] == "Anuluj")
		{
			header("Location: baza.php");
			exit();
		}
		
		//długość nazwy użytkownika
		if((strlen($nick) < 3) || (strlen($nick) > 20))
		{
			$wszystko_OK=false;
			$_SESSION['e_nick']="Nazwa użytkownika musi posiadać od 3 do 20 znaków";
		}
		
		//długość hasła
		if((strlen($passw) < 6) || (strlen($passw) > 20))
		{
			$wszystko_OK=false;
			$_SESSION['e_haslo']="Hasło musi posiadać od 6 do 20 znaków";
		}
		
		//Wybór firmy
		if((strlen($firm) < 3) || (strlen($firm) > 20))
		{
			$wszystko_OK=false;
			$_SESSION['e_firma']="Wprowadzono nieprawidłową firmę";
		}
		
		if($wszystko_OK==true)
		{
			$result = @$polaczenie->query(
				sprintf("UPDATE `users` SET name='%s', password='%s', firma='%s' WHERE id='%s'",
				mysqli_real_escape_string($polaczenie,$nick),
				mysqli_real_escape_string($polaczenie,$passw),
				mysqli_real_escape_string($polaczenie,$firm),
				mysqli_real_escape_string($polaczenie,$_SESSION['id'])));
		
			header('Location: baza.php');
			exit();
			//$_SESSION['i_sukces']="Powodzenie zmiany danych";
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
				echo "<p>Hasło: ".$_SESSION['pass'];
				echo "<p>Firma: ".$_SESSION['firma'];
				?>
				<p>(pozostaw aktualne dane jeśli pozostają bez zmian)</p></br>
				
				<p>Nowa nazwa użytkownika:</p>
				<?php
				echo '<input type="text" name="zmianalogin" autocomplete="off" value="'.$_SESSION["user"].'"/>';
				?>
					<br></br>
				<?php
				if(isset($_SESSION['e_nick']))
				{
					echo '<div class="error">'.$_SESSION['e_nick'].'</div>';
					unset($_SESSION['e_nick']);
				}
			
				?>
				
				<p>Hasło:</p>
				<?php
				echo '<input type="text" name="haslo" autocomplete="off" value="'.$_SESSION['pass'].'"/>';
				?>
					<br></br>
				<?php
				if(isset($_SESSION['e_haslo']))
				{
					echo '<div class="error">'.$_SESSION['e_haslo'].'</div>';
					unset($_SESSION['e_haslo']);
				}			
				?>
				
				<p>Firma:</p>
				
				<select name="s_firma">
				  <option value="SPERARE" <?php if ($_SESSION['firma']=="SPERARE") echo "selected=\"selected\""; ?>>SPERARE</option>
				  <option value="Marzena Oberska" <?php if ($_SESSION['firma']=="Marzena Oberska") echo "selected=\"selected\""; ?>>Marzena Oberska</option>
				  <?php
				  if ($_SESSION['firma']=="Admin")
				  {
					  echo '<option value="Admin" selected="selected">Admin</option>';
				  }
				  ?>
				</select>
				
					<br></br>
				<?php
				if(isset($_SESSION['e_firma']))
				{
					echo '<div class="error">'.$_SESSION['e_firma'].'</div>';
					unset($_SESSION['e_firma']);
				}			
				?>
				
				<input type="submit" name="button" value="Zmiana" />
				<?php
				if(isset($_SESSION['i_sukces']))
				{
					echo '<div class="error">'.$_SESSION['i_sukces'].'</div>';
					unset($_SESSION['i_sukces']);
				}			
				?>
				
				<input type="submit" name="button" value="Anuluj" />
				
			</form>
			
			<?php
			if(isset($_SESSION['blad']))
				{echo $_SESSION['blad'];}		
			?>
		</div>
	</div>
	

</body>

</html>