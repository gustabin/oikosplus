<?php 
session_start(); 
$valor = $_SESSION['valor'];
 
if ($valor == '1') 
	{
	$escritorio = "active";
	}
if ($valor == '2') 
	{
	$propiedades = "active";
	}
if ($valor == '3') 
	{
	$clientes = "active";
	}
if ($valor == '4') 
	{
	$correos = "active";
	}
if ($valor == '5') 
	{
	$perfil = "active";
	}
if ($valor == '6') 
	{
	$salir = "active";
	}
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
     <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    
    <link href="css2/style-t1.css" rel="stylesheet">
  <link href="css2/jquery-ui.css" rel="stylesheet" type="text/css" media="screen" />
  <link href="css2/jquery.ui.datepicker.css" rel="stylesheet" media="screen" />
  <link href="css2/jquery.ui.core.css" rel="stylesheet" media="screen" />
  <link href="css2/jquery.ui.theme.css" rel="stylesheet" media="screen" />
  <link rel="stylesheet" href="css/font-awesome.min.css">


  <!-- .................................... $scripts .................................... -->
  <script type="text/javascript" language="javascript" src="js2/jquery.js"></script>
  <script type="text/javascript" language="javascript" src="js2/jquery-ui.js"></script>
 
  <script src="js2/jquery.min.js"></script>
  <script src="js2/modernizr.min.js"></script>


  <script src="js2/bootstrap.min.js"></script>
  <script src="js2/jquery.fancybox.min.js"></script>
  <script src="js2/jquery.hoverdir.min.js"></script>
  <script src="js2/jquery.isotope.min.js"></script>
  <script src="js2/jquery.masonry.min.js"></script>
  <script src="js2/jquery.fitvids.min.js"></script>
  <script src="js2/jquery.flexslider.min.js"></script>
  <!--script src="<?php// echo INCLUDES ?>js/script.js"></script!--> 
  <script type="text/javascript" language="javascript" src="js2/jquery.validate.js"></script>
  <script type="text/javascript" language="javascript" src="js2/jquery.ui.datepicker.js"></script>
  <script type="text/JavaScript" language="javascript" src="js2/jquery.ui.core.js"></script>
  <script type="text/JavaScript" language="javascript" src="js2/jquery.ui.widget.js"></script>
  <script type="text/JavaScript" language="javascript" src="js2/datepiker_lenguaje.js"></script>
  <script type="text/JavaScript" language="javascript" src="js2/jquery.maskedinput.js"></script>	
    
  <script type="text/javascript" src="js2/jquery.tablesorter.js"></script> 
  <script type="text/javascript" src="js2/jquery.tablesorter.pager.js"></script> 

</head>
<body>
<div class="container-fluid">
	<div class="row">
		<div class="col-md-12">
			<nav class="navbar navbar-default navbar-inverse navbar-static-top" role="navigation">
				<div class="navbar-header">
					 
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
						 <span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span>
					</button> <a class="brand span3" href="index.php">
            <img class="img-responsive" src="images/logoMenu2.png"> 
			</a>
				</div>
				
				<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
					<ul class="nav navbar-nav">
						 <?php		  
		  if (isset($_SESSION['email']))  // si esta logueado
			{
				  ?>
					  <li class="<?php echo $escritorio; ?>"><a href="escritorio.php">Escritorio</a></li>
					  <li class="<?php echo $propiedades; ?>"><a href="propiedades.php">Propiedades</a></li>			  			  					  
					  <li class="<?php echo $clientes; ?>"><a href="clientes.php">Clientes</a></li>   
                      <li class="<?php echo $correos; ?>"><a href="correos.php">Correos</a></li>   
		  <?php }	?>
						<li class="dropdown">
							 <a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown<strong class="caret"></strong></a>
							<ul class="dropdown-menu">
								<li>
									<a href="#">Action</a>
								</li>
								<li>
									<a href="#">Another action</a>
								</li>
								<li>
									<a href="#">Something else here</a>
								</li>
								<li class="divider">
								</li>
								<li>
									<a href="#">Separated link</a>
								</li>
								<li class="divider">
								</li>
								<li>
									<a href="#">One more separated link</a>
								</li>
							</ul>
						</li>
					</ul>
					<form class="navbar-form navbar-left" role="search">
						<div class="form-group">
							<input class="form-control" type="text" />
						</div> 
						<button type="submit" class="btn btn-default">
							Buscar
						</button>
					</form>
					<ul class="nav navbar-nav navbar-right">
						<li>
							<a href="#">Link</a>
						</li>
						<li class="dropdown">
							 <a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo $_SESSION['nombre']; ?>&nbsp;<?php echo $_SESSION['apellido']; ?> <strong class="caret"></strong></a>
							<ul class="dropdown-menu">								
                                <li class="<?php echo $perfil; ?>"><a href="perfil.php">Perfil</a></li>   
								
								<li class="divider">
								</li>
                                <?php		  
		  if (isset($_SESSION['email']))  // si esta logueado
			{
				  ?>
                                <li class="<?php echo $salir; ?>"><a href="logout.php">Salir</a></li>           
		  <?php }	?>								
							</ul>
						</li>
					</ul>
				</div>				
			</nav>
		</div>
	</div>
</div>
