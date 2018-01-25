<?php 
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
<body class="home"> 

<!-- .................................... $header .................................... -->
  <header class="navbar-fixed-top">
    <div class="container">
      <div class="navbar">
        <div class="navbar-inner">
          <a class="btn btn-navbar" data-target=".nav-collapse" data-toggle="collapse">
            <i class="icon-reorder"></i>
          </a>
		  
        <a class="brand span3" href="index.php">
            <img src="images/oikos-logo.gif" width="89" height="76"> 
			</a>			

            <ul class="nav navbar-right">
          <?php		  
		  if (isset($_SESSION['email']))  // si esta logueado
			{
				  ?>
					  <li class="<?php echo $escritorio; ?>"><a href="escritorio.php">escritorio</a></li>
					  <li class="<?php echo $propiedades; ?>"><a href="propiedades.php">propiedades</a></li>			  			  
					  <!--li class="dropdown <?php //echo $registrar; ?>">
						<a class="dropdown-toggle" data-toggle="dropdown" href="#">Registrar<b class="caret"></b></a>
						<ul class="dropdown-menu">
						  <li class="<?php //echo $registrar; ?>"><a href="registrar.php">Paciente</a></li>
						  <li class="<?php //echo $registrarDoctor; ?>"><a href="registrarDr2.php">Doctor</a></li>
						</ul>
					  </li!-->
					  <li class="<?php echo $clientes; ?>"><a href="clientes.php">clientes</a></li>   
                      <li class="<?php echo $correos; ?>"><a href="correos.php">correos</a></li>   
                      <li class="<?php echo $perfil; ?>"><a href="perfil.php">perfil</a></li>   
                      <li class="<?php echo $salir; ?>"><a href="logout.php">salir</a></li>           
		  <?php }	?>
		</ul>

        </div>
      </div>
    </div>
  </header>