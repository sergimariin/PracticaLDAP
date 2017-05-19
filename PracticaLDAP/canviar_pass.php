<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>Canviar password | Intranet</title> 
  <link rel='stylesheet prefetch' href='http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css'>
  <link rel="stylesheet" href="css/style.css">
</head>

<body>
  <div class="login-form">
     <h1>Canviar contraseña</h1>
     
     <form id="formulario" method="post" action="pass.php">
		 
		 <div class="form-group ">
		   <input type="text" class="form-control" placeholder="Usuari" name="user" id="UserName" value="<?php echo $_POST['user']; ?>">
		   <i class="fa fa-user"></i>
		 </div>
		 <div class="form-group log-status">
		   <input type="password" class="form-control" name="oldpass" placeholder="Contrasenya actual" id="Passwod">
		   <i class="fa fa-lock"></i>
		 </div>
		 <div class="form-group log-status">
		   <input type="password" class="form-control" name="newpass" placeholder="Contrasenya nova" id="Passwod2">
		   <i class="fa fa-lock"></i>
		 </div>
		 
		<button type="submit" class="log-btn" >Canviar password</button>
		
     </form>
     
    
   </div>
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
  <script src="js/index.js"></script>
  
</body>
</html>
