<?php

	session_start();

	global $con;

	$con = mysqli_connect("localhost", "root", "", "pro2");

	$activeonce = 0;

    foreach ($_POST as $key => $value)  
    {  
		if(empty($value))
		{
			if(!$activeonce) 
			{
				echo "<div id = 'response-negative'>";
				echo "<span style ='padding-top:5px;'>Er is iets fout gegaan, u heeft de volgende velden niet goed ingevuld:<br/><br/></span>";
				$activeonce = 1;
				
				?>
				<script>
				//check_forms();
				</script>
				<?php
			}
			echo "<span style = 'padding-left:5px;'>$key<br/></span>";
		}
    } 
	
	if($activeonce) 
	{
		echo "</div>";
	}
	else
	{
		$email = htmlentities(mysqli_real_escape_string($con, $_POST['E-mail']));
		
		$query = mysqli_query($con, "SELECT `email` FROM `users` WHERE `email` = '$email' LIMIT 1");
				
		if(mysqli_num_rows($query))
		{
			echo "<div id = 'response-negative'>";
			echo 'De ingevoerde gebruiker bestaat al in het systeem.<br>';
			echo "</div>";
		}
		else
		{
			$pass = hash('whirlpool', htmlentities(mysqli_real_escape_string($con, $_POST['Wachtwoord'])));
			
			$voornaam = htmlentities(mysqli_real_escape_string($con, $_POST['Voornaam']));
			$achternaam = htmlentities(mysqli_real_escape_string($con, $_POST['Achternaam']));
			$woonplaats = htmlentities(mysqli_real_escape_string($con, $_POST['Woonplaats']));
			$postcode = htmlentities(mysqli_real_escape_string($con, $_POST['Postcode']));
			
			mysqli_query($con, "INSERT INTO `users` (`email`, `password`, `voornaam`, `achternaam`, `woonplaats`, `postcode`) VALUES ('$email', '$pass', '$voornaam', '$achternaam', '$woonplaats', '$postcode');");
			
			$_SESSION['registermail'] = $_POST['E-mail'];
			
			?>

			</div>

			<script type="text/javascript">	window.location.href = "success"; </script>
			
			<?php
		}
	}
	
	mysqli_close($con);
?>