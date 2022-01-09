
<?php

	session_start();
	
	
	if ((isset($_SESSION['zalogowany'])) && ($_SESSION['zalogowany']==true) && ($_SESSION['Typ'] == 0))
	{
		header('Location: home.php');
		exit();
	}
   

		else if( (isset($_SESSION['zalogowany'])) && ($_SESSION['zalogowany']==true && ($_SESSION['Typ'] == 1)))
		
		{
			header('Location: todo.php');
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
				<div class="main-menu">
					<ul>
						<li><a href="#zaloguj"id="z1" >Zaloguj</a></li>
						<li><a href='rejestracja.php'>Zarejestruj</a></li>
						<li><a href="index.php">Start</a></li>
						<li><a href="cennik.php">Cennik</a></li>
						<li><a href="#rezerwacja" id="rez_logout">Zarezerwuj</a></li>
						<li><a href="#promo">Promocje</a></li>
						<li><a href="#opinie">Opinie</a></li>
					</ul>				
				</div>
			</div>
		</header>
		
			<!-- Popup info  -->
				<script>
	

	         var rez_logout = document.getElementById('rez_logout');
    
   
    
              rez_logout.onclick = function() {
              window.alert("Musisz się zalogować aby dokonać rezerwacji!");
                 }
		</script>



		<!-- Banner -->
		<section class="banner">
			<div class="container center-text">
				<h1 style="line-height: 130%;"><mark id="mark_top">Barber Shop Poznań </mark></h1>
				
				<a class="button button-light" href="#kont">Zarezerwuj termin wizyty</a>	
			</div>			
		</section>

		
		<div id="container"> 
		<div id="zaloguj"></div>
			<script>
	
			
 
    

  

	
	
	var z1 = document.getElementById('z1'),
    
    zaloguj = document.getElementById('zaloguj');
    
z1.onclick = function() {
    zaloguj.innerHTML = "<form style='text-align:center;' action='zaloguj.php' method='post'>Login: <br /> <input type='text' name='login' /> <br />	Hasło: <br /> <input type='password' name='haslo' /> <br /><br /><input type='submit' value='Zaloguj się '/><button type='button'>Nie pamiętam hasła</button></form>";
	 document.getElementById("zaloguj").focus();
}
		</script>
	
		<?php
	if(isset($_SESSION['blad']))	
	{
		echo $_SESSION['blad'];
	}
	unset($_SESSION['blad']);
	
?>
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
		

		</div>
		<div style="clear: both"></div>

		<!-- Stopka  -->
		<footer class="site-footer">
			
			  <p>&copy; Salon Fryzjerski Mateusz </p>
				
				
			
		</footer>
		
	</body>
</html>

