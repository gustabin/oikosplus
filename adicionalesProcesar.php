<?php
	session_start();  
	error_reporting(0);
		// conector de BD 
		require_once('tools/mypathdb.php');	
		 
		$tipoPersona = $_POST ['tipoPersona'];
		$actaConstitutiva = $_POST ['actaConstitutiva'];
		$solvenciaIVSS = $_POST ['solvenciaIVSS'];
		$actualizacionJuntaDirectiva = $_POST ['actualizacionJuntaDirectiva'];		
		$altura = $_POST ['altura'];
		$sala = $_POST ['sala'];
		$comedor = $_POST ['comedor'];
		$cocina = $_POST ['cocina'];
		$bar = $_POST ['bar'];		
		$estudio = $_POST ['estudio'];
		$patio = $_POST ['patio'];		
		$servicio = $_POST ['servicio'];
		$telefono = $_POST ['telefono'];
		$lineas = $_POST ['lineas'];
		$parrillera = $_POST ['parrillera'];
		$chimenea = $_POST ['chimenea'];
		$muebles = $_POST ['muebles'];		
		$maletero = $_POST ['maletero'];
		$jardin = $_POST ['jardin'];
		$gimnasio = $_POST ['gimnasio'];		
		$sauna = $_POST ['sauna'];
		$jacuzzi = $_POST ['jacuzzi'];
		$piscina = $_POST ['piscina'];
		$tenis = $_POST ['tenis'];
		$parque = $_POST ['parque'];
		$terraza = $_POST ['terraza'];
		$muelle = $_POST ['muelle'];
		$salonDeFiesta = $_POST ['salonDeFiesta'];
		$calle = $_POST ['calle'];
		$cercado = $_POST ['cercado'];
		$vigilancia = $_POST ['vigilancia'];
		$frenteAlAgua = $_POST ['frenteAlAgua'];
		$vistaPanoramica = $_POST ['vistaPanoramica'];
		$esquina = $_POST ['esquina'];
		$frenteAlMar = $_POST ['frenteAlMar'];
		$vistaAlMar = $_POST ['vistaAlMar'];
		
		//======================validar que se alla elegido tipoPersona=======================================
		if ($tipoPersona=="0") 
			{
			$data=array("error" => '1');
			die(json_encode($data));
			} 	
		//======================validar que se alla elegido altura=======================================
		if ($altura=="0") 
			{
			$data=array("error" => '2');
			die(json_encode($data));
			} 		
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
												 tipoPersona='$tipoPersona',
												 actaConstitutiva='$actaConstitutiva',
												 solvenciaIVSS='$solvenciaIVSS',
												 actualizacionJuntaDirectiva='$actualizacionJuntaDirectiva',
												 altura='$altura',
												 sala='$sala',
												 comedor='$comedor',
												 cocina='$cocina',
												 bar='$bar',
												 estudio='$estudio',
												 patio='$patio',
												 servicio='$servicio',
												 telefono='$telefono',
												 lineas='$lineas',
												 parrillera='$parrillera',
												 chimenea='$chimenea',									 
												 muebles='$muebles',
												 maletero='$maletero',
												 jardin='$jardin',
												 gimnasio='$gimnasio',	
												 sauna='$sauna',	
												 jacuzzi='$jacuzzi',	
												 piscina='$piscina',	
												 tenis='$tenis',	
												 parque='$parque',	
												 terraza='$terraza',	
												 muelle='$muelle',	
												 salonDeFiesta='$salonDeFiesta',	
												 calle='$calle',	
												 cercado='$cercado',	
												 vigilancia='$vigilancia',	
												 frenteAlAgua='$frenteAlAgua',
												 vistaPanoramica='$vistaPanoramica',	
												 esquina='$esquina',	
												 frenteAlMar='$frenteAlMar',	
												 vistaAlMar='$vistaAlMar'
												 WHERE id='".$_SESSION['id']."'");
				
				$insertarPropiedad = ("UPDATE tbl_propiedades SET 
												 tipoPersona='$tipoPersona',
												 actaConstitutiva='$actaConstitutiva',
												 solvenciaIVSS='$solvenciaIVSS',
												 actualizacionJuntaDirectiva='$actualizacionJuntaDirectiva',
												 altura='$altura',
												 sala='$sala',
												 comedor='$comedor',
												 cocina='$cocina',
												 bar='$bar',
												 estudio='$estudio',
												 patio='$patio',
												 servicio='$servicio',
												 telefono='$telefono',
												 lineas='$lineas',
												 parrillera='$parrillera',
												 chimenea='$chimenea',									 
												 muebles='$muebles',
												 maletero='$maletero',
												 jardin='$jardin',
												 gimnasio='$gimnasio',	
												 sauna='$sauna',	
												 jacuzzi='$jacuzzi',	
												 piscina='$piscina',	
												 tenis='$tenis',	
												 parque='$parque',	
												 terraza='$terraza',	
												 muelle='$muelle',	
												 salonDeFiesta='$salonDeFiesta',	
												 calle='$calle',	
												 cercado='$cercado',	
												 vigilancia='$vigilancia',	
												 frenteAlAgua='$frenteAlAgua',
												 vistaPanoramica='$vistaPanoramica',	
												 esquina='$esquina',	
												 frenteAlMar='$frenteAlMar',	
												 vistaAlMar='$vistaAlMar'
												 WHERE id='".$_SESSION['id']."'");
			}
			var_dump($insertarPropiedad);
			die();
			if($insertarPropiedad == false) 
			{
				$data=array("error" => '3');
				die(json_encode($data));
			}
			else
			{   //Los datos se han insertado correctamente.';		
				$data = array("exito" => '1');
				die(json_encode($data));
				mysql_close();	//cerrar la conexion a la bd
			}
?>