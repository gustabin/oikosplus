<?php
	require_once('tools/mypathdb.php');
	$email = $_POST ['Email'];

	// ===============================================Buscar el password del usuario=====================================
	$query = mysql_query("SELECT * FROM tbl_usuarios WHERE us_email = '$email'");
	$dataUsuario = mysql_fetch_array($query);	
	
	$usuario = $dataUsuario['us_tipo'];
	$userID = $dataUsuario['us_id']; 
	$clave = $dataUsuario['us_clave']; 
	$nombre = $dataUsuario['us_nombre'];
	$apellido = $dataUsuario['us_apellido'];

	if(empty($dataUsuario))
		{
		$data=array("error" => '1');
		die(json_encode($data));
		}
	else
		{		
		$destino = $email;
		$asunto = "Recuperar Pasword de Oikos";
		$cabeceras = "Content-type: text/html"; 
		$cuerpo ="<h1>Oikos te ayuda a recuperar tu password!</h1>
				Hola <b>".$nombre." ".$apellido."</b>,<br><br> 
				Hemos recuperado tu password: <strong>".$clave."</strong><br><br>
				Recuerda ingresar a tu cuenta</a>  con tu nombre de usuario: <b> $email </b><br><br>
				Tus amigos en Oikos.<br>
				<img src=http://www.tabin.com.ve/oikos/images/bg/clave.jpg /><br>
		<p></p>
		<p><br><br> 
		<img src=http://www.tabin.com.ve/oikos/images/oikos-logo.gif  width=118 height=40 />
		<h5>Urb Cantarrana, Hospital de clinicas Las Delicias PB Local 10-1, Maracay Estado Aragua, Venezuela<br>		
		RIF J403661448<br><br>
		<p></p>Designed by 
		© <a href=http://www.tabin.com.ve><img src=http://www.tabin.com.ve/oikos/images/logo.gif width=65 height=35 /></a>  2015 - All rights reserved<br></h5>
		</p>";


		$yourWebsite = "tabin.com.ve";
		$yourEmail   = "contacto@tabin.com.ve";
	    $cabeceras = "From: $yourWebsite <$yourEmail>\n" . "Content-type: text/html" ;
		mail($destino,$asunto,$cuerpo,$cabeceras);		
		$data = array("exito" => '1');
		die(json_encode($data));				
		}
		//desconectar();
		mysql_close();
?>