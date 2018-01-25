<?php 
session_start();
error_reporting(0);
//$_SESSION['valor'] = 1; //Activa la opcion del menu actual
?> 
<!DOCTYPE html>
<html lang="en">
<head> 
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Sistema de bienes raices donde encontraras inmuebles organizados por diferentes filtros">
    <meta name="keywords" content="sistema inmobiliario, sistema administracion inmobiliaria, sistema de inmuebles, sistema de bienes raices">
    <meta name="author" content="Ing Gustavo Arias">

    <link href="images/favicon.ico" rel="shortcut icon">
    <title>Oikos &trade; Propiedades </title> 

	<!-- MAIN CSS FILES===================================
	======================================================= -->
    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Animation -->
    <link rel="stylesheet" href="css/animate.css">
    <!-- Custom CSS -->
    <link href="css/theme.css" rel="stylesheet">
    <!-- Responsive styles-->
    <link rel="stylesheet" href="css/responsive.css">
    <!-- FontAwesome -->
    <link rel="stylesheet" href="css/font-awesome.min.css">
     <!-- icon moon -->
   <link rel="stylesheet" href="css/icon-moon.css">

    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>





<body id="page-top" data-spy="scroll" data-target=".navbar-fixed-top">

    <!-- Navigation -->
    <nav class="navbar navbar-custom navbar-fixed-top" >
        <div class="container">
	        <div class="row ">
		        <div class="col-md-12 ">
			        <div class="main-nav">
			            <div class="navbar-header">
			                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-main-collapse">
			                    <i class="fa fa-bars"></i>
			                </button>
			                <a class="navbar-brand page-scroll" href="index.php" >
			                    <img src="images/oikos-logo.gif" width="89" height="76"> 
			                </a>
			            </div>

			            <!-- Collect the nav links, forms, and other content for toggling -->
			            <div class="collapse navbar-collapse  navbar-main-collapse">
			                <?php if (empty($_SESSION['email'])) { ?>
                            <ul class="nav navbar-nav">			                    
			                    <li><a class="page-scroll" href="login.php" ><i class="fa fa-sign-in"></i> login</a></li>			                    
			                </ul>
                            <?php } else { ?>
                            <ul class="nav navbar-nav">			                    
			                    <li><a class="page-scroll" href="escritorio.php" ><i class="fa fa-sign-in"></i> escritorio</a></li>			                    
			                </ul>
							<?php }?>
			                <div class="contact-no navbar-right visible-md visible-lg">				            	
                                <script type="text/javascript" src="http://www.skypeassets.com/i/scom/js/skype-uri.js"></script>
                                <div id="SkypeButton_Call_gustabin_1">
                                 <script type="text/javascript">
                                 Skype.ui({
                                 "name": "dropdown",
                                 "element": "SkypeButton_Call_gustabin_1",
                                 "participants": ["gustabin"],								 
                                 "imageSize": 24
                                 });
                                 </script>
                                </div>
				            </div>
			            </div>
		           	</div>
	           	</div>
	        </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>
	<!-- navbar end -->

	<!-- section slider start -->
	<div id="section-slider">
		<div class="container">
			<div class="row">
				<div class="col-md-12 text-center">
					<div class="carousel slide" id="slider-carousel">
						<div class="carousel-inner">
							<div class="item active">
								<div class="slider-caption ">
									<h2 class="big-title wow slideInLeft">somos tu herramienta inmobiliaria</h2>
								  <p class="wow slideInRight">Proveemos la infraestructura para el manejo de la base de datos de propiedades en donde te ayudamos a registrar y controlar la gestión de tus corredores inmobiliarios; a su vez colaboramos con ellos para administrar sus inmuebles y clientes.</p>
									<!--a href="#" class="btn btn-primary white">ver más</a!-->
								</div>
							</div> <!-- item end -->
							<div class="item ">
								<div class="slider-caption ">
									<h2 class="big-title wow slideInLeft">¿Por qué utilizar nuestro sistema?</h2>
									<p class="wow slideInRight">Oikos está compuesta por aproximadamente 100 oficinas de agencias inmobiliarias y operado en 7 países y territorios en todo el mundo con más de 5.000 corredores inmobiliarios.</p>
									<!--a href="#" class="btn btn-primary white">ver más</a!-->
								</div>
							</div> <!-- item end -->
							<div class="item">
								<div class="slider-caption ">
									<h2 class="big-title wow slideInLeft">soluciones tecnológicas innovadoras </h2>
									<p class="wow slideInRight">
