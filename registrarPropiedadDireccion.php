<?php 
session_start(); 
require_once('tools/mypathdb.php');  
error_reporting(0);
include "header.php";   
?>
 <link href="css/jquery.ui.datepicker.css" rel="stylesheet" media="screen" /> 
<script type="text/javascript" language="javascript" src="js/jquery.ui.datepicker.js"></script>
<script src="js/jquery-ui.multidatespicker.js" type="text/javascript"></script>      

<script Language="JavaScript">  
	$(document).ready(function() { 
		//$('#titulo').html("Paso 1 / Datos del inmueble");
         $(".tlf").mask("(9999) 999-99-99");
		 $(".precioventa").mask("99.999.999");
		 //$(".años").mask("");
		 //$(".metraje").mask("999");
		 $(".cuartos").mask("9");
		 //$(".coordenadas").mask("99.9999999");		 
	});
	
    $("body").on('submit', '#formDireccion', function(event) {
		event.preventDefault()
		if ($('#formDireccion').valid()) {
			$.ajax({
				type: "POST",
				url: "direccionProcesar.php",
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
					  window.location.href='registrarDocPropietario.php'; 
					}, 3000);						 
					}		    
				}
			});
		}
	});		
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

 <?php
	$id = $_SESSION['id'];
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
				<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
					<div class="panel panel-default">
						<div class="panel-heading" role="tab" id="headingOne">
						  <h4 class="panel-title">
							<a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
							  Dirección
							</a>
						  </h4>
						</div>
						<div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
							<div class="panel-body">
                                <div class="span12" style="background: linear-gradient(white, #E5E5E5); ">
								    <form class="form-vertical" id="formDireccion">
										<div class="control-group">         
											Estado del inmueble &nbsp;
											<select name="EstadoDelInmueble" style="width:auto"> 
												<option value="Nuevo">Nuevo</option>
												<option value="Usado" selected="selected">Usado</option>
												<option value="Obra gris">Obra gris</option> 				 
											</select>    														
											Edad &nbsp;<input name="edad" type="text" class="required" id="edad" value="2" size="3" maxlength="2"  placeholder="Edad">    
														
										Año de construcción &nbsp; 
										
										  <input type="text" name="anoConstruccion" id="anoConstruccion" size="4" maxlength="4" value="2014" />
										  
										</div>
										<div class="control-group"> 				
											m<sup>2</sup> &nbsp;<input name="metros" type="text" class="required" id="metros" value="90" size="3" maxlength="3">        
												 
										  Estilo &nbsp;<select name="estiloInmueble" style="width:auto"> 
												<option value="1 nivel" selected="selected">1 nivel</option>
																  <option value="varios niveles">varios niveles</option>
																  <option value="PB">PB</option> 		
																  <option value="Penthouse">Penthouse</option> 				 
												</select>    
										</div>
										<div class="control-group"> 				
											Habitaciones &nbsp;<input name="habitaciones" type="text" id="habitaciones" maxlength="1" size="1" value="3" class="required cuartos">        
														
											Baños &nbsp;<input name="banos" type="text" id="banos" maxlength="1" size="1" value="2" class="required cuartos">        
										</div>
										<div class="control-group"> 				
											Medios baños &nbsp;<input name="mediosBanos" type="text" id="mediosBanos" maxlength="1" size="1" value="1" class="required cuartos">        
														
											Habitaci&oacute;n de servicio &nbsp;<select name="habitacionServicio" style="width:auto"> 
																  <option value="Si" >Si</option>
																  <option value="No" selected="selected">No</option>                                      
																</select>        
														
											Baño de servicio &nbsp;<select name="banoServicio" style="width:auto"> 
																  <option value="Si" >Si</option>
																  <option value="No" selected="selected">No</option>                                      
																</select>        
										</div>
										<div class="control-group"> 				
											Estacionamiento &nbsp;<select name="estacionamiento" style="width:auto"> 
																  <option value="Techado" >Techado</option>
																  <option value="Descubierto" selected="selected">Descubierto</option>     
																  <option value="Sin estacionamiento" >Sin estacionamiento</option>                                 
																</select>        
													
											# de Puestos &nbsp;<input name="puestos" type="text" class="required cuartos" id="puestos" size="1" value="1" maxlength="1">        
										</div>
										<div class="control-group"> 				
											Descripci&oacute;n   &nbsp;<textarea name="descripcion" cols="40" rows="6" class="required" id="descripcion">áéíóúñ Bello y comodos espacios, bien distribuido y muy buena zona.</textarea>   
											Observaciones   &nbsp;<textarea name="observaciones" cols="40" rows="6" id="observaciones" >Esta a estrenar, verlo es comprarlo.</textarea>                      
										</div>
										<div class="control-group"> 				
											Instrucciones &nbsp;<select name="instrucciones" style="width:auto"> 
																  <option value="Llamar antes" selected="selected">Llamar antes</option>
																  <option value="Llamar a inmobiliaria" >Llamar a inmobiliaria</option>     
																  <option value="Llaves en vigilancia" >Llaves en vigilancia</option>   
																  <option value="Llaves en conserjeria" >Llaves en conserjeria</option>   
																</select>        
										</div>
										<div class="control-group"> 				
											Referido por &nbsp;<select name="referido" style="width:auto"> 
																  <option value="Particular" >Particular</option>
																  <option value="Website" >Website</option>     
																  <option value="Corredor inmobiliario" >Corredor inmobiliario</option>   
																  <option value="Ninguno" selected="selected">Ninguno</option>   
																</select>        
										</div>
										<div class="control-group">         
											Publicar Desde &nbsp;<input name="publicarDesde" type="text" id="publicarDesde" value="20/04/2016" size="10" maxlength="10">          
											  
											Publicar Hasta &nbsp;<input name="publicarHasta" type="text" id="publicarHasta" value="20/10/2016" size="10" maxlength="10">     
								 
										</div>
										<div class="control-group"> 				
											Precio &nbsp;<input name="precio" type="text" class="required" id="precio" value="45000000" size="10" maxlength="9"> 
						Operación &nbsp;<select name="operacion" style="width:auto"> 
																  <option value="Venta" selected="selected">Venta</option>
																  <option value="Alquiler" >Alquiler</option>                                           
																</select>    
											Moneda &nbsp;<select name="moneda" style="width:auto"> 
											  <option value="Bolivares fuertes" >Bolívares fuertes</option>
											  <option value="Dolares" >Dólares</option>                                           
											</select>           						
										</div>
										<div class="control-group"> 				 
											Comisión &nbsp;<select name="comision" style="width:auto"> 
																  <option value="3%" >3%</option>
																  <option value="4%" >4%</option>
																  <option value="5%" selected="selected">5%</option>                                           
																</select>  
											
										</div>
										<div class="control-group"> 
											Propietario &nbsp;
													   <input name="propietario" type="text" class="required" id="propietario" value="Pedro Rodrigo" size="35" maxlength="50" placeholder="Nombre del propietario">
										  Teléfono &nbsp;<input name="telefono" type="text" class="required tlf" id="telefono" value="04149447013" size="15" maxlength="16"  placeholder="teléfono">  
											Correo &nbsp;<input name="correo" type="text" class="required email" id="correo" value="info@oikosplus.com" size="30" maxlength="45"  placeholder="correo">  
										</div>
										<div class="control-group">         
											<button class="btn btn-primary" type="submit" id="enviar"><i class="fa fa-floppy-o"></i> &nbsp; Continuar</button>
                                        
                                         <a href='registrarPropiedad.php'>
                                            <button type="button" class="btn btn-danger"><i class="icon-chevron-left"></i> Volver </button>
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
                                    
									
								</div> <!-- fin "span12" !-->
							</div> <!-- fin "panel-body" !-->
						</div> <!-- fin "collapseTwo" !-->
					</div> <!-- fin "panel panel-default" !--> 
						<!------------------------------Detalles      --------------------!-->
				</div>						
			</div>	
		</div>		
	</section>
    <!-- .................................... $footer .................................... -->
  <?php include "footer.php"; ?>