<?php


	session_start();
    error_reporting(~E_WARNING & ~E_NOTICE);

	$_SESSION['Mail']=$Mail;
	$_SESSION['ID_os']=$ID_os;
	

	$Typ = 0;

$_SESSION['Typ'] = $Typ;


	if ((!isset($_POST['login'])) || (!isset($_POST['haslo'])))
	{
		header('Location: index.php');
		exit();
	}

	require_once "connect.php";

	$polaczenie = @new mysqli($host, $db_user, $db_password, $db_name);
	
	if ($polaczenie->connect_errno!=0)
	{
		echo "Error: ".$polaczenie->connect_errno;
	}
	else
	{
        $login = $_POST['login'];
		$haslo = $_POST['haslo'];
		
		
		$login = htmlentities($login, ENT_QUOTES, "UTF-8");
		$haslo = htmlentities($haslo, ENT_QUOTES, "UTF-8");
	
		if ($rezultat = @$polaczenie->query(
		sprintf("SELECT * FROM users WHERE Mail='%s' AND Haslo='%s'",
		mysqli_real_escape_string($polaczenie,$login),
		mysqli_real_escape_string($polaczenie,$haslo))))
		{ 
            
			$ilu_userow = $rezultat->num_rows;
			if($ilu_userow>0)
			{
				$_SESSION['zalogowany'] = true;
				
				$wiersz = $rezultat->fetch_assoc();
				$_SESSION['ID_os'] = $wiersz['ID_os'];
				$_SESSION['Nazwisko'] = $wiersz['Nazwisko'];
				$_SESSION['Imie'] = $wiersz['Imie'];

				$_SESSION['Mail'] = $wiersz['Mail'];
				
				
				
			
				
				unset($_SESSION['blad']);
				$Typ = 1;
				$_SESSION['Typ'] = $Typ;
				$rezultat->free_result();
				header('Location: home.php');
				
				
				
			} 
			
			
			
			
			else {
				
				$_SESSION['blad'] = '<span style="color:red">Nieprawidłowy login lub hasło!</span>';
				header('Location: index.php');
				
			}
		}
		
	
		
		  if ($rezultat = @$polaczenie->query(
		sprintf("SELECT * FROM employee WHERE Mail='%s' AND Haslo='%s'",
		mysqli_real_escape_string($polaczenie,$login),
		mysqli_real_escape_string($polaczenie,$haslo))))
		{ 
				
				$ilu_userow = $rezultat->num_rows;
			if($ilu_userow>0)
			{
				$_SESSION['zalogowany'] = true;
				
				$wiersz = $rezultat->fetch_assoc();
				$_SESSION['ID_os'] = $wiersz['ID_emp'];
				$_SESSION['Nazwisko'] = $wiersz['Nazwisko'];
				$_SESSION['Imie'] = $wiersz['Imie'];

				$_SESSION['Mail'] = $wiersz['Mail'];
				
				
				
					unset($_SESSION['blad']);
					$Typ = 2;
				
				$_SESSION['Typ'] = $Typ;
				$rezultat->free_result();
				header('Location: todo.php');
				}
		  /*     
			else {
				
				$_SESSION['blad'] = '<span style="color:red">Nieprawidłowy login lub hasło!</span>';
				header('Location: index.php');
				
				
			}
				*/
				
			}
		
		 if ($rezultat = @$polaczenie->query(
		sprintf("SELECT * FROM admin WHERE Mail='%s' AND Haslo='%s'",
		mysqli_real_escape_string($polaczenie,$login),
		mysqli_real_escape_string($polaczenie,$haslo))))
		{ 
				
				$ilu_userow = $rezultat->num_rows;
			if($ilu_userow>0)
			{
				$_SESSION['zalogowany'] = true;
				
				$wiersz = $rezultat->fetch_assoc();
				$_SESSION['ID_os'] = $wiersz['ID_ad'];
				$_SESSION['Nazwisko'] = $wiersz['Nazwisko'];
				$_SESSION['Imie'] = $wiersz['Imie'];

				$_SESSION['Mail'] = $wiersz['Mail'];
				
				
				
					unset($_SESSION['blad']);
					$Typ = 3;
				$_SESSION['Typ'] = $Typ;
				$rezultat->free_result();
				header('Location: admin.php');
				}
		  /*     
			else {
				
				$_SESSION['blad'] = '<span style="color:red">Nieprawidłowy login lub hasło!</span>';
				header('Location: index.php');
				
			}
				
				*/
			}
		$polaczenie->close();
	}
	
?>