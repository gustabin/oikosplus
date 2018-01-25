<?php
	session_start(); 
	$email = strtolower ($_POST ['email']);
	$nombre = $_POST ['nombre'];

		// =========================envio de correo notificandome que alguien se contacto ===================
		$destino ="gustabin@yahoo.com";
		$asunto = "Contacto Web Oikos - Contactando";
		$cabeceras = "Content-type: text/html";
		$cuerpo ="Hola, alguien te ha contactado por el formulario Web de Oikos<br><br>
		Los datos enviados son los siguientes:<br>
		<b>Email: </b>$email<br>
		<b>Nombre: </b>$nombre<br>"; //ojo el final de esta linea es importante!!!				
		$yourWebsite = "tabin.com.ve";
		$yourEmail   = "contacto@tabin.com.ve";
	    $cabeceras = "From: $yourWebsite <$yourEmail>\n" . "Content-type: text/html" ;
		mail($destino,$asunto,$cuerpo,$cabeceras);
				
		// ========================envio de correo al paciente ===================
		$destino = $email;
		$asunto = "Gracias por contactarnos - Oikos, sistema inmobiliario";
		$cabeceras = "Content-type: text/html";
		$cuerpo ="En Oikos estamos para ayudarte!<br><br>
        Hola <b>$nombre</b>,<br>
        Para nosotros es un placer atenderte, pronto uno de nuestros ejecutivos te contactará!<br>
        <br><br>
        
        Tus amigos en Oikos.<br>
		<img src=http://www.tabin.com.ve/oikos/images/bg/handshake.jpg> 
		<p>		
		<img src=http://www.tabin.com.ve/oikos/images/oikos-logo.gif  width=118 height=40 />
		<h5>Urb Cantarrana, Hospital de clinicas Las Delicias PB Local 10-1, Maracay Estado Aragua, Venezuela<br>		
		RIF J403661448<br><br>
		<p></p>Designed by 
		© <a href=http://www.tabin.com.ve><img src=http://www.tabin.com.ve/oikos/images/logo.gif width=65 height=35 /></a>  2015 - All rights reserved<br></h5>
		</p>";
		//die($cuerpo); 
		$yourWebsite = "tabin.com.ve";
		$yourEmail   = "contacto@tabin.com.ve";
	    $cabeceras = "From: $yourWebsite <$yourEmail>\n" . "Content-type: text/html" ;
		mail($destino,$asunto,$cuerpo,$cabeceras);
		$data=array("exito" => '1');
		die(json_encode($data));
?>