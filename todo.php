<?php

session_start();
error_reporting( ~E_WARNING & ~E_NOTICE );


if ( ( !isset( $_SESSION[ 'zalogowany' ] ) ) && ( $_SESSION[ 'zalogowany' ] == false ) && ( $_SESSION[ 'Typ' ] == 0 ) ) {
  header( 'Location: index.php' );
  exit();
} else if ( ( !isset( $_SESSION[ 'zalogowany' ] ) ) && ( $_SESSION[ 'zalogowany' ] == false ) && ( $_SESSION[ 'Typ' ] == 2 ) ) {
  header( 'Location: index.php' );
  exit();
} else if ( ( isset( $_SESSION[ 'zalogowany' ] ) ) && ( $_SESSION[ 'zalogowany' ] == true ) && ( $_SESSION[ 'Typ' ] == 1 ) ) {
  header( 'Location: index.php' );
  exit();
} else if ( ( isset( $_SESSION[ 'zalogowany' ] ) ) && ( $_SESSION[ 'zalogowany' ] == true && ( $_SESSION[ 'Typ' ] == 3 ) ) )

{
  header( 'Location: admin.php' );
  exit();
}
    $ID_os = $_SESSION[ 'ID_os' ];



  
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
<link href='https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
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
      <li> <a href="logout.php">Wyloguj</a></li>
    </ul>
  </div>
</div>
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script><script  src="./js/menu/script.js"></script>
<div class="container_AD">
  <h2 class="infoT"> Platforma Pracownicza</h2>
	
	
  <div id="admin_cont">
	  <div class="del_res">

	  <form  method="post" action="del_res.php" id="del_res">
		   <h4> Anuluj wizytę </h4>
		  <h6>ID wizyty</h6>
		  <input type="number" name="form_id_wiz" required>
		  <br>
		   <br>
		  <input type="checkbox" required>
		 
		  <p> Potwierdzenie anulowania</p>
		   <button type="submit" class="button button-dark" >Anuluj</button>
	  </form>
	   </div>
	  
	  <div class="todo_cal"> 
    <form  method="post" id="date_form">
      <label for="date_select">
      <h4> Sprawdź swój grafik</h4>
      </label>
      <br>
      <input type="date" name="date_select">
      <button type="submit" class="button button-dark" >Sprawdź</button>
    </form>
    <br>
    <?php
    require_once "connect.php";

	  
	  
	  

    $date_select = $_POST[ 'date_select' ];
    echo( "<br>" );
    echo( '<h5>Wybrany dzień: ' );
    echo( $date_select . '</h5>' );
    echo( "<br>" );
    try {


      $polaczenie = new mysqli( $host, $db_user, $db_password, $db_name );
      if ( $polaczenie->connect_errno != 0 ) {
        throw new Exception( mysqli_connect_errno() );
      } else {

        $wyswietl = $polaczenie->query( "SELECT ID_reservation Data, Godzina, Usluga, Imie, Status FROM reservation INNER JOIN uslugi ON reservation.ID_uslugi = uslugi.ID_uslugi INNER JOIN users ON reservation.ID_os = users.ID_os WHERE Data = '$date_select' AND ID_emp='$ID_os'  ORDER BY Godzina ASC  " );
        if ( !$wyswietl ) throw new Exception( $polaczenie->error );

        else {

          echo( "<table id='show_todo_table'>" );
          while ( $row = mysqli_fetch_row( $wyswietl ) ) {


            echo( "<tr>" );

            echo( " <th> ID:  " );
            echo( $row[ 0 ] );

            echo( " </th> " );
            echo( " <th> " );
            echo( $row[ 1 ] );
            echo( " </th> " );
            echo( " <th> " );
            echo( $row[ 2 ] );
            echo( " </th> " );
			    echo( " <th> " );
            echo( $row[ 3 ] );
            echo( " </th> " );
			  
            echo( " <th> " );

            echo( $row[ 4 ] );

            echo( " </th> " );
			  echo( " <th> " );

            echo( $row[ 5 ] );

            echo( " </th> " );
            echo( " </tr> " );


          }
          echo( "</table>" );

        }

        $polaczenie->close();
      }
    } catch ( Exception $e ) {
      echo '<span style="color:red;">Błąd serwera! Przepraszamy za niedogodności i prosimy o rejestrację w innym terminie!</span>';
      echo '<br />Informacja developerska: ' . $e;
    }

    ?>
  </div>
</div>
	
<div style="clear: both"></div>

<!-- Stopka  -->
<footer class="site-footer">
  <p>&copy; 2022 Barber </p>
</footer>
</body>
</html>
