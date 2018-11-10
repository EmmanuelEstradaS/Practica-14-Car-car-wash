<?php
//iniciar la sesion y redireccionar al los productos
error_reporting(0);
    session_start();
  if(!$_SESSION['id']){
    echo "
    <script type='text/javascript'>
      window.location='index.php';
    </script>";
  } 
?>
 
<!-- USUARIOS -->
<?php if($_SESSION['username']=="admin"){ ?>
    <div class="card page-header p-0">
        <div class="card-block front-icon-breadcrumb row align-items-end">
            <div class="breadcrumb-header col">
                <div class="big-icon">
                    <span class="pcoded-micon"><i class="ti-user text-warning"></i></span>
                </div>
                <div class="d-inline-block">
                    <h5>Usuarios</h5>
                    <span> Cantidad de usuarios:  
                        <?php 
                            $cantidadUs = new MvcController(); 
                            $cantidadUs -> getCantidadUsuariosController();
                        ?> 
                    </span>
                </div>
            </div>
            <div class="col">
            <div class="page-header-breadcrumb">
                <ul class="breadcrumb-title">
                    <li class="breadcrumb-item"><a href="index.php?action=dashboard">Home</a>
                    </li>
                    <li class="breadcrumb-item"><a href="index.php?action=listado_usuarios">Usuarios</a>
                    </li>
                </ul>
            </div>
            </div>
        </div>
    </div>
<?php }?>

<!-- MIS VISITAS -->
<?php if($_SESSION['username']!="admin"){ ?>
    <div class="card page-header p-0">
        <div class="card-block front-icon-breadcrumb row align-items-end">
            <div class="breadcrumb-header col">
                <a href="index.php?action=cw_visitas_vista_cliente">
                    <div class="big-icon">
                        <span class="pcoded-micon"><i class="ti-user text-warning"></i></span>
                    </div>
                    <div class="d-inline-block">
                        <h5>Mis Visitas</h5>
                        <span> Cantidad de visitas:  
                            <?php 
                                #$cantidadUs = new MvcController(); 
                                #$cantidadUs -> getCantidadUsuariosController();
                                echo $_SESSION["num_visitas"];
                            ?> 
                        </span>
                    </div>
                </a>
            </div>
            <div class="col">
            <div class="page-header-breadcrumb">
                <ul class="breadcrumb-title">
                    <li class="breadcrumb-item"><a href="index.php?action=dashboard">Home</a>
                    </li>
                    <li class="breadcrumb-item"><a href="index.php?action=cw_visitas_vista_cliente">Mis Visitas</a>
                    </li>
                </ul>
            </div>
            </div>
        </div>
    </div>
<?php }?>

<!-- PREMIOS -->
<div class="card page-header p-0">
    <div class="card-block front-icon-breadcrumb row align-items-end">
        <div class="breadcrumb-header col">
            <a href="index.php?action=cw_premio_vista">
                <div class="big-icon">
                    <span class="pcoded-micon"><i class="ti-package text-danger"></i> </span>
                </div>
                <div class="d-inline-block">
                    <h5>Premios</h5>
                    <span> Cantidad de premios:  
                        <?php 
                           $cantidad = new MvcController(); 
                            $cantidad -> getCantidadPremiosController();
                        ?> 
                    </span>
                </div>
            </a>
        </div>
        <div class="col">
        <div class="page-header-breadcrumb">
            <ul class="breadcrumb-title">
                <li class="breadcrumb-item"><a href="index.php?action=dashboard">Home</a>
                </li>
                <li class="breadcrumb-item"><a href="index.php?action=cw_premio_vista">Premios</a>
                </li>
            </ul>
        </div>
        </div>
    </div>
</div>

<!-- CLIMA -->
<div class="card page-header p-0">
    <div class="card-block front-icon-breadcrumb row align-items-end">
        <div class="breadcrumb-header col">
            <a href="index.php?action=cw_clima">
                <div class="big-icon">
                    <span class="pcoded-micon"><i class="fa fa-cloud text-info"></i> </span> 
                </div>
                <div class="d-inline-block">
                    <h5>Clima</h5>
                    <span> Clima de Ciudad Victoria  </span>
                </div>
            </a>    
        </div>
        <div class="col">
        <div class="page-header-breadcrumb">
            <ul class="breadcrumb-title">
                <li class="breadcrumb-item"><a href="index.php?action=dashboard">Home</a>
                </li>
                <li class="breadcrumb-item"><a href="index.php?action=cw_clima">Clima</a>
                </li>
            </ul>
        </div>
        </div>
    </div>
</div>

<!-- SERVICIOS -->
<div class="card page-header p-0">
    <div class="card-block front-icon-breadcrumb row align-items-end">
        <div class="breadcrumb-header col">
            <a href="index.php?action=cw_servicio_vista">
                <div class="big-icon">
                    <span class="pcoded-micon"><i class="fa fa-cog text-danger"></i> </span> 
                </div>
                <div class="d-inline-block">
                    <h5>Servicios</h5>
                    <span> Cantidad de servicios:  
                        <?php 
                           $cantidad = new MvcController(); 
                            $cantidad -> getCantidadRegistrosController("cw_servicios");
                        ?> 
                    </span>
                </div>
            </a>    
        </div>
        <div class="col">
        <div class="page-header-breadcrumb">
            <ul class="breadcrumb-title">
                <li class="breadcrumb-item"><a href="index.php?action=dashboard">Home</a>
                </li>
                <li class="breadcrumb-item"><a href="index.php?action=cw_servicio_vista">Servicios</a>
                </li>
            </ul>
        </div>
        </div>
    </div>
</div>





