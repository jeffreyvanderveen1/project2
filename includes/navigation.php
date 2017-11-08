<!DOCTYPE html>

<html>
<body>

<ul class = "navpos">
  <li><a href="home">Home</a></li>
  
  <?php
   if(isset($_SESSION['manager']) && $_SESSION['manager']) { ?> <li><a href="logout">Beheerders</a></li> <?php } 
  if(!isset($_SESSION['logged'])) { ?> <li><a href="register">Registreren</a></li>  <li><a href="login">Login</a></li> <?php }
  else { ?>  <li><a href="management">Logout</a></li> <?php } ?>
	 
</ul>

</body>
</html>