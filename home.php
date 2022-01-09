
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
						<li><a href="user.php">Moje konto</a></li>
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

		
		<div id="container"> 
		
	<!-- Sekcja zachecajaca -->
		
		
	<section class="intro">
	
		<div class="container">
			<h2 class="center-text">O nas</h2>
			<br>
			<div class="col-one-third center-text">
				<img src="img/Adam.jpg" alt="Ikona 1">
				<h3>Adam</h3>
				<p>Fryzjer z 8letnim doświadczeniem, który zaskakuje pomysłami, stroni od szablonowych rozwiązań.
					Zawsze szczery, uśmiechnięty nie bojący się nowych wyzwań.
				</p>
			</div>
			<div class="col-one-third center-text">
				<img src="img/Mateusz.jpg" alt="Ikona 1">
				<h3>Mateusz</h3>
				<p>Maestro fryzjerstwa i zarazem właściciel firmy. 10 lat doświadczenia, szerokie grono zaufanych klientów.
					Świetnie czuje się w fryzjerstwie damskim jak i męskim.
				</p>
			</div>
			<div class="col-one-third center-text">
				<img src="img/Sandra.jpg" alt="Ikona 1">
				<h3>Sandra</h3>
				<p>Swoją przygodę z fryzjerstwem zaczęła niespełna <br> 5lat temu. Zaangażowanie oraz determinacja w dążeniu 
					do wyznaczonych celów sprawiły, że 
					jest świetna w tym co robi. Jej pasją są fryzury okazjonalne, wszelkiego rodzaju upięcia.
				</p> 
			</div>
		</div>
	</section>
	
		<!-- Automatyczna galeria -->
		

<div class="mySlides fade">
  <div class="numbertext">1 / 3</div>
  <img src="imgSlider/galeria1.jpg" style="width:100%" alt="zdj1">
</div>

<div class="mySlides fade">
  <div class="numbertext">2 / 3</div>
  <img src="imgSlider/oferta1.jpg" style="width:100%" alt="zdj2">
</div>

<div class="mySlides fade">
  <div class="numbertext">3 / 3</div>
  <img src="imgSlider/oferta2.jpg" style="width:100%" alt="zdj3">
</div>


<br>

<div style="text-align:center">
  <span class="dot"></span> 
  <span class="dot"></span> 
  <span class="dot"></span> 
</div>
	
	
	<!-- skrypt obslugujacy slidera galerii -->
	
	<script>
var slideIndex = 0;
showSlides();

function showSlides() {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("dot");
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";  
  }
  slideIndex++;
  if (slideIndex > slides.length) {slideIndex = 1}    
  for (i = 0; i < dots.length; i++) {
    dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";  
  dots[slideIndex-1].className += " active";
  setTimeout(showSlides, 3000); // zmiana co 3s
}
</script>

		

		<!--Promocje  -->
			
		<section class="promocje" id="promo">
<div class="jumbotron">
  <h1 class="display-4">Skorzystaj z naszych promocji dla nowych klientów</h1>
  <p class="lead">Chciałbyś zmienić swoje życie? Spróbować swoich sił w sporcie siłowym?</p>
  <hr class="my-4">
  <p>Mamy dla Ciebie specjalną ofertę.</p>
  <p class="lead">
	  <button class="btn btn-primary btn-lg" type="button"  onClick="prom()" >Sprawdź nasze promocje</button> 
  </p>
</div>
		</section>
		<!-- opinie -->
		<div id="opinie"></div>
		
		<section class="opinie">
		
		
		<div class="jumbotron">
  <p class="lead">Opinie klientów</p>
			
		
			
			<?php
  
		
		require_once "connect.php";

	try 
		{
			$polaczenie = new mysqli($host, $db_user, $db_password, $db_name);
			if ($polaczenie->connect_errno!=0)
			{
				throw new Exception(mysqli_connect_errno());
			}
			else
			{
			
			$wyswietl = $polaczenie->query("SELECT Mail, Ocena, Opinia FROM Opinions, Users ORDER BY RAND() LIMIT 5");
       if (!$wyswietl) throw new Exception($polaczenie->error);
				
				else{
					
				         while ( $row = mysqli_fetch_row($wyswietl) ) 
						 {
					    echo("<hr class='my-4'> <p>Użytkownik: ");
						echo($row[0]);
							
					    echo("    ocena:  ");
						echo("<mark>".$row[1]."</mark>");
						 
					    echo("    Recenzja:  ");

						echo($row[2]);
							  echo("</p>");
							 
							//Poprawić HR
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
		
		
		</section>
		
		<div class="container">
				<h2>Ankieta na temat usługi</h2>
				<div class="col-half">
					
					
					<form action="skrypt_opinie.php" method="post" >
					
						
						
						
						
						<br>
						
						<label for="ocena"><strong> Ocena </strong></label>

                            <select name="ocena" id="ocena-select">
                                 <option value="">--Wybierz ocene usługi od 1 do 10--</option>
                                  <option value="1">1</option>
                                  <option value="2">2</option>
                                  <option value="3">3</option>
                                  <option value="4">4</option>
                                  <option value="5">5</option>
                                  <option value="6">6</option>
                                  <option value="7">7</option>
                                  <option value="8">8</option>
                                  <option value="9">9</option>
                                  <option value="10">10</option>
						     </select>

                                    <br>
                                    <br>
						
						<label for="recenzja">
							<strong>Krótka opionia</strong>
						</label><br>
						
						<textarea name="recenzja" cols="50" rows="10"  >Podobała się obsługa?</textarea>
						<br>
						<input type="reset" value="Wyczyść formularz">
						<br>
						<br>
						<button type="submit" class="button button-dark">Wyślij</button>
						
								

					</form>
				</div>
	</div>
	</div>
		
	
		
			
		
		
	
		</div>
		
		<div style="clear: both"></div>
		

		<!-- Stopka  -->
		<footer class="site-footer">
			
			  <p>&copy; Salon Fryzjerski Mateusz </p>
				
				
			
		</footer>
		
	</body>
</html>

