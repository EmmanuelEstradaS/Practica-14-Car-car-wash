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


<div class="default-sidebar">
    <!-- Begin Side Navbar -->
    <nav class="side-navbar box-scroll sidebar-scroll">
        <!-- Begin Main Navigation -->
        <span class="heading">Components</span>
        <ul class="list-unstyled">
            <li><a href="#dropdown-ui" aria-expanded="false" data-toggle="collapse"><i class="la la-user"></i><span>Usuarios</span></a>
                <ul id="dropdown-ui" class="collapse list-unstyled pt-0">
                    <li><a href="index.php?action=listado_usuarios">Listado de usuarios</a></li>
                    <li><a href="index.php?action=agregar_usuario">Agregar usuario</a></li>
                </ul>
            </li>
            <li><a href="#dropdown-icons" aria-expanded="false" data-toggle="collapse"><i class="la la-calendar-check-o"></i><span>Visitas</span></a>
                <ul id="dropdown-icons" class="collapse list-unstyled pt-0">
                    <li><a href="index.php?action=listado_visitas">Listado de visitas</a></li>
                    
                </ul>
            </li>
            <li><a href="#dropdown-forms" aria-expanded="false" data-toggle="collapse"><i class="la la-birthday-cake"></i><span>Premios</span></a>
                <ul id="dropdown-forms" class="collapse list-unstyled pt-0">
                    <li><a href="index.php?action=listado_premios">Listado de premios</a></li>
                    <li><a href="index.php?action=agregar_premio">Agregar premio</a></li>
                </ul>
            </li>
            <li><a href="#dropdown-tables" aria-expanded="false" data-toggle="collapse"><i class="la la-gear"></i><span>Servicios</span></a>
                <ul id="dropdown-tables" class="collapse list-unstyled pt-0">
                    <li><a href="index.php?action=listado_servicios">Listado de servicios</a></li>
                    <li><a href="index.php?action=agregar_servicio">Agregar servicio</a></li>
                </ul>
            </li>
        </ul>
        <!-- End Main Navigation -->
    </nav>
    <!-- End Side Navbar -->
</div>
