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



	<form name="myform" method="post" action="faktura.php">
	
	<div id="container">
		<div class="gui">
			
			<div class="MidBarLL">	
				<h1>Wprowadź dane do faktury</h1>
				
						
				<?php
					require_once "connect.php";
					
					$polaczenie = @new mysqli($host, $user, $password, $db_name);
					
					if($polaczenie->connect_errno!=0)
						{
						echo "Error: ".$polaczenie;
						}
					else
						{
							echo "<label>Wybierz Pacjenta: </label>";
							echo "<select name='pacjent' style='width:300px; height:30px;' onchange='change()'>";
							echo "<option value=''></option>";
							
							$result1 = @$polaczenie->query(
							sprintf("SELECT Nazwisko, Imie, idPacjenta, idPlatnika FROM pacjent"));
							
							
							while ($row = $result1 -> fetch_assoc()) 
								{
								echo "<option value='" .$row['idPlatnika']."'> ".$row['Imie'].' '.$row['Nazwisko']."</option>";
								}
								
							echo "</select>";
						}
						
					$polaczenie->close();
				?>
				
				<br></br>
				
			
			</div>

			<div class="MidBarRR">
			
				<h2>Płatnik - odbiorca faktury</h2>


				
				<?php
					
						require_once "connect.php";
						
						$polaczenie = @new mysqli($host, $user, $password, $db_name);
						
						if($polaczenie->connect_errno!=0)
							{
							echo "Error: ".$polaczenie;
							}
						else
							{
								//echo $_POST['pacjent'];
								
								$result = @$polaczenie->query(
								sprintf("SELECT nazwaPlatnika, FROM platnik WHERE IdPlatnika =1"));//.$_POST['platnik']));
								//echo $result;
								
								//$row = mysql_fetch_array($result);
									echo $row['nazwaPlatnika'];
								
									
									//echo $result['nazwaPlatnika']."</br>";
									//echo $row['adresUlicaDom']."</br>";
									//echo $row['adresKod']."</br>";
									//echo $row['adresMiejscowosc']."</br>";
									//echo $row['NIP']."</br>";
									
							}
							
						$polaczenie->close();
					
				?>
				
				<label id="Wpacjent"></label>
				
			</div>
			
		</div>
	
	
		<div id="footer">
			
				<input type="submit" name="button" value="Zapisz" style="margin-left:30px;"/>
				<br></br>
						
				<button style="margin-left:30px;"><a href="baza.php">Anuluj</a></button>
				<br></br>
			
		</div>	
	</div>
	
		</form>
		
<!-- //***************Próba użycia JavaScript do obsługi dynamicznej zdarzenia -->
				
				<script>
					function change(){
						document.getElementById("Wpacjent").innerHTML = "UDAŁO SIĘ";
					}
				</script>
				
<!-- //**************/ -->

</body>

</html>