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
		
			<h1>Registreren</h1>
			
			<div id = "body-content-box">
			
				<p>
					Vul hieronder uw gegevens in om deel te nemen aan het onderzoek.<br>
					Na het registreren zal u een formulier zien wat u kan invullen.
				</p>
				
				<div id="response"></div>
				
				<form method = "post" id = "registerForm">
					
					<table id = "regform">
						<tr>
							<td>Voornaam</td>
							<td><input onclick = "resetClass(0)" class = "inputbar" type = "text" name = "Voornaam" placeholder = "Voornaam"></td>
						</tr>
						<tr>
							<td>Achternaam</td>
							<td><input onclick = "resetClass(1)" class = "inputbar" type = "text" name = "Achternaam" placeholder = "Achternaam"></td>
						</tr>
						<tr>
							<td>Woonplaats</td>
							<td><input onclick = "resetClass(2)" class = "inputbar" type = "text" name = "Woonplaats" placeholder = "Woonplaats"></td>
							<td><input id="pc_set" class = "inputbar_pc" type = "text" name = "Postcode" placeholder = "Postcode"></td>
						</tr>
						<tr>
							<td>E-Mail</td>
							<td><input onclick = "resetClass(3)" class = "inputbar" type = "text" name = "E-mail" placeholder = "voorbeeld@website.com"></td>
						</tr>
						<tr>
							<td>Wachtwoord</td>
							<td><input onclick = "resetClass(4)" class = "inputbar" type = "password" name = "Wachtwoord" placeholder = "Wachtwoord"></td>
						</tr>
						<tr>
							<td></td>
							<td><input class = "regbar" type = "button" name = "submit" id = "submit" value = "Registreren"></td>
						</tr>
					</table>
					
				</form>
			</div> 
		
		</div>
	
<script>

$("#pc_set").click(function()
{
	document.getElementById("pc_set").style.border = "2px solid black";
	document.getElementById("pc_set").style.backgroundColor = "white";
});

function resetClass(bar)
{
	document.getElementsByClassName("inputbar")[bar].style.border = "2px solid black";
	document.getElementsByClassName("inputbar")[bar].style.backgroundColor = "white";
}

$("#submit").click(function(){
   var Serialized =  $("#registerForm").serialize();
    $.ajax({
       type: "POST",
        url: "includes/register.php",
        data: Serialized,
        success: function(data) {
			alert("dd");

			$('#response').html(data);
			
			var forms = document.getElementsByClassName("inputbar");
			var form2 = document.getElementsByClassName("inputbar_pc");
				
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
				if(form2[0].value == "")
				{
						form2[0].style.border = "2px solid red";
						form2[0].style.backgroundColor = "pink";
						form2[0].style.color = "black";
				}
				else
				{
						form2[0].style.border = "2px solid black";
						form2[0].style.backgroundColor = "white";			
				}
        },
   error: function(){
        alert('error handing here');
      }
    });
});

</script>

	
	</body>
</html>

