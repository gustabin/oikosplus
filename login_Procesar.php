<?php
session_start(); 
error_reporting(0);
$email = $_GET ['email'];
$clave = $_GET ['password'];
require_once('tools/mypathdb.php');
if (empty($_GET['email']))// and (empty($clave))
{
$email = strtolower($_POST ['email']);
$clave = $_POST ['password'];
}

if (($email=="demo@oikosplus.com") AND ($clave=="admin")) {
	$_SESSION['email'] = $email;
	//===Redirigir a otra pagina========================================			
	$data=array("exito" => '1');
	die(json_encode($data));
	}

	$query = mysql_query("SELECT * FROM tbl_usuarios WHERE us_email = '$email' AND us_clave = '$clave'"); 
	$dataUsuario = mysql_fetch_array($query);	
	
	$userID = $dataUsuario['us_id'];  
	$nombre = $dataUsuario['us_nombre']; 
	$apellido = $dataUsuario['us_apellido']; 
	$tipo = $dataUsuario['us_tipo']; 
	$fechaHasta = $dataUsuario['us_hasta']; 
	$email = $dataUsuario['us_email']; 
	$inmobiliaria = $dataUsuario['us_inmobiliaria']; 
	
	//====== crear variables de session ====================
	$_SESSION['user_id'] = $userID;
	$_SESSION['nombre'] = $nombre;
	$_SESSION['apellido'] = $apellido;
	$_SESSION['tipo'] = $tipo; //================== validar que tipo de usuario es 0=demo, 1=realtor, 2=inmobiliaria, 3=administrador ==========================
	$_SESSION['email'] = $email;
	$_SESSION['inmobiliaria'] = $inmobiliaria;
	//====== FIN crear variables de session ====================
	
	//====================comparar la fecha del dia para ver si aun esta activa la suscripcion ==============
		$fecha_actual = date("Y-m-d");
		if ($fecha_actual==$fechaHasta)
		{
			$data=array("exito" => '2');
			die(json_encode($data));
		}
		
		if ($fecha_actual>$fechaHasta)
		{
			$_SESSION['vencido']=true;
			$data=array("error" => '3');
			die(json_encode($data));
		}
	//====================FIN comparar la fecha del dia para ver si aun esta activa la suscripcion ==============	
	//$clave= AES_DECRYPT('$dataUsuario['us_clave']','llave'));
	if (!empty($_GET['email']))
		{		
		//===================================================Redirigir a otra pagina==================				
		//header("Location: escritorio.php");
		}
	
	if(empty($dataUsuario))
		{
		$data=array("error" => '1');
		die(json_encode($data));
		}
	else
		{		
		  $data=array("exito" => '1');
		  die(json_encode($data));
		}
?>