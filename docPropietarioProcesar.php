<?php
	session_start();  
	error_reporting(0);
		// conector de BD 
		require_once('tools/mypathdb.php');	
		
		$statusDocumentos = $_POST ['statusDocumentos'];
		$estadoCivil = $_POST ['estadoCivil'];
		$propDivorciado = $_POST ['propDivorciado'];
		$tipoPersona = $_POST ['tipoPersona'];		
		$viviendaPrincipal = $_POST ['viviendaPrincipal'];
		$poder = $_POST ['poder'];
		$condominio = $_POST ['condominio'];
		$planos = $_POST ['planos'];
		$formaDePago = $_POST ['formaDePago'];		
		$nacimiento = $_POST ['nacimiento'];
		$rif = $_POST ['rif'];		
		$cedula = $_POST ['cedula'];
		$fichaCatastral = $_POST ['fichaCatastral'];
		$derechoFrente = $_POST ['derechoFrente'];
		$hipoteca = $_POST ['hipoteca'];
		$tituloSupletorio = $_POST ['tituloSupletorio'];
		$documentoCondominio = $_POST ['documentoCondominio'];		
		$cedulaHerederos = $_POST ['cedulaHerederos'];
		$solvenciaSucesoral = $_POST ['solvenciaSucesoral'];
		$rifSucesion = $_POST ['rifSucesion'];		
		$declaracionSucesoral = $_POST ['declaracionSucesoral'];
		
		//======================validar que se alla elegido estadoCivil=======================================
		if ($estadoCivil=="0") 
			{
			$data=array("error" => '1');
			die(json_encode($data));
			} 	
		//======================validar que se alla elegido propDivorciado=======================================
		if (($estadoCivil=="divorciado") and ($propDivorciado=="0"))
			{
			$data=array("error" => '4');
			die(json_encode($data));
			} 	
		//======================validar que se alla propDivorciado se borre=======================================
		if ($estadoCivil<>"divorciado") 
			{
			$propDivorciado="0";
			} 
		//======================validar que se alla elegido tipoPersona=======================================
		//if ($tipoPersona=="") 
			//{
			//$data=array("error" => '2');
			//die(json_encode($data));
			//} 	
		//======================validar que se alla elegido viviendaPrincipal=======================================
		if ($viviendaPrincipal=="0") 
			{
			$data=array("error" => '3');
			die(json_encode($data));
			} 	
		//======================validar que se alla elegido poder=======================================
		if ($poder=="0") 
			{
			$data=array("error" => '5');
			die(json_encode($data));
			} 	
		//======================validar que se alla elegido condominio=======================================
		if ($condominio=="0") 
			{
			$data=array("error" => '6');
			die(json_encode($data));
			} 
		//======================validar que se alla elegido formaDePago=======================================
		if ($formaDePago=="0") 
			{
			$data=array("error" => '7');
			die(json_encode($data));
			} 	
		//======================validar que se alla elegido nacimiento=======================================
		if ($nacimiento=="") 
			{
			$data=array("error" => '8');
			die(json_encode($data));
			} 	
		//======================validar que se alla elegido rif=======================================
		if ($rif=="") 
			{
			$data=array("error" => '9');
			die(json_encode($data));
			} 	
		//======================validar que se alla elegido cedula=======================================
		if ($cedula=="0") 
			{
			$data=array("error" => '10');
			die(json_encode($data));
			} 	
		//======================validar que se alla elegido fichaCatastral=======================================
		if ($fichaCatastral=="0") 
			{
			$data=array("error" => '11');
			die(json_encode($data));
			} 
		//======================validar que se alla elegido derechoFrente=======================================
		if ($derechoFrente=="0") 
			{
			$data=array("error" => '12');
			die(json_encode($data));
			} 
		//======================validar que se alla elegido hipoteca=======================================
		if ($hipoteca=="0") 
			{
			$data=array("error" => '13');
			die(json_encode($data));
			} 
		// ===============================================Grabar los datos ==========================
		if(empty($_SESSION['id']))
			{
				
				//volver a cargar
				//$insertarPropiedad = mysql_query("INSERT INTO tbl_propiedades (EstadoDelInmueble, edad, ano, m2, estilo, habitaciones, banos, mediosBanos, habitacionServicio, banoServicio, estacionamiento, puestos, descripcion, observaciones, instrucciones, referido, publicarDesde, publicarHasta, precio, operacion, moneda, comision, propietario, telefono, correo) VALUES ('$EstadoDelInmueble','$edad', '$ano', '$m2', '$estilo', '$habitaciones', '$banos', '$mediosBanos', '$habitacionServicio', '$banoServicio', '$estacionamiento', '$puestos', '$descripcion', '$observaciones', '$instrucciones', '$referido', '$publicarDesde', '$publicarHasta', '$precio', '$operacion', '$moneda', '$comision', '$propietario', '$telefono', '$correo')");
				
				
				var_dump("volver a cargar"); 
				die();
				//$_SESSION['id'] = mysql_insert_id();			
			}	
			else		
			{	// ========================= actualizar la tabla temporal =========================================	
				$insertarPropiedad = mysql_query("UPDATE tbl_propiedades SET 
												 statusDocumentos='$statusDocumentos',
												 estadoCivil='$estadoCivil',
												 propDivorciado='$propDivorciado',
												 viviendaPrincipal='$viviendaPrincipal',
												 poder='$poder',
												 condominio='$condominio',
												 planos='$planos',
												 formaDePago='$formaDePago',
												 fechaNacimiento='$nacimiento',
												 rif='$rif',
												 cedula='$cedula',
												 fichaCatastral='$fichaCatastral',
												 solvenciaDerechoFrente='$derechoFrente',
												 hipoteca='$hipoteca',
												 tituloSupletorio='$tituloSupletorio',
												 documentoCondominio='$documentoCondominio',									 
												 ciFallecidoyHerederos='$cedulaHerederos',
												 solvenciaSucesoral='$solvenciaSucesoral',
												 rifSucesion='$rifSucesion',
												 declaracionSucesoral='$declaracionSucesoral'												 
												 WHERE id='".$_SESSION['id']."'");						
			}
			//var_dump($insertarPropiedad);
			//die();
			if($insertarPropiedad == false) 
			{
				$data=array("error" => '14');
				die(json_encode($data));
			}
			else
			{   //Los datos se han insertado correctamente.';		
				$data = array("exito" => '1');
				die(json_encode($data));
				mysql_close();	//cerrar la conexion a la bd
			}
?>