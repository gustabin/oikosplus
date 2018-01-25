<?php 
session_start();
error_reporting(0);
$_SESSION['valor'] = 1; //Activa la opcion del menu actual
include "header.php";
?> 

  <script language="JavaScript" type="text/JavaScript">
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
			
			if (respuesta.exito == 2) {
			  $('#mensaje2').show();
			  setTimeout(function() {
			  $('#mensaje2').hide();
			  window.location.href='citasConfirmar.php';
			}, 3000);
		    }
			
			if (respuesta.exito == 3) {
			  $('#mensaje').show();
			  setTimeout(function() {
			  $('#mensaje').hide();
			  window.location.href='citasDoctor.php';
			}, 3000);
		    }
		    
		}
	    });
	}
	});	    
</script>
  <!-- .................................... $breadcrumb .................................... -->
  <section class="section-breadcrumb section-color-graylighter"> 
    <div>&nbsp;</div>
    <div>&nbsp;</div>
    <div>&nbsp;</div>
    <div>&nbsp;</div>
    <div>&nbsp;</div>
    <div class="container-fluid">
      <ul class="breadcrumb">
        <li><a href="escritorio.php">Escritorio</a><span class="divider">/</span></li>
        <li class="active">Administrar</li>
      </ul>
    </div>
  </section> 
  
  
  <!-- .................................... $titulo .................................... -->
  
    <div class="container-fluid" style="margin-top:10px">
        <small><?php echo $_SESSION['nombre']?>&nbsp; <?php echo $_SESSION['apellido']?></small>
  	</div>
  <!-- .................................... $Contenido .................................... -->
  
<div class="container">
  <div class="row">
        <div class="span6">
                <div class="row">
                        <h2><a href="propiedadListado.php">Listado de propiedades</a></h2>
                        <p>
                            Activas
                        </p>
                        <p>
                            Pendientes
                        </p>
                        <p>
                            Por expirar
                        </p>
                         <p>
                            Vendidas
                        </p>
                         <p>
                  <hr />
                        </p>
                        <p> 
                        	<a href="registrarPropiedad.php"><i class="fa fa-search"></i> Agregar propiedad</a>
                        </p>
                        <p>
                            <i class="fa fa-pencil-square-o"></i> Modificar propiedad
                        </p>
                         <p>
                  <hr />
                        </p>
                         <p>
                            Publicaciones recientes
                        </p>                      
                </div>
        </div>
        <div class="span3">
                	<div class="row">
                        
                        <img src="images/clientes.png" width="128" height="43" alt=""/> 
                        <p>
                            <i class="fa fa-envelope"></i> Nombre + Apellido
                        </p>
                        <p>
                            <hr />
                        </p>
                        <p>
                            <i class="fa fa-plus-square"></i> Agregar cliente
                        </p>
                         <p>
                            <i class="fa fa-pencil-square-o"></i> Modificar cliente
                        </p>
                        <p>
                            Presentaci&oacute;n
                        </p>
                    </div>
       	</div>
        <div class="span3">
                <div class="row">                                                  
                        <img src="images/busquedas.png" width="170" height="43" alt=""/>
                        <p>
                            Apartamentos en ...
                        </p>
                        <p>
                            Casas en ...
                        </p>
                        <p>
                            Terrenos en ...
                        </p>
                        <p>
                            <hr />
                        </p>
                        <p>
                       <i class="fa fa-search"></i>
                       Oiko # 
                            <form class="form-vertical" id="formCodigoPropiedad">
                                <div class="control-group"> 
                                  <input name="codigoPropiedad" type="text" class="required" id="codigoPropiedad" size="7" maxlength="7" placeholder="c&oacute;digo">              
                                </div>
                                  <button class="btn btn-primary" type="submit">Buscar</button>		
                            </form>
                         
                         <div class="alert alert-success mensaje_form" style="display: none" id="mensaje">
                            <button data-dismiss="alert" class="close" type="button">x</button>
                            <strong></strong> <span class="textmensaje">Un momento!...</span>
                         </div>             
                         <div class="alert alert-danger mensaje_form" style="display: none" id="error1">
                            <button data-dismiss="alert" class="close" type="button">x</button>
                            <strong></strong> <span class="textmensaje">Codigo incorrecto</span>
                         </div>
                         <div class="alert alert-danger mensaje_form" style="display: none" id="error2">
                            <button data-dismiss="alert" class="close" type="button">x</button>
                            <strong></strong> <span class="textmensaje">No encontramos ese código</span>
                         </div>          			
                         <div style="float:left; display:none" id="barra"><img src="images/barra.gif" alt="Cargando..."/><br>Buscando....</div>	
                         </p>
              </div>
       </div>
    </div>
</div>  
   
    <!-- .................................... $footer .................................... -->
  <?php include "footer.php"; ?>