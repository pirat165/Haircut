<?php

	session_start();

//Sprawdzanie poprawności hasła
        $stare_haslo = $_POST['old_password'];
		$haslo1 = $_POST['new_password'];
		$haslo2 = $_POST['new_password1'];



    require_once "connect.php";
		mysqli_report(MYSQLI_REPORT_STRICT);

         try 
		{
            
     if ((strlen($haslo1)<8) || (strlen($haslo1)>20))
		{
			$wszystko_OK=false;
			$_SESSION['e_haslo']="Hasło musi posiadać od 8 do 20 znaków!";
		}
		
		if ($haslo1!=$haslo2)
		{
			$wszystko_OK=false;
			$_SESSION['e_haslo']="Podane hasła nie są identyczne!";
		}	


$polaczenie = new mysqli($host, $db_user, $db_password, $db_name);
			if ($polaczenie->connect_errno!=0)
			{
				throw new Exception(mysqli_connect_errno());
			}
			else
			{
				//Sprawdzenie czy użytkownik ma takie hasło
				$rezultat = $polaczenie->query("SELECT ID_os FROM users WHERE Mail='$email' AND Haslo='$stare_haslo'");
				
				if (!$rezultat) throw new Exception($polaczenie->error);
				
				
				$password_checker = $rezultat->num_rows;
				if($password_checker = 1)
				{
					$wszystko_OK=false;
					$_SESSION['e_pass']="Nieprawidłowe hasło";
				}		
				
				if ($polaczenie->query("Update users Set Haslo='$haslo1'") ) 
        
					{
						$_SESSION['udanazmiana']=true;
						header('Location: change.php');
					echo("<scritp>alert('Hasło zostało zmienione!') </script>");
					}
					else
					{
						throw new Exception($polaczenie->error);
					}
					
				
				
				$polaczenie->close();
			}
		 }
		
		catch(Exception $e)
		{
			echo '<span style="color:red;">Błąd serwera! Przepraszamy za niedogodności i prosimy o rejestrację w innym terminie!</span>';
			echo '<br />Informacja developerska: '.$e;
		}

				
				
				
				
				
			




?>