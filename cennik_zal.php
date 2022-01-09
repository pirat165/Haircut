
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
		<title>Pierwsza strona</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="style/style.css">
		<link href="css/bootstrap-4.3.1.css" rel="stylesheet">
		
	</head>
	<body>

		<!-- Naglowek strony -->
		<header class="top">
			<div class="container_top">
				<div class="logo">
					<a href="index.html"><img src="img/logo.png" alt="LOGO" width="60" height="55"></a>
				</div>
				<div id="show_user">
		<?php
	echo("witaj ".$_SESSION['Imie']."    Mail:  ".$_SESSION['Mail']);

	?>
			
			</div>
				<div class="main-menu">
					<ul>
						<li>	<a href="logout.php">Wyloguj</a></li>
						<li><a href="home.php">Start</a></li>
						<li><a href="cennik.php">Cennik</a></li>
						<li><a href="rezerwacja.php">Zarezerwuj</a></li>
						<li><a href="#promo">Promocje</a></li>
						<li><a href="#opinie">Opinie</a></li>
					</ul>				
				</div>
			</div>
	</header>
		 
		<!-- Zalety oferty -->
		<section class="Cennik">
			<div class="container2">
				<h2 class="center-text">Cennik</h2>
				<br>
				<div class="colOfer">
					<img src="img/oferta1.jpg" alt="Ikona 1">
					
					
				</div>
				
				<div class="oferText">
				<h3>Męski:					</h3>
					<p>Strzyżenie maszynką 30-50zł</p>
					<p>Strzyżenie nożyczkami 40-60zł</p>
					<p>Strzyżenie brody 40-50zł</p>
					<p>Odsiwianie 50-60zł</p>
					<p>Farbowanie 100-130zł</p>
				</div>
				<div style="clear: both"></div>
				
				<div class="colOfer">
					<img src="img/oferta2.jpg" alt="Ikona 1">
					
					
			  </div>
				<div class="oferText">
					<h3>Damski:</h3>
					<p>Strzyzenie grzywki 20-30zł</p>
					<p>Strzyżemie 50-70zł</p>
					<p>Modelowanie 40-50zł</p>
					<p>Strzyżenie + Modelwanie 80-100zł</p>
					<p>Upięcie ślubne 100-150zł</p>
					<p>Loki 80-100zł</p>
					<p>Prostowanie keratynowe 500-600zł</p>
					
              </div>
				
			</div>
		</section>
		

		<!-- Stopka  -->
		<footer class="site-footer">
			<div class="container">
			  <p>&copy; Salon Fryzjerski Mateusz </p>
				
				
			
		</footer>
		
	</body>
</html>

