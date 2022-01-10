
<?php

	session_start();
	
	
	if ((!isset($_SESSION['zalogowany'])) && ($_SESSION['zalogowany']==false) && ($_SESSION['Typ'] == 0))
	{
		header('Location: index.php');
		exit();
	}
   
       else if ((isset($_SESSION['zalogowany'])) && ($_SESSION['zalogowany']==true) && ($_SESSION['Typ'] == 1))
	     {
		   
		    header('Location: index.php');
	      	exit();
	    }
        
   

		else if( (isset($_SESSION['zalogowany'])) && ($_SESSION['zalogowany']==true && ($_SESSION['Typ'] == 2)))
		
		{
			header('Location: todo.php');
		exit();
		}
       else if( (!isset($_SESSION['zalogowany'])) && ($_SESSION['zalogowany']==false && ($_SESSION['Typ'] == 3)))
		
		{
			header('Location: index.php');
		exit();
		}



?>



<!DOCTYPE html>
  <html>
	<head>
		<meta charset="utf-8">
			<title>Admin</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="style/style.css">
		<link href="css/bootstrap-4.3.1.css" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Lato:700,900&display=swap" rel="stylesheet">
		<link href='https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css' rel='stylesheet' type='text/css'><link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
	
		
	
		
	</head>
	<body>

		
		
		
		
		
		
		
			<!-- Naglowek strony -->
		<div class="menu-container">
  <div class="menu">
    <ul>
		<li><a href="#">	<?php
	echo("witaj ".$_SESSION['Imie']);

	?></a></li>
     
		<li>	<a href="logout.php">Wyloguj</a></li>
       
    </ul>
	  
  </div>
</div>

		
 <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script><script  src="./js/menu/script.js"></script>
		

		
				<h2 class="info">Panel administracyjny</h2>
		
	
			<div id="container_AD">
	
				<div id="ad_rej">
					<h4> Dodaj pracownika</h4>
				
				<form action="./admin/emp_add.php"  method="post">
	
		Imie: <br /> <input type="text" value="<?php
			if (isset($_SESSION['fr_imie']))
			{
				echo $_SESSION['fr_imie'];
				unset($_SESSION['fr_imie']);
			}
		?>" name="imie" /><br />
       
        
        Nazwisko: <br /> <input type="text" value="<?php
			if (isset($_SESSION['fr_nazwisko']))
			{
				echo $_SESSION['fr_nawzwisko'];
				unset($_SESSION['fr_nazwisko']);
			}
		?>" name="nazwisko" /><br />
		
		
		
		E-mail: <br /> <input type="text" value="<?php
			if (isset($_SESSION['fr_email']))
			{
				echo $_SESSION['fr_email'];
				unset($_SESSION['fr_email']);
			}
		?>" name="email" /><br />
		
		<?php
			if (isset($_SESSION['e_email']))
			{
				echo '<div class="error">'.$_SESSION['e_email'].'</div>';
				unset($_SESSION['e_email']);
			}
		?>
        
         Telefon: <br /> <input type="text" value="<?php
			if (isset($_SESSION['fr_tel']))
			{
				echo $_SESSION['fr_tel'];
				unset($_SESSION['fr_tel']);
			}
		?>" name="tel" /><br />
		
		
		Twoje hasło: <br /> <input type="password"  value="<?php
			if (isset($_SESSION['fr_haslo1']))
			{
				echo $_SESSION['fr_haslo1'];
				unset($_SESSION['fr_haslo1']);
			}
		?>" name="haslo1" /><br />
		
		<?php
			if (isset($_SESSION['e_haslo']))
			{
				echo '<div class="error">'.$_SESSION['e_haslo'].'</div>';
				unset($_SESSION['e_haslo']);
			}
		?>		
		
		Powtórz hasło: <br /> <input type="password" value="<?php
			if (isset($_SESSION['fr_haslo2']))
			{
				echo $_SESSION['fr_haslo2'];
				unset($_SESSION['fr_haslo2']);
			}
		?>" name="haslo2" /><br />
		
		<label>
			<input type="checkbox" name="regulamin" <?php
			if (isset($_SESSION['fr_regulamin']))
			{
				echo "checked";
				unset($_SESSION['fr_regulamin']);
			}
				?>/> Akceptuję regulamin
		</label>
		
		<?php
			if (isset($_SESSION['e_regulamin']))
			{
				echo '<div class="error">'.$_SESSION['e_regulamin'].'</div>';
				unset($_SESSION['e_regulamin']);
			}
		?>	
		
		
		<br />
		
		<input type="submit" value="Zarejestruj się" />
		
	</form>
				
				</div>
				
				
				<div class="admin_A"> 
			<h4> Usuń konto pracownika</h4>
	<form action="./admin/emp_del.php"  method="post">
	
		Mail pracownika: <br /> <input type="text" style="background-color: #C0C0C0;" name="employee_del" /> <br />
	
    <input type="submit"  value="Usuń">

   </form>
    </div>
				
		<div class="admin_A"> 		
					<h4> Zmień Hasło użytkownika</h4>
			<p><mark>In progress</mark></p>
    


    	<form action="admin/admin_password_change.php" method="post">
	
		Mail użytkownika <br /> <input type="text" name="user_login" required/> <br />
			
			<br>
			
			
		Nowe Hasło: <br /> <input type="password" name="new_password" required/> <br /><br />
		Powtórz Hasło: <br /> <input type="password" name="new_password1" required/> <br /><br />
			<?php
			if (isset($_SESSION['e_pass']))
			{
				echo '<div class="error">'.$_SESSION['e_pass'].'</div>';
				unset($_SESSION['e_pass']);
			}
		?> 
			<br>
			<?php
			if (isset($_SESSION['e_pass2']))
			{
				echo '<div class="error">'.$_SESSION['e_pass2'].'</div>';
				unset($_SESSION['e_pass2']);
			}
		?> 
			<br>
		<input type="submit" value="Zmień" />
       
	</form>
				
			
	</div>
	</div>
				
				<div style="clear: both"></div>
		
		

	
	
	
		
		
		

		<!-- Stopka  -->
		<footer class="site-footer">
			
			  <p>&copy; Salon Fryzjerski Mateusz </p>
				
				
			
		</footer>
		
	</body>
</html>

