<?  
session_start();
error_reporting(E_ALL & ~E_NOTICE);
include("geoiploc.php"); // Incluimos el Archivo bajado para localizar el pais
  if (empty($_POST['checkip'])) //Envio Solicitud?
  {
	$ip = $_SERVER["REMOTE_ADDR"]; //si llego desde otra ubicacion o con url directa, toma la IP del cliente
  }
  else
  {
	$ip = $_POST['checkip']; //si mando una IP desde la misma pagina 
  }
   $_SESSION['pais'] = getCountryFromIP($ip, " NamE"); 
   //$_SESSION['pais'] = "Panamá"; 
?>  
