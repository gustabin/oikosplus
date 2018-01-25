<?php 
session_start(); 
//session_destroy(); 
//include "lib/corelib.php";
require_once('tools/mypathdb.php');  
require_once('detectaPais.php');  
include "class/class.php"; 
error_reporting(0);
//$_SESSION['valor'] = 10; //Activa la opcion del menu actual
include "header.php";   
//include_once("analyticstracking.php"); // esto jode el tamaño del formulario
$id=$_GET["id"];
$_SESSION['pagina']='editVilla';  
$_SESSION['villaId']=$villaId;  
?>
 <link href="css/jquery.ui.datepicker.css" rel="stylesheet" media="screen" /> 
<script type="text/javascript" language="javascript" src="js/jquery.ui.datepicker.js"></script>
<script src="js/jquery-ui.multidatespicker.js" type="text/javascript"></script>      
<script type="text/javascript" src="js/jqombo.js"></script> 
  
<script Language="JavaScript">  
	$(document).ready(function() { 
		//$('#titulo').html("Paso 1 / Datos del inmueble");
         $(".tlf").mask("(0999) 999-99-99");
		 $(".años").mask("99");
		 $(".metraje").mask("999");
		 $(".cuartos").mask("9");
		 $(".coordenadas").mask("99.9999999");		 
		 	 
	});
	
    $("body").on('submit', '#formGeneral', function(event) {
		event.preventDefault()
		if ($('#formGeneral').valid()) {
			$.ajax({
				type: "POST",
				url: "generalProcesar.php",
				dataType: "json",
				data: $(this).serialize(),
				success: function(respuesta) {
					if (respuesta.error == 1) {
						$('#error1').show();
						setTimeout(function() {
						$('#error1').hide();
						}, 2000);
					}
					if (respuesta.error == 2) {
						$('#error1').show();
						setTimeout(function() {
						$('#error1').hide();
						}, 2000);
					}
					if (respuesta.error == 3) {
						$('#error3').show();
						setTimeout(function() {
						$('#error3').hide();
						}, 2000);
					}
					if (respuesta.error == 4) {
						$('#error4').show();
						setTimeout(function() {
						$('#error4').hide();
						}, 2000);
					}
					if (respuesta.exito == 1) {
					  $('#mensaje').show();
					  setTimeout(function() {
					  $('#mensaje').hide();
					  window.location.href='registrarPropiedadDireccion.php'; 
					}, 3000);
					}					
				}
			});
		}
	});		
	
	function ocultarCiudades(){   //funcion para desaparecer cbo_ciudades
		$('#cbo_ciudades').hide();
	} 
