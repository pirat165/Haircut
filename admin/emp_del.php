<?php

require_once "../connect.php";


$id_osoby = $_SESSION[ 'ID_os' ];

$AD_del = $_POST[ 'employee_del' ];


$polaczenie = @new mysqli( $host, $db_user, $db_password, $db_name );


if ( $wyszukaj_admin = @$polaczenie->query( "SELECT * FROM employee WHERE Mail='$AD_del'" ) ) {


  try {

    if ( $polaczenie->connect_errno != 0 ) {
      throw new Exception( mysqli_connect_errno() );
    }

    $rezultat = $polaczenie->query( "SELECT Mail FROM employee WHERE Mail='$AD_del'" );


    if ( !$rezultat ) throw new Exception( $polaczenie->error );

    $ile_takich_maili = $rezultat->num_rows;
    if ( $ile_takich_maili < 1 ) {
      $wszystko_OK = false;
      echo( "Nie ma takiego użytkowinka" );
      echo( "<A href='../admin.php'>Wróc do poprzedniej strony</A>" );
    } else if ( $polaczenie->query( "DELETE FROM employee WHERE Mail = '$AD_del'" ) )

    {
      echo( "<script>
	
		if (confirm('Usunięto pracownika: " . $AD_del . "')) {
  window.open('../admin.php', '_self');
} else {
  window.open('../admin.php', '_self');
}
  
		
	</script>" );

    }


  } catch ( Exception $e ) {
    echo '<span style="color:red;">Błąd serwera! Przepraszamy za niedogodności i prosimy o rezerwację w innym terminie!</span>';
    echo '<br />Informacja developerska: ' . $e;
  }
} else {
  echo( 'Nie ma takiego użytkownika' );
}

$polaczenie->close();

?>