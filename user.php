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
			<li><a href='arch.php'>Archiwum</a></li>
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
    <h1 style="line-height: 130%; ">
      <mark id="mark_top">Barber Shop Poznań </mark>
    </h1>
    <a class="button button-light" href="rezerwacja.php">Zarezerwuj termin wizyty</a> </div>
</section>
	
	
	<div class="container"> 
	<div class="row"> 
		

		
		<div class="col-sm-4"> 
<div>
   
<!-- Trigger/Open The Modal -->
<button id="myBtn" class="myBtn_multi button button-dark bg-danger">Anuluj wizytę </button>

<!-- The Modal -->
<div id="myModal" class="modal modal_multi">

  <!-- Modal content -->
  <div class="modal-content">
    <span class="close close_multi">&times;</span>
    <form  method="post" action="usr_del_res.php">
		   <h3>Anuluj wizytę  </h3>
		  <h6>ID wizyty</h6>
		  <input type="number" name="form_id_wiz" id="input_id" required>
		  <br>
		
		  <input type="checkbox" required>
		 
		  <p> Potwierdzenie anulowania</p>
		   <button type="submit" class="button button-dark bg-danger" >Anuluj</button>
	  </form>
  </div>

</div>

</div>

		<div>
			
<!-- Trigger/Open The Modal -->
<button id="myBtn"  class="myBtn_multi button button-dark bg-secondary">Zmień rodzaj wizyty  </button>

<!-- The Modal -->
<div id="myModal" class="modal modal_multi">

  <!-- Modal content -->
  <div class="modal-content">
    <span class="close close_multi">&times;</span>           

    <form action='usr_mod_wiz.php' method='post'>
       <h3> Zmień rodzaj wizyty </h3>
				  <h6>ID wizyty</h6>
				  <input type="number" name="form_id_wiz" required>
				 <br>
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
       
      <input type='submit' class="button button-dark" value='Zmień' />
    </form>
			
  </div>

</div>
		
</div>

		
	
	<div>
   
<!-- Trigger/Open The Modal -->
<button id="myBtn" class="myBtn_multi button button-dark bg-secondary">Zmień termin wizyty </button>

<!-- The Modal -->
<div id="myModal" class="modal modal_multi">

  <!-- Modal content -->
  <div class="modal-content">
    <span class="close close_multi">&times;</span>
    <form  method="post" action="usr_mod_term.php">
		   <h3>Zmień termin wizyty</h3>
		  <h6>ID wizyty</h6>
		  <input type="number" name="form_id_wiz" required>
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
		   <button type="submit" class="button button-dark" >Zmień termin</button>
	  </form>
  </div>

</div>

</div>
	
	</div>
		<div class="col-sm-8">
  <h3>Twoje aktualne wizyty:</h3>
  <?php
  date_default_timezone_set( "Poland" );
  $today_date = date( "Y-m-d" );
  $today_time = date( "G:i" );
  require_once "connect.php";

  try {
    $polaczenie = mysqli_connect( $host, $db_user, $db_password, $db_name );
    if ( $polaczenie->connect_errno != 0 ) {
      throw new Exception( mysqli_connect_errno() );
    } else {

      $wyswietl = $polaczenie->query( "SELECT ID_reservation, Usluga, Data, Godzina, Status FROM reservation INNER JOIN uslugi ON reservation.ID_uslugi = uslugi.ID_uslugi WHERE ID_os='$_SESSION[ID_os]' AND Data >= '$today_date'" );
      if ( !$wyswietl ) throw new Exception( $polaczenie->error );

      else {

        while ( $row = mysqli_fetch_row( $wyswietl ) ) {
          echo( "<hr class='my-4'> <p>ID: " );
          echo( $row[ 0 ] );
			
		  echo( "    Usługa: " );
          echo( $row[ 1 ] );

          echo( "    Data:  " );
          echo( "$row[2]" );

          echo( "    Godzina:  " );

          echo( $row[ 3 ] );
			
			echo( "    Status: :  " );
          echo( "$row[4]" );
			
          echo( "</p></hr>" );

        }
      }

      $polaczenie->close();
    }
  } catch ( Exception $e ) {
    echo '<span style="color:red;">Błąd serwera! </span>';
    echo '<br />Informacja developerska: ' . $e;
  }


  ?>
</div>
	</div>
	</div>
<div style="clear: both"></div>
	
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
		
<!-- Stopka  -->
<footer class="site-footer" style="margin-top: 16%;">
  <p>&copy; 2022 Barber </p>
</footer>
</body>
</html>
