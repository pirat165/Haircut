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

<div class="arch_info">
  <h3>Historia wizyt:</h3>
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

      $wyswietl = $polaczenie->query( "SELECT Usluga, Data, Godzina FROM reservation INNER JOIN uslugi ON reservation.ID_uslugi = uslugi.ID_uslugi WHERE ID_os='$_SESSION[ID_os]'" );
      if ( !$wyswietl ) throw new Exception( $polaczenie->error );

      else {

        while ( $row = mysqli_fetch_row( $wyswietl ) ) {
          echo( "<hr class='my-4'> <p>Usługa: " );
          echo( $row[ 0 ] );

          echo( "    Data:  " );
          echo( "$row[1]" );

          echo( "    Godzina:  " );

          echo( $row[ 2 ] );
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
<div style="clear: both"></div>

<!-- Stopka  -->
<footer class="site-footer" style="margin-top: 16%;">
  <p>&copy; 2022 Barber </p>
</footer>
</body>
</html>