Ofrecemos marketing en las comunicaciones que ayudan a activar tanto a los asociados y sus corredores inmobiliarios para atraer y comprometer a las perspectivas, alimentar a los clientes y asi ofrecer una experiencia positiva en las transacción de bienes raíces.</p>
									<!--a href="#" class="btn btn-primary white">ver más</a!-->
								</div>
							</div> <!-- item end -->
						</div>
						<!-- Controls -->
						  <a class="left carousel-control" href="#slider-carousel" role="button" data-slide="prev">
						    <i class="fa fa-arrow-left" aria-hidden="true"></i>
						    <span class="sr-only">Anterior</span>
						  </a>
						  <a class="right carousel-control" href="#slider-carousel" role="button" data-slide="next">
						    <i class="fa fa-arrow-right" aria-hidden="true"></i>
						    <span class="sr-only">Siguiente</span>
						  </a>
					</div> <!-- carousel slider wrapper -->
				</div>
			</div><!-- row end -->
		</div> <!-- container end -->
	</div>
    <!-- section slider end -->

    <!-- section about us start -->
    <section id="section-about">
    	<div class="container">
			<div class="about-wrapper">
    			<div class="row">
	    			<div class="col-md-4 col-sm-4 wow slideInLeft">
	    				<div class="about-inner">
	    					<h4> <i class="icon-bullhorn"></i> servicio asequible </h4>
	    					<p>La mejor tarifa del mercado, la relación precio valor que más se ajusta a tu bolsillo.</p>
	    				</div>
	    			</div> <!-- col end -->
	    			<div class="col-md-4 col-sm-4 wow slideInRight">
	    				<div class="about-inner">
	    					<h4> <i class="icon-clock"></i>disponibilIdad 24/7 </h4>
	    					<p>Estamos contigo todo el tiempo, en cualquier lugar.</p>
	    				</div>
	    			</div> <!-- col end -->
	    			
	    			<div class="col-md-4 col-sm-4 wow slideInDown">
	    				<div class="top-contact">
	    					 <div class="btn-group">
                              	<a href="contacto.php"><button type="button" class="btn btn-default"  aria-haspopup="true" aria-expanded="false">
                                <i class="fa fa-hand-o-right fa-3x"></i>
 Haz una conexión rápida </button></a>
                            </div>
	    				</div>
	    			</div>
	    		</div>
    		</div> <!-- row end -->
    	</div> <!-- container end -->
    </section>
    <!-- section about us end -->

    <!-- section feature start -->
    <section id="section-feature">
    	<div class="container">
    		<div class="row">
    			<div class="col-md-12 wow slideInDown">
    				<div class="section-heading text-center">
    					<h2>Por qué somos diferentes?</h2>
    					<p>Somos un recurso indispensable, te permitimos llevar un registro de inmuebles y clientes, te podemos dar información actualizada de los precios, ubicación, características, términos y condiciones de las propiedades.</p>
    				</div>
    			</div>
    		</div> <!-- row end -->
    		<div class="row">
    			<div class="col-md-7 ">
    				<div class="feature-inner">
						<div class="row">
							<div class="col-md-6 col-sm-6 wow slideInDown" data-wow-delay=".2s">
								<div class="feature-box">
		    						<i class="icon-trophy"></i> 
		    						<h4>Premiados #1</h4>
		    						<p>Galardonados con la excelencia por ser el sistema inmobiliario más amigable, confiable y seguro del mercado.</p>
		    					</div>
							</div> <!-- col-end  -->
							<div class="col-md-6 col-sm-6  wow slideInDown" data-wow-delay=".4s">
								<div class="feature-box">
		    						<i class="fa fa-cloud-download"></i>
		    						<h4>Acceso remoto total</h4>
		    						<p>Disponemos en la nube de todas las funcionalidades que ofrecen los programas de escritorio.</p>
		    					</div>
							</div> <!-- col-end  -->
							<div class="col-md-6 col-sm-6  wow slideInDown" data-wow-delay=".6s">
								<div class="feature-box">
		    						<i class="icon-road"></i> 
		    						<h4>Búsqueda sin igual</h4>
		    						<p>Colaboramos con nuestros asociados con información y herramientas móviles, permitiendo a los corredores inmobiliarios trabajar en cualquier lugar, en cualquier momento y en cualquier dispositivo. </p>
		    					</div>
							</div> <!-- col-end  -->
							<div class="col-md-6 col-sm-6  wow slideInDown" data-wow-delay=".8s">
								<div class="feature-box">
		    						<i class="icon-lab"></i> 
		    						<h4>Datos en su website</h4>
		    						<p>Visualización integrada en su propio sitio web a la medida de las necesidades de su negocio. Búsqueda completa con fotos, videos y cualquier otra información pública para los clientes en línea.</p>
		    					</div>
							</div> <!-- col-end  -->
						</div>
    				</div>
    			</div> <!-- col end -->
    			<div class="col-md-5 feature-slide col-sm-12 visible-md visible-lg wow slideInRight">
	    			<div class="carousel slide" id="feature-slide" data-ride="carousel">
	    				<div class="carousel-inner">
	    					<div class="item active">
	    						<img src="images/about/about7.jpg" alt="feature-img1">
	    					</div> <!-- item end -->
	    					<div class="item">
	    						<img src="images/about/about8.jpg" alt="feature-img2">
	    					</div> <!-- item end -->
	    					<div class="item">
	    						<img src="images/about/about9.jpg" alt="feature-img3">
	    					</div> <!-- item end -->
	    				</div>
	    			</div>
    			</div> <!-- col end -->
    		</div> <!-- row end -->
    	</div> <!-- container end -->
    </section>
    <!-- section feature end -->

    <!-- section service start -->
    <section id="section-service">
    	<div class="container">
    		<div class="row">
    			<div class="col-md-12 wow fadeIn">
    				<div class="section-heading text-center">
    					<h2>Servicio innovador</h2>
    					<p>Proporcionamos todas las herramientas necesarias para mantener a los corredores inmobiliarios adelante en un ritmo rápido dentro de un clima de negocios que demanda la actualidad diaria. </p>
    				</div>
    			</div>
    		</div> <!-- row end -->

    		<div class="row">
    			<div class="col-md-3 col-sm-4 wow fadeInLeft">
    				 <ul class="nav nav-tabs nav-stacked" role="tablist" id="service-tab-wrapper">
					    <li role="presentation" class="active">
					    	<a href="#tab_a" class="animated fadeIn"  role="tab" data-toggle="tab">Colaborativo</a>
					    </li>
					    <li role="presentation">
					    	<a href="#tab_b" class="animated fadeIn" role="tab" data-toggle="tab">Relacional</a>
					    </li>
					    <li role="presentation">
					    	<a href="#tab_c" class="animated fadeIn" role="tab" data-toggle="tab">Accesibilidad</a>
					    </li>
					    <li role="presentation">
					    	<a href="#tab_d" class="animated fadeIn"  role="tab" data-toggle="tab">Adecuado</a>
					    </li>
					    <li role="presentation">
					    	<a href="#tab_e" class="animated fadeIn"  role="tab" data-toggle="tab">Amigable</a>
					    </li>
					    <li role="presentation">
					    	<a href="#tab_f" class="animated fadeIn"  role="tab" data-toggle="tab">Enfocado</a>
					    </li>
					  </ul>
    			</div> <!-- col end -->
    			<div class="col-md-9 col-sm-8 wow fadeInRight">
    				<div class="tab-content" id="service-tab-content">
					    <div role="tabpanel" class="tab-pane active animated fadeIn" id="tab_a">
						    <div class="row">
						    	<div class="col-md-5 col-sm-12">
						    		<div class="service-img">
							    		<img src="images/about/casa.jpg" alt="feature-img3">
							    	</div>
						    	</div>
						    
							    <div class="col-md-7 col-sm-12">
							    	<div class="service-desc">
							    		<h4>Colaborativo</h4>
								    	<p>Compartimos la base de datos de propiedades a nivel nacional para que cualquiera de nuestros asociados y sus corredores inmobiliarios puedan acceder a esta información exclusiva.</p>
								    	<ul class="service-tab-info">
								    		<li>Precios según avaluos</li>
								    		<li>Caracteristicas descriptivas</li>
								    		<li>Detalles de la negociación</li>
								    		<li>Fotos, videos y mapa de ubicación</li>
								    	</ul>
							    	</div>
						    	</div>
						    </div>
					    </div> <!-- tabpanel end -->
					    
					     <div role="tabpanel" class="tab-pane animated fadeIn" id="tab_b">
					    	<div class="row">
						    	<div class="col-md-5 col-sm-12">
						    		<div class="service-img">
							    		<img src="images/about/about2.jpg" alt="feature-img3">
							    	</div>
						    	</div>
						    
							    <div class="col-md-7 col-sm-12">
							    	<div class="service-desc">
							    		<h4>Relacional</h4>
								    	<p>Te ayudamos a construir y mantener relaciones duraderas con tus clientes, hacer tu trabajo con mayor eficacia con una apariencia impresionante.</p>
								    	<ul class="service-tab-info">
								    		<li>Precios según avaluos</li>
								    		<li>Caracteristicas descriptivas</li>
								    		<li>Detalles de la negociación</li>
								    		<li>Fotos, videos y mapa de ubicación</li>
								    	</ul>
							    	</div>
						    	</div>
						    </div>
					    </div> <!-- tabpanel end -->

					     <div role="tabpanel" class="tab-pane animated fadeIn" id="tab_c">
					    	<div class="row">
						    	<div class="col-md-5 col-sm-12">
						    		<div class="service-img">
							    		<img src="images/about/terreno.jpg" alt="feature-img3">
							    	</div>
						    	</div>
						    
							    <div class="col-md-7 col-sm-12">
							    	<div class="service-desc">
							    		<h4>Accesibilidad</h4>
								    	<p>Su negocio y sus clientes son móviles y también lo es el sistema Oikos. Puede acceder a nuestra web diseñadas para móviles, usted y sus clientes tendrán acceso a todos los datos y los medios de comunicación en cualquier momento y en cualquier lugar que lo necesite.</p>
								    	<ul class="service-tab-info">
								    		<li>Precios según avaluos</li>
								    		<li>Caracteristicas descriptivas</li>
								    		<li>Detalles de la negociación</li>
								    		<li>Fotos, videos y mapa de ubicación</li>
								    	</ul>
							    	</div>
						    	</div>
						    </div>
					    </div> <!-- tabpanel end -->

					     <div role="tabpanel" class="tab-pane animated fadeIn" id="tab_d">
					    	<div class="row">
						    	<div class="col-md-5 col-sm-12">
						    		<div class="service-img">
							    		<img src="images/about/galpon.jpg" alt="feature-img3">
							    	</div>
						    	</div>
						    
							    <div class="col-md-7 col-sm-12">
							    	<div class="service-desc">
							    		<h4>Adecuado</h4>
								    	<p>Nos ajustamos a tus necesidades de negocio en lugar de exigir que ajustes tu negocio al sistema. Nuestros asociados pueden controlar las preferencias de los módulo de clientes y perfil de usuario, asi como el listado y los filtros para buscar, informar y personalizar las vistas de pantallas.</p>
								    	<ul class="service-tab-info">
								    		<li>Precios según avaluos</li>
								    		<li>Caracteristicas descriptivas</li>
								    		<li>Detalles de la negociación</li>
								    		<li>Fotos, videos y mapa de ubicación</li>
								    	</ul>
							    	</div>
						    	</div>
						    </div>
					    </div><!-- tabpanel end -->

					     <div role="tabpanel" class="tab-pane animated fadeIn" id="tab_e">
					    	<div class="row">
						    	<div class="col-md-5 col-sm-12">
						    		<div class="service-img">
							    		<img src="images/about/local.jpg" alt="feature-img3">
							    	</div>
						    	</div>
						    
							    <div class="col-md-7 col-sm-12">
							    	<div class="service-desc">
							    		<h4>Amigable</h4>
								    	<p>Es fácil de aprender y usar, desde nuestro inicio rápido que le permite acceder a cualquiera de las funciones de búsqueda compatibles con ayuda sensible al contexto, video tutoriales, manuales y seminarios web.</p>
								    	<ul class="service-tab-info">
								    		<li>Precios según avaluos</li>
								    		<li>Caracteristicas descriptivas</li>
								    		<li>Detalles de la negociación</li>
								    		<li>Fotos, videos y mapa de ubicación</li>
								    	</ul>
							    	</div>
						    	</div>
						    </div>
					    </div> <!-- tabpanel end -->

					     <div role="tabpanel" class="tab-pane animated fadeIn" id="tab_f">
					    	<div class="row">
						    	<div class="col-md-5 col-sm-12">
						    		<div class="service-img">
							    		<img src="images/about/negocio.jpg" alt="feature-img3">
							    	</div>
						    	</div>
						    
							    <div class="col-md-7 col-sm-12">
							    	<div class="service-desc">
							    		<h4>Enfocado</h4>
								    	<p>Te apoyamos para que puedas centrarte en lo más importante: Proporcionar el mejor servicio a tus clientes. Ofrecemos velocidad y precisión cuando más lo necesitas.</p>
								    	<ul class="service-tab-info">
								    		<li>Precios según avaluos</li>
								    		<li>Caracteristicas descriptivas</li>
								    		<li>Detalles de la negociación</li>
								    		<li>Fotos, videos y mapa de ubicación</li>
								    	</ul>
							    	</div>
						    	</div>
						    </div>
					 	</div>
    				</div>
    			</div> <!-- col end -->
    		</div> <!-- row end -->
    	</div> <!-- container end -->
    </section>
    <!-- section service end -->

    <!-- our team start -->
    <section id="section-team" >
    	<div class="container">
    		<div class="row">
    			<div class="col-md-12 wow slideInLeft">
	    			<div class="section-heading text-left">
	    				<h2 class="sub-sec-title">Información centralizada</h2>
	    				<div class="line"></div>
	    			</div>
	    			<!-- Controls -->
	    				<div class="team-control">
	    				  <a class="left carousel-control" href="#team-carousel" role="button" data-slide="prev">
						    <i class="fa  fa-long-arrow-left " aria-hidden="true"></i>
						    <span class="sr-only">Anterior</span>
						  </a>
						  <a class="right carousel-control" href="#team-carousel" role="button" data-slide="next">
						    <i class="fa  fa-long-arrow-right " aria-hidden="true"></i>
						    <span class="sr-only">Siguiente</span>
						  </a>
	    			</div>
    			</div>
    		</div> <!-- row end -->
    			<div class="row">
    				<div class="carousel slide " id="team-carousel">
    					<div class="carousel-inner">
    						<div class="item active">
    							<div class="col-md-3 col-sm-6 wow fadeInUp" data-wow-delay="0s">
	    							<div class="team-box">
	    								<img src="images/team/a1.jpg" alt="">
	    								<div class="team-desc">
	    									<h4>Base de datos</h4>
	    									<p>compartida con los asociados</p>
	    									<a href="#"><i class="fa fa-share-alt"></i> ganar ganar</a>
	    								</div>
	    							</div>
    							</div>
								<div class="col-md-3 col-sm-6 wow fadeInUp" data-wow-delay=".2s">
									<div class="team-box">
	    								<img src="images/team/a2.jpg" alt="">
	    								<div class="team-desc">
	    									<h4>Notificación via email</h4>
	    									<p>clientes 100% actualizados</p>
	    									<a href="#"><i class="fa fa-envelope"></i> robot mail</a>
	    								</div>
	    							</div>
    							</div>
								<div class="col-md-3 col-sm-6 wow fadeInUp" data-wow-delay=".4s" >
									<div class="team-box">
	    								<img src="images/team/a3.jpg" alt="">
	    								<div class="team-desc">
	    									<h4>Integración en website</h4>
	    									<p>listados portatiles</p>
	    									<a href="#"><i class="fa fa-list"></i> script en PHP</a>
	    								</div>
	    							</div>
    							</div>
								<div class="col-md-3 col-sm-6 wow fadeInUp" data-wow-delay=".6s">
									<div class="team-box">
	    								<img src="images/team/a4.jpg" alt="">
	    								<div class="team-desc">
	    									<h4>Manejo de inmuebles</h4>
	    									<p>captaciones a la mano</p>
	    									<a href="#"><i class="fa fa-newspaper-o"></i> Listas detalladas</a>
	    								</div>
	    							</div>
    							</div>
    						</div> <!-- item end -->

							<div class="item ">
    							<div class="col-md-3 col-sm-6 wow fadeInUp" data-wow-delay="0s">
	    							<div class="team-box">
	    								<img src="images/team/a5.jpg" alt="">
	    								<div class="team-desc">
	    									<h4>Control de referidos</h4>
	    									<p>seguimiento de gestión</p>
	    									<a href="#"><i class="fa fa-user-plus"></i> compartir %</a>
	    								</div>
	    							</div>
    							</div>
								<div class="col-md-3 col-sm-6 wow fadeInUp" data-wow-delay=".2s">
									<div class="team-box">
	    								<img src="images/team/a6.jpg" alt="">
	    								<div class="team-desc">
	    									<h4>Publicar propiedades</h4>
	    									<p>administrar listas</p>
	    									<a href="#"><i class="fa fa-file-text-o"></i> alimentar el sistema</a>
	    								</div>
	    							</div>
    							</div>
								<div class="col-md-3 col-sm-6 wow fadeInUp" data-wow-delay=".4s">
									<div class="team-box">
	    								<img src="images/team/a7.jpg" alt="">
	    								<div class="team-desc">
	    									<h4>Agendar visitas</h4>
	    									<p>mostrar propiedad</p>
	    									<a href="#"><i class="fa fa-eye"></i> open house</a>
	    								</div>
	    							</div>
    							</div>
								<div class="col-md-3 col-sm-6 wow fadeInUp" data-wow-delay=".6s">
									<div class="team-box">
	    								<img src="images/team/a8.jpg" alt="">
	    								<div class="team-desc">
	    									<h4>Buscar inmuebles</h4>
	    									<p>filtrar resultados</p>
	    									<a href="#"><i class="fa fa-search-plus"></i> encontrar bienes</a>
	    								</div>
	    							</div>
    							</div>
    						</div> <!-- item end -->
							
    					</div>
    				</div>	<!-- carousle slide -->
    		</div> <!-- row end -->
    	</div> <!-- container end -->
    </section>
    <!-- our team end -->

    <!-- section textimonial start -->
    <section id="section-quote">
    	<div class="container">
    		<div class="row">
    			<div class="col-md-12">
    				<div class="quote-desc text-center">
    					<h2 class="wow fadeInDown">Somos un equipo de jóvenes profesionales apasionados por nuestro trabajo.</h2>
    					<p class="wow slideInLeft">Hemos creado una herramienta web integrada para hacer crecer tu negocio.</p>
    				</div>
    			</div>

    			<div class="col-md-12 text-center wow ">
                    <form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
