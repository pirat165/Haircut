<?php

session_start();

if ( isset( $_POST[ 'email' ] ) ) {
  //Udana walidacja
  $wszystko_OK = true;


  // Sprawdź poprawność adresu email
  $email = $_POST[ 'email' ];
  $emailB = filter_var( $email, FILTER_SANITIZE_EMAIL );
  $emailB = filter_var( $email, FILTER_SANITIZE_EMAIL );

  if ( ( filter_var( $emailB, FILTER_VALIDATE_EMAIL ) == false ) || ( $emailB != $email ) ) {
    $wszystko_OK = false;
    $_SESSION[ 'e_email' ] = "Podaj poprawny adres e-mail!";
  }

  //Sprawdź poprawność hasła
  $haslo1 = $_POST[ 'haslo1' ];
  $haslo2 = $_POST[ 'haslo2' ];

  if ( ( strlen( $haslo1 ) < 8 ) || ( strlen( $haslo1 ) > 20 ) ) {
    $wszystko_OK = false;
    $_SESSION[ 'e_haslo' ] = "Hasło musi posiadać od 8 do 20 znaków!";
  }

  if ( $haslo1 != $haslo2 ) {
    $wszystko_OK = false;
    $_SESSION[ 'e_haslo' ] = "Podane hasła nie są identyczne!";
  }


  //Czy zaakceptowano regulamin?
  if ( !isset( $_POST[ 'regulamin' ] ) ) {
    $wszystko_OK = false;
    $_SESSION[ 'e_regulamin' ] = "Potwierdź akceptację regulaminu!";
  }


  $imie = $_POST[ 'imie' ];
  $nazwisko = $_POST[ 'nazwisko' ];
  $tel = $_POST[ 'tel' ];


  //Zapamiętaj wprowadzone dane
  $_SESSION[ 'fr_imie' ] = $imie;
  $_SESSION[ 'fr_nazwisko' ] = $nazwisko;
  $_SESSION[ 'fr_email' ] = $email;
  $_SESSION[ 'fr_haslo1' ] = $haslo1;
  $_SESSION[ 'fr_haslo2' ] = $haslo2;
  $_SESSION[ 'fr_tel' ] = $tel;

  if ( isset( $_POST[ 'regulamin' ] ) )$_SESSION[ 'fr_regulamin' ] = true;

  require_once "connect.php";
  mysqli_report( MYSQLI_REPORT_STRICT );

  try {
    $polaczenie = new mysqli( $host, $db_user, $db_password, $db_name );
    if ( $polaczenie->connect_errno != 0 ) {
      throw new Exception( mysqli_connect_errno() );
    } else {
      //Czy email już istnieje?
      $rezultat = $polaczenie->query( "SELECT ID_emp FROM employee WHERE Mail='$email'" );


      if ( !$rezultat ) throw new Exception( $polaczenie->error );

      $ile_takich_maili = $rezultat->num_rows;
      if ( $ile_takich_maili > 0 ) {
        $wszystko_OK = false;
        $_SESSION[ 'e_email' ] = "Istnieje już konto przypisane do tego adresu e-mail!";
      }


      if ( $wszystko_OK == true ) {


        if ( $polaczenie->query( "INSERT INTO employee  VALUES (NULL, '$nazwisko', '$imie', '$email', '$tel', '$haslo1')" ) )

        {
          $_SESSION[ 'udanarejestracja' ] = true;
          echo( "<script>
	
		if (confirm('Gratulacje zatrudnienia nowego pracownika! Pracownik " . $imie . " " . $nazwisko . " został dodany " . "')) {
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
    echo '<span style="color:red;">Błąd serwera! Przepraszamy za niedogodności i prosimy o rejestrację w innym terminie!</span>';
    echo '<br />Informacja developerska: ' . $e;
  }

}


?>
