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

	<form method="post" action="bazanowypacjent.php">
	
	<div id="container">
		<div class="gui">
		
			<div class="MidBarLGUI">
			
				
					<h1>Wprowadź dane pacjenta</h1>
					
					<label>Nazwisko: </label>
					<input type="text" name="nazwisko" autocomplete="off" >
						<br></br>
						
					<label>Imie: </label>
					<input type="text" name="imie" autocomplete="off" >
						<br></br>
						
					<label>Data urodzenia: </label>
					<input type="text" name="dataurodzenia" autocomplete="off" style="width:100px;">
						<br></br>
						
					<label>Data rejestracji:</label>
					<input type="text" name="datarejestracji" value="<?php echo date('d-m-Y');?>" style="background-color:grey; width:100px;">
					
						<br></br>
						
					<label>Adres - ulica i nr domu/mieszkania:</label>
					<input type="text" name="adresuldom" autocomplete="off" style="width:300px;">
						<br></br>
						
					<label>Adres - kod i miejscowość:</label>
					<input type="text" name="adreskod" autocomplete="off" style="width:100px;">
					<input type="text" name="adresmiejscowosc" autocomplete="off" style="width:300px;">
						<br></br>
						
					<label>Matka (nazwisko i imię):</label>
					<input type="text" name="matka" autocomplete="off" style="width:300px;">
						<br></br>
						
					<label>Ojciec (nazwisko i imię):</label>
					<input type="text" name="ojciec" autocomplete="off" style="width:300px;">
						<br></br>
						
					<label>Faktura czy Paragon:</label>
						<input type="radio" name="fakturaparagon" value="Faktura" > Faktura
						<input type="radio" name="fakturaparagon" value="Paragon" checked > Paragon
					<br></br>
					
				</div>
				
				<div class="MidBarRGUI">
				
					<?php
						require_once "connect.php";
				
						$polaczenie = @new mysqli($host, $user, $password, $db_name);
						
						
						if($polaczenie->connect_errno!=0)
							{
							echo "Error: ".$polaczenie;
							}
						else
							{
								echo "<label>Wybierz płatnika (Odbiorca faktury):</label>";
								echo "<select name='platnik' style='width:300px; height:30px;'>";
								echo "<option >Wybierz Płatnika</option>";
								
								$result = @$polaczenie->query(
								sprintf("SELECT nazwaPlatnika, idPlatnika FROM platnik"));
								
								while ($row = $result -> fetch_assoc()) 
								{
									
									
									echo "<option value='" .$row['idPlatnika']."'> ".$row['nazwaPlatnika']." </option>";
								}					
							}
							
						$polaczenie->close();
					?>
					</select>
					
					<br></br>
						
					<label>Uwagi:</label>
					<textarea name="uwagi" autocomplete="off" style="height:60px; width:500px;" style="vertical-align: text-top;" ></textarea>
						<br></br>
				
				</div>	
			
			
			
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