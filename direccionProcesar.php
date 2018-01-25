<?php
	session_start();  
	error_reporting(0);
		// conector de BD 
		require_once('tools/mypathdb.php');	
		
		$EstadoDelInmueble = $_POST ['EstadoDelInmueble'];
		$edad = $_POST ['edad'];
		$ano = $_POST ['anoConstruccion'];
		$m2 = $_POST ['metros'];
		$estilo = $_POST ['estiloInmueble'];
		$habitaciones = $_POST ['habitaciones'];
		$banos = $_POST ['banos'];
		$mediosBanos = $_POST ['mediosBanos'];
		$habitacionServicio = $_POST ['habitacionServicio'];
		$banoServicio = $_POST ['banoServicio'];
		$estacionamiento = $_POST ['estacionamiento'];
		$puestos = $_POST ['puestos'];
		$descripcion = utf8_decode($_POST ['descripcion']);		
		$observaciones = utf8_decode($_POST ['observaciones']);
		$instrucciones = utf8_decode($_POST ['instrucciones']);		
		$referido = $_POST ['referido'];
		$publicarDesde = $_POST ['publicarDesde'];
		$publicarHasta = $_POST ['publicarHasta'];
		//$precio = number_format($_POST ['precio'], 2, ',', '.'); 
		$precio = $_POST ['precio'];
		$operacion = $_POST ['operacion'];
		$moneda = $_POST ['moneda'];
		$comision = $_POST ['comision'];
		$propietario = $_POST ['propietario'];
		$telefono = $_POST ['telefono'];
		$correo = $_POST ['correo'];			
		//======================validar que se alla elegido una propiedad=======================================
		//if ($tipoPropiedad=="0") 
			//{
			//$data=array("error" => '1');
			//die(json_encode($data));
			//} 		
		// ===============================================Grabar los datos ==========================
		if(empty($_SESSION['id']))
			{
				
				//volver a cargar
				$insertarPropiedad = mysql_query("INSERT INTO tbl_propiedades (EstadoDelInmueble, edad, ano, m2, estilo, habitaciones, banos, mediosBanos, habitacionServicio, banoServicio, estacionamiento, puestos, descripcion, observaciones, instrucciones, referido, publicarDesde, publicarHasta, precio, operacion, moneda, comision, propietario, telefono, correo) VALUES ('$EstadoDelInmueble','$edad', '$ano', '$m2', '$estilo', '$habitaciones', '$banos', '$mediosBanos', '$habitacionServicio', '$banoServicio', '$estacionamiento', '$puestos', '$descripcion', '$observaciones', '$instrucciones', '$referido', '$publicarDesde', '$publicarHasta', '$precio', '$operacion', '$moneda', '$comision', '$propietario', '$telefono', '$correo')");
				
				
				//var_dump("volver a cargar"); 
				//die();
				//$_SESSION['id'] = mysql_insert_id();			
			}	
			else		
			{	// ========================= actualizar la tabla temporal =========================================	
				$insertarPropiedad = mysql_query("UPDATE tbl_propiedades SET 
												 EstadoDelInmueble='$EstadoDelInmueble',
												 edad='$edad',
												 ano='$ano',
												 m2='$m2',
												 estilo='$estilo',
												 habitaciones='$habitaciones',
												 banos='$banos',
												 mediosBanos='$mediosBanos',
												 habitacionServicio='$habitacionServicio',
												 banoServicio='$banoServicio',
												 estacionamiento='$estacionamiento',
												 puestos='$puestos',
												 descripcion='$descripcion',
												 observaciones='$observaciones',
												 instrucciones='$instrucciones',
												 referido='$referido',
												 publicarDesde='$publicarDesde',
												 publicarHasta='$publicarHasta',
												 precio='$precio',
												 operacion='$operacion',
												 moneda='$moneda',
												 comision='$comision',
												 propietario='$propietario',
												 telefono='$telefono',
												 correo='$correo'												 
												 WHERE id='".$_SESSION['id']."'");		
												 
												 
				
			}
			//var_dump($insertarPropiedad);
			if($insertarPropiedad == false) 
			{
				$data=array("error" => '1');
				die(json_encode($data));
			}
			else
			{   //Los datos se han insertado correctamente.';		
				$data = array("exito" => '1');
				die(json_encode($data));
				mysql_close();	//cerrar la conexion a la bd
			}
?>