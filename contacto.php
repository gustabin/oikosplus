<?php 
session_destroy(); 
session_start();
error_reporting(0);
$_SESSION['valor'] = 1; //Activa la opcion del menu actual
include "header.php";
?> 
  <script language="JavaScript" type="text/JavaScript">
	                       
    //Metodo para cargar el formulario  
    $("body").on('submit', '#contacto', function(event) {
	event.preventDefault()
	if ($('#contacto').valid()) {
		$('#barra').show();
	    $.ajax({
		type: "POST",
		url: "contacto_Procesar.php",
		dataType: "json",
		data: $(this).serialize(),
		success: function(respuesta) {
			$('#barra').hide();
		    if (respuesta.error == 1) {
			  $('#error1').show();
			setTimeout(function() {
			  $('#error1').hide();
			}, 3000);
		    }
			
			if (respuesta.exito == 1) {
			  $('#mensaje').show();
			  setTimeout(function() {
			  $('#mensaje').hide();
			  window.location.href='contacto_Listo.php'; 
			}, 3000);
		    }
			
		}
	    });
	}
	});	    
</script>
  <!-- .................................... $breadcrumb .................................... -->
  <section class="section-breadcrumb section-color-graylighter">
    <div class="container">
      <ul class="breadcrumb">
        <li><a href="index.php">Inicio</a><span class="divider">/</span></li>
        <li class="active">Contacto</li>
      </ul>
    </div>
  </section>
  <!-- .................................... $Contact .................................... -->
  
    <div class="container" style="margin-top:10px">
      <h2 class="section-title">
        Solicitud de 
        <small>informaci&oacute;n</small></h2>
      </div>
  
  <!-- .................................... $Contact .................................... -->
  <section class="section-content section-contact section-color-graylighter">
    <div class="container">
      <div class="row">
        <div class="span4">
             <img src="images/bg/solicitud.png"> 
        </div>
        <div class="span4">
		  <img src="images/oikos-logo.gif" > 
          <form class="form-vertical" id="contacto">
          <h4>Haz una conexi&oacute;n r&aacute;pida</h4>
	    	<p>Envianos tu nombre y tu email y te enviaremos una propuesta.</p>
            <div class="control-group">        
              <input class="span4 required" id="nombre" name="nombre" placeholder="Nombre" type="text">       	
            </div>
  			<div class="control-group"> 
              <input class="span4 required email" id="email" name="email" placeholder="Email" type="text">            
            </div>     
              <button class="btn btn-primary" type="submit">Enviar</button>					
       </form>
		     <div class="alert alert-success mensaje_form" style="display: none" id="mensaje">
				<button data-dismiss="alert" class="close" type="button">x</button>
				<strong></strong> <span class="textmensaje">Datos enviados!...</span>
			 </div>
            
			 <div class="alert alert-danger mensaje_form" style="display: none" id="error1">
				<button data-dismiss="alert" class="close" type="button">x</button>
				<strong></strong> <span class="textmensaje">Email incorrecto</span>
			 </div>
             
          <div style="float:left; display:none" id="barra"><img src="images/barra.gif" alt="Cargando..."/><br>Enviando....</div>	
             
        </div>
        
      </div>
    </div>
  </section>
    <!-- .................................... $footer .................................... -->
  <?php include "footer.php"; ?>