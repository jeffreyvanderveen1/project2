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
		$pass = hash('whirlpool', htmlentities(mysqli_real_escape_string($con, $_POST['Wachtwoord'])));
		$email = htmlentities(mysqli_real_escape_string($con, $_POST['E-mail']));
				
		$query = mysqli_query($con, "SELECT `email`, `beheerder` FROM `users` WHERE `email` = '$email' AND `password` = '$pass' LIMIT 1");
		
		if(!mysqli_num_rows($query))
		{
			echo "<div id = 'response-negative'>";
			echo 'U heeft een foutief wachtwoord of gebruikersnaam ingevuld, probeert u het opnieuw.<br><br>';
			echo "</div>";
		}
		else
		{
			$_SESSION['email'] = $email;
			$_SESSION['logged'] = 1;
			
			$results = mysqli_fetch_array($query);
			
			$_SESSION['manager'] = $results['beheerder'];
			
			?><script type="text/javascript"> window.location.href = "home"; </script><?php
		}
		?>
		</div>
		
		<?php
	}
	
	mysqli_close($con);
?>