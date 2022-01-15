<?php
session_start();
error_reporting( ~E_WARNING & ~E_NOTICE );

require_once "connect.php";


$usluga = $_POST[ 'uslugi' ];
$time = $_POST[ 'time' ];
$date = $_POST[ 'date' ];
$pracownik = $_POST[ 'pracownik' ];
$_SESSION[ 'uslugi' ] = $usluga;

$polaczenie = new mysqli( $host, $db_user, $db_password, $db_name );
$id_osoby = $_SESSION[ 'ID_os' ];


try {

  if ( $polaczenie->connect_errno != 0 ) {
    throw new Exception( mysqli_connect_errno() );
  } else {


    $howdy = $polaczenie->query( "SELECT * FROM Calendar WHERE Data='$date' AND Godzina='$time' " );
    $ile_howdy = $howdy->num_rows;
    if ( $ile_howdy == 1 ) {

      $polaczenie->multi_query( " DELETE FROM Calendar WHERE Godzina='$time'; INSERT INTO reservation VALUES (NULL, '$usluga', '$id_osoby', '$pracownik', '$date', '$time', 'Aktywne'); INSERT INTO Archive VALUES (NULL, '$date', '$time', '$pracownik');" ); // OK
      while ( $polaczenie->next_result() ) {;
      }

      echo( "<script>
	
		if (confirm('Dziękujemy! Właśnie zarezerowałeś wizytę " . "dnia " . $date . " o godzinie " . $time . "')) {
  window.open('home.php', '_self');
} else {
  window.open('home.php', '_self');
}
  
		
	</script>" );
		
		
		//Mailing, będzie aktywny po zakupie serwera
		
		
		/*
		   $header = "From: barbershop@mail.com \nContent-Type:".
             ' text/plain;charset="UTF-8"'.
             "\nContent-Transfer-Encoding: 8bit";
   $to = $Mail;
   $subject = "Rezerwacja wizyty BarberShop";
   $message = "Dziękujemy za rezerwacji wizyty dnia: ".$date." o godzinie: ".$time." Pracownik obsługujący: ".$pracownik;
   mail($to, $subject, $message, $header);
		
		*/
		

    }
	  else {
      echo( "<script>
	
		if (confirm('Przepraszamy, termin " . "dnia " . $date . " o godzinie " . $time . " jest już zajęty :(" . "')) {
  window.open('rezerwacja.php', '_self');
} else {
  window.open('rezerwacja.php', '_self');
}
  
		
	</script>" );
    }

  }


  $polaczenie->close();
} catch ( Exception $e ) {
  echo '<span style="color:red;">Błąd serwera! Przepraszamy za niedogodności i prosimy o rezerwację w innym terminie!</span>';
  echo '<br />Informacja developerska: ' . $e;
}


?>