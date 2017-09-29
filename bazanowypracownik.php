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
				
		$sql = "INSERT INTO pracownik (nazwisko, imie)
						VALUES('".$_POST["nazwisko"]."','".$_POST["imie"]."')";
				
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