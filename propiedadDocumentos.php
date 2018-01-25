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
      	<button type="button" class="btn-main"><i class="fa fa-map-marker" aria-hidden="true"></i> Dirección </button>
      </a>
      <a href='propiedadDocumentos.php?id=<?php echo $id ?>'>
      	<button type="button" class="btn-main" disabled><i class="fa fa-paperclip" aria-hidden="true"></i> Documentos </button>
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
					      <img src="images/documentos-propietario.png" width="227" height="85" alt=""/>
							<form class="form-vertical" id="formPropietario">
                                <div class="span6" style="background: linear-gradient(white, #E5E5E5); ">
								       <div class="control-group">         
											Status de los documentos &nbsp;
											<select name="statusDocumentos" style="width:auto"> 
												<option value="completos">Completos</option>
												<option value="enTramite" selected="selected">En tramites</option>
												<option value="gestoria">Necesita gestoría</option> 				 
											</select>    
									   </div>									      
                                       <div class="control-group">        												
											Estado civil &nbsp;
											<select id="estadoCivil" name="estadoCivil" style="width:auto"> 
												<option value="0" selected="selected">Seleccione</option>
												<option value="casado">Casado</option>
												<option value="divorciado">Divorciado</option>
												<option value="soltero">Soltero</option> 	
												<option value="viudo">Viudo</option> 	                                                		 
											</select>  
									   </div>                                           
                                       <div class="control-group"> 
											<div id="divorciado" class="toggleable" style="display:none;">
												Propietario divorciado &nbsp;
												<select id="propDivorciado" name="propDivorciado" style="width:auto"> 
													<option value="0">Seleccione</option>
													<option value="divorcioRegistrado">Divorcio registrado</option>
													<option value="separacionBienes">Separación de bienes</option> 				 
												</select>  
											</div>  
									    </div>
    									<div class="control-group"> 				
											Vivienda principal &nbsp;
												<select id="viviendaPrincipal" name="viviendaPrincipal" style="width:auto"> 
													<option value="0">Seleccione</option>
													<option value="No registrada">No registrada</option>
													<option value="Registrada">Registrada</option> 				 
												</select>   
										</div>
										<div class="control-group"> 				
											Poder &nbsp;
												<select id="poder" name="poder" style="width:auto"> 
													<option value="0">Seleccione</option>
													<option value="No registrado">No registrado</option>
													<option value="Registrado">Registrado</option> 				 
												</select>         
										</div>
										<div class="control-group"> 				
											 Condominio &nbsp;
												<select id="condominio" name="condominio" style="width:auto"> 
													<option value="0">Seleccione</option>
													<option value="solvente">Solvente</option>
													<option value="insolvente">Insolvente</option> 				 
												</select>         
										</div>
										<div class="control-group"> 				
											<input type="checkbox" name="planos" id="planos" /> Planos &nbsp;											   										</div>
										<div class="control-group"> 				
											Forma de pago &nbsp;
												<select id="formaDePago" name="formaDePago" style="width:auto"> 
													<option value="0">Seleccione</option>
													<option value="financiamiento">Acepta Financiamiento</option>
													<option value="contado">Contado</option> 				 
												</select>                      
										</div>
										<div class="control-group"> 				
											<div id="viudo" class="toggleable">
												<table>
												<tr>
													<td>
													<input type="checkbox" name="cedulaHerederos"id="cedulaHerederos" />&nbsp;
													 Cédula de propietario fallecido y herederos &nbsp;                        
													</td>
												</tr>
												<tr>
													<td>
													<input type="checkbox" name="solvenciaSucesoral" id="solvenciaSucesoral" />&nbsp;
													Solvencia sucesoral &nbsp;                        
													</td>
												</tr> 
												<tr>
													<td>
													<input type="checkbox" name="rifSucesion" id="rifSucesion" />&nbsp;
													Rif Sucesión &nbsp;                        
													</td>
												</tr>
												<tr>
													<td>
													<input type="checkbox" name="declaracionSucesoral" id="declaracionSucesoral" />&nbsp;
													Declaración  Sucesoral  &nbsp;                        
													</td>
												</tr>
												</table>
											</div> 
										</div>  
								</div>      
   
                                <div class="span6" style="background: linear-gradient(white, #E5E5E5); ">
									<div class="control-group">         
										Fecha de Nacimiento &nbsp;<input name="nacimiento" type="text" id="nacimientoDatepicker" maxlength="10" size="10">    
									</div>
									<div class="control-group">         
										Rif &nbsp;<input name="rif" type="text" class="span4" id="rif" placeholder="Rif (Sin espacios)" value="<?php echo $_SESSION['rif'] ?>" style="width:auto">
									</div>
									<div class="control-group">         
										Cédula de Identidad &nbsp;
											<select id="cedula" name="cedula" style="width:auto"> 
												<option value="0">Seleccione</option>
												<option value="Cambio de estado civil">Cambio de estado civil</option>
												<option value="Vigente">Vigente</option> 				 
											</select>  
									</div>
									<div class="control-group">         
										Ficha catastral &nbsp;
											<select id="fichaCatastral" name="fichaCatastral" style="width:auto"> 
												<option value="0">Seleccione</option>
												<option value="Vigente">Vigente</option>
												<option value="Vencida">Vencida</option> 				 
											</select>  
									</div>
									<div class="control-group">         
										Solvencia derecho de frente &nbsp;
											<select id="derechoFrente" name="derechoFrente" style="width:auto"> 
												<option value="0">Seleccione</option>
												<option value="Vigente">Vigente</option>
												<option value="Vencida">Vencida</option> 				 
											</select>  
									</div>
									<div class="control-group">         
										Hipoteca &nbsp;
											<select id="hipoteca" name="hipoteca" style="width:auto"> 
												<option value="0">Seleccione</option>
												<option value="Sin hipoteca">Sin hipoteca</option> 		
												<option value="Doc notariado no registrado">Doc notariado no registrado</option>
												<option value="LPH a partir del 2005">LPH a partir del 2005</option> 	
												<option value="Pagada registrada">Pagada registrada</option>                        		 
											</select>  
									</div>
									<div class="control-group"> 
										<input type="checkbox" name="tituloSupletorio" id="tituloSupletorio" /> Título Supletorio &nbsp;												
									</div>
									<div class="control-group"> 
										<input type="checkbox" name="documentoCondominio" id="documentoCondominio" /> Documento Condominio &nbsp;												
									</div>
                                    <div> 
										&nbsp;	                                        											
									</div>
                                    <div> 
										&nbsp;	                                        											
									</div>
                                    <div> 
										&nbsp;	                                        											
									</div>
                                    <div> 
										&nbsp;	                                        											
									</div>
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
                                   <!-- ================= mensajes de EXITO o de ERROR===========================  !-->
									 <div class="alert alert-danger mensaje_form" style="display: none" id="mensaje">
										<button data-dismiss="alert" class="close" type="button">x</button>
										<strong>MENSAJE!</strong> <span class="textmensaje">Registro exitoso</span>          
									 </div>    
									  
									 <div class="alert alert-danger mensaje_form" style="display: none" id="error1">
										<button data-dismiss="alert" class="close" type="button">x</button>
										<strong>MENSAJE!</strong> <span class="textmensaje">Debe elegir un estado civil</span>
									 </div>
                                     <div class="alert alert-danger mensaje_form" style="display: none" id="error2">
										<button data-dismiss="alert" class="close" type="button">x</button>
										<strong>MENSAJE!</strong> <span class="textmensaje">Debe elegir un tipo de persona (Natural o Juridica)</span>
									 </div>      
                                     <div class="alert alert-danger mensaje_form" style="display: none" id="error3">
										<button data-dismiss="alert" class="close" type="button">x</button>
										<strong>MENSAJE!</strong> <span class="textmensaje">Debe elegir la vivienda Principal</span>
									 </div> 
                                     <div class="alert alert-danger mensaje_form" style="display: none" id="error4">
										<button data-dismiss="alert" class="close" type="button">x</button>
										<strong>MENSAJE!</strong> <span class="textmensaje">Debe elegir el tipo de divorcio  </span>
									 </div> 
                                     <div class="alert alert-danger mensaje_form" style="display: none" id="error5">
										<button data-dismiss="alert" class="close" type="button">x</button>
										<strong>MENSAJE!</strong> <span class="textmensaje">Indique el status del Poder  </span>
									 </div> 
                                     <div class="alert alert-danger mensaje_form" style="display: none" id="error6">
										<button data-dismiss="alert" class="close" type="button">x</button>
										<strong>MENSAJE!</strong> <span class="textmensaje">Indique el status del condominio  </span>
									 </div> 
                                     <div class="alert alert-danger mensaje_form" style="display: none" id="error7">
										<button data-dismiss="alert" class="close" type="button">x</button>
										<strong>MENSAJE!</strong> <span class="textmensaje">Debe elegir la forma de pago (Acepta financiamiento / Contado)  </span>
									 </div>  
                                     <div class="alert alert-danger mensaje_form" style="display: none" id="error8">
										<button data-dismiss="alert" class="close" type="button">x</button>
										<strong>MENSAJE!</strong> <span class="textmensaje">Indique la fecha de nacimiento  </span>
									 </div>  
                                     <div class="alert alert-danger mensaje_form" style="display: none" id="error9">
										<button data-dismiss="alert" class="close" type="button">x</button>
										<strong>MENSAJE!</strong> <span class="textmensaje">Indique el número del RIF  </span>
									 </div> 
                                     <div class="alert alert-danger mensaje_form" style="display: none" id="error10">
										<button data-dismiss="alert" class="close" type="button">x</button>
										<strong>MENSAJE!</strong> <span class="textmensaje">Indique el status de la cédula de identidad </span>
									 </div> 
                                     <div class="alert alert-danger mensaje_form" style="display: none" id="error11">
										<button data-dismiss="alert" class="close" type="button">x</button>
										<strong>MENSAJE!</strong> <span class="textmensaje">Indique el status de la Ficha catastral </span>
									 </div> 
                                     <div class="alert alert-danger mensaje_form" style="display: none" id="error12">
										<button data-dismiss="alert" class="close" type="button">x</button>
										<strong>MENSAJE!</strong> <span class="textmensaje">Indique el status de la solvencia de derecho de frente </span>
									 </div> 
                                     <div class="alert alert-danger mensaje_form" style="display: none" id="error13">
										<button data-dismiss="alert" class="close" type="button">x</button>
										<strong>MENSAJE!</strong> <span class="textmensaje">Indique el status de la hipoteca </span>
									 </div>  
                                     <div class="alert alert-danger mensaje_form" style="display: none" id="error14">
										<button data-dismiss="alert" class="close" type="button">x</button>
										<strong>MENSAJE!</strong> <span class="textmensaje">Ocurrio un error, por favor reportelo al administrador del sistema </span>
									 </div> 						 
					
                				
			</div>	
		</div>		
	</section>
    <!-- .................................... $footer .................................... -->
  <?php include "footer.php"; ?>