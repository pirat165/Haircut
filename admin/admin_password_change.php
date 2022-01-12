<?php

session_start();


if ( ( !isset( $_SESSION[ 'zalogowany' ] ) ) && ( $_SESSION[ 'zalogowany' ] == false ) ) {
  header( 'Location: index.php' );
  exit();
}


$login = $_POST[ 'user_login' ];


$haslo1 = $_POST[ 'new_password' ];
$haslo2 = $_POST[ 'new_password1' ];


require_once "connect.php";
mysqli_report( MYSQLI_REPORT_STRICT );

if ( isset( $_POST[ 'user_login' ] ) ) {


  if ( ( strlen( $haslo1 ) < 8 ) || ( strlen( $haslo1 ) > 20 ) ) {
    $wszystko_OK = false;
    $_SESSION[ 'e_pass' ] = "Hasło musi posiadać od 8 do 20 znaków!";
  }

  if ( $haslo1 != $haslo2 ) {
    $wszystko_OK = false;
    $_SESSION[ 'e_pass2' ] = "Podane hasła nie są identyczne!";
  }

  try {

    $polaczenie = new mysqli( $host, $db_user, $db_password, $db_name );
    if ( $polaczenie->connect_errno != 0 ) {
      throw new Exception( mysqli_connect_errno() );
    } else {


      //Sprawdzenie czy istnieje taki użytkownik
      $pass_check = $polaczenie->query( "SELECT ID_emp FROM employee WHERE Mail='$login'" );
      $pass = $pass_check->num_rows;
      if ( !$pass ) throw new Exception_pass( $polaczenie->error );


      if ( $pass == 1 )

      {


        if ( $polaczenie->query( "Update employee Set Haslo='$haslo1' WHERE Mail='$login'" ) )

        {
          $_SESSION[ 'udanazmiana' ] = true;

          echo( "<script>
	
		if (confirm('Hasło zostało zmienione pomyślnie')) {
  window.open('../admin.php', '_self');
} else {
  window.open('../admin.php', '_self');
}
  
		
	</script>" );
        } else {
          throw new Exception( $polaczenie->error );
        }


      }


      $polaczenie->close();
    }
  } catch ( Exception $e ) {
    echo '<span style="color:red;">Błąd serwera! Przepraszamy za niedogodności i prosimy o rezerwację w innym terminie!</span>';
    echo '<br />Informacja developerska: ' . $e;
  } catch ( Exception_pass $e ) {
    echo '<span style="color:red;">Błędne hasło!</span>';
    echo '<br />Informacja developerska: ' . $e;
  }


}


?>
