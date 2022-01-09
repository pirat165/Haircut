
<?php

	session_start();
	
	
	if ((isset($_SESSION['zalogowany'])) && ($_SESSION['zalogowany']==true) && ($_SESSION['Typ'] == 0))
	{
		header('Location: index.php');
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
			<title>Platforma Pracownicza</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="style/style.css">
		<link href="css/bootstrap-4.3.1.css" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Lato:700,900&display=swap" rel="stylesheet">
	
		
	
		
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
						
					</ul>				
				
			</div>
		</header>
		


			<div id="container">
				<br>
				<br>
				<br>
				<h4 class="info"> Platforma Pracownicza</h4>
				<h5 class="info"> Zaplanowane wizyty:</h5>
				
				<div id="admin_cont">
				
	<form  method="post" id="date_form">
			<label for="date_select"> <h4> Wybierz termin</h4></label>
		<br>
			
	<input type="date" name="date_select">
		<button type="submit" class="button button-dark" >Sprawdź termin</button>
	</form>
	<br>
	
	<?php
	require_once "connect.php";

		
	$date_select = $_POST['date_select'];
	echo("<br>");
	echo('<h5>Wybrany dzień: ');
	echo($date_select.'</h5>');
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
			
			$wyswietl = $polaczenie->query("SELECT Data, Godzina, Usluga, Imie FROM reservation INNER JOIN uslugi ON reservation.ID_uslugi = uslugi.ID_uslugi INNER JOIN users ON reservation.ID_os = users.ID_os WHERE Data = '$date_select'  ORDER BY Godzina ASC  ");
       if (!$wyswietl) throw new Exception($polaczenie->error);
				
				else{
					
					echo("<table id='show_todo_table'>");
					 while ( $row = mysqli_fetch_row($wyswietl) ) 
						 {
					   
					    
					    echo("<tr>");
						 
					      echo(" <th> ");
						echo($row[0]);
						
					    echo(" </th> ");
                        echo(" <th> ");
						echo($row[1]);
						 echo(" </th> ");
                        echo(" <th> ");
						echo($row[2]);
						 echo(" </th> ");
						 echo(" <th> ");

						echo($row[3]);
						
						 echo(" </th> ");
						 echo(" </tr> ");
							
							
						 
							
						 }
					echo("</table>");
					 
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
		</div>
		

	
	
		
		
		<div style="clear: both"></div>
		

		<!-- Stopka  -->
		<footer class="site-footer">
			
			  <p>&copy; Salon Fryzjerski Mateusz </p>
				
				
			
		</footer>
		
	</body>
</html>

