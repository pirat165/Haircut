<?php
session_start();
error_reporting( ~E_WARNING & ~E_NOTICE );

require_once "connect.php";
$id_osoby = $_SESSION[ 'ID_os' ];


$recenzje = $_POST[ 'recenzja' ];

$oceny = $_POST[ 'ocena' ];


$polaczenie = new mysqli( $host, $db_user, $db_password, $db_name );


try

{

  if ( $polaczenie->connect_errno != 0 ) {
    throw new Exception( mysqli_connect_errno() );
  } else if ( $polaczenie->query( "INSERT INTO Opinions VALUES (NULL, $id_osoby, $oceny, '$recenzje')" ) )

  {

    echo( "<script>
	
		if (confirm('Dziękujemy! Twoja opinia została przesłana')) {
  window.open('index.php', '_self');
} else {
  window.open('index.php', '_self');
}
  
		
	</script>" );
    $recenzje = '';
    $oceny = '';

  }


  $polaczenie->close();
} catch ( Exception $e ) {
  echo '<span style="color:red;">Błąd serwera! Przepraszamy za niedogodności i prosimy o rezerwację w innym terminie!</span>';
  echo '<br />Informacja developerska: ' . $e;
}


?>