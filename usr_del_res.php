<?php

require_once "connect.php";

	  
	  $form_id_wiz = $_POST['form_id_wiz'];
	  
    try {


      $polaczenie = new mysqli( $host, $db_user, $db_password, $db_name );
      if ( $polaczenie->connect_errno != 0 ) {
        throw new Exception( mysqli_connect_errno() );
      } else {

        $del_res = $polaczenie->query( "UPDATE reservation  SET Status = 'Anulowano' WHERE ID_reservation = '$form_id_wiz' " );
        $up_cal = $polaczenie->query( "INSERT INTO Calendar (Data, Godzina) SELECT Data, Godzina FROM reservation WHERE reservation.ID_reservation = '$form_id_wiz' " );

           echo( "<script>
	
		if (confirm('Anulowano wizytę')) {
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
	

        $polaczenie->close();
      }
       catch ( Exception $e ) {
      echo '<span style="color:red;">Błąd serwera! Przepraszamy za niedogodności i prosimy o rejestrację w innym terminie!</span>';
      echo '<br />Informacja developerska: ' . $e;
    }
		

?>