<?php

ini_set('display_errors',1);
ini_set('display_startup_errors',1);
error_reporting(E_ALL);

$ldaprdn  = "cn=".$_POST['usuario'].",dc=daw2,dc=net";    
$ldappass = $_POST['contraseña']; 

session_start();

// conexión al servidor LDAP
$ldapconn = ldap_connect("localhost")
    or die("Could not connect to LDAP server.");

if ($ldapconn) {

    // realizando la autenticación
    ldap_set_option($ldapconn, LDAP_OPT_PROTOCOL_VERSION, 3);
    $ldapbind = ldap_bind($ldapconn, $ldaprdn, $ldappass);
    
    // verificación del enlace
    if ($ldapbind) {
		
		session_destroy();
		
		$result = ldap_search($ldapconn,$ldaprdn, "(cn=*)") or die ("Error in search query: ".ldap_error($ldapconn));
        $data = ldap_get_entries($ldapconn, $result);
		
        for ($i=0; $i<$data["count"]; $i++) {
            $cn = $data[$i]["cn"][0]; 
			$sn = $data[$i]["sn"][0];
			$uid = $data[$i]["uid"][0];
            $gidnumber = $data[$i]["gidnumber"][0];
            $uidnumber = $data[$i]["uidnumber"][0];
            $home = $data[$i]["homedirectory"][0];
            $userpassword = $data[$i]["userpassword"][0];
            $shell = $data[$i]["loginshell"][0];
        }

		
		?>
		
		<!DOCTYPE html>
		<html >
		<head>
		  <meta charset="UTF-8">
		  <title>Home</title> 
		  <link rel='stylesheet prefetch' href='http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css'>
		  <link rel="stylesheet" href="css/style.css">
		</head>

		<body>
		  <div class="login-form">
			  
			 <h1>Dades personals <?php echo $cn; ?></h1>
			 
			 <p><strong>uid:</strong> <?php echo $uid; ?></p>
			 <p><strong>cn:</strong> <?php echo $cn; ?></p>
			 <p><strong>sn:</strong> <?php echo $sn; ?></p>
			 <p><strong>Gidnumber:</strong> <?php echo $gidnumber; ?></p>
			 <p><strong>Uidnumber:</strong> <?php echo $uidnumber; ?></p>
			 <p><strong>home:</strong> <?php echo $home; ?></p>
			 <p><strong>shell:</strong> <?php echo $shell; ?></p>
			 <p><strong>password hash:</strong> <?php echo $userpassword; ?></p>
			 
			 <form method="post" action="canviar_pass.php">
				<input type="hidden" id="username" name="user" value="<?php echo $cn; ?>"/>
				<button type="submit" class="log-btn" >Canviar password</button><br />
			 </form>
			 
			 <br />
			 
			 <form method="post" action="index.php">
				<button type="submit" class="log-btn" >Sortir</button><br />
			 </form>
			
		   </div>
		  
		</body>
		</html>
        
       <?php
    } else {
			
		$_SESSION["error"] = "Usuario no válido.";
		session_destroy();
        header('Location: index.php');
        
    }

}else{
		
	$_SESSION["error"] = "No es posible connectarse con el servidor LDAP.";
	session_destroy();
		
    header('Location: index.php');
	
}


?>
