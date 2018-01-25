<?php 
session_destroy(); 
session_start();
error_reporting(0);
$_SESSION['valor'] = 1; //Activa la opcion del menu actual
include "header.php";
?> 
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
  <script language="JavaScript" type="text/JavaScript">
	                       
    //Metodo para cargar el formulario  
    $("body").on('submit', '#formLogin', function(event) {
	event.preventDefault()
	if ($('#formLogin').valid()) {
		$('#barra').show();
	    $.ajax({
		type: "POST",
		url: "login_Procesar.php",
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
			
			if (respuesta.error == 2) {
			  $('#error2').show();
			setTimeout(function() {
			  $('#error2').hide();
			}, 3000);
		    }
			
			if (respuesta.error == 3) {
			  $('#error3').show();
			  setTimeout(function() {
			  $('#error3').hide();
			}, 3000);
		    }
			
			if (respuesta.error == 4) {
			  $('#error4').show();
			setTimeout(function() {
			  $('#error4').hide();
			}, 3000);
		    }
			
			if (respuesta.exito == 1) {
			  $('#mensaje').show();
			  setTimeout(function() {
			  $('#mensaje').hide();
			  window.location.href='escritorio.php'; 			 
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
        <li class="active">Ingresar</li>
      </ul>
    </div>
  </section>
  <!-- .................................... $Contact .................................... -->
  
    <div class="container" style="margin-top:10px">
      <h2 class="section-title">
        Usuario 
        <small>existente</small></h2>
      </div>
  
  <!-- .................................... $Contact .................................... -->
  <section class="section-content section-contact section-color-graylighter">
    <div class="container">
      <div class="row">
        <div class="span6">
             <img src="images/bg/login.jpg"> 
        </div>
        <div class="span6">
		  <img src="images/login.png" > 
          <form class="form-vertical" id="formLogin">
            <div class="control-group"> 
              <input class="span4 required email" id="email" name="email" placeholder="Email" type="text">              
            </div>
            <div class="form-group">             
              <input class="span4 required" id="password" name="password" placeholder="Password" type="password">              	
            </div>
  				 
			<div class="form-group">
				<p><a href="recuperar.php">Olvidates tu password?  </a> &nbsp; 
                <!--a href="login_Procesar.php?email=demo@oikosplus.com&password=admin">Ingresar  a la demo </a!--></p>
            </div>
            	<button class="btn btn-primary" type="submit">Ingresar</button>		
          </form>
          	
		     <div class="alert alert-success mensaje_form" style="display: none" id="mensaje">
				<button data-dismiss="alert" class="close" type="button">x</button>
				<strong></strong> <span class="textmensaje">Bienvenido!...</span>
			 </div>
             <div class="alert alert-success mensaje_form" style="display: none" id="mensaje2">	
                <button data-dismiss="alert" class="close" type="button">x</button>
                <strong></strong> <span class="textmensaje">Hoy vence su suscripción</span>
             </div>
			 <div class="alert alert-danger mensaje_form" style="display: none" id="error1">
				<button data-dismiss="alert" class="close" type="button">x</button>
				<strong></strong> <span class="textmensaje">Email o password incorrecto</span>
			 </div>
			 <div class="alert alert-danger mensaje_form" style="display: none" id="error2">
				<button data-dismiss="alert" class="close" type="button">x</button>
				<strong></strong> <span class="textmensaje">Esta cuenta esta desactivada</span>
			 </div>
             <div class="alert alert-danger mensaje_form" style="display: none" id="error3">	
                <button data-dismiss="alert" class="close" type="button">x</button>
                <strong>MENSAJE: </strong> <span class="textmensaje">Su suscripción esta vencida</span>
             </div>
			
             
             <div style="float:left; display:none" id="barra"><img src="images/barra.gif" alt="Cargando..."/><br>Ingresando....</div>	
             
        </div>
        
      </div>
    </div>
  </section>
    <!-- .................................... $footer .................................... -->
  <?php include "footer.php"; ?>