</script> 

   <script>
   $(function() {
	 $( "#publicarDesde" ).datepicker({  	  
      showOn: "button",
      buttonImage: "images/calendar.gif",
      buttonImageOnly: true,
      buttonText: "Seleccione una fecha"
    });
	 
	 $( "#publicarHasta" ).datepicker({										
      showOn: "button",
      buttonImage: "images/calendar.gif",
      buttonImageOnly: true,
      buttonText: "Seleccione una fecha"
    });
	 
	 $( "#nacimientoDatepicker" ).datepicker({										
      showOn: "button",
      buttonImage: "images/calendar.gif",
      buttonImageOnly: true,
	  defaultDate: "-45y",
      buttonText: "Seleccione una fecha"
    });
	 //$("#Desdedatepicker").datepicker("setDate", "+0d");
	// $("#Hastadatepicker").datepicker("setDate", "+6m");
  });
   


  	$.datepicker.regional['es'] =
                            {
                                closeText: 'Cerrar',
                                prevText: 'Previo',
                                nextText: 'PrÃ³ximo',
                                monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 
                                    'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
                                monthNamesShort: ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun',
                                    'Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic'],
                                monthStatus: 'Ver otro mes', yearStatus: 'Ver otro aÃ±o',
                                dayNames: ['Domingo', 'Lunes', 'Martes', 'MiÃ©rcoles', 'Jueves', 'Viernes', 'SÃ¡bado'],
                                dayNamesShort: ['Dom', 'Lun', 'Mar', 'Mie', 'Jue', 'Vie', 'SÃ¡b'],
                                dayNamesMin: ['Do', 'Lu', 'Ma', 'Mi', 'Ju', 'Vi', 'Sa'],
                                dateFormat: 'dd/mm/yy', firstDay: 0,
                                initStatus: 'Selecciona la fecha', isRTL: false};
                    $.datepicker.setDefaults($.datepicker.regional['es']);
					
  </script>
  
 <script type="text/javascript"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $("#tipoPropiedad").change(function(event) {
                var id = $(event.target).val();
                $(".toggleable").hide();
                var inhalt = $("#" + id);
                inhalt.show();
            });
        });
    </script>
 
 
 	<script type="text/javascript">
        $(document).ready(function() {
            $("#estadoCivil").change(function(event) {
                var id = $(event.target).val();
                $(".toggleable").hide(); 
                var inhalt = $("#" + id); 
                inhalt.show();
            }); 
        });   
    </script>       
  
  <!-- .................................... $breadcrumb .................................... -->
  <section class="section-breadcrumb section-color-graylighter">   
    <div class="container">  
      <ul style="margin-bottom:10px; margin-top:10px;">  
		<h2><i class="fa fa-rss" aria-hidden="true"></i><span id="titulo">Registrar <small>Propiedad</small></span></h2>  
      </ul>
    </div>
  </section>
  <!-- .................................... $Titulo .................................... -->
  <!-- .................................... $breadcrumb .................................... -->
    <div class="container" style="margin-bottom:10px; margin-top:10px;">
      <a href='propiedadListado.php'>
      	<button type="button" class="btn-main"><i class="fa fa-reply" aria-hidden="true"></i> Volver al listado </button>
      </a>
      <a href='propiedadEditar.php?id=<?php echo $id ?>'>
      	<button type="button" class="btn-main"><i class="fa fa-file-text-o" aria-hidden="true"></i> General </button>
      </a>
      <a href='propiedadDireccion.php?id=<?php echo $id ?>'>
      	<button type="button" class="btn-main" disabled><i class="fa fa-map-marker" aria-hidden="true"></i> Dirección </button>
      </a>
      <a href='propiedadDocumentos.php?id=<?php echo $id ?>'>
      	<button type="button" class="btn-main"><i class="fa fa-paperclip" aria-hidden="true"></i> Documentos </button>
      </a>
      <a href='amenities.php?id=<?php echo $id ?>'>
      	<button type="button" class="btn-main"><i class="fa fa-check-square-o" aria-hidden="true"></i> Amenities </button>
      </a>
      <a href='images.php?id=<?php echo $id ?>'>
      	<button type="button" class="btn-main"><i class="fa fa-file-image-o" aria-hidden="true"></i> Subir fotos </button>
      </a>
      <a href='imagesOrder.php?id=<?php echo $id ?>'>
      	<button type="button" class="btn-main"><i class="fa fa-hand-pointer-o" aria-hidden="true"></i> Ordenar fotos </button>
      </a>             
    </div>
  

 <?php
	//$id = $_SESSION['id'];
      // ========================= Buscar la historia en tbl_historias ==========================================================
	$query="SELECT * FROM tbl_propiedades WHERE id = '$id'";  

	$resultado=mysql_query($query,$dbConn);
	while($dataPropiedad=mysql_fetch_array($resultado))
	{		
	$EstadoDelInmueble= $dataPropiedad['EstadoDelInmueble'];
	$edad= $dataPropiedad['edad'];
	$ano= $dataPropiedad['ano'];
	$m2= $dataPropiedad['m2'];
	$estilo= $dataPropiedad['estilo'];
	$habitaciones= $dataPropiedad['habitaciones'];
	$banos= $dataPropiedad['banos'];
	$mediosBanos= $dataPropiedad['mediosBanos'];
	$habitacionServicio= $dataPropiedad['habitacionServicio'];
	$banoServicio= $dataPropiedad['banoServicio'];
	$estacionamiento= $dataPropiedad['estacionamiento'];
	$puestos= $dataPropiedad['puestos'];
	$descripcion= $dataPropiedad['descripcion'];
	$observaciones= $dataPropiedad['observaciones'];
	$instrucciones= $dataPropiedad['instrucciones'];
	$referido= $dataPropiedad['referido'];
	$publicarDesde= $dataPropiedad['publicarDesde'];
	$publicarHasta= $dataPropiedad['publicarHasta'];
	$precio= $dataPropiedad['precio'];
	$operacion= $dataPropiedad['operacion'];
	$moneda= $dataPropiedad['moneda'];
	$comision= $dataPropiedad['comision'];
	$propietario= $dataPropiedad['propietario'];
	$telefono= $dataPropiedad['telefono'];
	$correo= $dataPropiedad['correo'];
	}
