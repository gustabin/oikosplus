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
				url: "agregarPropiedadProcesar.php",
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
						document.getElementById('light').style.display='block';document.getElementById('fade').style.display='block';						
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
    $( "#datepicker" ).datepicker({
      showOn: "button",
      buttonImage: "images/calendar.gif",
      buttonImageOnly: true,
      buttonText: "Seleccione una fecha"
    });
	
	 $( "#Desdedatepicker" ).datepicker({  	  
      showOn: "button",
      buttonImage: "images/calendar.gif",
      buttonImageOnly: true,
      buttonText: "Seleccione una fecha"
    });
	 
	 $( "#Hastadatepicker" ).datepicker({										
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
      <ul class="breadcrumb">  
        <li><a href="#"><span id="titulo"></span></a></li>   
      </ul>
    </div>
  </section>
    <!-- .................................... $Titulo .................................... -->
  <!-- .................................... $breadcrumb .................................... -->
    <div class="container" style="margin-bottom:10px; margin-top:10px;">
      <a href='propiedadListado.php'>
      	<button type="button" class="btn-main"><i class="fa fa-reply" aria-hidden="true"></i> Volver al listado </button>
      </a>
      <a href='agregarPropiedad.php?id=<?php echo $id ?>'>
      	<button type="button" class="btn-main" disabled><i class="fa fa-file-text-o" aria-hidden="true"></i> General </button>
      </a>
      <a href='agregarDireccion.php?id=<?php echo $id ?>'>
      	<button type="button" class="btn-main"><i class="fa fa-map-marker" aria-hidden="true"></i> Dirección </button>
      </a>
      <a href='agregarDocumento.php?id=<?php echo $id ?>'>
      	<button type="button" class="btn-main"><i class="fa fa-paperclip" aria-hidden="true"></i> Documentos </button>
      </a>
      <a href='agregarAdicionales.php?id=<?php echo $id ?>'>
      	<button type="button" class="btn-main"><i class="fa fa-check-square-o" aria-hidden="true"></i> Amenities </button>
      </a>
      <a href='images.php?id=<?php echo $id ?>'>
      	<button type="button" class="btn-main"><i class="fa fa-file-image-o" aria-hidden="true"></i> Subir fotos </button>
      </a>
      <a href='imagesOrder.php?id=<?php echo $id ?>'>
      	<button type="button" class="btn-main"><i class="fa fa-hand-pointer-o" aria-hidden="true"></i> Ordenar fotos </button>
      </a>             
    </div>
  
    <div class="container" style="margin-top:10px">
      <h2 class="section-title">
        Registrar 
        <small>Propiedad</small>
      </h2>
      </div>
  

  <?php
  /*
	$id = $_SESSION['id'];
      // ========================= Buscar la historia en tbl_historias ==========================================================
	$query="SELECT * FROM tbl_propiedades WHERE id = '$id'";  

	$resultado=mysql_query($query,$dbConn);
	while($dataPropiedad=mysql_fetch_array($resultado))
	{		
	$tipoPropiedad= $dataPropiedad['tipoPropiedad'];
	$nombreDelInmueble= $dataPropiedad['nombreDelInmueble'];
	$urbanizacion= $dataPropiedad['urbanizacion'];
	$prefijoDireccion= $dataPropiedad['prefijoDireccion'];
	$calleAvenida= $dataPropiedad['calleAvenida'];
	$numero= $dataPropiedad['numero'];
	$edificio= $dataPropiedad['edificio'];
	$piso= $dataPropiedad['piso'];
	$apto= $dataPropiedad['apto'];
	$ptoReferencia= $dataPropiedad['ptoReferencia'];
	$latitud= $dataPropiedad['latitud'];
	$longitud= $dataPropiedad['longitud'];
	$estados= $dataPropiedad['estado'];
	$ciudad= $dataPropiedad['ciudad'];	
	}
	*/
?>

  <!-- .................................... $Contenido .................................... -->
	<section class="section-contact section-color-graylighter">
		<div class="container">
			<div class="row">
				<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
					<div class="panel panel-default">
						<div class="panel-heading" role="tab" id="headingOne">
						  <h4 class="panel-title">
							<a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
							  Informaci&oacute;n General
							</a>
						  </h4>
						</div>
						<div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
							<div class="panel-body">
                                <div class="span12" style="background: linear-gradient(white, #E5E5E5); ">
								    <form class="form-vertical" id="formGeneral">	
                                        <div class="control-group">         
                                            Nombre del inmueble &nbsp;<input name="nombreInmueble" type="text" class="span4 required" id="nombreInmueble" value="Villa Tabin"  placeholder="Nombre del Inmueble">      
                                      </div>	
										<div class="control-group">         
											Tipo de Propiedad &nbsp;
                                            
                                            <?php
											if ($tipoPropiedad == "Apartamento") {
												$Apartamento = selected;
											}
											if ($tipoPropiedad == "Casa") {
												$Casa = selected;  
											}
											if ($tipoPropiedad == "Townhouse") {
												$Townhouse = selected;
											}
											if ($tipoPropiedad == "Quinta") {
												$Quinta = selected;
											}
											if ($tipoPropiedad == "Galpones") {
												$Galpones = selected;
											}
											if ($tipoPropiedad == "Locales") {
												$Locales = selected;
											}
											if ($tipoPropiedad == "Oficinas") {
												$Oficinas = selected;
											}
											if ($tipoPropiedad == "Terrenos") {
												$Terrenos = selected;
											}
											?>											
										   
			  								<select id="tipoPropiedad" name="tipoPropiedad" style="width:auto">
												<option value="0">Seleccione</option>
												<option value="Apartamento" <?php echo $Apartamento ?>>Apartamento</option>
												<option value="Casa" <?php echo $Casa ?>>Casa</option>
												<option value="Townhouse" <?php echo $Townhouse ?>>Townhouse</option>
												<option value="Quinta" <?php echo $Quinta ?>>Quinta</option>
												<option value="Galpones" <?php echo $Galpones ?>>Galpones</option>
												<option value="Locales" <?php echo $Locales ?>>Locales</option>
												<option value="Oficinas" <?php echo $Oficinas ?>>Oficinas</option>
												<option value="Terrenos" <?php echo $Terrenos ?>>Terrenos</option>
											</select>
										</div>
										<div class="control-group"> 
											Corredor Inmobiliario &nbsp;<input name="corredorInmobiliario" type="text" class="span4 required" id="corredorInmobiliario"  placeholder="Corredor Inmobiliario" value="<?php echo ucwords(strtolower($_SESSION['nombre'])) ?> <?php echo ucwords(strtolower($_SESSION['apellido'])); ?>" readonly style="width:auto">                
										</div>
										<div class="control-group">         
											Inmobiliaria &nbsp;<input name="inmobiliaria" type="text" class="span4 required" id="inmobiliaria" placeholder="inmobiliaria" value="<?php echo $_SESSION['inmobiliaria'] ?>" readonly style="width:auto">
										</div>					
										<div class="control-group"> 				
												Urbanizaci&oacuten, sector, zona, barrio &nbsp;<input name="urbanizacion" type="text" class="span4 required" id="urbanizacion" value="Urb La montaña"  placeholder="Urbanización, sector, zona, barrio">          
									  </div>
											<div class="control-group">         
												Prefijo direcci&oacute;n &nbsp;
                                            <?php
											if ($prefijoDireccion == "Calle") {
												$Calle = selected;
											}
											if ($prefijoDireccion == "Avenida") {
												$Avenida = selected;  
											}
											if ($prefijoDireccion == "Carrera") {
												$Carrera = selected;
											}
											if ($prefijoDireccion == "Carretera") {
												$Carretera = selected;
											}
											if ($prefijoDireccion == "Vereda") {
												$Vereda = selected;
											}
											if ($prefijoDireccion == "Troncal") {
												$Troncal = selected;
											}
											if ($prefijoDireccion == "Transversal") {
												$Transversal = selected;
											}
											if ($prefijoDireccion == "Manzana") {
												$Manzana = selected;
											}
											if ($prefijoDireccion == "Ramal") {
												$Ramal = selected;
											}
											if ($prefijoDireccion == "Ruta") {
												$Ruta = selected;
											}
											?>	
												<select id="prefijoDireccion" name="prefijoDireccion" style="width:auto"> 
												  <option value="0">Seleccione</option>
                                                  <option value="Calle" <?php echo $Calle ?>>Calle</option>
												  <option value="Avenida" <?php echo $Avenida ?>>Avenida</option>
                                                  <option value="Carrera" <?php echo $Carrera ?>>Carrera</option>
												  <option value="Carretera" <?php echo $Carretera ?>>Carretera</option>
                                                  <option value="Vereda" <?php echo $Vereda ?>>Vereda</option>
												  <option value="Troncal" <?php echo $Troncal ?>>Troncal</option>
                                                  <option value="Transversal" <?php echo $Transversal ?>>Transversal</option>
												  <option value="Manzana" <?php echo $Manzana ?>>Manzana</option>
                                                  <option value="Ramal" <?php echo $Ramal ?>>Ramal</option>
                                                  <option value="Ruta" <?php echo $Ruta ?>>Ruta</option>												 
												</select>
												Calle ó Av &nbsp;<input name="calleAvenida" type="text" class="required" id="calleAvenida" value="José Félix Ribas" size="20" maxlength="20" placeholder="Nombre de la calle" />
												N&uacute;mero &nbsp;<input name="numero" type="text" id="numero" value="70" size="4" maxlength="4"  placeholder="N&uacute;mero">  
											</div>			
											<div class="control-group">         
												Edificio &nbsp;<input name="edificio" type="text" class="span4" id="edificio" value="Torre España"  placeholder="edificio">
											  Piso &nbsp;<input name="piso" type="text" id="piso"  placeholder="piso" size="2" maxlength="2">
												Apto &nbsp;<input name="apartamento" type="text" id="apartamento"  placeholder="apto" size="6" maxlength="6">
											</div>			
											<div class="control-group"> 				
												Punto de referencia &nbsp;<textarea name="referencia" cols="40" rows="2" id="referencia" >Detrás de las canchas de tenis</textarea>             				
															
												Latitud &nbsp;<input name="latitud" type="text" class="coordenadas" id="latitud" value="10.25412548" size="10" maxlength="10">        
															
												Longitud &nbsp;<input name="longitud" type="text" class="coordenadas" id="longitud" value="64.26587421" size="10" maxlength="10">        
											</div>	
                                            <div class="control-group">
                                            
                                            
                                            <?php
											//if (!empty($estados)) {
											if (!empty($_SESSION['id'])){
											?>	
                                                <?php JCombo::estado_seleccionado(); ?> 
                                                                                  
                                                <input name="ciudadSeleccionada" type="text" id="ciudadSeleccionada" disabled="disabled" value="<?php echo $ciudad; ?>">        
											<?php
											} else {
											?>
												<?php JCombo::ver_estados(); ?>
												<span id="ciudadesCombo"> </span>                                                
                                            <?php    
											}											
											?>
                                            
															
										</div>
                                      
                                       <div class="control-group">         
											<button class="btn btn-primary" type="submit" id="enviar"><i class="fa fa-floppy-o"></i> &nbsp; Guardar</button>
                    					 <a href='propiedadListado.php'>
                                            <button type="button" class="btn btn-danger"><i class="icon-chevron-left"></i> Cancelar </button>
                                       	 </a>
									  </div>	
                                          				
							      </form> <!--cierre del formulario !-->									
								 
									 <!-- ================= mensajes de EXITO o de ERROR====================  !-->
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
					</div>
				</div>
			</div>
            <div class="modal" id="light" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header" style="background-color:#99CA3D; color:black;">	
                            <h4 class="modal-title" id="myModalLabel">
                                ¡Registro creado!
                            </h4>
                        </div>
                        <div class="modal-body">
                            La información general ha sido guardada satisfactoriamente. <br>                
                        </div>
                        <div class="modal-footer">			
                                <a href = "#" onclick = "document.getElementById('light').style.display='none';document.getElementById('fade').style.display='none'"> 
                                <button type="button" class="btn btn-primary" data-dismiss="modal">
                               Ok
                            </button> 
                                </a>					
                        </div>
                    </div>						
                </div>					
             </div>
		</div>
	</section>
    <!-- .................................... $footer .................................... -->
  <?php include "footer.php"; ?>