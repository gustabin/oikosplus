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
	$("body").on('submit', '#formTipoPersona', function(event) {
		event.preventDefault()
		if ($('#formTipoPersona').valid()) {
			$.ajax({
				type: "POST",
				url: "docPropietarioProcesar.php",
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
					if (respuesta.error == 4) {
						$('#error4').show();
						setTimeout(function() {
						$('#error4').hide();
						}, 2000);
					}
					if (respuesta.error == 5) {
						$('#error5').show();
						setTimeout(function() {
						$('#error5').hide();
						}, 2000);
					}
					
					if (respuesta.exito == 1) {
					  $('#mensaje').show(); 
					  setTimeout(function() {
					  $('#mensaje').hide();
					  window.location.href='registrarTipoPersona.php'; 
					}, 3000);						 
					}		    
				}
			});
		}
	});		
</script> 

  
 <script type="text/javascript"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $("#tipoPersona").change(function(event) {
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
  </div>
			<div class="row">
				<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
					<div class="panel panel-default">
						<div class="panel-heading" role="tab" id="headingOne">
						  <h4 class="panel-title">
							<a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
							  Detalles -elementos adicionales
							</a>
						  </h4>
						</div>
						<div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
							<div class="panel-body">                            
								<div class="span6" style="background-color:#E5E5E5;">
								    <form class="form-vertical" id="formTipoPersona">									      
                                       <div class="control-group">        												
											Tipo de persona &nbsp;
											<select id="tipoPersona" name="tipoPersona" style="width:auto"> 
												<option value="0" selected="selected">Seleccione</option>
												<option value="natural">Natural</option>
												<option value="juridica">Juridica</option>
											</select>  
									   </div> 
                                          
                                      <div class="control-group"> 
                                        <div id="juridica" class="toggleable" style="display:none;">                                            
                                            Acta Constitutiva &nbsp;
                                            <select id="actaConstitutiva" name="actaConstitutiva" style="width:auto"> 
                                                <option value="0">Seleccione</option>
                                                <option value="si">Si</option>
                                                <option value="no">No</option> 				 
                                            </select>  
                                            <br>
                                            Solvencia IVSS &nbsp;
                                            <select id="solvenciaIVSS" name="solvenciaIVSS" style="width:auto"> 
                                                <option value="0">Seleccione</option>
                                                <option value="si">Si</option>
                                                <option value="no">No</option> 				 
                                            </select>
                                            <br>
                                            Actualización Junta Directiva &nbsp;
                                            <select id="actualizacionJuntaDirectiva" name="actualizacionJuntaDirectiva" style="width:auto"> 
                                                <option value="0">Seleccione</option>
                                                <option value="si">Si</option>
                                                <option value="no">No</option> 				 
                                            </select>                                            
                                        </div>  
                                    </div>  
									
                                    <div class="control-group"> 
										<h5>Detalles del inmueble &nbsp;	</h5>								
									</div>
                                    
                                    <div class="control-group"> 
										Altura del inmueble&nbsp;
                                        <select id="altura" name="altura" style="width:auto"> 
                                            <option value="0">Seleccione</option>
                                            <option value="Piso Bajo">Piso Bajo</option>
                                            <option value="Piso Medio">Piso Medio</option>
                                            <option value="Piso Alto">Piso Alto</option>
                                        </select>											
									</div>
                                    <div class="control-group"> 
										<input type="checkbox" name="sala" id="sala" /> Sala &nbsp;												
									</div>	
									<div class="control-group"> 
										<input type="checkbox" name="comedor" id="comedor" /> Comedor &nbsp;												
									</div>
                                    <div class="control-group"> 
                                        <input type="checkbox" name="cocina" id="cocina" /> Cocina &nbsp;												
                                    </div>  
                                    <div class="control-group"> 
                                        <input type="checkbox" name="bar" id="bar" /> Bar &nbsp;												
                                    </div>
                                    <div class="control-group"> 
                                        <input type="checkbox" name="estudio" id="estudio" /> Estudio &nbsp;												
                                    </div>                                    
                                    <div class="control-group"> 
										<input type="checkbox" name="patio" id="patio" /> Patio &nbsp;												
									</div>
									<div class="control-group"> 
										Habitación de servicio&nbsp;
                                        <select id="altura" name="altura" style="width:auto"> 
                                            <option value="0">0</option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                        </select>											
									</div>	
                                    <div class="control-group"> 
										<input type="checkbox" name="telefono" id="telefono" />Teléfono &nbsp;												
									 	Líneas telefonicas&nbsp;
                                        <select id="lineas" name="lineas" style="width:auto"> 
                                        	<option value="0">0</option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                        </select>											
									</div> 
								</div>      
   
                                <div class="span6" style="background-color:#E5E5E5;">  
                                     <div class="control-group"> 
										<input type="checkbox" name="parrillera" id="parrillera" /> Parrillera &nbsp;												
									 </div>     
                                     <div class="control-group"> 
										<input type="checkbox" name="chimenea" id="chimenea" /> Chimenea &nbsp;												
									 </div>  
                                     <div class="control-group"> 
										<input type="checkbox" name="muebles" id="muebles" /> Muebles &nbsp;												
									 </div>                           
                                     <div class="control-group"> 
										<input type="checkbox" name="maletero" id="maletero" /> Maletero &nbsp;												
									 </div>
                                     <div class="control-group"> 
										<input type="checkbox" name="jardin" id="jardin" /> Jardin interno &nbsp;												
									 </div>
                                     <div class="control-group"> 
										<input type="checkbox" name="gimnasio" id="gimnasio" /> Gimnasio &nbsp;												
									 </div>
                                     <div class="control-group"> 
										<input type="checkbox" name="sauna" id="sauna" /> Sauna &nbsp;												
									 </div>         
                                     <div class="control-group"> 
										<input type="checkbox" name="jacuzzi" id="jacuzzi" /> Jacuzzi &nbsp;												
									 </div>
                                     <div class="control-group"> 
										<input type="checkbox" name="piscina" id="piscina" /> Piscina &nbsp;												
									 </div>                            
									 <div class="control-group"> 
										<input type="checkbox" name="tenis" id="tenis" /> Cancha de tenis &nbsp;												
									 </div>
                                     <div class="control-group"> 
										<input type="checkbox" name="parque" id="parque" /> Parque infantil &nbsp;												
									 </div>
                                     <div class="control-group"> 
										<input type="checkbox" name="terraza" id="terraza" /> Terraza &nbsp;												
									 </div>
                                     <div class="control-group"> 
										<input type="checkbox" name="muelle" id="muelle" /> Muelle privado &nbsp;												
									 </div>
                                     <div class="control-group"> 
										<input type="checkbox" name="salonDeFiesta" id="salonDeFiesta" /> Salón de fiesta &nbsp;												
									 </div> 
                                     <div class="control-group"> 
										Calle&nbsp;
                                        <select id="altura" name="altura" style="width:auto"> 
                                            <option value="1">Pública</option>
                                            <option value="2">Privada</option>
                                            <option value="3">Cerrada con vigilancia</option>
                                            <option value="4">Ciega</option>
                                        </select>											
									</div>
                                    <div class="control-group"> 
										<input type="checkbox" name="cercado" id="cercado" /> Cercado &nbsp;												
									</div>
                                    <div class="control-group"> 
										<input type="checkbox" name="vigilancia" id="vigilancia" /> Vigilancia Privada &nbsp;												
									 </div>
                                    <div class="control-group"> 
										<input type="checkbox" name="frenteAlAgua" id="frenteAlAgua" /> Frente al agua &nbsp;												
									</div>
                                    <div class="control-group"> 
										<input type="checkbox" name="vistaPanoramica" id="vistaPanoramica" /> Vista Panorámica &nbsp;												
									 </div>
                                     <div class="control-group"> 
										<input type="checkbox" name="esquina" id="esquina" /> Ubicado en Esquina &nbsp;												
									 </div>
                                     <div class="control-group"> 
										<input type="checkbox" name="frenteAlMar" id="frenteAlMar" /> Frente al Mar &nbsp;												
									 </div>
                                     <div class="control-group"> 
										<input type="checkbox" name="vistaAlMar" id="vistaAlMar" /> Vista al Mar &nbsp;												
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
                                     
                                <div class="span12"> 
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
  
  