<!DOCTYPE html>

<html lang="en">

	<head>
		<title>Show no Mercy</title>
		<link rel="stylesheet" href="style.css">
		<link rel="stylesheet" href="includes/navigation.css">
		<link rel="stylesheet" href="includes/registration.css">
	</head>

	<body>
	
		<header>
			<div id = "logo" alt = "Show no Mercy" title = "Show no Mercy"></div>
		</header>
		
		<div id = "tussenbar1"></div><div id = "tussenbar2"></div>
		
		<?php
		include 'includes/navigation.php';
		?>
		
		<div id = "body-real">
		
			<h1>Registreren</h1>
			
			<div id = "body-content-box">
			
				<p>
					Vul hieronder uw gegevens in om deel te nemen aan het onderzoek.<br>
					Na het registreren zal u een formulier zien wat u kan invullen.
				</p>
			
				<form name = "register" action = "register.php?type=check" method="POST">
					
					<table id = "regform">
						<tr>
							<td>Loginnaam</td>
							<td><input class = "inputbar" type = "text" name = "gebruiker" placeholder = "Loginnaam"></td>
						</tr>
						<tr>
							<td>Wachtwoord</td>
							<td><input class = "inputbar" type = "password" name = "wachtwoord" placeholder = "Wachtwoord"></td>
						</tr>
						<tr>
							<td>Voornaam</td>
							<td><input class = "inputbar" type = "text" name = "voornaam" placeholder = "Voornaam"></td>
						</tr>
						<tr>
							<td>Achternaam</td>
							<td><input class = "inputbar" type = "text" name = "achternaam" placeholder = "Achternaam"></td>
						</tr>
						<tr>
							<td>Woonplaats</td>
							<td><input class = "inputbar" type = "text" name = "woonplaats" placeholder = "Woonplaats"></td>
							<td><input class = "inputbar_pc" type = "text" name = "postcode" placeholder = "Postcode"></td>
						</tr>
						<tr>
							<td>E-Mail</td>
							<td><input class = "inputbar" type = "text" name = "achternaam" placeholder = "voorbeeld@website.com"></td>
						</tr>
						<tr>
							<td></td>
							<td><input class = "regbar" type = "submit" name = "submit" value = "Registreren"></td>
						</tr>
					</table>

					
				</form>
			
			</div>
		
		</div>

	</body>
</html>