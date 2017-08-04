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
		$login = $_POST['login'];
		$password = $_POST['haslo'];
		
		$login = htmlentities($login, ENT_QUOTES, "UTF-8");
		$password = htmlentities($password, ENT_QUOTES, "UTF-8");
		
		if($result = @$polaczenie->query(
		sprintf("SELECT * FROM users WHERE name='%s' AND password='%s'",
		mysqli_real_escape_string($polaczenie,$login),
		mysqli_real_escape_string($polaczenie,$password))))
		{
			$ile_rekordow = $result->num_rows;
						
			if($ile_rekordow>0)
			{
				$_SESSION['zalogowany'] = true;
				
				$wiersz = $result->fetch_assoc();
						
				$_SESSION['id'] = $wiersz['id'];
				$_SESSION['user'] = $wiersz['name'];
				$_SESSION['pass'] = $wiersz['password'];
				$_SESSION['privilages'] = $wiersz['privilages'];
				$_SESSION['firma'] = $wiersz['firma'];
				
				unset($_SESSION["blad"]);
				$result->free_result();
				header('Location: baza.php');
								
			}
			else
			{
				$_SESSION['blad'] = '</br><span style="color:red">Nieprawidłowy login lub hasło!</span></br>';
				header('Location: logowanie.php');
			}
		}
		else{
			
			
			}
	
		$polaczenie->close();
	}
	
?>