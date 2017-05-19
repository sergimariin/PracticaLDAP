<?php

ini_set('display_errors',1);
ini_set('display_startup_errors',1);
error_reporting(E_ALL);

$username  = $_POST['user'];
$oldpass = $_POST['oldpass']; 
$newpass = $_POST['newpass']; 

$ldaprdn  = "cn=".$username.",dc=daw2,dc=net"; 

session_start();

if($username != "" && $oldpass != "" && $newpass != "") {
     $ldapconn = ldap_connect("localhost") or die("Could not connect to LDAP server.");
     
     ldap_set_option($ldapconn, LDAP_OPT_PROTOCOL_VERSION, 3);
     ldap_set_option($ldapconn, LDAP_OPT_REFERRALS, 0);
	 $ldapbind = ldap_bind($ldapconn, $ldaprdn, $oldpass);
	 
     if($ldapbind) {
		 
	  if(ldap_mod_replace ($ldapconn, $ldaprdn, 
		array('userpassword' => "{MD5}".base64_encode(pack("H*",md5($newpass)))))) {
			 
		$_SESSION["canvis"] = "La contrasenya ha estat canviada";
		
		header('Location: index.php');
		
		}else{ 
			
		print "failed"; 
		
		}
	}
}

		
?>
