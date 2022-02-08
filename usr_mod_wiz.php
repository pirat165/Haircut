<?php
session_start();

require_once "connect.php";

	  $id_osoby = $_SESSION[ 'ID_os' ];

	  $form_id_wiz = $_POST['form_id_wiz'];
$usluga = $_POST[ 'uslugi' ];
	  $aktData = date("Y-m-d");

 

    try {
		
    $polaczenie = new mysqli( $host, $db_user, $db_password, $db_name );
      if ( $polaczenie->connect_errno != 0 ) {
        throw new Exception( mysqli_connect_errno() );
      } else {
		  
		  $rezultat = $polaczenie->query( "SELECT * FROM reservation WHERE ID_os='$id_osoby' AND ID_reservation ='$form_id_wiz'  AND Data >='$aktData' AND Status='Aktywne'" );
      $aktUsl = $rezultat->num_rows;
      if ( !$aktUsl ) throw new Exception( $polaczenie->error );
		 if ($aktUsl > 0) 
		{ 

        $mod_res = $polaczenie->query( "UPDATE reservation  SET ID_uslugi = '$usluga' WHERE ID_reservation = '$form_id_wiz' " );

      
           echo( "<script>
	
		if (confirm('Zmieniono rodzaj usługi')) {
  window.open('user.php', '_self');
} else {
  window.open('user.php', '_self');
}
  
		
	</script>" );
		  
		  //Mailing, będzie aktywny po zakupie serwera
		
		
		/*
		   $header = "From: barbershop@mail.com \nContent-Type:".
             ' text/plain;charset="UTF-8"'.
             "\nContent-Transfer-Encoding: 8bit";
   $to = $Mail;
   $subject = "Anulowanie wizyty BarberShop";
   $message = "Przepraszamy, wizyta dnia: ".$date." o godzinie: ".$time." została anulowana ";
   mail($to, $subject, $message, $header);
		
		*/
		
		   }
		    if ($aktUsl = 0)
		{ 
	 echo("Brak aktualnych rezerwacji");
		  }
		  
		 
        $polaczenie->close();
	}
      }
       catch ( Exception $e ) {
     echo( "<script>
	
		if (confirm('Przepraszamy, ta wizyta nie jest aktualna. Wybierz inną')) {
  window.open('user.php', '_self');
} else {
  window.open('user.php', '_self');
}
  
		
	</script>" );

 }
		

?>