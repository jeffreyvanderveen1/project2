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
		
			<h1>Register Success</h1>
			
			<div id = "body-content-box">
			
				<div id = "response-success">
				
					<p>U bent succesvol geregistreerd, hieronder ziet u uw gegevens waarmee u nu geregistreerd bent.<br><br>
					
						<?php
						
							echo "E-Mail om in te loggen: ". $_SESSION['registermail'];
						?>
					</p>
				</div>
			
				<div id = "response"></div>
			
				<form method = "post" id = "loginForm">
						
					<table id = "regform">
						<tr>
							<td>E-Mail</td>
							<td><input onclick = "resetClass(0)" class = "inputbar" type = "text" name = "E-mail" placeholder = "E-Mail"></td>
						</tr>
						<tr>
							<td>Wachtwoord</td>
							<td><input onclick = "resetClass(1)" class = "inputbar" type = "password" name = "Wachtwoord" placeholder = "Wachtwoord"></td>
						</tr>
						<tr>
							<td></td>
							<td><input class = "regbar" type = "button" name = "submit" id = "submit" value = "Inloggen"></td>
						</tr>
					</table>
					
				</form>				
				
			</div>
		
		</div>

	</body>
</html>


<script>

function resetClass(bar)
{
	document.getElementsByClassName("inputbar")[bar].style.border = "2px solid black";
	document.getElementsByClassName("inputbar")[bar].style.backgroundColor = "white";
}

$("#submit").click(function(){

   var Serialized =  $("#loginForm").serialize();
    $.ajax({
       type: "POST",
        url: "includes/login.php",
        data: Serialized,
        success: function(data) {

		$('#response').html(data);
			
			var forms = document.getElementsByClassName("inputbar");
				
			for(i = 0; i < forms.length; i ++)
			{
				if(forms[i].value == "")
				{
					forms[i].style.border = "2px solid red";
					forms[i].style.backgroundColor = "pink";
					forms[i].style.color = "black";
				}
				else
				{
					forms[i].style.border = "2px solid black";
					forms[i].style.backgroundColor = "white";			
				}
			}
        },
   error: function(){
        alert('error handing here');
      }
    });
});

</script>