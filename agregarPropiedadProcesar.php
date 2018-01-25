<?php
	session_start();  
	error_reporting(0);
		// conector de BD 
		require_once('tools/mypathdb.php');
		$nombreInmueble = utf8_decode($_POST ['nombreInmueble']);	
		$tipoPropiedad = $_POST ['tipoPropiedad'];		
		$corredorInmobiliario = utf8_encode($_POST ['corredorInmobiliario']);
		$inmobiliaria = utf8_decode($_POST ['inmobiliaria']);		
		$urbanizacion = utf8_decode($_POST ['urbanizacion']);	
		$prefijoDireccion = $_POST ['prefijoDireccion'];
		$calleAvenida = utf8_decode($_POST ['calleAvenida']);
		$numero = $_POST ['numero'];
		$edificio = utf8_decode($_POST ['edificio']);
		$piso = $_POST ['piso'];
		$apartamento = utf8_decode($_POST ['apartamento']);
		$referencia = utf8_decode($_POST ['referencia']);
		$latitud = $_POST ['latitud'];
		$longitud = $_POST ['longitud'];
		//var_dump($calleAvenida);
		//die();
		if (empty($_SESSION['id'])){
			$estados = utf8_decode($_POST ['estados']);
			$ciudades = utf8_decode($_POST ['ciudades']);	
			
			$_SESSION['estados']=$estados;
			$_SESSION['ciudad']=$ciudades;
			
		}else{
			$estados = $_SESSION['estados'];
			$ciudades = $_SESSION['ciudad'];
			}
		
		//======================validar que se alla elegido una propiedad=======================================
		if ($tipoPropiedad=="0") 
			{
			$data=array("error" => '1');
			die(json_encode($data));
			} 
			
		//======================validar que se alla elegido un prefijo de direccion=======================================
		if ($prefijoDireccion=="0") 
			{
			$data=array("error" => '3');
			die(json_encode($data));
			} 
			
		
		// ===============================================Grabar los datos ==========================
		if(empty($_SESSION['id']))
			{
				$insertarPropiedad = mysql_query("INSERT INTO tbl_propiedades (nombreDelInmueble, tipoPropiedad, corredor, inmobiliaria, 
																			   urbanizacion, prefijoDireccion, calleAvenida, numero,
																			   edificio, piso, apto, ptoReferencia, latitud, longitud,
																			   estado, ciudad) VALUES ('$nombreInmueble','$tipoPropiedad',
																			   '$corredorInmobiliario', '$inmobiliaria', '$urbanizacion',
																			   '$prefijoDireccion', '$calleAvenida', '$numero', '$edificio',
																			   '$piso', '$apartamento', '$referencia', '$latitud',
																			   '$longitud', '$estados', '$ciudades')");
				
				
				//var_dump($insertarPropiedad); 
				//die();
				$_SESSION['id'] = mysql_insert_id();			
			}	
			else		
			{	// ========================= actualizar la tabla temporal =========================================	
				$insertarPropiedad = mysql_query("UPDATE tbl_propiedades SET 
												 tipoPropiedad='$tipoPropiedad',
												 nombreDelInmueble='$nombreInmueble',
												 urbanizacion='$urbanizacion',
												 prefijoDireccion='$prefijoDireccion',
												 calleAvenida='$calleAvenida',
												 numero='$numero',
												 edificio='$edificio',
												 piso='$piso',
												 apto='$apartamento',
												 ptoReferencia='$referencia',
												 latitud='$latitud',
												 longitud='$longitud',
												 estado='$estados',
												 ciudad='$ciudades'
												 WHERE id='".$_SESSION['id']."'");	
				
			}
			//var_dump($insertarPropiedad);
			//die();
			if($insertarPropiedad == false) 
			{
				$data=array("error" => '2');
				die(json_encode($data));
			}
			else
			{   //Los datos se han insertado correctamente.';		
				$data = array("exito" => '1');
				die(json_encode($data));
				mysql_close();	//cerrar la conexion a la bd
			}
?>