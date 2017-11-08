<!DOCTYPE html>

<?php 
session_start();


global $con;

$con = mysqli_connect("localhost", "root", "", "pro2");

?>


<html lang="en">

	<head>
		<title>Show no Mercy</title>
		<link rel="stylesheet" href="style.css">
		<link rel="stylesheet" href="includes/navigation.css">
		<link rel="stylesheet" href="includes/registration.css">
		<link rel="stylesheet" href="includes/management.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
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
		
			<h1>Beheerders</h1>
			
			<div id = "body-content-box">
			
			
			<?php
				if(isset($_SESSION['manager']))
				{ 
					if(!$_SESSION['manager'])
					{
						?>
						<div id = "response-negative">
						U heeft geen toegang tot deze pagina.
						</div>
						<?php
					}
					else
					{
						?>
						<h2>Beheerders</h2>
						
						<table id = "manage_users">
						<th style = "width:300px;">Email</th><th style = "width:400px;">Voornaam + Achternaam</th><th>Beheerder</th>
						<?php
						$result = mysqli_query($con, "SELECT `email`, `voornaam`, `achternaam` FROM `users` WHERE `beheerder` = 1");
						
						while($row = mysqli_fetch_array($result))
						{
							?>
							<tr>
								<td><?php echo $row['email']; ?></td><td><?php echo $row['voornaam'] ." ". $row['achternaam']; ?></td>
							</tr>
							<?php
						
						}
						?>
						</table>

						<h2>Gebruikers</h2>
						
						<table id = "manage_users">
						<th style = "width:300px;">Email</th><th style = "width:400px;">Voornaam + Achternaam</th><th>Beheerder</th>
						<?php
						$result = mysqli_query($con, "SELECT `email`, `voornaam`, `achternaam` FROM `users` WHERE `beheerder` = 0");
						while($row = mysqli_fetch_array($result))
						{
							?>
							<tr>
								<td><?php echo $row['email']; ?></td><td><?php echo $row['voornaam'] ." ". $row['achternaam']; ?></td>
							</tr>
							<?php
						
						}
						?>
						</table>
						
						<?php
					}
				}
				else
				{
					?>
					<div id = "response-negative">
					U heeft geen toegang tot deze pagina.
					</div>
					<?php					
				}
			?>
				
				
			</div>
		
		</div>

	</body>
</html>