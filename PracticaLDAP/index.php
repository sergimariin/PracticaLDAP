<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Intranet DAW2</title> 
  <link rel='stylesheet prefetch' href='http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css'>
  <link rel="stylesheet" href="./css/style.css">
</head>

<body>
  <div class="login-form">
     <h1>Intranet DAW2weeeeee</h1>
     
     <form method="post" action="home.php">
		 
		 <div class="form-group">
		   <input type="text" class="form-control" placeholder="Usuario " id="username" name="usuario">
		   <i class="fa fa-user"></i>
		 </div>
		 
		 <div class="form-group log-status">
		   <input type="password" class="form-control" placeholder="Contraseña" id="pass" name="contraseña">
		   <i class="fa fa-lock"></i>
		 </div>
		 
		 
		  <span class="error">
				<?php 
			  
			  session_start();
			  
				if(isset($_SESSION["error"])){

					echo $_SESSION["error"];
	
				}
		
				?>
		  </span>
		  
		  <span class="update">
				<?php 
			  
			  session_start();
			  
				if(isset($_SESSION["canvis"])){

					echo $_SESSION["canvis"];
	
				}
		
				?>
		  </span>
		  
		  
		<button type="submit" class="log-btn">Entrar</button>
		
     </form>
      
   </div>
  
</body>
</html>
