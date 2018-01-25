<?php 
session_start();
error_reporting(0);
include "header.php";
?> 

  <!-- .................................... $breadcrumb .................................... -->
  <section class="section-breadcrumb section-color-graylighter">
    <div class="container">
      <ul class="breadcrumb">
        <li><a href="index.php">Inicio</a><span class="divider">/</span></li>
        <li class="active">Contacto Listo</li>
      </ul>
    </div>
  </section>
  <!-- .................................... $Contact .................................... -->
  
    <div class="container" style="margin-top:10px">
      <h2 class="section-title">
        Informaci&oacute;n recibida</h2>
      </div>
  
  <!-- .................................... $Contact .................................... -->
  <section class="section-content section-contact section-color-graylighter">
    <div class="container">
      <div class="row">
        <div class="span8"><img src="images/bg/recibido.png" width="400" height="350" />        
        </div>
      </div>
    </div>
  </section>
    <!-- .................................... $footer .................................... -->
  <?php include "footer.php"; ?>