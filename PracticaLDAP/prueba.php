<?php 

ini_set('display_errors',1);
ini_set('display_startup_errors',1);
error_reporting(E_ALL);

?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Intranet</title> 
</head>

<body>
     
     <form method="post" action="home.php">
		 
		 <input type="text"  placeholder="Usuario " id="username" name="usuario">
		 <input type="password"  placeholder="Contraseña" id="pass" name="contraseña">  
		<button type="submit" class="log-btn">Entrar</button>
		
     </form>
      
   </div>
  
</body>
</html>
