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

<header class="header">
    <nav class="navbar fixed-top">         
        <!-- Begin Search Box-->
        
        <!-- End Search Box-->
        <!-- Begin Topbar -->
        <div class="navbar-holder d-flex align-items-center align-middle justify-content-between">
            <!-- Begin Logo -->
            <div class="navbar-header">
                <a href="db-default.html" class="navbar-brand">
                    
                    <div class="brand-image">
                        <img src="views/carro.png" alt="logo" class="logo-small">
                    </div>
                </a>
                <!-- Toggle Button -->
                <a id="toggle-btn" href="#" class="menu-btn">
                    <span></span>
                    <span></span>
                    <span></span>
                </a>
                <!-- End Toggle -->
            </div>
            <!-- End Logo -->
            <!-- Begin Navbar Menu -->
            <ul class="nav-menu list-unstyled d-flex flex-md-row align-items-md-center pull-right">
                <!-- Search -->
                
                <!-- End Search -->
                <!-- Begin Notifications -->
              
                <!-- End Notifications -->
                <!-- User -->
                <li class="nav-item dropdown"><a id="user" rel="nofollow" data-target="#" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link"><img src="views/carro.png" alt="..." class="avatar rounded-circle"></a>
                    <ul aria-labelledby="user" class="user-size dropdown-menu">
                        <li class="welcome">
                            <a href="#" class="edit-profil"><i class="la la-gear"></i></a>
                            <img src="views/carro.png" alt="..." class="rounded-circle">
                        </li>
                        <li>
                            <a href="pages-profile.html" class="dropdown-item"> 
                                ADMINISTRADOR DEL SISTEMA
                            </a>
                        </li>
                        <li><a rel="nofollow" href="index.php?action=salir" class="dropdown-item logout text-center"><i class="ti-power-off"></i></a></li>
                    </ul>
                </li>
                <!-- End User -->
                <!-- Begin Quick Actions -->
                <li class="nav-item"><a href="#off-canvas" class="open-sidebar"><i class="la la-ellipsis-h"></i></a></li>
                <!-- End Quick Actions -->
            </ul>
            <!-- End Navbar Menu -->
        </div>
        <!-- End Topbar -->
    </nav>
</header>