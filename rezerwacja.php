
<?php

	session_start();
error_reporting(~E_WARNING & ~E_NOTICE);
	
	if ((!isset($_SESSION['zalogowany'])) && ($_SESSION['zalogowany']==false && ($_SESSION['Typ'] == 0)))
	{
		header('Location: index.php');
		exit();
	}
   
      
       else if( (isset($_SESSION['zalogowany'])) && ($_SESSION['zalogowany']==true && ($_SESSION['Typ'] == 2)))
		
		{
			header('Location: admin.php');
		exit();
		}

		else if( (isset($_SESSION['zalogowany'])) && ($_SESSION['zalogowany']==true && ($_SESSION['Typ'] == 3)))
		
		{
			header('Location: admin.php');
		exit();
		}
$id_osoby = $_SESSION['ID_os'];



	

?>



<!DOCTYPE html>
<html>
  <head>
		<meta charset="utf-8">
		<title>rezerwacja</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="style/style.css">
		<link href="css/bootstrap-4.3.1.css" rel="stylesheet">
	  <link href='https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css' rel='stylesheet' type='text/css'><link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
		
	</head>
	<body>

	
			<!-- Naglowek strony -->
		<div class="menu-container">
  <div class="menu">
    <ul>
		<li><a href="#">	<?php
	echo("witaj ".$_SESSION['Imie']);

	?></a></li>
      <li><a href="index.php">Start</a></li>
		<li>	<a href="logout.php">Wyloguj</a></li>
       <li><a href="user.php">Moje konto</a>
        <ul>
         <li><a href='password_change.php'>Zmień hasło</a></li>
        </ul>
        </li>
		 <li><a href="home.php#price_listA">Cennik</a></li>
		<li><a href="rezerwacja.php">Zarezerwuj</a></li>
		<li><a href="home.php#promo">Promocje</a></li>
		<li><a href="home.php#opinie">Opinie</a></li>
		
	
    </ul>
	  
  </div>
</div>

		
 <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script><script  src="./js/menu/script.js"></script>
		
		
	

		<!-- Banner -->
		<section class="banner_user">
			<div class="container center-text">
				<h1 style="line-height: 130%; "><mark id="mark_top">Zarezerwuj wizytę </mark></h1>
			
			</div>			
		</section>
		
  <div id="container">
		

		
		<div id="container_cal">
	<form method="post" id="date_form">
			
			
	<input type="date" name="date_select">
		<button type="submit" class="button button-dark" >Sprawdź termin</button>
	</form>
		
		


	
<?php
	require_once "connect.php";

		
	$date_select = $_POST['date_select'];
	echo("<br>");
	echo('Wybrany dzień: ');
	echo($date_select);
	echo("<br>");
	try 
		{
		
	
			$polaczenie = new mysqli($host, $db_user, $db_password, $db_name);
			if ($polaczenie->connect_errno!=0)
			{
				throw new Exception(mysqli_connect_errno());
			}
			else
			{
			
			$wyswietl = $polaczenie->query("SELECT Data, Godzina FROM Calendar WHERE Data = '$date_select' ");
       if (!$wyswietl) throw new Exception($polaczenie->error);
				
				else{
					 echo(" <br> ");
					echo("wolne terminy: ");
					 echo(" <br> ");
					 while ( $row = mysqli_fetch_row($wyswietl) ) 
						 {
					   
					    
					    
					    echo(" <br> ");

						echo($row[1]);
						
							 
						 
							
							
							
						 }
					 
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
		</div>
		<div id="container_rez">
	
	<form action='skrypt_rez.php' method='post'>
		<p>
		  <label>
		    <input type="radio" name="uslugi" value="1" id="uslugi_0" required>
		    Strzyżenie</label>
		  <br>
		  <label>
		    <input type="radio" name="uslugi" value="2" id="uslugi_1" required>
		    Strzyżenie brody</label> 
			  <br>
			<label>
		    <input type="radio" name="uslugi" value="3" id="uslugi_2" required>
		    Strzyżenie maszynką</label>
			  <br>
			<label>
		    <input type="radio" name="uslugi" value="4" id="uslugi_3" required>
		    Golenie </label>
			</label>
			  <br>
			<label>
		    <input type="radio" name="uslugi" value="5" id="uslugi_4" required>
		    Farbowanie </label>
			
		  <br>
			<input type="date" name="date">
			 <select name="time" id="godzina_select" required>
                                 <option value="">--Wybierz godzinę-</option>
                                  <option value="09:00:00">09:00</option>
                                  <option value="09:30:00">09:30</option>
                                  <option value="10:00:00">10:00</option>
                                  <option value="10:30:00">10:30</option>
                                  <option value="11:00:00">11:00</option>
                                  <option value="11:30:00">11:30</option>
                                  <option value="12:00:00">12:00</option>
                                  <option value="12:30:00">12:30</option>
                                  <option value="13:00:00">13:00</option>
                                  <option value="13:30:00">13:30</option>
                                  <option value="14:00:00">14:00</option>
                                  <option value="14:30:00">14:30</option>
                                  <option value="15:00:00">15:00</option>
                                  <option value="15:30:00">15:30</option>
                                  <option value="16:00:00">16:00</option>
                                  <option value="16:30:00">16:30</option>
                                  <option value="17:00:00">17:00</option>
                                  <option value="17:30:00">17:30</option>
                                  <option value="18:00:00">18:00</option>
                                  <option value="18:30:00">18:30</option>
                                  
						     </select>
</p>
		<br>
		
		<select name="pracownik" id="pracownik_select" required>
                                 <option value="">--Wybierz Pracownika-</option>
                                  <option value="2">Adam</option>
                                  <option value="3">Mateusz</option>
                                  <option value="4">Sandra</option>
		 </select>
		
		<br>
		<br>
		<br>
		
	<input type='submit' value='Umów się' />
		<input type="reset" value="Wyczyść formularz">
		</form>
		
		
		
		</div>
	<div style="clear:both"></div>
	
		</div>
		
				<div style="clear: both"></div>

	<!-- Stopka  -->
		<footer class="site-footer">
			
			
			  <p>&copy; 2022 Barber </p>
				
				
			
		</footer>
		
	</body>
</html>

