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
		$('#titulo').html("Paso 1 / Datos del inmueble");
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
					if (respuesta.exito == 1) {
						$('#mensaje').show();
						$('#headingTwo').show();
						$('#headingThree').show();
						$('#headingFour').show();
						$('#headingFive').show();
						$('#headingSix').show();
						setTimeout(function() {
						$('#mensaje').hide();
						}, 2000);						 
					}		    
				}
			});
		}
	});		
	
	$("body").on('submit', '#formApartamento', function(event) {
		event.preventDefault()
		if ($('#formApartamento').valid()) {
			$.ajax({
				type: "POST",
				url: "123.php",
				dataType: "json",
				data: $(this).serialize(),
				success: function(respuesta) {
					if (respuesta.error == 2) {
						$('#error2').show();
						setTimeout(function() {
						$('#error2').hide();
						}, 2000);
					}
					if (respuesta.error == 3) {
						$('#error3').show();
						setTimeout(function() {
						$('#error3').hide();
						}, 2000);
					}
					if (respuesta.exito == 1) {
						$('#mensaje').show();	
						setTimeout(function() {
						$('#mensaje').hide();
						}, 2000);						 
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
  
    <div class="container" style="margin-top:10px">
      <h2 class="section-title">
        Registrar 
        <small>Propiedad</small>
      </h2>
      </div>
  
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
								<div class="span12">
								    <form class="form-vertical" id="formGeneral">	
                                        <div class="control-group">         
                                            Nombre del inmueble &nbsp;<input name="nombreInmueble" type="text" class="span4 required" id="nombreInmueble"  placeholder="Nombre del Inmueble">      
                                        </div>	
										<div class="control-group">         
											Tipo de Propiedad &nbsp;
											<select id="tipoPropiedad" name="tipoPropiedad" style="width:auto">
												<option value="0">Seleccione</option>
												<option value="Apartamento">Apartamento</option>
												<option value="Casa">Casa</option>
												<option value="Townhouse">Townhouse</option>
												<option value="Quinta">Quinta</option>
												<option value="Galpones">Galpones</option>
												<option value="Locales">Locales</option>
												<option value="Oficinas">Oficinas</option>
												<option value="Terrenos">Terrenos</option>
											</select>
										</div>
										<div class="control-group"> 
											Corredor Inmobiliario &nbsp;<input name="corredorInmobiliario" type="text" class="span4 required" id="corredorInmobiliario"  placeholder="Corredor Inmobiliario" value="<?php echo ucwords(strtolower($_SESSION['nombre'])) ?> <?php echo ucwords(strtolower($_SESSION['apellido'])); ?>" readonly="readonly" style="width:auto">                
										</div>
										<div class="control-group">         
											Inmobiliaria &nbsp;<input name="inmobiliaria" type="text" class="span4 required" id="inmobiliaria" placeholder="inmobiliaria" value="<?php echo $_SESSION['inmobiliaria'] ?>" readonly="readonly" style="width:auto">
										</div>					
										<div class="control-group">         
											<button class="btn btn-primary" type="submit" id="enviar"><i class="fa fa-floppy-o"></i> &nbsp; Guardar</button>
										</div>					
								    </form> <!--cierre del formulario !-->									
								 
									 <!-- ================= mensajes de EXITO o de ERROR===========================================================  !-->
									 <div class="alert alert-success mensaje_form" style="display: none" id="mensaje">
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
								</div>
							</div>
						</div>
					</div>
					<div class="panel panel-default">
						<div class="panel-heading" role="tab" id="headingTwo" style="display: none">
						  <h4 class="panel-title">
							<a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
							  Direcci&oacute;n
							</a>
						  </h4>
						</div>

						<div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
							<div class="panel-body">
								<div class="span12">
									
                                    <!--//Apartamento !-->
									<div id="Apartamento" class="toggleable" style="display:none;">
										<form class="form-vertical" id="formApartamento">		
											<div class="control-group"> 				
												Urbanizaci&oacuten, sector, zona, barrio &nbsp;<input name="urbanizacion" type="text" class="span4 required" id="urbanizacion"  placeholder="Urbanización, sector, zona, barrio">          
											</div>
											<div class="control-group">         
												Prefijo direcci&oacute;n &nbsp;
												<select name="prefijoDireccion" name="prefijoDireccion" style="width:auto"> 
												  <option value="0" selected="selected">Seleccione</option>
												  <option value="call" >Calle</option>
												  <option value="aven">Avenida</option>
												  <option value="carr">Carrera</option> 
												  <option value="tera">Carretera</option>
												  <option value="vere">Vereda</option>
												  <option value="tron">Troncal</option>
												  <option value="tran">Transversal</option>
												  <option value="manz">Manzana</option>
												  <option value="rama">Ramal</option> 
												  <option value="ruta">Ruta</option>
												</select>
												Calle ó Av &nbsp;<input name="calle" type="text" class="required" id="calle" size="20" maxlength="20" placeholder="Nombre de la calle" />
												N&uacute;mero &nbsp;<input name="numero" type="text" id="numero" size="4" maxlength="4"  placeholder="N&uacute;mero">  
											</div>			
											<div class="control-group">         
												Edificio &nbsp;<input name="edificio" type="text" class="span4" id="edificio"  placeholder="edificio">
												Piso &nbsp;<input name="piso" type="text" id="piso"  placeholder="piso" size="2" maxlength="2">
												Apto &nbsp;<input name="apartamento" type="text" id="apartamento"  placeholder="apto" size="6" maxlength="6">
											</div>			
											<div class="control-group"> 				
												Punto de referencia &nbsp;<textarea name="referencia" cols="40" rows="2" id="referencia" ></textarea>             				
															
												Latitud &nbsp;<input name="latitud" type="text" id="latitud" maxlength="10" size="10" class="coordenadas">        
															
												Longitud &nbsp;<input name="longitud" type="text" id="longitud" maxlength="10" size="10" class="coordenadas">        
											</div>	
                                       </form> <!--cierre del formulario !-->				
									</div>
                                    <!--//Casa !-->
									<div id="Casa" class="toggleable" style="display:none;">
										<form class="form-vertical" id="formCasa">		
											<div class="control-group"> 				
												Urbanizaci&oacuten, sector, zona, barrio &nbsp;<input name="urbanizacion" type="text" class="span4" id="urbanizacion"  placeholder="Urbanización, sector, zona, barrio">          
											</div>
											<div class="control-group">         
												Prefijo direcci&oacute;n &nbsp;
												<select name="prefijoDireccion" style="width:auto"> 
												  <option value="call" selected="selected">Calle</option>
												  <option value="aven">Avenida</option>
												  <option value="carr">Carrera</option> 
												  <option value="tera">Carretera</option>
												  <option value="vere">Vereda</option>
												  <option value="tron">Troncal</option>
												  <option value="tran">Transversal</option>
												  <option value="manz">Manzana</option>
												  <option value="rama">Ramal</option> 
												  <option value="ruta">Ruta</option>
												</select>
												Calle ó Av &nbsp;<input name="calle" type="text" class="required" id="calle" size="20" maxlength="20" placeholder="Nombre de la calle" />
												N&uacute;mero &nbsp;<input name="numero" type="text" id="numero" size="4" maxlength="4"  placeholder="N&uacute;mero">  
											</div>
											<div class="control-group"> 				
												Punto de referencia &nbsp;<textarea name="referencia" cols="40" rows="2" id="referencia" ></textarea>             				
															
												Latitud &nbsp;<input name="latitud" type="text" id="latitud" maxlength="10" size="10" class="coordenadas">        
															
												Longitud &nbsp;<input name="longitud" type="text" id="longitud" maxlength="10" size="10" class="coordenadas">        
											</div>	
                                             </form> <!--cierre del formulario !-->				
									</div>
                                    <!--//Townhouse !-->
									<div id="Townhouse" class="toggleable" style="display:none;">
										<form class="form-vertical" id="formTownhouse">		
											<div class="control-group"> 				
												Urbanizaci&oacuten, sector, zona, barrio &nbsp;<input name="urbanizacion" type="text" class="span4" id="urbanizacion"  placeholder="Urbanización, sector, zona, barrio">          
											</div>
											<div class="control-group">         
												Prefijo direcci&oacute;n &nbsp;
												<select name="prefijoDireccion" style="width:auto"> 
												  <option value="call" selected="selected">Calle</option>
												  <option value="aven">Avenida</option>
												  <option value="carr">Carrera</option> 
												  <option value="tera">Carretera</option>
												  <option value="vere">Vereda</option>
												  <option value="tron">Troncal</option>
												  <option value="tran">Transversal</option>
												  <option value="manz">Manzana</option>
												  <option value="rama">Ramal</option> 
												  <option value="ruta">Ruta</option>
												</select>
												Calle ó Av &nbsp;<input name="calle" type="text" class="required" id="calle" size="20" maxlength="20" placeholder="Nombre de la calle" />
												N&uacute;mero &nbsp;<input name="numero" type="text" id="numero" size="4" maxlength="4"  placeholder="N&uacute;mero">  
											</div>
											<div class="control-group"> 				
												Punto de referencia &nbsp;<textarea name="referencia" cols="40" rows="2" id="referencia" ></textarea>             				
															
												Latitud &nbsp;<input name="latitud" type="text" id="latitud" maxlength="10" size="10" class="coordenadas">        
															
												Longitud &nbsp;<input name="longitud" type="text" id="longitud" maxlength="10" size="10" class="coordenadas">        
											</div>	
                                             </form> <!--cierre del formulario !-->				
									</div>
                                    <!--//Quinta !-->
									<div id="Quinta" class="toggleable" style="display:none;">
										<form class="form-vertical" id="formQuinta">		
											<div class="control-group"> 				
												Urbanizaci&oacuten, sector, zona, barrio &nbsp;<input name="urbanizacion" type="text" class="span4" id="urbanizacion"  placeholder="Urbanización, sector, zona, barrio">          
											</div>
											<div class="control-group">         
												Prefijo direcci&oacute;n &nbsp;
												<select name="prefijoDireccion" style="width:auto"> 
												  <option value="call" selected="selected">Calle</option>
												  <option value="aven">Avenida</option>
												  <option value="carr">Carrera</option> 
												  <option value="tera">Carretera</option>
												  <option value="vere">Vereda</option>
												  <option value="tron">Troncal</option>
												  <option value="tran">Transversal</option>
												  <option value="manz">Manzana</option>
												  <option value="rama">Ramal</option> 
												  <option value="ruta">Ruta</option>
												</select>
												Calle ó Av &nbsp;<input name="calle" type="text" class="required" id="calle" size="20" maxlength="20" placeholder="Nombre de la calle" />
												N&uacute;mero &nbsp;<input name="numero" type="text" id="numero" size="4" maxlength="4"  placeholder="N&uacute;mero">  
											</div>
											<div class="control-group"> 				
												Punto de referencia &nbsp;<textarea name="referencia" cols="40" rows="2" id="referencia" ></textarea>             				
															
												Latitud &nbsp;<input name="latitud" type="text" id="latitud" maxlength="10" size="10" class="coordenadas">        
															
												Longitud &nbsp;<input name="longitud" type="text" id="longitud" maxlength="10" size="10" class="coordenadas">        
											</div>	
                                             </form> <!--cierre del formulario !-->				
									</div>
                                    <!--//Galpones !-->
									<div id="Galpones" class="toggleable" style="display:none;">
										<form class="form-vertical" id="formGalpones">		
											<div class="control-group"> 				
												Urbanizaci&oacuten, sector, zona, barrio &nbsp;<input name="urbanizacion" type="text" class="span4" id="urbanizacion"  placeholder="Urbanización, sector, zona, barrio">          
											</div>
											<div class="control-group">         
												Prefijo direcci&oacute;n &nbsp;
												<select name="prefijoDireccion" style="width:auto"> 
												  <option value="call" selected="selected">Calle</option>
												  <option value="aven">Avenida</option>
												  <option value="carr">Carrera</option> 
												  <option value="tera">Carretera</option>
												  <option value="vere">Vereda</option>
												  <option value="tron">Troncal</option>
												  <option value="tran">Transversal</option>
												  <option value="manz">Manzana</option>
												  <option value="rama">Ramal</option> 
												  <option value="ruta">Ruta</option>
												</select>
												Calle ó Av &nbsp;<input name="calle" type="text" class="required" id="calle" size="20" maxlength="20" placeholder="Nombre de la calle" />
												N&uacute;mero &nbsp;<input name="numero" type="text" id="numero" size="4" maxlength="4"  placeholder="N&uacute;mero">  
											</div>
											<div class="control-group"> 				
												Punto de referencia &nbsp;<textarea name="referencia" cols="40" rows="2" id="referencia" ></textarea>             				
															
												Latitud &nbsp;<input name="latitud" type="text" id="latitud" maxlength="10" size="10" class="coordenadas">        
															
												Longitud &nbsp;<input name="longitud" type="text" id="longitud" maxlength="10" size="10" class="coordenadas">        
											</div>	
                                             </form> <!--cierre del formulario !-->				
									</div>
                                    <!--//Locales !-->
									<div id="Locales" class="toggleable" style="display:none;">
										<form class="form-vertical" id="formLocales">		
											<div class="control-group"> 				
												Urbanizaci&oacuten, sector, zona, barrio &nbsp;<input name="urbanizacion" type="text" class="span4" id="urbanizacion"  placeholder="Urbanización, sector, zona, barrio">          
											</div>
											<div class="control-group">         
												Prefijo direcci&oacute;n &nbsp;
												<select name="prefijoDireccion" style="width:auto"> 
												  <option value="call" selected="selected">Calle</option>
												  <option value="aven">Avenida</option>
												  <option value="carr">Carrera</option> 
												  <option value="tera">Carretera</option>
												  <option value="vere">Vereda</option>
												  <option value="tron">Troncal</option>
												  <option value="tran">Transversal</option>
												  <option value="manz">Manzana</option>
												  <option value="rama">Ramal</option> 
												  <option value="ruta">Ruta</option>
												</select>
												Calle ó Av &nbsp;<input name="calle" type="text" class="required" id="calle" size="20" maxlength="20" placeholder="Nombre de la calle" />
												N&uacute;mero &nbsp;<input name="numero" type="text" id="numero" size="4" maxlength="4"  placeholder="N&uacute;mero">  
											</div>
											<div class="control-group"> 				
												Punto de referencia &nbsp;<textarea name="referencia" cols="40" rows="2" id="referencia" ></textarea>             				
															
												Latitud &nbsp;<input name="latitud" type="text" id="latitud" maxlength="10" size="10" class="coordenadas">        
															
												Longitud &nbsp;<input name="longitud" type="text" id="longitud" maxlength="10" size="10" class="coordenadas">        
											</div>	
                                             </form> <!--cierre del formulario !-->				
									</div>
                                    <!--//Oficinas !-->
									<div id="Oficinas" class="toggleable" style="display:none;">
										<form class="form-vertical" id="formOficinas">		
											<div class="control-group"> 				
												Urbanizaci&oacuten, sector, zona, barrio &nbsp;<input name="urbanizacion" type="text" class="span4" id="urbanizacion"  placeholder="Urbanización, sector, zona, barrio">          
											</div>
											<div class="control-group">         
												Prefijo direcci&oacute;n &nbsp;
												<select name="prefijoDireccion" style="width:auto"> 
												  <option value="call" selected="selected">Calle</option>
												  <option value="aven">Avenida</option>
												  <option value="carr">Carrera</option> 
												  <option value="tera">Carretera</option>
												  <option value="vere">Vereda</option>
												  <option value="tron">Troncal</option>
												  <option value="tran">Transversal</option>
												  <option value="manz">Manzana</option>
												  <option value="rama">Ramal</option> 
												  <option value="ruta">Ruta</option>
												</select>
												Calle ó Av &nbsp;<input name="calle" type="text" class="required" id="calle" size="20" maxlength="20" placeholder="Nombre de la calle" />
												N&uacute;mero &nbsp;<input name="numero" type="text" id="numero" size="4" maxlength="4"  placeholder="N&uacute;mero">  
											</div>					
											<div class="control-group">         
												Edificio &nbsp;<input name="edificio" type="text" class="span4" id="edificio"  placeholder="edificio">
												Piso &nbsp;<input name="piso" type="text" id="piso"  placeholder="piso" size="2" maxlength="2">
												Apto &nbsp;<input name="apartamento" type="text" id="apartamento"  placeholder="apto" size="6" maxlength="6">
											</div>			
											<div class="control-group"> 				
												Punto de referencia &nbsp;<textarea name="referencia" cols="40" rows="2" id="referencia" ></textarea>             				
															
												Latitud &nbsp;<input name="latitud" type="text" id="latitud" maxlength="10" size="10" class="coordenadas">        
															
												Longitud &nbsp;<input name="longitud" type="text" id="longitud" maxlength="10" size="10" class="coordenadas">        
											</div>	
                                             </form> <!--cierre del formulario !-->				
									</div>
                                    <!--//Terrenos !-->
									<div id="Terrenos" class="toggleable" style="display:none;">
										<form class="form-vertical" id="formTerrenos">		
											<div class="control-group"> 				
												Urbanizaci&oacuten, sector, zona, barrio &nbsp;<input name="urbanizacion" type="text" class="span4" id="urbanizacion"  placeholder="Urbanización, sector, zona, barrio">          
											</div>
											<div class="control-group">         
												Prefijo direcci&oacute;n &nbsp;
												<select name="prefijoDireccion" style="width:auto"> 
												  <option value="call" selected="selected">Calle</option>
												  <option value="aven">Avenida</option>
												  <option value="carr">Carrera</option> 
												  <option value="tera">Carretera</option>
												  <option value="vere">Vereda</option>
												  <option value="tron">Troncal</option>
												  <option value="tran">Transversal</option>
												  <option value="manz">Manzana</option>
												  <option value="rama">Ramal</option> 
												  <option value="ruta">Ruta</option>
												</select>
												Calle ó Av &nbsp;<input name="calle" type="text" class="required" id="calle" size="20" maxlength="20" placeholder="Nombre de la calle" />
												N&uacute;mero &nbsp;<input name="numero" type="text" id="numero" size="4" maxlength="4"  placeholder="N&uacute;mero">  
											</div>
											<div class="control-group"> 				
												Punto de referencia &nbsp;<textarea name="referencia" cols="40" rows="2" id="referencia" ></textarea>             				
															
												Latitud &nbsp;<input name="latitud" type="text" id="latitud" maxlength="10" size="10" class="coordenadas">        
															
												Longitud &nbsp;<input name="longitud" type="text" id="longitud" maxlength="10" size="10" class="coordenadas">        
											</div>		                                            
									</div>
									
										<div class="control-group">
											<?php //JCombo::ver_estados(); ?>
											<!--span id="ciudadesCombo"> </span!-->				
										</div>
										<div class="control-group">         
											<button class="btn btn-primary" type="submit" id="enviar"><i class="fa fa-floppy-o"></i> &nbsp; Guardar</button>
										</div>
									</form> <!--cierre del formulario !-->
                                    <!-- ================= mensajes de EXITO o de ERROR===========================================================  !-->
                                     <div class="alert alert-danger mensaje_form" style="display: none" id="error3">
										<button data-dismiss="alert" class="close" type="button">x</button>
										<strong>MENSAJE!</strong> <span class="textmensaje">Debe elegir una urbanización, sector, zona o barrio.</span>
									 </div>
									<div>&nbsp;</div>
								</div> <!-- fin "span12" !-->
							</div> <!-- fin "panel-body" !-->
						</div> <!-- fin "collapseTwo" !-->
					</div> <!-- fin "panel panel-default" !-->
					<div class="panel panel-default">
						<div class="panel-heading" role="tab" id="headingThree" style="display: none">
						  <h4 class="panel-title">
							<a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
							  Descripci&oacute;n
							</a>
						  </h4>
						</div>
						<div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
							<div class="panel-body">
								<div class="span12">
									<form class="form-vertical" id="formDescripcion">
										<div class="control-group">         
											Estado del inmueble &nbsp;<select name="estadoInmueble" style="width:auto"> 
												<option value="nuev">Nuevo</option>
												<option value="usad" selected="selected">Usado</option>
												<option value="gris">Obra gris</option> 				 
																</select>    
														
											Edad &nbsp;<input name="edad" type="text" id="edad" size="4" maxlength="2"  placeholder="Edad" class="required años">    
														
											Año de construcción &nbsp;<input name="anoCostruccion" type="text" id="datepicker" maxlength="10" size="10">          
										</div>
										<div class="control-group"> 				
											m<sup>2</sup> &nbsp;<input name="metros" type="text" id="metros" maxlength="3" size="3" class="required metraje">        
												 
											Estilo &nbsp;<select name="estiloInmueble" style="width:auto"> 
												<option value="1niv" selected="selected">1 nivel</option>
																  <option value="varn">varios niveles</option>
																  <option value="plan">PB</option> 		
																  <option value="penth">Penthouse</option> 				 
																</select>    
										</div>
										<div class="control-group"> 				
											Habitaciones &nbsp;<input name="habitaciones" type="text" id="habitaciones" maxlength="1" size="1" class="required cuartos">        
														
											Baños &nbsp;<input name="banos" type="text" id="banos" maxlength="1" size="1" class="required cuartos">        
										</div>
										<div class="control-group"> 				
											Medios baños &nbsp;<input name="medioBano" type="text" id="medioBano" maxlength="1" size="1" class="required cuartos" value="0">        
														
											Habitaci&oacute;n de servicio &nbsp;<select name="habServicio" style="width:auto"> 
																  <option value="SeSi" >Si</option>
																  <option value="SeNo" selected="selected">No</option>                                      
																</select>        
														
											Baño de servicio &nbsp;<select name="banServicio" style="width:auto"> 
																  <option value="BaSi" >Si</option>
																  <option value="BaNo" selected="selected">No</option>                                      
																</select>        
										</div>
										<div class="control-group"> 				
											Estacionamiento &nbsp;<select name="estacionamiento" style="width:auto"> 
																  <option value="esTechado" >Techado</option>
																  <option value="esDescubierto" selected="selected">Descubierto</option>     
																  <option value="esSin" >Sin estacionamiento</option>                                 
																</select>        
													
											# de Puestos &nbsp;<input name="puestos" type="text" class="required cuartos" id="puestos" value="0" size="1" maxlength="1">        
										</div>
										<div class="control-group"> 				
											Descripci&oacute;n   &nbsp;<textarea name="descripcion" cols="40" rows="6" class="required" id="descripcion" ></textarea>   
											Observaciones   &nbsp;<textarea name="observaciones" cols="40" rows="6" id="observaciones" ></textarea>                      
										</div>
										<div class="control-group"> 				
											Instrucciones &nbsp;<select name="instrucciones" style="width:auto"> 
																  <option value="ante" selected="selected">Llamar antes</option>
																  <option value="inmo" >Llamar a inmobiliaria</option>     
																  <option value="vigi" >Llaves en vigilancia</option>   
																  <option value="cons" >Llaves en conserjeria</option>   
																</select>        
										</div>
										<div class="control-group"> 				
											Referido por &nbsp;<select name="instrucciones" style="width:auto"> 
																  <option value="ante" >Particular</option>
																  <option value="inmo" >Website</option>     
																  <option value="vigi" >Corredor inmobiliario</option>   
																  <option value="ning" selected="selected">Ninguno</option>   
																</select>        
										</div>
										<div class="control-group">         
											Publicar Desde &nbsp;<input name="desde" type="text" id="Desdedatepicker" maxlength="10" size="10">          
											  
											Publicar Hasta &nbsp;<input name="hasta" type="text" id="Hastadatepicker" maxlength="10" size="10">     
								 
										</div>
										<div class="control-group"> 				
											Precio &nbsp;<input name="precio" type="text" id="precio" maxlength="11" size="11" class="required"> 
											Operación &nbsp;<select name="operacion" style="width:auto"> 
																  <option value="vent" selected="selected">Venta</option>
																  <option value="alqu" >Alquiler</option>                                           
																</select>    
											Moneda &nbsp;<select name="moneda" style="width:auto"> 
											  <option value="boli" >Bolivares fuertes</option>
											  <option value="dola" >Dolares</option>                                           
											</select>           						
										</div>
										<div class="control-group"> 				 
											Comisión &nbsp;<select name="comision" style="width:auto"> 
																  <option value="tres" >3%</option>
																  <option value="cuat" >4%</option>
																  <option value="cinc" selected="selected">5%</option>                                           
																</select>  
											
										</div>
										<div class="control-group"> 
											Propietario &nbsp;
													   <input name="propietario" type="text" id="propietario" maxlength="50" size="50" placeholder="Nombre del propietario" class="required">
											Teléfono &nbsp;<input name="telefono" type="text" id="telefono" size="15" maxlength="15"  placeholder="teléfono" class="required tlf">  
											Correo &nbsp;<input name="correo" type="text" id="correo" size="15" maxlength="15"  placeholder="correo" class="required email">  
										</div>
										<div class="control-group">         
											<button class="btn btn-primary" type="submit" id="enviar"><i class="fa fa-floppy-o"></i> &nbsp; Guardar</button>                
										</div>
									</form> <!--cierre del formulario !-->
									 <!-- ================= boton SIGUIENTE  =====================================================================  !-->
									 <div class="control-group" style="display: none" id="siguiente">    
										<button class="btn btn-primary" type="botton" onClick="window.location='<?php echo SERVER ?>registrarDr2Foto.php'">Siguiente</button>
									 </div>
								 
									 <!-- ================= mensajes de EXITO o de ERROR===========================================================  !-->
									 <div class="alert alert-success mensaje_form" style="display: none" id="mensaje">
										<button data-dismiss="alert" class="close" type="button">x</button>
										<strong>MENSAJE!</strong> <span class="textmensaje">Registro exitoso</span>          
									 </div>    
									  
									 <div class="alert alert-danger mensaje_form" style="display: none" id="error1">
										<button data-dismiss="alert" class="close" type="button">x</button>
										<strong>MENSAJE!</strong> <span class="textmensaje">El password debe ser mayor de 6 caracteres</span>
									 </div> 
									 
									 <div class="alert alert-danger mensaje_form" style="display: none" id="error2">
										<button data-dismiss="alert" class="close" type="button">x</button>
										<strong>MENSAJE!</strong> <span class="textmensaje">El doctor ya está registrado</span>
									 </div>
									 
									 <div class="alert alert-danger mensaje_form" style="display: none" id="error3">
										<button data-dismiss="alert" class="close" type="button">x</button>
										<strong>MENSAJE!</strong> <span class="textmensaje">Ese código promocional ya fue utilizado 10 veces</span>
									 </div>
									 
									 <div class="alert alert-danger mensaje_form" style="display: none" id="error4">
										<button data-dismiss="alert" class="close" type="button">x</button>
										<strong>MENSAJE!</strong> <span class="textmensaje">Código promocional no encontrado</span>
									 </div>
								</div>
							</div>
						</div>
					</div>				  
						<!------------------------------Detalles      --------------------!-->
						<div class="panel panel-default">
								<div class="panel-heading" role="tab" id="headingFour" style="display: none">
								  <h4 class="panel-title">
									<a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
									  Detalles
									</a>
								  </h4>
								</div>
								<div id="collapseFour" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFour">
									<div class="container-fluid">
										<div class="row">
											<div class="col-md-12">
												<div class="tabbable" id="tabs-990449">
													<ul class="nav nav-tabs">
														<li class="active">
															<a href="#panel-propietario" data-toggle="tab">Documentos propietario</a>
														</li>
														<li>
															<a href="#panel-juridica" data-toggle="tab">Documentos persona juridica</a>
														</li>
														<li>
															<a href="#panel-inmueble" data-toggle="tab">Detalles del inmueble</a>
														</li>
														<li>
															<a href="#panel-mostrar" data-toggle="tab">Info para mostrar</a>
														</li>
														<li>
															<a href="#panel-artefactos" data-toggle="tab">Artefactos</a>
														</li>
														<li>
															<a href="#panel-miscelaneos" data-toggle="tab">Miscelaneos</a>
														</li>
														<li>
															<a href="#panel-construccion" data-toggle="tab">Construcción</a>
														</li>
														<li>
															<a href="#panel-dispositivos" data-toggle="tab">Dispositivos</a>
														</li>
													</ul>
													<div class="tab-content">
														<div class="tab-pane active" id="panel-propietario">
															<p>
															<div class="row">
																<div class="col-md-6">
																	<div class="panel-body">
																		<div class="span6">                                        
																			<form class="form-vertical" id="formPropietario">
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
																				<table width="400">
																					  <tr>
																						<td><label>
																						  <input type="radio" name="tipoPersona" value="natural" id="tipoPersona_0" />
																						  Persona Natural</label></td>
																					  
																						<td><label>
																						  <input type="radio" name="tipoPersona" value="juridica" id="tipoPersona_1" />
																						  Persona Juridica</label></td>
																					  </tr>
																				</table>
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
																							<option value="viviendaNoRegistrada">No registrada</option>
																							<option value="viviendaRegistrada">Registrada</option> 				 
																						</select>   
																				</div>
																				<div class="control-group"> 				
																					Poder &nbsp;
																						<select id="poder" name="poder" style="width:auto"> 
																							<option value="0">Seleccione</option>
																							<option value="poderNoRegistrado">No registrado</option>
																							<option value="poderRegistrado">Registrado</option> 				 
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
																					<input type="checkbox" name="planos" id="planos" /> Planos &nbsp;											   
																				</div>
																				<div class="control-group"> 				
																					Forma de pago &nbsp;
																						<select id="formaDePago" name="formaDePago" style="width:auto"> 
																							<option value="0">Seleccione</option>
																							<option value="financiamiento">Acepta Financiamiento</option>
																							<option value="contado">Contado</option> 				 
																						</select>                      
																				</div>
																				<div class="control-group"> 				
																					<div id="viudo" class="toggleable" style="display:none;">
																						<table>
																						<tr>
																							<td>
																							<input name="cedulaHerederos" type="checkbox" value="cedulaHerederos" />&nbsp;
																							 Cédula de propietario fallecido y herederos &nbsp;                        
																							</td>
																						</tr>
																						<tr>
																							<td>
																							<input name="solvenciaSucesoral" type="checkbox" value="solvenciaSucesoral" />&nbsp;
																							Solvencia sucesoral &nbsp;                        
																							</td>
																						</tr> 
																						<tr>
																							<td>
																							<input name="rifSucesion" type="checkbox" value="rifSucesion" />&nbsp;
																							Rif Sucesión &nbsp;                        
																							</td>
																						</tr>
																						<tr>
																							<td>
																							<input name="declaracionSucesoral" type="checkbox" value="declaracionSucesoral" />&nbsp;
																							Declaración  Sucesoral  &nbsp;                        
																							</td>
																						</tr>
																						</table>
																					</div> 
																				</div>  
																		</div>      
																		<div class="span6">   
																			<div class="control-group">         
																				Fecha de Nacimiento &nbsp;<input name="nacimiento" type="text" id="nacimientoDatepicker" maxlength="10" size="10">    
																			</div>
																			<div class="control-group">         
																				Rif &nbsp;<input name="rif" type="text" class="span4" id="rif" placeholder="Rif" value="<?php echo $_SESSION['rif'] ?>" style="width:auto">
																			</div>
																			<div class="control-group">         
																				Cédula de Identidad &nbsp;
																					<select id="cedula" name="cedula" style="width:auto"> 
																						<option value="0">Seleccione</option>
																						<option value="cambioEstadoCivil">Cambio de estado civil</option>
																						<option value="vigente">Vigente</option> 				 
																					</select>  
																			</div>
																			<div class="control-group">         
																				Ficha catastral &nbsp;
																					<select id="fichaCatastral" name="fichaCatastral" style="width:auto"> 
																						<option value="0">Seleccione</option>
																						<option value="fichaVigente">Vigente</option>
																						<option value="fichaVencida">Vencida</option> 				 
																					</select>  
																			</div>
																			<div class="control-group">         
																				Solvencia derecho de frente &nbsp;
																					<select id="derechoFrente" name="derechoFrente" style="width:auto"> 
																						<option value="0">Seleccione</option>
																						<option value="derechoFrenteVigente">Vigente</option>
																						<option value="derechoFrenteVencida">Vencida</option> 				 
																					</select>  
																			</div>
																			<div class="control-group">         
																				Hipoteca &nbsp;
																					<select id="hipoteca" name="hipoteca" style="width:auto"> 
																						<option value="0">Seleccione</option>
																						<option value="sinHipoteca">Sin hipoteca</option> 		
																						<option value="hipotecaNoRegistrada">Doc notariado no registrado</option>
																						<option value="hipotecaLPH">LPH a partir del 2005</option> 	
																						<option value="hipotecaPagada">Pagada registrada</option>                        		 
																					</select>  
																			</div>
																			<div class="control-group"> 
																				<input type="checkbox" name="tituloSupletorio" id="tituloSupletorio" /> Título Supletorio &nbsp;												
																			</div>
																			<div class="control-group"> 
																				<input type="checkbox" name="documentoCondominio" id="documentoCondominio" /> Documento Condominio &nbsp;												
																			</div>
																		</div>      
																		<div class="span12"> 
																			<div class="control-group">         
																				<button class="btn btn-primary" type="submit" id="enviar"><i class="fa fa-floppy-o"></i> &nbsp; Guardar</button>                
																			</div>
																			</form> <!--cierre del formulario !-->
																		  &nbsp;          
																		</div>
																		 <!-- ================= boton SIGUIENTE  =====================================================================  !-->
																		 <div class="control-group" style="display: none" id="siguiente">    
																			<button class="btn btn-primary" type="botton" onClick="window.location='<?php echo SERVER ?>registrarDr2Foto.php'">Siguiente</button>
																		 </div>
																	 
																		 <!-- ================= mensajes de EXITO o de ERROR===========================================================  !-->
																		 <div class="alert alert-success mensaje_form" style="display: none" id="mensaje">
																			<button data-dismiss="alert" class="close" type="button">x</button>
																			<strong>MENSAJE!</strong> <span class="textmensaje">Registro exitoso</span>          
																		 </div>    
																		  
																		 <div class="alert alert-danger mensaje_form" style="display: none" id="error1">
																			<button data-dismiss="alert" class="close" type="button">x</button>
																			<strong>MENSAJE!</strong> <span class="textmensaje">El password debe ser mayor de 6 caracteres</span>
																		 </div> 
																		 
																		 <div class="alert alert-danger mensaje_form" style="display: none" id="error2">
																			<button data-dismiss="alert" class="close" type="button">x</button>
																			<strong>MENSAJE!</strong> <span class="textmensaje">El doctor ya está registrado</span>
																		 </div>
																		 
																		 <div class="alert alert-danger mensaje_form" style="display: none" id="error3">
																			<button data-dismiss="alert" class="close" type="button">x</button>
																			<strong>MENSAJE!</strong> <span class="textmensaje">Ese código promocional ya fue utilizado 10 veces</span>
																		 </div>
																		 
																		 <div class="alert alert-danger mensaje_form" style="display: none" id="error4">
																			<button data-dismiss="alert" class="close" type="button">x</button>
																			<strong>MENSAJE!</strong> <span class="textmensaje">Código promocional no encontrado</span>
																		 </div>  
																	</div>					
																</div>
															</div>
															</p>
														</div>
														<div class="tab-pane" id="panel-juridica">
															<p>
																<div class="row">
																<div class="col-md-6">
																	<div class="panel-body">
																		<div class="span6">                                        
																			<form class="form-vertical" id="formJuridica">
																			   <div class="control-group">         
																					<input type="checkbox" name="actaConstitutiva" id="actaConstitutiva" /> Acta Constitutiva &nbsp;												   
																			   </div>
																			   <div class="control-group">        
																					<input type="checkbox" name="solvenciaIVSS" id="solvenciaIVSS" /> Solvencia IVSS &nbsp;												
																			   </div>  									
																		</div>      
																		<div class="span6">   
																			<div class="control-group">        
																					<input type="checkbox" name="actualizacionJunta" id="actualizacionJunta" /> Actualización Junta Directiva &nbsp;												
																			</div>
																		</div>      
																		<div class="span12"> 
																			<div class="control-group">         
																				<button class="btn btn-primary" type="submit" id="enviar"><i class="fa fa-floppy-o"></i> &nbsp; Guardar</button>                
																			</div>
																			</form> <!--cierre del formulario !-->
																		  &nbsp;          
																		</div>
																		 <!-- ================= boton SIGUIENTE  =====================================================================  !-->
																		 <div class="control-group" style="display: none" id="siguiente">    
																			<button class="btn btn-primary" type="botton" onClick="window.location='<?php echo SERVER ?>registrarDr2Foto.php'">Siguiente</button>
																		 </div>
																	 
																		 <!-- ================= mensajes de EXITO o de ERROR===========================================================  !-->
																		 <div class="alert alert-success mensaje_form" style="display: none" id="mensaje">
																			<button data-dismiss="alert" class="close" type="button">x</button>
																			<strong>MENSAJE!</strong> <span class="textmensaje">Registro exitoso</span>          
																		 </div>    
																		  
																		 <div class="alert alert-danger mensaje_form" style="display: none" id="error1">
																			<button data-dismiss="alert" class="close" type="button">x</button>
																			<strong>MENSAJE!</strong> <span class="textmensaje">El password debe ser mayor de 6 caracteres</span>
																		 </div> 
																		 
																		 <div class="alert alert-danger mensaje_form" style="display: none" id="error2">
																			<button data-dismiss="alert" class="close" type="button">x</button>
																			<strong>MENSAJE!</strong> <span class="textmensaje">El doctor ya está registrado</span>
																		 </div>
																		 
																		 <div class="alert alert-danger mensaje_form" style="display: none" id="error3">
																			<button data-dismiss="alert" class="close" type="button">x</button>
																			<strong>MENSAJE!</strong> <span class="textmensaje">Ese código promocional ya fue utilizado 10 veces</span>
																		 </div>
																		 
																		 <div class="alert alert-danger mensaje_form" style="display: none" id="error4">
																			<button data-dismiss="alert" class="close" type="button">x</button>
																			<strong>MENSAJE!</strong> <span class="textmensaje">Código promocional no encontrado</span>
																		 </div>  
																	</div>					
																</div>
															</div>
															</p>
														</div>
														<div class="tab-pane" id="panel-inmueble">
															<p>
																<div class="row">
																<div class="col-md-6">
																	<div class="panel-body">
																		<div class="span6">                                        
																			<form class="form-vertical" id="formInmueble">
																			   <div class="control-group">         
																					<input type="checkbox" name="cercado" id="cercado" /> Cercado &nbsp;												   
																			   </div>
																			   <div class="control-group">        
																					Altura del Inmueble &nbsp;
																					<select id="altura" name="altura" style="width:auto"> 
																						<option value="0">Seleccione</option>
																						<option value="alturaAlta">Piso Alto</option>
																						<option value="alturaMedia">Piso Medio</option>
																						<option value="alturaBaja">Piso Bajo</option>													
																					</select>  
																			   </div>  		
																			   <div class="control-group">        
																					<input type="checkbox" name="comedor" id="comedor" /> Comedor de Cocina &nbsp;												  
																			   </div>	
																			   <div class="control-group">        
																					<input type="checkbox" name="servicio" id="servicio" /> Dormitorio de servicio &nbsp;												  
																			   </div>
																			   <div class="control-group">        
																					<input type="checkbox" name="fuenteAgua" id="fuenteAgua" /> Fuente de agua &nbsp;												 
																			   </div>
																			   Muebles &nbsp;											  
																				<select id="muebles" name="muebles" style="width:auto"> 
																							<option value="0">Seleccione</option>
																							<option value="mueblesSi">Si</option> 		
																							<option value="mueblesNo">No</option>
																							<option value="mueblesParcial">Pacialmente</option> 															
																				</select> 
																			   <div class="control-group">        
																					<input type="checkbox" name="patio" id="patio" /> Patio &nbsp;												 
																			   </div>
																			   Calle &nbsp;											  
																				<select id="detalleCalle" name="detalleCalle" style="width:auto"> 
																							<option value="0">Seleccione</option>
																							<option value="calleCerrada">Cerrada con vigilancia</option>
																							<option value="calleCiega">Calle ciega</option> 																
																							<option value="callePublica">Pública</option> 															
																				</select> 
																			   <div class="control-group">        
																					<input type="checkbox" name="vigilancia" id="vigilancia" /> Vigilancia Privada &nbsp;												 
																			   </div>
																			   <div class="control-group">        
																					<input type="checkbox" name="canchaTenis" id="canchaTenis" /> Cancha de Tenis &nbsp;												 
																			   </div>
																			   <div class="control-group">        
																					<input type="checkbox" name="gimnasio" id="gimnasio" /> Gimnasio &nbsp;												 
																			   </div>
																			   <div class="control-group">        
																					<input type="checkbox" name="maletero" id="maletero" /> Maletero &nbsp;												 
																			   </div>
																			   <div class="control-group">        
																					<input type="checkbox" name="salonFiesta" id="salonFiesta" /> Salón de Fiesta &nbsp;												 
																			   </div>
																			   <div class="control-group">        
																					<input type="checkbox" name="enEsquina" id="enEsquina" /> Ubicada en Esquina &nbsp;												 
																			   </div>
																		</div>      
																		<div class="span6">   										
																			<div class="control-group">        
																				<input type="checkbox" name="cocina" id="cocina" /> Cocina &nbsp;											 
																			</div>
																			<div class="control-group">        
																				<input type="checkbox" name="jacuzzi" id="jacuzzi" /> Jacuzzi &nbsp;											  
																			</div>
																			<div class="control-group">        
																				<input type="checkbox" name="parque" id="parque" /> Parque infantil &nbsp;											 
																			</div>
																			<div class="control-group">        
																				<input type="checkbox" name="piscina" id="piscina" /> Piscina &nbsp;											 
																			</div>
																			<div class="control-group">        
																				<input type="checkbox" name="telefono" id="telefono" /> Teléfono &nbsp;											  
																			</div>
																			<div class="control-group">        
																				<input type="checkbox" name="variostelefonos" id="variostelefonos" /> Varias líneas de teléfono &nbsp;											  
																			</div>
																			<div class="control-group">        
																				<input type="checkbox" name="chimenea" id="chimenea" /> chimenea &nbsp;											  
																			</div>
																			Terraza &nbsp;											  
																			<select id="terraza" name="terraza" style="width:auto"> 
																						<option value="0">Seleccione</option>
																						<option value="terrazaBalcon">Balcón</option> 		
																						<option value="terrazaCubierta">Cubierta</option>
																						<option value="terrazaCubiertaDescubierta">Cubierta / Descubierta</option> 	
																						<option value="terrazaDescubierta">Descubierta</option>                        		 
																			</select> 
																			<div class="control-group">        
																				<input type="checkbox" name="bar" id="bar" /> Bar &nbsp;											  
																			</div>
																			<div class="control-group">        
																				<input type="checkbox" name="estudio" id="estudio" /> Estudio &nbsp;											  
																			</div>
																			<div class="control-group">        
																				<input type="checkbox" name="jardin" id="jardin" /> Jardín &nbsp;											  
																			</div>
																			<div class="control-group">        
																				<input type="checkbox" name="muelle" id="muelle" /> Muelle propio &nbsp;											  
																			</div>
																			<div class="control-group">        
																				<input type="checkbox" name="parrillera" id="parrillera" /> Parrillera &nbsp;											  
																			</div>
																			<div class="control-group">        
																				<input type="checkbox" name="sauna" id="sauna" /> Sauna &nbsp;											  
																			</div>
																			<div class="control-group">        
																				<input type="checkbox" name="vistaCiudad" id="vistaCiudad" /> Vista a la ciudad &nbsp;											  
																			</div>
																			<div class="control-group">        
																				<input type="checkbox" name="vistaPanoramica" id="vistaPanoramica" /> Vista panorámica &nbsp;											  
																			</div>
																			<div class="control-group">        
																				<input type="checkbox" name="vistaLago" id="vistaLago" /> Vista al lago &nbsp;												 
																			</div>
																			<div class="control-group">        
																				<input type="checkbox" name="frenteAlMar" id="frenteAlMar" /> Frente al mar &nbsp;												 
																			</div>
																		</div>      
																		<div class="span12"> 
																			<div class="control-group">         
																				<button class="btn btn-primary" type="submit" id="enviar"><i class="fa fa-floppy-o"></i> &nbsp; Guardar</button>                
																			</div>
																			</form> <!--cierre del formulario !-->
																		  &nbsp;          
																		</div>
																		 <!-- ================= boton SIGUIENTE  =====================================================================  !-->
																		 <div class="control-group" style="display: none" id="siguiente">    
																			<button class="btn btn-primary" type="botton" onClick="window.location='<?php echo SERVER ?>registrarDr2Foto.php'">Siguiente</button>
																		 </div>
																	 
																		 <!-- ================= mensajes de EXITO o de ERROR===========================================================  !-->
																		 <div class="alert alert-success mensaje_form" style="display: none" id="mensaje">
																			<button data-dismiss="alert" class="close" type="button">x</button>
																			<strong>MENSAJE!</strong> <span class="textmensaje">Registro exitoso</span>          
																		 </div>    
																		  
																		 <div class="alert alert-danger mensaje_form" style="display: none" id="error1">
																			<button data-dismiss="alert" class="close" type="button">x</button>
																			<strong>MENSAJE!</strong> <span class="textmensaje">El password debe ser mayor de 6 caracteres</span>
																		 </div> 
																		 
																		 <div class="alert alert-danger mensaje_form" style="display: none" id="error2">
																			<button data-dismiss="alert" class="close" type="button">x</button>
																			<strong>MENSAJE!</strong> <span class="textmensaje">El doctor ya está registrado</span>
																		 </div>
																		 
																		 <div class="alert alert-danger mensaje_form" style="display: none" id="error3">
																			<button data-dismiss="alert" class="close" type="button">x</button>
																			<strong>MENSAJE!</strong> <span class="textmensaje">Ese código promocional ya fue utilizado 10 veces</span>
																		 </div>
																		 
																		 <div class="alert alert-danger mensaje_form" style="display: none" id="error4">
																			<button data-dismiss="alert" class="close" type="button">x</button>
																			<strong>MENSAJE!</strong> <span class="textmensaje">Código promocional no encontrado</span>
																		 </div>  
																	</div>					
																</div>
															</div>
															</p>
														</div>
														<div class="tab-pane" id="panel-mostrar">
															<p>
																<div class="row">
																<div class="col-md-6">
																	<div class="panel-body">
																		<div class="span6">                                        
																			<form class="form-vertical" id="formMostrar">
																			   <div class="control-group">         
																					<input type="checkbox" name="llamarInquilino" id="llamarInquilino" /> Llamar inquilino &nbsp;												   
																			   </div>
																			   <div class="control-group">         
																					<input type="checkbox" name="llamarPropietario" id="llamarPropietario" /> Llamar propietario &nbsp;												   
																			   </div>
																			   <div class="control-group">         
																					<input type="checkbox" name="llamarPromotor" id="llamarPromotor" /> Promotor captador &nbsp;												   
																			   </div>										   
																		</div>      
																		<div class="span6">   										
																			<div class="control-group">         
																					<input type="checkbox" name="llamarOficCaptadora" id="llamarOficCaptadora" /> Llamar oficina captadora &nbsp;												   
																			</div>
																			<div class="control-group">         
																					<input type="checkbox" name="llaveOficCaptadora" id="llaveOficCaptadora" /> Llave oficina captadora &nbsp;												   
																			</div>
																			<div class="control-group">         
																					<input type="checkbox" name="soloCita" id="soloCita" /> Solo cita previa &nbsp;												   
																			</div>
																		</div>      
																		<div class="span12"> 
																			<div class="control-group">         
																				<button class="btn btn-primary" type="submit" id="enviar"><i class="fa fa-floppy-o"></i> &nbsp; Guardar</button>                
																			</div>
																			</form> <!--cierre del formulario !-->
																		  &nbsp;          
																		</div>
																		 <!-- ================= boton SIGUIENTE  =====================================================================  !-->
																		 <div class="control-group" style="display: none" id="siguiente">    
																			<button class="btn btn-primary" type="botton" onClick="window.location='<?php echo SERVER ?>registrarDr2Foto.php'">Siguiente</button>
																		 </div>
																	 
																		 <!-- ================= mensajes de EXITO o de ERROR===========================================================  !-->
																		 <div class="alert alert-success mensaje_form" style="display: none" id="mensaje">
																			<button data-dismiss="alert" class="close" type="button">x</button>
																			<strong>MENSAJE!</strong> <span class="textmensaje">Registro exitoso</span>          
																		 </div>    
																		  
																		 <div class="alert alert-danger mensaje_form" style="display: none" id="error1">
																			<button data-dismiss="alert" class="close" type="button">x</button>
																			<strong>MENSAJE!</strong> <span class="textmensaje">El password debe ser mayor de 6 caracteres</span>
																		 </div> 
																		 
																		 <div class="alert alert-danger mensaje_form" style="display: none" id="error2">
																			<button data-dismiss="alert" class="close" type="button">x</button>
																			<strong>MENSAJE!</strong> <span class="textmensaje">El doctor ya está registrado</span>
																		 </div>
																		 
																		 <div class="alert alert-danger mensaje_form" style="display: none" id="error3">
																			<button data-dismiss="alert" class="close" type="button">x</button>
																			<strong>MENSAJE!</strong> <span class="textmensaje">Ese código promocional ya fue utilizado 10 veces</span>
																		 </div>
																		 
																		 <div class="alert alert-danger mensaje_form" style="display: none" id="error4">
																			<button data-dismiss="alert" class="close" type="button">x</button>
																			<strong>MENSAJE!</strong> <span class="textmensaje">Código promocional no encontrado</span>
																		 </div>  
																	</div>					
																</div>
															</div>
															</p>
														</div>
														<div class="tab-pane" id="panel-artefactos">
															<p>
																<div class="row">
																<div class="col-md-6">
																	<div class="panel-body">
																		<div class="span6">                                        
																			<form class="form-vertical" id="formArtefactos">										
																			Cocina &nbsp;											  
																				<select id="estufa" name="estufa" style="width:auto"> 
																							<option value="0">Seleccione</option>
																							<option value="estufaElectrica">Electrica</option> 		
																							<option value="estufaGas">Gas</option>
																							<option value="estufaNinguna">Ninguna</option> 														
																				</select> 
																			<div class="control-group">         
																					<input type="checkbox" name="nevera" id="nevera" /> Nevera &nbsp;												   
																			</div>
																			<div class="control-group">         
																					<input type="checkbox" name="microOndas" id="microOndas" /> Horno micro ondas &nbsp;												   
																			</div>
																				Horno de pared &nbsp;											  
																			<select id="hornoPared" name="hornoPared" style="width:auto"> 
																						<option value="0">Seleccione</option>
																						<option value="hornoElectrico">Electrico</option> 		
																						<option value="hornoGas">Gas</option>
																						<option value="estufaNinguna">Ninguno</option> 														
																			</select>																		    																					
																		</div>      
																		<div class="span6">  
																			<div class="control-group">         
																				<input type="checkbox" name="lavaplatos" id="lavaplatos" /> Lavaplatos &nbsp;												   
																			</div>
																			<div class="control-group">         
																				<input type="checkbox" name="lavadora" id="lavadora" /> Lavadora &nbsp;												   
																			</div>
																			<div class="control-group">         
																				<input type="checkbox" name="secadora" id="secadora" /> Secadora &nbsp;												   
																			</div>										
																			<div class="control-group">         
																				<input type="checkbox" name="bomba" id="bomba" /> Bomba de agua &nbsp;												   
																			</div>										
																		</div>      
																		<div class="span12"> 
																			<div class="control-group">         
																				<button class="btn btn-primary" type="submit" id="enviar"><i class="fa fa-floppy-o"></i> &nbsp; Guardar</button>                
																			</div>
																			</form> <!--cierre del formulario !-->
																		  &nbsp;          
																		</div>
																		 <!-- ================= boton SIGUIENTE  =====================================================================  !-->
																		 <div class="control-group" style="display: none" id="siguiente">    
																			<button class="btn btn-primary" type="botton" onClick="window.location='<?php echo SERVER ?>registrarDr2Foto.php'">Siguiente</button>
																		 </div>
																	 
																		 <!-- ================= mensajes de EXITO o de ERROR===========================================================  !-->
																		 <div class="alert alert-success mensaje_form" style="display: none" id="mensaje">
																			<button data-dismiss="alert" class="close" type="button">x</button>
																			<strong>MENSAJE!</strong> <span class="textmensaje">Registro exitoso</span>          
																		 </div>    
																		  
																		 <div class="alert alert-danger mensaje_form" style="display: none" id="error1">
																			<button data-dismiss="alert" class="close" type="button">x</button>
																			<strong>MENSAJE!</strong> <span class="textmensaje">El password debe ser mayor de 6 caracteres</span>
																		 </div> 
																		 
																		 <div class="alert alert-danger mensaje_form" style="display: none" id="error2">
																			<button data-dismiss="alert" class="close" type="button">x</button>
																			<strong>MENSAJE!</strong> <span class="textmensaje">El doctor ya está registrado</span>
																		 </div>
																		 
																		 <div class="alert alert-danger mensaje_form" style="display: none" id="error3">
																			<button data-dismiss="alert" class="close" type="button">x</button>
																			<strong>MENSAJE!</strong> <span class="textmensaje">Ese código promocional ya fue utilizado 10 veces</span>
																		 </div>
																		 
																		 <div class="alert alert-danger mensaje_form" style="display: none" id="error4">
																			<button data-dismiss="alert" class="close" type="button">x</button>
																			<strong>MENSAJE!</strong> <span class="textmensaje">Código promocional no encontrado</span>
																		 </div>  
																	</div>					
																</div>
															</div>
															</p>
														</div>
														<div class="tab-pane" id="panel-miscelaneos">
															<p>
																<div class="row">
																<div class="col-md-6">
																	<div class="panel-body">
																		<div class="span6">                                        
																			<form class="form-vertical" id="formMiscelaneos">																				
																			<div class="control-group">         
																					<input type="checkbox" name="cartel" id="cartel" /> Cartel &nbsp;												   
																			</div>
																			<div class="control-group">         
																					<input type="checkbox" name="exclusiva" id="exclusiva" /> Exclusiva &nbsp;
																			</div>																													    																					
																		</div>
																		<div class="span6">  
																			<div class="control-group">         
																					<input type="checkbox" name="aceptaCambio" id="aceptaCambio" /> Acepta cambio &nbsp;
																			</div>																		
																		</div>      
																		<div class="span12"> 
																			<div class="control-group">         
																				<button class="btn btn-primary" type="submit" id="enviar"><i class="fa fa-floppy-o"></i> &nbsp; Guardar</button>                
																			</div>
																			</form> <!--cierre del formulario !-->
																		  &nbsp;          
																		</div>
																		 <!-- ================= boton SIGUIENTE  =====================================================================  !-->
																		 <div class="control-group" style="display: none" id="siguiente">    
																			<button class="btn btn-primary" type="botton" onClick="window.location='<?php echo SERVER ?>registrarDr2Foto.php'">Siguiente</button>
																		 </div>
																	 
																		 <!-- ================= mensajes de EXITO o de ERROR===========================================================  !-->
																		 <div class="alert alert-success mensaje_form" style="display: none" id="mensaje">
																			<button data-dismiss="alert" class="close" type="button">x</button>
																			<strong>MENSAJE!</strong> <span class="textmensaje">Registro exitoso</span>          
																		 </div>    
																		  
																		 <div class="alert alert-danger mensaje_form" style="display: none" id="error1">
																			<button data-dismiss="alert" class="close" type="button">x</button>
																			<strong>MENSAJE!</strong> <span class="textmensaje">El password debe ser mayor de 6 caracteres</span>
																		 </div> 
																		 
																		 <div class="alert alert-danger mensaje_form" style="display: none" id="error2">
																			<button data-dismiss="alert" class="close" type="button">x</button>
																			<strong>MENSAJE!</strong> <span class="textmensaje">El doctor ya está registrado</span>
																		 </div>
																		 
																		 <div class="alert alert-danger mensaje_form" style="display: none" id="error3">
																			<button data-dismiss="alert" class="close" type="button">x</button>
																			<strong>MENSAJE!</strong> <span class="textmensaje">Ese código promocional ya fue utilizado 10 veces</span>
																		 </div>
																		 
																		 <div class="alert alert-danger mensaje_form" style="display: none" id="error4">
																			<button data-dismiss="alert" class="close" type="button">x</button>
																			<strong>MENSAJE!</strong> <span class="textmensaje">Código promocional no encontrado</span>
																		 </div>  
																	</div>					
																</div>
															</div>
															</p>
														</div>
														<div class="tab-pane" id="panel-miscelaneos">
															<p>
																<div class="row">
																<div class="col-md-6">
																	<div class="panel-body">
																		<div class="span6">                                        
																			<form class="form-vertical" id="formMiscelaneos">																				
																			<div class="control-group">         
																					<input type="checkbox" name="cartel" id="cartel" /> Cartel &nbsp;												   
																			</div>
																			<div class="control-group">         
																					<input type="checkbox" name="exclusiva" id="exclusiva" /> Exclusiva &nbsp;
																			</div>																													    																					
																		</div>
																		<div class="span6">  
																			<div class="control-group">         
																					<input type="checkbox" name="aceptaCambio" id="aceptaCambio" /> Acepta cambio &nbsp;
																			</div>																		
																		</div>      
																		<div class="span12"> 
																			<div class="control-group">         
																				<button class="btn btn-primary" type="submit" id="enviar"><i class="fa fa-floppy-o"></i> &nbsp; Guardar</button>                
																			</div>
																			</form> <!--cierre del formulario !-->
																		  &nbsp;          
																		</div>
																		 <!-- ================= boton SIGUIENTE  =====================================================================  !-->
																		 <div class="control-group" style="display: none" id="siguiente">    
																			<button class="btn btn-primary" type="botton" onClick="window.location='<?php echo SERVER ?>registrarDr2Foto.php'">Siguiente</button>
																		 </div>
																	 
																		 <!-- ================= mensajes de EXITO o de ERROR===========================================================  !-->
																		 <div class="alert alert-success mensaje_form" style="display: none" id="mensaje">
																			<button data-dismiss="alert" class="close" type="button">x</button>
																			<strong>MENSAJE!</strong> <span class="textmensaje">Registro exitoso</span>          
																		 </div>    
																		  
																		 <div class="alert alert-danger mensaje_form" style="display: none" id="error1">
																			<button data-dismiss="alert" class="close" type="button">x</button>
																			<strong>MENSAJE!</strong> <span class="textmensaje">El password debe ser mayor de 6 caracteres</span>
																		 </div> 
																		 
																		 <div class="alert alert-danger mensaje_form" style="display: none" id="error2">
																			<button data-dismiss="alert" class="close" type="button">x</button>
																			<strong>MENSAJE!</strong> <span class="textmensaje">El doctor ya está registrado</span>
																		 </div>
																		 
																		 <div class="alert alert-danger mensaje_form" style="display: none" id="error3">
																			<button data-dismiss="alert" class="close" type="button">x</button>
																			<strong>MENSAJE!</strong> <span class="textmensaje">Ese código promocional ya fue utilizado 10 veces</span>
																		 </div>
																		 
																		 <div class="alert alert-danger mensaje_form" style="display: none" id="error4">
																			<button data-dismiss="alert" class="close" type="button">x</button>
																			<strong>MENSAJE!</strong> <span class="textmensaje">Código promocional no encontrado</span>
																		 </div>  
																	</div>					
																</div>
															</div>
															</p>
														</div>
														<div class="tab-pane" id="panel-construccion">
															<p>
																<div class="row">
																<div class="col-md-6">
																	<div class="panel-body">
																		<div class="span6">                                        
																			<form class="form-vertical" id="formConstruccion">																				
																			Tipo de piso &nbsp;											  
																			<select id="piso" name="piso" style="width:auto"> 
																						<option value="0">Seleccione</option>
																						<option value="pisoCaico">Caico</option> 		
																						<option value="pisoCeramica">Cerámica</option>													
																						<option value="pisoGranito">Granito</option>													
																						<option value="pisoMachimbrado">Machimbrado</option>
																						<option value="pisoMadera">Madera</option>
																						<option value="pisoMarmol">Marmol</option>
																						<option value="pisoParquet">Parquet</option>
																						<option value="pisoPorcelanato">Porcelanato</option>
																						<option value="pisoTerracota">Terracota</option>
																						<option value="pisoMixto">Mixto</option>
																			</select>	
																				
																			<div class="control-group">         
																					<input type="checkbox" name="tanqueAereo" id="tanqueAereo" /> Tanque Aereo &nbsp;
																			</div>	
																			<div class="control-group">         
																					<input type="checkbox" name="tanqueSubterraneo" id="tanqueSubterraneo" /> Tanque Subterraneo &nbsp;
																			</div>										
																		</div>
																		<div class="span6">  
																			Estacionamientos &nbsp;											  
																			<select id="estacionamiento" name="estacionamiento" style="width:auto"> 
																						<option value="0">Seleccione</option>
																						<option value="unEstacionamiento">Uno</option> 		
																						<option value="dosEstacionamiento">Dos</option>													
																						<option value="tresEstacionamiento">Tres</option>													
																						<option value="cuatroEstacionamiento">Cuatro</option>													
																			</select>
																			<div class="control-group">         
																				Número de pisos &nbsp;											  
																				<select id="numeroPisos" name="numeroPisos" style="width:auto"> 
																							<option value="0">Seleccione</option>
																							<option value="unPiso">Uno</option> 		
																							<option value="dosPisos">Dos</option>													
																							<option value="tresPisos">Tres</option>																											
																				</select>
																			</div>																		
																		</div>      
																		<div class="span12"> 
																			<div class="control-group">         
																				<button class="btn btn-primary" type="submit" id="enviar"><i class="fa fa-floppy-o"></i> &nbsp; Guardar</button>                
																			</div>
																			</form> <!--cierre del formulario !-->
																		  &nbsp;          
																		</div>
																		 <!-- ================= boton SIGUIENTE  =====================================================================  !-->
																		 <div class="control-group" style="display: none" id="siguiente">    
																			<button class="btn btn-primary" type="botton" onClick="window.location='<?php echo SERVER ?>registrarDr2Foto.php'">Siguiente</button>
																		 </div>
																	 
																		 <!-- ================= mensajes de EXITO o de ERROR===========================================================  !-->
																		 <div class="alert alert-success mensaje_form" style="display: none" id="mensaje">
																			<button data-dismiss="alert" class="close" type="button">x</button>
																			<strong>MENSAJE!</strong> <span class="textmensaje">Registro exitoso</span>          
																		 </div>    
																		  
																		 <div class="alert alert-danger mensaje_form" style="display: none" id="error1">
																			<button data-dismiss="alert" class="close" type="button">x</button>
																			<strong>MENSAJE!</strong> <span class="textmensaje">El password debe ser mayor de 6 caracteres</span>
																		 </div> 
																		 
																		 <div class="alert alert-danger mensaje_form" style="display: none" id="error2">
																			<button data-dismiss="alert" class="close" type="button">x</button>
																			<strong>MENSAJE!</strong> <span class="textmensaje">El doctor ya está registrado</span>
																		 </div>
																		 
																		 <div class="alert alert-danger mensaje_form" style="display: none" id="error3">
																			<button data-dismiss="alert" class="close" type="button">x</button>
																			<strong>MENSAJE!</strong> <span class="textmensaje">Ese código promocional ya fue utilizado 10 veces</span>
																		 </div>
																		 
																		 <div class="alert alert-danger mensaje_form" style="display: none" id="error4">
																			<button data-dismiss="alert" class="close" type="button">x</button>
																			<strong>MENSAJE!</strong> <span class="textmensaje">Código promocional no encontrado</span>
																		 </div>  
																	</div>					
																</div>
															</div>
															</p>
														</div>
														<div class="tab-pane" id="panel-dispositivos">
															<p>
																<div class="row">
																<div class="col-md-6">
																	<div class="panel-body">
																		<div class="span6">                                        
																			<form class="form-vertical" id="formDispositivos">																				
																					Aire acondicionado &nbsp;											  
																					<select id="piso" name="piso" style="width:auto"> 
																								<option value="0">Seleccione</option>
																								<option value="aireCentral">Central</option> 		
																								<option value="aireVentana">Ventana</option>													
																								<option value="aireSplit">Split</option>																										
																					</select>	
																			<div class="control-group">         
																					Calentador de agua &nbsp;											  
																					<select id="calentador" name="calentador" style="width:auto"> 
																								<option value="0">Seleccione</option>
																								<option value="calentadorGas">Gas</option> 		
																								<option value="calentadorDirecto">Suministro Directo</option>													
																								<option value="calentadorElectrico">Tanque electrico</option>																										
																					</select>	
																			</div>																				
																		</div>
																		<div class="span6">  
																					Cable &nbsp;											  
																					<select id="cable" name="cable" style="width:auto"> 
																								<option value="0">Seleccione</option>
																								<option value="cableDirecTV">DirecTV</option> 		
																								<option value="cableInterCable">InterCable</option>													
																								<option value="cableNetuno">Netuno</option>		
																								<option value="cableSuperCable">SuperCable</option>															
																								<option value="cableOtro">Otro</option>															
																					</select>																												
																		</div>
																		<div class="span6">  
																					Número de ascensores &nbsp;											  
																					<select id="ascensores" name="ascensores" style="width:auto"> 
																								<option value="0">Seleccione</option>
																								<option value="ascensoresUno">Uno</option> 		
																								<option value="ascensoresDos">Dos</option>													
																								<option value="ascensoresTres">Tres</option>		
																								<option value="ascensoresCuatro">Cuatro</option>																														
																					</select>																												
																		</div>									
																		<div class="span12"> 
																			<div class="control-group">         
																				<button class="btn btn-primary" type="submit" id="enviar"><i class="fa fa-floppy-o"></i> &nbsp; Guardar</button>                
																			</div>
																			</form> <!--cierre del formulario !-->
																		  &nbsp;          
																		</div>
																		 <!-- ================= boton SIGUIENTE  =====================================================================  !-->
																		 <div class="control-group" style="display: none" id="siguiente">    
																			<button class="btn btn-primary" type="botton" onClick="window.location='<?php echo SERVER ?>registrarDr2Foto.php'">Siguiente</button>
																		 </div>
																	 
																		 <!-- ================= mensajes de EXITO o de ERROR===========================================================  !-->
																		 <div class="alert alert-success mensaje_form" style="display: none" id="mensaje">
																			<button data-dismiss="alert" class="close" type="button">x</button>
																			<strong>MENSAJE!</strong> <span class="textmensaje">Registro exitoso</span>          
																		 </div>    
																		  
																		 <div class="alert alert-danger mensaje_form" style="display: none" id="error1">
																			<button data-dismiss="alert" class="close" type="button">x</button>
																			<strong>MENSAJE!</strong> <span class="textmensaje">El password debe ser mayor de 6 caracteres</span>
																		 </div> 
																		 
																		 <div class="alert alert-danger mensaje_form" style="display: none" id="error2">
																			<button data-dismiss="alert" class="close" type="button">x</button>
																			<strong>MENSAJE!</strong> <span class="textmensaje">El doctor ya está registrado</span>
																		 </div>
																		 
																		 <div class="alert alert-danger mensaje_form" style="display: none" id="error3">
																			<button data-dismiss="alert" class="close" type="button">x</button>
																			<strong>MENSAJE!</strong> <span class="textmensaje">Ese código promocional ya fue utilizado 10 veces</span>
																		 </div>
																		 
																		 <div class="alert alert-danger mensaje_form" style="display: none" id="error4">
																			<button data-dismiss="alert" class="close" type="button">x</button>
																			<strong>MENSAJE!</strong> <span class="textmensaje">Código promocional no encontrado</span>
																		 </div>  
																	</div>					
																</div>
															</div>
															</p>
														</div>
													</div>
												</div>			
											</div>
										</div>
									</div>						
								</div>						
						</div>	

	
					<div class="panel panel-default">
						<div class="panel-heading" role="tab" id="headingSix" style="display: none">
						  <h4 class="panel-title">
							<a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseSix" aria-expanded="true" aria-controls="collapseSix">
							  Fotos
							</a>
						  </h4>
						</div>	
						<script language="JavaScript" type="text/JavaScript"> //habilita el boton subir solo si se ha seleccionado un archivo
                        $(document).ready(
                            function(){
                                $('input:file').change(
                                    function(){
                                        if ($(this).val()) {
                                            $('input:submit').attr('disabled',false);
                                        } 
                                    }
                                    );
                            });
                        </script>						
						<div id="collapseSix" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
							<div class="panel-body">
								<div class="span12">                               
                                <?php  
                                $queryFoto = ("SELECT * FROM tbl_propiedades WHERE id='".$_SESSION['id']."'");	
								$resultadoFoto=mysql_query($queryFoto,$dbConn);
								while($data_prod=mysql_fetch_array($resultadoFoto))
								{
								$foto1 = $data_prod['foto1'];
								$foto2 = $data_prod['foto2'];
								$foto3 = $data_prod['foto3'];
								$foto4 = $data_prod['foto4'];
								$foto5 = $data_prod['foto5'];
								$foto6 = $data_prod['foto6'];
								}
								mysql_free_result($resultadoFoto); // Liberamos los registros
								?>
                                <img width="100" height="100" alt="" class="img-responsive" src="images/products/<?php echo $foto1?>">	
                                <img width="100" height="100" alt="" class="img-responsive" src="images/products/<?php echo $foto2?>">	
                                <img width="100" height="100" alt="" class="img-responsive" src="images/products/<?php echo $foto3?>">	
                                <img width="100" height="100" alt="" class="img-responsive" src="images/products/<?php echo $foto4?>">	
                                <img width="100" height="100" alt="" class="img-responsive" src="images/products/<?php echo $foto5?>">	
                                <img width="100" height="100" alt="" class="img-responsive" src="images/products/<?php echo $foto6?>">	
                                
                                <a href='fotomodificar.php?id=<?php echo $_SESSION['id'] ?>&foto=foto1'>      				
                                        <i class="fa fa-pencil-square-o fa-2x" style="cursor: pointer;"></i>
                                </a>
                                <div class="control-group-inline">
                                  <a href='fotomodificar.php?id=<?php echo $_SESSION['id'] ?>&foto=foto1'>                                            		
                                            <img src="images/bg/fotos.jpg" width="148" height="145" />
                                  </a>
                                  <a href='fotomodificar.php?id=<?php echo $id ?>&foto=foto2&idProd=<?php echo $codigo ?>'>      				
                                            <img src="images/bg/fotos.jpg" width="148" height="145" />
                                  </a>  
                                                 
                                </div>				    
					<form action="fotosProcesar.php?id=<?php echo $_SESSION['id'] ?>&foto=<?php echo 2 //$foto ?>" id="formProducto" method="POST" enctype="multipart/form-data"/>
                    <br></br>
                    Añadir imagen: <?php echo $_SESSION['id'] ?><input name="archivo" id="archivo" type="file">
                     <input type="submit" name="subir" value="Subir imagen"  disabled />					
                    </form>									
								 
									 <!-- ================= mensajes de EXITO o de ERROR===========================================================  !-->
									 <div class="alert alert-success mensaje_form" style="display: none" id="mensaje">
										<button data-dismiss="alert" class="close" type="button">x</button>
										<strong>MENSAJE!</strong> <span class="textmensaje">Registro exitoso</span>         
									 </div>    									  
									 <div class="alert alert-danger mensaje_form" style="display: none" id="error1">
										<button data-dismiss="alert" class="close" type="button">x</button>
										<strong>MENSAJE!</strong> <span class="textmensaje">Debe elegir una foto</span>
									 </div>
                                     <div class="alert alert-danger mensaje_form" style="display: none" id="error2">
										<button data-dismiss="alert" class="close" type="button">x</button>
										<strong>MENSAJE!</strong> <span class="textmensaje">A ocurrido un error</span>
									 </div>                                     
								</div>
							</div>
						</div>
					</div>
		
				</div>
			</div>
		</div>
	</section>
    <!-- .................................... $footer .................................... -->
  <?php include "footer.php"; ?>