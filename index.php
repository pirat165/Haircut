<?php

session_start();
error_reporting( ~E_WARNING & ~E_NOTICE );


if ( ( isset( $_SESSION[ 'zalogowany' ] ) ) && ( $_SESSION[ 'zalogowany' ] == true ) && ( $_SESSION[ 'Typ' ] == 1 ) ) {
  header( 'Location: home.php' );
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
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>Barber shop</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
	
	
<link rel="stylesheet" href="style/style.css">
<link href="css/bootstrap-4.3.1.css" rel="stylesheet">


<link href="https://fonts.googleapis.com/css?family=Lato:700,900&display=swap" rel="stylesheet">
	
<link href='https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

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
      <li><a href="index.php">Start</a></li>
		<li><a href="#" id="myBtn"  class="myBtn_multi">Zaloguj</a>

		  
        <ul>
          <li><a href='rejestracja.php'>Zarejestruj</a></li>
        </ul>
      </li>
      <li><a href="#price_listA">Cennik</a></li>
      <li><a href="#rezerwacja" id="rez_logout">Zarezerwuj</a></li>
      <li><a href="#promo">Promocje</a></li>
      <li><a href="#opinie">Opinie</a></li>
    </ul>
  </div>
</div>

	


<!-- Popup info  --> 
<script>
	

	         var rez_logout = document.getElementById('rez_logout');
    
   
    
              rez_logout.onclick = function() {
              window.alert("Musisz si?? zalogowa?? aby dokona?? rezerwacji!");
                 }
		</script> 

<!-- Banner -->
<section class="banner">
  <div class="container center-text">
    <h1 style="line-height: 130%; color: #FFFFFF;">
      <mark id="mark_top">Barber Shop Pozna?? </mark>
    </h1>
    <a class="button button-light " href="#kont">Zarezerwuj termin wizyty</a> </div>
  <div id="zalogujA"></div>
</section>
<div id="container">
  <div id="zaloguj"></div>

	
  <!--  Modal -->
<div id="myModal" class="modal modal_multi">

  <!-- Modal content -->
  <div class="modal-content">
    <span class="close close_multi">&times;</span>           

    <form style='text-align:center;' action='zaloguj.php' method='post'>E-mail: <br /> <input type='text' name='login' /> <br />	Has??o: <br /> <input type='password' name='haslo' /> <br /><br /><input type='submit' value='Zaloguj si??' class="button-dark bg-success"/><button type='button' class="button-dark bg-secondary">Nie pami??tam has??a</button></form>
			
  </div>

</div>
	<script>

      
        var modalparent = document.getElementsByClassName("modal_multi");

        // Get the button that opens the modal

        var modal_btn_multi = document.getElementsByClassName("myBtn_multi");

        // Get the <span> element that closes the modal
        var span_close_multi = document.getElementsByClassName("close_multi");

        // When the user clicks the button, open the modal
        function setDataIndex() {

            for (i = 0; i < modal_btn_multi.length; i++)
            {
                modal_btn_multi[i].setAttribute('data-index', i);
                modalparent[i].setAttribute('data-index', i);
                span_close_multi[i].setAttribute('data-index', i);
            }
        }



        for (i = 0; i < modal_btn_multi.length; i++)
        {
            modal_btn_multi[i].onclick = function() {
                var ElementIndex = this.getAttribute('data-index');
                modalparent[ElementIndex].style.display = "block";
            };

            // When the user clicks on <span> (x), close the modal
            span_close_multi[i].onclick = function() {
                var ElementIndex = this.getAttribute('data-index');
                modalparent[ElementIndex].style.display = "none";
            };

        }

        window.onload = function() {

            setDataIndex();
        };

        window.onclick = function(event) {
            if (event.target === modalparent[event.target.getAttribute('data-index')]) {
                modalparent[event.target.getAttribute('data-index')].style.display = "none";
            }

            // OLD CODE
            if (event.target === modal) {
                modal.style.display = "none";
            }
        };





</script>
	
  <?php
  if ( isset( $_SESSION[ 'blad' ] ) ) {
    echo $_SESSION[ 'blad' ];
  }
  unset( $_SESSION[ 'blad' ] );

  ?>
	
	
  <!-- Sekcja zachecajaca -->
  
  <section class="intro">
    <div class="container">
      <h2 class="center-text">O nas</h2>
      <br>
      <div class="col-one-third center-text "> <img src="img/Adam.jpg" alt="Ikona 1">
        <h3>Adam</h3>
        <p>Fryzjer z 8letnim do??wiadczeniem, kt??ry zaskakuje pomys??ami, stroni od szablonowych rozwi??za??.
          Zawsze szczery, u??miechni??ty nie boj??cy si?? nowych wyzwa??. </p>
      </div>
      <div class="col-one-third center-text shadow alert-dark"> <img src="img/Mateusz.jpg" alt="Ikona 1">
        <h3>Mateusz</h3>
        <p>Maestro fryzjerstwa i zarazem w??a??ciciel firmy. 10 lat do??wiadczenia, szerokie grono zaufanych klient??w.
          ??wietnie czuje si?? w fryzjerstwie damskim jak i m??skim. </p>
      </div>
      <div class="col-one-third center-text"> <img src="img/Sandra.jpg" alt="Ikona 1">
        <h3>Sandra</h3>
        <p>Swoj?? przygod?? z fryzjerstwem zacz????a niespe??na <br>
          5lat temu. Zaanga??owanie oraz determinacja w d????eniu 
          do wyznaczonych cel??w sprawi??y, ??e 
          jest ??wietna w tym co robi. Jej pasj?? s?? fryzury okazjonalne, wszelkiego rodzaju upi??cia. </p>
      </div>
    </div>
  </section>
  
  <!-- Automatyczna galeria - Bootstrap Carousel -->
	
	<div id="carouselExampleControls" class="carousel slide bg-dark" data-bs-ride="carousel" data-bs-wrap="true" data-bs-interval="3000">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="https://images.unsplash.com/photo-1622288432450-277d0fef5ed6?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=2070&q=80" class="d-block w-100" alt="zdj1">
    </div>
    <div class="carousel-item">
      <img src="https://images.unsplash.com/photo-1596728325488-58c87691e9af?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=2073&q=80" class="d-block w-100" alt="zdj2">
    </div>
    <div class="carousel-item">
      <img src="https://images.unsplash.com/photo-1622286342621-4bd786c2447c?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=2070&q=80" class="d-block w-100" alt="zdj3">
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Poprzednie</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Nast??pne</span>
  </button>
</div>
	
	
	
	
<!--Promocje  -->

<section class="promocje" id="promo">
  <div class="jumbotron">
    <h1 class="display-4">Skorzystaj z naszych promocji dla nowych klient??w</h1>
    <p class="lead">Chcia??by?? zmieni?? swoje ??ycie? Spr??bowa?? swoich si?? w sporcie si??owym?</p>
    <hr class="my-4">
    <p>Mamy dla Ciebie specjaln?? ofert??.</p>
    <p class="lead">
      <button class="btn btn-primary btn-lg" type="button"  onClick="prom()" >Sprawd?? nasze promocje</button>
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
        <h4>Strzy??enie </h4>
        <h5> 70z??</h5>
      </div>
      <div class="col">
        <h4>Strzy??enie Maszynka</h4>
        <h5> 40z??</h5>
      </div>
    </div>
    <hr>
    </hr>
    <div class="row center-text" id="row_price">
      <div class="col">
        <h4>Strzy??enie Brody </h4>
        <h5> 60z??</h5>
      </div>
      <div class="col">
        <h4>Golenie Brody</h4>
        <h5> 50z??</h5>
      </div>
    </div>
    <hr>
    </hr>
    <div class="row center-text" id="row_price">
      <div class="col">
        <h4>Farbowanie </h4>
        <h5> 80z??</h5>
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
    <p class="lead">Opinie klient??w</p>
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
            echo( "<hr class='my-4'> <p>U??ytkownik: " );
            echo( $row[ 0 ] );

            echo( "    ocena:  " );
            echo( "<mark>" . $row[ 1 ] . "</mark>" );

            echo( "    Recenzja:  " );

            echo( $row[ 2 ] );
            echo( "</p></hr>" );

            
          }
        }

        $polaczenie->close();
      }
    } catch ( Exception $e ) {
      echo '<span style="color:red;">B????d serwera! Przepraszamy za niedogodno??ci i prosimy o rejestracj?? w innym terminie!</span>';
      echo '<br />Informacja developerska: ' . $e;
    }


    ?>
  </div>
</section>
</div>
<div style="clear: both"></div>

<!-- Stopka  -->
<footer class="site-footer">
  <p>&copy; 2022 Barber </p>
</footer>




<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.js" integrity="sha256-htsAUOIgN8xkootpQUzmvaCbQo6x2PNMTD7kLWI6yYQ=" crossorigin="anonymous"></script>
	<script src="js/bootstrap-4.3.1.js">
</script>

	<script src="js/popper.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script><script  src="./js/menu/script.js"></script>
	
</body>
</html>
