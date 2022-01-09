
<?php

	session_start();
	
	
if ((!isset($_SESSION['zalogowany'])) && ($_SESSION['zalogowany']==false))
	{
		header('Location: index.php');
		exit();
	}
   

$mail_check = $_SESSION['Mail'];
//Sprawdzanie poprawności hasła
        $stare_haslo = $_POST['old_password'];
		$haslo1 = $_POST['new_password'];
		$haslo2 = $_POST['new_password1'];



    require_once "connect.php";
		mysqli_report(MYSQLI_REPORT_STRICT);

        if (isset($_POST['old_password']))
	{
			
            
     if ((strlen($haslo1)<8) || (strlen($haslo1)>20))
		{
			$wszystko_OK=false;
			$_SESSION['e_pass']="Hasło musi posiadać od 8 do 20 znaków!";
		}
		
		if ($haslo1!=$haslo2)
		{
			$wszystko_OK=false;
			$_SESSION['e_pass2']="Podane hasła nie są identyczne!";
		}	
try
			{

$polaczenie = new mysqli($host, $db_user, $db_password, $db_name);
			if ($polaczenie->connect_errno!=0)
			{
				throw new Exception(mysqli_connect_errno());
			}
			else
			{
				
				
				//Sprawdzenie czy użytkownik ma takie hasło
				$rezultat = $polaczenie->query("SELECT ID_os FROM users WHERE Mail='$mail_check' AND Haslo='$stare_haslo'");
				$pass = $rezultat->num_rows;
				if (!$pass) throw new Exception_pass($polaczenie->error);
				
				
				
				$pass_check = $polaczenie->query("Select * From users Where Mail='$mail_check' AND Haslo='$stare_haslo'");
					$rez = $pass_check->num_rows;
					
					if ($rez > 0)
						
						{
						
						if ($polaczenie->query("Update users Set Haslo='$haslo1' WHERE Mail='$mail_check'") ) 
        
					{
						$_SESSION['udanazmiana']=true;
						
					echo("<script>
	
		if (confirm('Hasło zostało zmienione pomyślnie')) {
  window.open('home.php', '_self');
} else {
  window.open('home.php', '_self');
}
  
		
	</script>");
					}
					else
					{
						throw new Exception($polaczenie->error);
					}
					
					
					     }
							
						 
			
				
				$polaczenie->close();
			}
			}
			catch(Exception $e)
		{
			echo '<span style="color:red;">Błąd serwera! Przepraszamy za niedogodności i prosimy o rezerwację w innym terminie!</span>';
			echo '<br />Informacja developerska: '.$e;
		}
catch(Exception_pass $e)
		{
			echo '<span style="color:red;">Błędne hasło!</span>';
			echo '<br />Informacja developerska: '.$e;
		}

		
		}
				
				
			




?>







<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
<title>Zmiana hasła</title>
<<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="style/style.css">
		<link href="css/bootstrap-4.3.1.css" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Lato:700,900&display=swap" rel="stylesheet">
	
	<style>
		.error
		{
			color:red;
			margin-top: 10px;
			margin-bottom: 10px;
		}
	</style>
	
</head>

<body>
    <!-- Naglowek strony -->
		<header class="top">
			<div class="container_top">
				<div class="logo">
					<a href="index.html"><img src="img/logo.png" alt="LOGO" width="60" height="50"></a>
				</div>
				<div class="main-menu">
								
				</div>
				
				
			</div>
		</header>
    
	
	 <div id="container">
<div id="contenerLog">
    
   
     <div id="zalog" >
        
             <button onclick="location.href='home.php'" type="button">
         Wróć do strony głównej</button>
            
        </div>
    
	
    
   
    <br />
    <h4> Zmień Hasło</h4>
    

    	<form method="post">
	
		Stare Hasło: <br /> <input type="password" name="old_password" required/> <br />
			
			<br>
			
			
		Nowe Hasło: <br /> <input type="password" name="new_password" required/> <br /><br />
		Powtórz Hasło: <br /> <input type="password" name="new_password1" required/> <br /><br />
			<?php
			if (isset($_SESSION['e_pass']))
			{
				echo '<div class="error">'.$_SESSION['e_pass'].'</div>';
				unset($_SESSION['e_pass']);
			}
		?> 
			<br>
			<?php
			if (isset($_SESSION['e_pass2']))
			{
				echo '<div class="error">'.$_SESSION['e_pass2'].'</div>';
				unset($_SESSION['e_pass2']);
			}
		?> 
			<br>
		<input type="submit" value="Zmień" />
       
	</form>
    

</div>
	</div>	<div style="clear: both"></div>
		</div>
		

	
	
		<div style="clear: both"></div>
		
		
		

		<!-- Stopka  -->
		<footer class="site-footer">
			
			  <p>&copy; Salon Fryzjerski Mateusz </p>
				
				
			
		</footer>
	
</body>
</html>