<?php
include "class/class.php";
require_once('tools/mypathdb.php'); 

if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
  JCombo::ver_ciudades($_GET["cod"]);
} else {
	die("Vete!");
}
?>
