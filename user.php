
<?php

	session_start();
	
	
	if ((!isset($_SESSION['zalogowany'])) && ($_SESSION['zalogowany']==false))
	{
		header('Location: index.php');
		exit();
	}
   
      
       else if( (isset($_SESSION['zalogowany'])) && ($_SESSION['zalogowany']==true && ($_SESSION['Typ'] == 1)))
		
		{
			header('Location: admin.php');
		exit();
		}

		else if( (isset($_SESSION['zalogowany'])) && ($_SESSION['zalogowany']==true && ($_SESSION['Typ'] == 2)))
		
		{
			header('Location: admin.php');
		exit();
		}




?>



<!DOCTYPE html>
  <html>
	<head>
		<meta charset="utf-8">
			<title>Barber shop</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="style/style.css">
		<link href="css/bootstrap-4.3.1.css" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Lato:700,900&display=swap" rel="stylesheet">
		<script>
		function prom()
			{
				alert("Aktualnie nie ma promocji");
			}
		
		</script>

		
	
		
	</head>
	<body>

		
		
		
		
		
		
		
		
		<!-- Naglowek strony -->
		<header class="top">
			<div class="container_top">
				<div class="logo">
					<a href="index.html"><img src="img/logo.png" alt="LOGO" width="60" height="50"></a>
				</div>
				<div id="show_user">
		<?php
	echo("witaj ".$_SESSION['Imie']."    Mail:  ".$_SESSION['Mail']);

	?>
			
			</div>
				<div class="main-menu">
					<ul>
						<li>	<a href="logout.php">Wyloguj</a></li>
						<li><a href='password_change.php'>Zmień hasło</a></li>
						<li><a href="home.php">Start</a></li>
						<li><a href="cennik.php">Cennik</a></li>
						<li><a href="rezerwacja.php">Zarezerwuj</a></li>
						<li><a href="#promo">Promocje</a></li>
						<li><a href="#opinie">Opinie</a></li>
					</ul>				
				</div>
			</div>
		</header>
<p>
		<?php
	echo("witaj ".$_SESSION['Imie']."    Mail:  ".$_SESSION['Mail']);

	?>
			
			</p>

		<!-- Banner -->
		<section class="banner">
			<div class="container center-text">
				<h1 style="line-height: 130%; "><mark id="mark_top">Barber Shop Poznań </mark></h1>
				
				<a class="button button-light" href="rezerwacja.php">Zarezerwuj termin wizyty</a>	
			</div>			
		</section>

		
		
		<div> 
		
			<div class="arch_info"> 
				<h3>Twoje aktualne wizyty:</h3>
			<?php
           date_default_timezone_set("Poland");
		$today_date = date("Y-m-d");
		$today_time =  date("G:i");
		require_once "connect.php";

	try 
		{
			$polaczenie = mysqli_connect($host, $db_user, $db_password, $db_name);
			if ($polaczenie->connect_errno!=0)
			{
				throw new Exception(mysqli_connect_errno());
			}
			else
			{
			
			$wyswietl = $polaczenie->query("SELECT Usluga, Data, Godzina FROM reservation INNER JOIN uslugi ON reservation.ID_uslugi = uslugi.ID_uslugi WHERE ID_os='$_SESSION[ID_os]' AND Data >= '$today_date'");
       if (!$wyswietl) throw new Exception($polaczenie->error);
				
				else{
					
				         while ( $row = mysqli_fetch_row($wyswietl) ) 
						 {
					    echo("<hr class='my-4'> <p>Usługa: ");
						echo($row[0]);
							
					    echo("    Data:  ");
						echo("$row[1]");
						 
					    echo("    Godzina:  ");

						echo($row[2]);
							  echo("</p></hr>");
							 
							//Poprawić HR
						 }
				}
					
$polaczenie->close();
			}
	}
catch(Exception $e)
		{
			echo '<span style="color:red;">Błąd serwera! </span>';
			echo '<br />Informacja developerska: '.$e;
		}


				
		?>
			
		
			
</div>
		
		
	
		
			<div class="arch_info"> 
				<h3>Historia wizyt:</h3>
			<?php
           date_default_timezone_set("Poland");
		$today_date = date("Y-m-d");
		$today_time =  date("G:i");
		require_once "connect.php";

	try 
		{
			$polaczenie = mysqli_connect($host, $db_user, $db_password, $db_name);
			if ($polaczenie->connect_errno!=0)
			{
				throw new Exception(mysqli_connect_errno());
			}
			else
			{
			
			$wyswietl = $polaczenie->query("SELECT Usluga, Data, Godzina FROM reservation INNER JOIN uslugi ON reservation.ID_uslugi = uslugi.ID_uslugi WHERE ID_os='$_SESSION[ID_os]'");
       if (!$wyswietl) throw new Exception($polaczenie->error);
				
				else{
					
				         while ( $row = mysqli_fetch_row($wyswietl) ) 
						 {
					    echo("<hr class='my-4'> <p>Usługa: ");
						echo($row[0]);
							
					    echo("    Data:  ");
						echo("$row[1]");
						 
					    echo("    Godzina:  ");

						echo($row[2]);
							  echo("</p></hr>");
							 
							//Poprawić HR
						 }
				}
					
$polaczenie->close();
			}
	}
catch(Exception $e)
		{
			echo '<span style="color:red;">Błąd serwera! </span>';
			echo '<br />Informacja developerska: '.$e;
		}


				
		?>
			
		
			
</div>
		

		
	
		
			
		
		
	
		</div>
		
		<div style="clear: both"></div>
		

		<!-- Stopka  -->
		<footer class="site-footer">
			
			  <p>&copy; Salon Fryzjerski Mateusz </p>
				
				
			
		</footer>
		
	</body>
</html>

