<?php

	session_start();
	
	require_once "connect.php";
	
	$polaczenie = @new mysqli($host, $user, $password, $db_name);
	
	if($polaczenie->connect_errno!=0)
	{
		echo "Error: ".$polaczenie;
	}
	else
	{						
		//tu zaczynam wysyłać dane do tabeli w bazie danych
		$urodzenie = date("Y-m-d", strtotime($_POST["dataurodzenia"]));
		$rejestracja = date("Y-m-d", strtotime($_POST["datarejestracji"]));
		
		$sql = "INSERT INTO pacjent (Nazwisko, Imie, DataUrodzenia, DataRejestracji, AdresUlicaNrDomu, AdresKod, AdresMiejscowosc, Matka, Ojciec, FakturaParagon, IdPlatnika, Uwagi)
						VALUES('".$_POST["nazwisko"]."','".$_POST["imie"]."','$urodzenie','$rejestracja','".$_POST["adresuldom"]."','".$_POST["adreskod"]."','".$_POST["adresmiejscowosc"]."','".$_POST["matka"]."','".$_POST["ojciec"]."','".$_POST["fakturaparagon"]."','".$_POST["platnik"]."','".$_POST["uwagi"]."')";
				
        if ($polaczenie->query($sql) === TRUE) {
			unset($_SESSION["blad"]);
			$polaczenie->close();
			header('Location: baza.php');
		} else {
			echo "Error: " . $sql . "<br>";
		}
	
		//koniec operacji na bazie danych
				
	}
	
?>