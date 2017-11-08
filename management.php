<!DOCTYPE html>

<?php 
session_start();
?>


<html lang="en">

	<head>
		<title>Show no Mercy</title>
		<link rel="stylesheet" href="style.css">
		<link rel="stylesheet" href="includes/navigation.css">
		<link rel="stylesheet" href="includes/registration.css">
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
						<p>lalalalalalal</p>
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