?>

 <!-- .................................... $Contenido .................................... -->
	<section class="section-contact section-color-graylighter">
		<div class="container">
			<div class="row">
                  
                  <img src="images/direccion.png" width="156" height="43" alt=""/>
                        <div class="span12" style="background: linear-gradient(white, #E5E5E5); ">
								    <form class="form-vertical" id="formDireccion">
										<div class="control-group">         
											Estado del inmueble &nbsp;
                                            <?php											
											if ($EstadoDelInmueble == "Nuevo") {
												$Nuevo = selected;
											}
											if ($EstadoDelInmueble == "Usado") {
												$Usado = selected;  
											}
											if ($EstadoDelInmueble == "Obra gris") {
												$ObraGris = selected;
											}											
											?>
											<select name="EstadoDelInmueble" style="width:auto"> 
												<option value="Nuevo" <?php echo $Nuevo ?>>Nuevo</option>
												<option value="Usado" <?php echo $Usado ?>>Usado</option>
												<option value="ObraGris" <?php echo $ObraGris ?>>Obra gris</option> 				 
											</select>                                              
                                          											
											Edad &nbsp;<input name="edad" type="text" class="required" id="edad" value="<?php echo $edad ?>" size="3" maxlength="2"  placeholder="Edad">    														
											Año de construcción &nbsp; 										
										  	<input type="text" name="anoConstruccion" id="anoConstruccion" size="4" maxlength="4" value="<?php echo $ano ?>" />										  
										</div>
										<div class="control-group"> 				
											m<sup>2</sup> &nbsp;<input name="metros" type="text" class="required" id="metros" value="<?php echo $m2 ?>" size="3" maxlength="3">        												 
										    Estilo &nbsp;
                                            <?php											
											if ($estilo == "1 nivel") {
												$unNivel = selected;
											}
											if ($estilo == "varios niveles") {
												$variosNiveles = selected;  
											}
											if ($estilo == "PB") {
												$PB = selected;
											}
											if ($estilo == "Penthouse") {
												$pentHouse = selected;
											}											
											?>
                                            <select name="estiloInmueble" style="width:auto"> 
											  <option value="1 nivel" <?php echo $unNivel ?>>1 nivel</option>
                                              <option value="varios niveles" <?php echo $variosNiveles ?>>varios niveles</option>
                                              <option value="PB" <?php echo $PB ?>>PB</option> 		
                                              <option value="Penthouse" <?php echo $pentHouse ?>>Penthouse</option> 				 
											</select>                                            
										</div>
                                        
                                        
										<div class="control-group"> 				
											Habitaciones &nbsp;<input name="habitaciones" type="text" id="habitaciones" maxlength="1" size="1" value="<?php echo $habitaciones ?>" class="required cuartos">    			
											Baños &nbsp;<input name="banos" type="text" id="banos" maxlength="1" size="1" value="<?php echo $banos ?>" class="required cuartos">        
										</div>
										<div class="control-group"> 				
											Medios baños &nbsp;<input name="mediosBanos" type="text" id="mediosBanos" maxlength="1" size="1" value="<?php echo $mediosBanos ?>" class="required cuartos">        			
											Habitaci&oacute;n de servicio &nbsp;
                                            <?php											
											if ($habitacionServicio == "Si") {
												$habitacionServicioSi = selected;
											}
											if ($habitacionServicio == "No") {
												$habitacionServicioNo = selected;  
											}																						
											?>
                                            <select name="habitacionServicio" style="width:auto"> 
                                                  <option value="Si" <?php echo $habitacionServicioSi ?>>Si</option>
                                                  <option value="No" <?php echo $habitacionServicioNo ?>>No</option>                                      		</select>        
											Baño de servicio &nbsp;
                                            <?php											
											if ($banoServicio == "Si") {
												$banoServicioSi = selected;
											}
											if ($banoServicio == "No") {
												$banoServicioNo = selected;  
											}																						
											?>
                                            <select name="banoServicio" style="width:auto"> 
                                                  <option value="Si" <?php echo $banoServicioSi ?>>Si</option>
                                                  <option value="No" <?php echo $banoServicioNo ?>>No</option>                                      		</select>          
										</div>
										<div class="control-group"> 				
											Estacionamiento &nbsp;
                                            <?php											
											if ($estacionamiento == "Techado") {
												$estTechado = selected;
											}
											if ($estacionamiento == "Descubierto") {
												$estDescubierto = selected;  
											}
											if ($estacionamiento == "No") {
												$SinEstacionamiento = selected;  
											}																						
											?>
                                            <select name="estacionamiento" style="width:auto"> 
                                                  <option value="Techado" <?php echo $estTechado ?>>Techado</option>
                                                  <option value="Descubierto" <?php echo $estDescubierto ?>>Descubierto</option>     
                                                  <option value="Sin estacionamiento" <?php echo $SinEstacionamiento ?>>Sin estacionamiento</option>                                     </select>  
                                                  
											# de Puestos &nbsp;<input name="puestos" type="text" class="required cuartos" id="puestos" size="1" value="<?php echo $puestos ?>" maxlength="1">        
										</div>
										<div class="control-group"> 				
											Descripci&oacute;n   &nbsp;
                                            <textarea name="descripcion" cols="40" rows="6" class="required" id="descripcion"><?php echo $descripcion ?></textarea>   
											Observaciones   &nbsp;
                                            <textarea name="observaciones" cols="40" rows="6" id="observaciones" ><?php echo $observaciones ?></textarea>                      
										</div>

										<div class="control-group"> 				
											Instrucciones &nbsp;
                                            <?php											
											if ($instrucciones == "Llamar antes") {
												$llamarAntes = selected;
											}
											if ($instrucciones == "inmobiliaria") {
												$inmobiliaria = selected;  
											}
											if ($instrucciones == "vigilancia") {
												$vigilancia = selected;  
											}
											if ($instrucciones == "conserjeria") {
												$conserjeria = selected;  
											}																						
											?>
                                            <select name="instrucciones" style="width:auto"> 
                                              <option value="Llamar antes" <?php echo $llamarAntes ?>>Llamar antes</option>
                                              <option value="Llamar a inmobiliaria" <?php echo $inmobiliaria ?>>Llamar a inmobiliaria</option>     
                                              <option value="Llaves en vigilancia" <?php echo $vigilancia ?>>Llaves en vigilancia</option>   
                                              <option value="Llaves en conserjeria" <?php echo $conserjeria ?>>Llaves en conserjeria</option>   											</select>  
										</div>
										<div class="control-group">  				
											Referido por &nbsp;
                                            <?php											
											if ($referido == "Particular") {
												$particular = selected;
											}
											if ($referido == "Website") {
												$website = selected;  
											}
											if ($referido == "Corredor") {
												$corredor = selected;  
											}
											if ($referido == "No") {
												$ninguno = selected;  
											}																						
											?>
                                            <select name="referido" style="width:auto"> 
                                              <option value="Particular" <?php echo $particular ?>>Particular</option>
                                              <option value="Website" <?php echo $website ?>>Website</option>     
                                              <option value="Corredor inmobiliario" <?php echo $corredor ?>>Corredor inmobiliario</option>   
                                              <option value="Ninguno" <?php echo $ninguno ?>>Ninguno</option>   
                                            </select>        
										</div>
										<div class="control-group">         
											Publicar Desde &nbsp;
                                            <input name="publicarDesde" type="text" id="publicarDesde" value="<?php echo $publicarDesde ?>" size="10" maxlength="10">          							  
											Publicar Hasta &nbsp;
                                            <input name="publicarHasta" type="text" id="publicarHasta" value="<?php echo $publicarHasta ?>" size="10" maxlength="10"> 
										</div>
										<div class="control-group"> 				
											Precio &nbsp;<input name="precio" type="text" class="required" id="precio" value="<?php echo $precio ?>" size="10" maxlength="9"> 
  
											Operación &nbsp;
                                            <?php											
											if ($operacion == "Venta") {
												$venta = selected;
											}
											if ($operacion == "Alquiler") {
												$alquiler = selected;  
											}																																	
											?>
                                            <select name="operacion" style="width:auto"> 
                                              <option value="Venta" <?php echo $venta ?>>Venta</option>
                                              <option value="Alquiler" <?php echo $alquiler ?>>Alquiler</option> 
                                            </select>
											Moneda &nbsp;
                                            <?php											
											if ($moneda == "Bolivares") {
												$bolivares = selected;
											}
											if ($moneda == "Dolares") {
												$dolares = selected;  
											}																																	
											?>
                                            <select name="moneda" style="width:auto"> 
											  <option value="Bolivares" <?php echo $bolivares ?>>Bolívares</option>
											  <option value="Dolares" <?php echo $dolares ?>>Dólares</option>                                           
											</select>           						
										</div>
										<div class="control-group">                                         
											Comisión &nbsp;
                                            <?php											
											if ($comision == "3%") {
												$comision3 = selected;
											}
											if ($comision == "4%") {
												$comision4 = selected;  
											}	
											if ($comision == "5%") {
												$comision5 = selected;  
											}																																	
											?>
                                            <select name="comision" style="width:auto"> 
                                              <option value="3%" <?php echo $comision3 ?>>3%</option>
                                              <option value="4%" <?php echo $comision4 ?>>4%</option>
                                              <option value="5%" <?php echo $comision5 ?>>5%</option>                                           
											</select>  
										</div>
										<div class="control-group"> 
											Propietario &nbsp;
												<input name="propietario" type="text" class="required" id="propietario" value="<?php echo $propietario ?>" size="35" maxlength="50" placeholder="Nombre del propietario">
										  	Teléfono &nbsp;
                                            	<input name="telefono" type="text" class="required tlf" id="telefono" value="<?php echo $telefono ?>" size="15" maxlength="16"  placeholder="teléfono">  
											Correo &nbsp;
                                            	<input name="correo" type="text" class="required email" id="correo" value="<?php echo $correo ?>" size="30" maxlength="45"  placeholder="correo">  
										</div>
										<div class="control-group" style="padding-top: 10px;">	 
                                            <button class="btn btn-primary" type="submit" id="enviar">
                                                <i class="fa fa-floppy-o"></i>&nbsp;Guardar</button>
                                            <a href="propiedadListado.php">
                                                <button type="button" class="btn btn-danger" id="cancelar">
                                                <i class="icon-chevron-left"></i>Cancelar</button>
                                            </a>
                                        </div>	
                                  </form> <!--cierre del formulario !-->		
                                     <!-- ================= mensajes de EXITO o de ERROR===========================================================  !-->
									 <div class="alert alert-danger mensaje_form" style="display: none" id="mensaje">
										<button data-dismiss="alert" class="close" type="button">x</button>
										<strong>MENSAJE!</strong> <span class="textmensaje">Registro exitoso</span>          
									 </div>
									 <div class="alert alert-danger mensaje_form" style="display: none" id="error1">
										<button data-dismiss="alert" class="close" type="button">x</button>
										<strong>MENSAJE!</strong> <span class="textmensaje">Debe elegir un tipo de propiedad</span>
									 </div>
                                     <div class="alert alert-danger mensaje_form" style="display: none" id="error2">
										<button data-dismiss="alert" class="close" type="button">x</button>
										<strong>MENSAJE!</strong> <span class="textmensaje">A ocurrido un error</span>
									 </div>      
                                     <div class="alert alert-danger mensaje_form" style="display: none" id="error3">
										<button data-dismiss="alert" class="close" type="button">x</button>
										<strong>MENSAJE!</strong> <span class="textmensaje">Debe elegir el prefijo de dirección</span>
									 </div> 
                                     <div class="alert alert-danger mensaje_form" style="display: none" id="error4">
										<button data-dismiss="alert" class="close" type="button">x</button>
										<strong>MENSAJE!</strong> <span class="textmensaje">Debe elegir un estado</span>
									 </div> 
					</div>						
			</div>	
		</div>		
	</section>
    <!-- .................................... $footer .................................... -->
  <?php include "footer.php"; ?>