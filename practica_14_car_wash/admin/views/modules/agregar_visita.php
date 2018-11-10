<?php
//ver si hay una sesion existente
  error_reporting(0);
  session_start();
  if(!$_SESSION['admin']){
    echo "
    <script type='text/javascript'>
      window.location='index.php';
    </script>";
  } 
?>

<?php
    include("admin_header.php");
?>

<?php
    $datosUser = new MvcController();
    $dats = $datosUser -> getDatosUsuarioController();
?>

 <?php
  $visi = new MvcController();
  $visi -> agregarVisitaController();
?>


 <div class="content-inner">
                    <div class="container-fluid">
                        <!-- Begin Page Header-->
                        <div class="row">
                            <div class="page-header">
	                            <div class="d-flex align-items-center">
	                                <h2 class="page-header-title">VISITA</h2>
	                                
	                            </div>
                            </div>
                        </div>
                        <!-- End Page Header -->
                        <div class="row">
                            <div class="col-xl-12">
                                <!-- Begin Invoice -->
                                <div class="invoice has-shadow">
                                    <!-- Begin Invoice COntainer -->
                                    <div class="invoice-container">
                                        <!-- Begin Invoice Top -->
	                                    <div class="invoice-top">
                                            <div class="row d-flex align-items-center">
                                                <div class="col-xl-6 col-md-6 col-sm-6 col-6">
        	                                        <h1>ID DE USUARIO: <?php echo $dats["id_usuario"] ?></h1>
                                                </div>
                                                
                                            </div>
	                                    </div>
                                        <!-- End Invoice Top -->
                                        <!-- Begin Invoice Header -->
                                        <div class="invoice-header">
                                        	<div class="row d-flex align-items-center">
	                                        	<div class="col-xl-2 col-md-2 col-sm-12 d-flex justify-content-xl-start justify-content-md-center justify-content-center mb-2">
		                                        	<div class="invoice-logo">
		                                                <img src="views/carro.png" alt="logo">
		                                            </div>
		                                        </div>
		                                        <div class="col-xl-5 col-md-5 col-sm-6 d-flex justify-content-xl-start justify-content-md-center justify-content-center mb-2">
		                                            <div class="details">
		                                            	<ul>
		                                                    <li class="company-name">Datos del usuario:</li>
		                                                    <li>Nombre: <?php echo $dats["nombre"] ?></li>
		                                                    <li>Apellido: <?php echo $dats["apellido"] ?></li>
		                                                    <li>Correo: <?php echo $dats["email"] ?></li>
		                                                </ul>
		                                            </div>
	                                            </div>
	                                            <div class="col-xl-5 col-md-5 col-sm-6 d-flex justify-content-xl-end justify-content-md-end justify-content-center mb-2">
	                                                <div class="client-details">
	                                                    <ul>
	                                                    	<li class="title">Fecha de registro:</li>
		                                                    <li><?php echo $dats["fecha_registro"] ?></li>
	                                                    </ul>
	                                                </div>
                                                <div class="client-details">
	                                                    <ul>
	                                                    	<li class="title">Número de visitas:</li>
		                                                    <li><?php echo $dats["num_visitas"] ?></li>
	                                                    </ul>
	                                                </div>
	                                            </div>
                                            </div>
                                        </div>
                                        <!-- End Invoice Header -->
                                        
                                        
                                    </div>
                                    <!-- End Invoice Container -->
                                    <!-- Begin Invoice Footer -->
                                    <div class="invoice-footer">
                                        <!-- Begin Invoice Container -->
                                        <div class="invoice-container">
                                            <div class="row d-flex align-items-center">
                                                <div class="col-xl-6 col-md-6 col-sm-6 d-flex justify-content-xl-start justify-content-md-start justify-content-center mb-2">
                                                    <div class="total">
                                                        <div class="number">SERVICIOS</div>
                                                      
                                                      
                                                        <form method="post"  class="needs-validation"  novalidate="">
                                                            <select class="form-control" name="select_servicios" required="">
                                                              <option value="">Selecciona un servicio</option>
                                                              <?php
                                                                $opciones = new MvcController();
                                                                $opciones -> getServiciosParaSelectController();
                                                              ?>
                                                            </select>
                                                            <div class="invalid-feedback">
                                                                Por favor selecciona un servicio
                                                            </div>
                                                    </div>
                                                </div>
                                              
                                                <div class="col-xl-6 col-md-6 col-sm-12 d-flex justify-content-xl-end justify-content-md-end justify-content-center">
                                                    <div class="total">
                                                        <button class="btn btn-gradient-01" name="btnEnviar" type="submit">Guardar</button>
                                                    </div>
                                                </div>
                                                </form>
                                             
                                              
                                              
                                            </div>
                                            <div class="footer-bottom">
                                                <div class="thx">
                                                    <i class="la la-heart"></i><span>Gracias por usar el sistema CAR WASH!</span>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Invoice Container -->
                                    </div>
                                    <!-- End Invoice Footer -->
                                </div>
                                <!-- End Invoice -->
                            </div>
                        </div>
                        <!-- End Row -->
                    </div>
                    <!-- End Container -->
                </div>

