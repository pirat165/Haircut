<?php

session_start();
error_reporting( ~E_WARNING & ~E_NOTICE );


if ( ( !isset( $_SESSION[ 'zalogowany' ] ) ) && ( $_SESSION[ 'zalogowany' ] == false ) ) {
  header( 'Location: index.php' );
  exit();
} else if ( ( isset( $_SESSION[ 'zalogowany' ] ) ) && ( $_SESSION[ 'zalogowany' ] == true && ( $_SESSION[ 'Typ' ] == 2 ) ) )

{
  header( 'Location: todo.php' );
  exit();
} else if ( ( isset( $_SESSION[ 'zalogowany' ] ) ) && ( $_SESSION[ 'zalogowany' ] == true && ( $_SESSION[ 'Typ' ] == 3 ) ) )

{
  header( 'Location: admin.php' );
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
<link href='https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
<script>
		function prom()
			{
				alert("Aktualnie nie ma promocji");
			}
		
		</script>
</head>
<body>

<!-- Naglowek strony -->
<div class="menu-container">
  <div class="menu">
    <ul>
      <li><a href="#">
        <?php
        echo( "witaj " . $_SESSION[ 'Imie' ] );

        ?>
        </a></li>
      <li><a href="index.php">Start</a></li>
      <li> <a href="logout.php">Wyloguj</a></li>
      <li><a href="user.php">Moje konto</a>
        <ul>
          <li><a href='password_change.php'>Zmień hasło</a></li>
        </ul>
      </li>
      <li><a href="#price_listA">Cennik</a></li>
      <li><a href="rezerwacja.php">Zarezerwuj</a></li>
      <li><a href="#promo">Promocje</a></li>
      <li><a href="#opinie">Opinie</a></li>
    </ul>
  </div>
</div>
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script><script  src="./js/menu/script.js"></script> 

<!-- Banner -->
<section class="banner">
  <div class="container center-text">
    <h1 style="line-height: 130%; ">
      <mark id="mark_top">Barber Shop Poznań </mark>
    </h1>
    <a class="button button-light" href="rezerwacja.php">Zarezerwuj termin wizyty</a> </div>
</section>
<div id="container"> 
  
  <!-- Sekcja zachecajaca -->
  
  <section class="intro">
    <div class="container">
      <h2 class="center-text">O nas</h2>
      <br>
      <div class="col-one-third center-text"> <img src="img/Adam.jpg" alt="Ikona 1">
        <h3>Adam</h3>
        <p>Fryzjer z 8letnim doświadczeniem, który zaskakuje pomysłami, stroni od szablonowych rozwiązań.
          Zawsze szczery, uśmiechnięty nie bojący się nowych wyzwań. </p>
      </div>
      <div class="col-one-third center-text shadow alert-dark"> <img src="img/Mateusz.jpg" alt="Ikona 1">
        <h3>Mateusz</h3>
        <p>Maestro fryzjerstwa i zarazem właściciel firmy. 10 lat doświadczenia, szerokie grono zaufanych klientów.
          Świetnie czuje się w fryzjerstwie damskim jak i męskim. </p>
      </div>
      <div class="col-one-third center-text"> <img src="img/Sandra.jpg" alt="Ikona 1">
        <h3>Sandra</h3>
        <p>Swoją przygodę z fryzjerstwem zaczęła niespełna <br>
          5lat temu. Zaangażowanie oraz determinacja w dążeniu 
          do wyznaczonych celów sprawiły, że 
          jest świetna w tym co robi. Jej pasją są fryzury okazjonalne, wszelkiego rodzaju upięcia. </p>
      </div>
    </div>
  </section>
  
  <!-- Automatyczna galeria -->
  
  <div id="gall_cont">
    <div class="homepage-hero-slider gallery">
      <div class="photos">
        <div class="slide block active" style="background: url(https://images.unsplash.com/photo-1532775946639-ebb276eb9a1c?ixlib=rb-0.3.5&s=b821fc70ae641c5af2bfa331ea90f17c&auto=format&fit=crop&w=1500&q=80) no-repeat center center; background-size: cover;"></div>
        <div class="slide block" style="background: url(https://images.unsplash.com/photo-1596728325488-58c87691e9af?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=2073&q=80) no-repeat center center; background-size: cover;"></div>
        <div class="slide block" style="background: url(https://images.unsplash.com/photo-1622286342621-4bd786c2447c?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=2070&q=80) no-repeat center center; background-size: cover;"></div>
        <div class="slide block" style="background: url(https://images.unsplash.com/photo-1622288432450-277d0fef5ed6?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=2070&q=80) no-repeat center center; background-size: cover;"></div>
      </div>
      <div class="buttons"> <a class="prev" href="#"><i class="fas fa-fw fa-arrow-left"></i></a> <a class="next" href="#"><i class="fas fa-fw fa-arrow-right"></i></a> </div>
    </div>
  </div>
  <script async type="text/javascript" src="//cdn.carbonads.com/carbon.js?serve=CESDK2J7&placement=getbutterflycom" id="_carbonads_js"></script> 
  <!-- partial --> 
  <script src="https://use.fontawesome.com/releases/v5.3.1/js/all.js"></script><script  src="./gall_js/script.js"></script> 
</div>

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
  <div id="price_listA"></div>
</section>

<!-- cennik -->

<section class="price_list">
  <div id="price_listD">
    <h2 style="text-align: center; padding-bottom: 4%;"> Cennik</h2>
    <hr>
    </hr>
    <div class="row center-text" id="row_price">
      <div class="col">
        <h4>Strzyżenie </h4>
        <h5> 70zł</h5>
      </div>
      <div class="col">
        <h4>Strzyżenie Maszynka</h4>
        <h5> 40zł</h5>
      </div>
    </div>
    <hr>
    </hr>
    <div class="row center-text" id="row_price">
      <div class="col">
        <h4>Strzyżenie Brody </h4>
        <h5> 60zł</h5>
      </div>
      <div class="col">
        <h4>Golenie Brody</h4>
        <h5> 50zł</h5>
      </div>
    </div>
    <hr>
    </hr>
    <div class="row center-text" id="row_price">
      <div class="col">
        <h4>Farbowanie </h4>
        <h5> 80zł</h5>
      </div>
      <div class="col"> </div>
    </div>
    <hr>
    </hr>
  </div>
</section>

<!-- opinie -->
<div id="opinie"></div>
<section class="opinie">
  <div class="jumbotron">
    <p class="lead">Opinie klientów</p>
    <?php


    require_once "connect.php";

    try {
      $polaczenie = new mysqli( $host, $db_user, $db_password, $db_name );
      if ( $polaczenie->connect_errno != 0 ) {
        throw new Exception( mysqli_connect_errno() );
      } else {

        $wyswietl = $polaczenie->query( "SELECT Mail, Ocena, Opinia FROM Opinions, Users ORDER BY RAND() LIMIT 5" );
        if ( !$wyswietl ) throw new Exception( $polaczenie->error );

        else {

          while ( $row = mysqli_fetch_row( $wyswietl ) ) {
            echo( "<hr class='my-4'> <p>Użytkownik: " );
            echo( $row[ 0 ] );

            echo( "    ocena:  " );
            echo( "<mark>" . $row[ 1 ] . "</mark>" );

            echo( "    Recenzja:  " );

            echo( $row[ 2 ] );
            echo( "</p>" );

            //Poprawić HR
          }
        }

        $polaczenie->close();
      }
    } catch ( Exception $e ) {
      echo '<span style="color:red;">Błąd serwera! Przepraszamy za niedogodności i prosimy o rejestrację w innym terminie!</span>';
      echo '<br />Informacja developerska: ' . $e;
    }


    ?>
  </div>
</section>
<div class="container">
  <h2>Ankieta na temat usługi</h2>
  <div class="col-half" >
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
      <label for="recenzja"> <strong>Krótka opionia</strong> </label>
      <br>
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
  <p>&copy; 2022 Barber </p>
</footer>
</body>
</html>