<input type="hidden" name="cmd" value="_s-xclick">
<input type="hidden" name="hosted_button_id" value="VVG4U9UCWWK7L">

<input type="hidden" name="on0" value="Opciones de pago">Opciones de suscripción</td></tr><tr>
  <td><p>
  <select name="os0">
    <option value="pago mensual">Pago mensual : $35.00 USD </option>
    <option value="pago trimestral">Pago trimestral : $102.00 USD </option>
    <option value="pago semestral">Pago semestral : $202.00 USD </option>
    <option value="pago 9 meses">Pago 9 meses : $296.00 USD </option>
    <option value="pago anual">Pago anual : $391.00 USD </option>
  </select> 
    </p>
    <p>
  <input type="hidden" name="currency_code" value="USD">
      <input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_subscribeCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
      <img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1"></p>
  </form>

    			</div>
    		</div> <!-- row end -->
    	</div> <!-- container end -->
    </section>
    <!-- section textimonial end -->

    <!-- section contact start -->
    <section id="section-contact-info">
    	<div class="container">
    		<div class="row">
    			<div class="col-md-3 col-sm-3 wow slideInLeft" data-wow-delay="0s">
    				<div class="info-box">
    					<i class="icon-location"></i>
    					<h4>Dirección</h4>
    					<p>Urb Cantarrana, Av Las Delicias, Hospital de clinicas Las Delicias PB 10-1 Maracay, Aragua, Venezuela </p>
    				</div>
    			</div> <!-- col end -->
    			<div class="col-md-3 col-sm-3  wow slideInLeft" data-wow-delay=".2s">
    				<div class="info-box">
    					<i class="icon-mobile"></i>
    					<h4>Hotline</h4>
    					+58 243 535.0114                       
    				</div>
    			</div> <!-- col end -->
    			<div class="col-md-3 col-sm-3  wow slideInLeft" data-wow-delay=".4s">
    				<div class="info-box">
    					<i class="icon-address-book"></i>
    					<h4>Email contacto</h4>
    					<p><a href="mailto:info@oikosplus.com">info@oikosplus.com</a></p>
                       <a href="https://twitter.com/gustabin" class="twitter-follow-button" data-show-count="false" data-lang="es">Seguir a @gustabin</a>
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>
    				</div>
    			</div> <!-- col end -->
    			<div class="col-md-3 col-sm-3  wow slideInLeft" data-wow-delay=".6s">
    				<div class="info-box">
    					<i class="icon-bookmark"></i>
    					<h4>Website</h4>
    					<p><a href="http://www.oikosplus.com">www.oikosplus.com</a></p>
    				</div>
    			</div> <!-- col end -->
    		</div> <!-- row end -->
    	</div> <!-- container end -->
    </section> 
    <!-- section contact end -->

    <!-- section Footer start -->
    <section id="section-footer">
    	<div class="container">
    		<div class="row">
    			<div class="col-md-12 text-center wow fadeInDown">
    				<div class="footer-desc">
    					<h1 class="footer-logo">sistema inmobiliario</h1>
    					<p>Mantenga todo organizado en un solo lugar, lista de propiedades, manejo de clientes, envio automático de email y mucho más.</p>

    					<h6 class="copy">&copy; 2015 copyright tabin, c.a. </h6>
    				</div>
    			</div>
    		</div> <!-- row end -->
    	</div> <!-- container end -->
    </section>
    <!-- section Footer end -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
    <!-- form validation -->
    <script type="text/javascript" src="js/validator.min.js"></script>
    <script type="text/javascript" src="js/form-scripts.js"></script>
    <!-- Plugin JavaScript -->
    <script src="js/jquery.easing.min.js"></script>
    <!-- Wow Animation -->
    <script type="text/javascript" src="js/wow.min.js"></script>
    <!-- html5 shiv -->
    <script type="text/javascript" src="js/html5shiv.js"></script>
    <!-- respond js -->
    <script type="text/javascript" src="js/respond.js"></script>
    <!-- Custom Theme JavaScript -->
    <script src="js/theme.js"></script>

</body>

</html>
