<nav class="pcoded-navbar">
    <div class="sidebar_toggle"><a href="#"><i class="icon-close icons"></i></a></div>
    <div class="pcoded-inner-navbar main-menu">
        <div class="">
            <div class="main-menu-header">
                <div class="user-details">
                    <span> <h3>  </h3> </span>
                    <span> Usuario: <?php echo $_SESSION["username"] ?> </span>
                </div>
            </div>
        </div>

        <div class="pcoded-navigatio-lavel" data-i18n="nav.category.navigation">Administracion</div>

        <ul class="pcoded-item pcoded-left-item">
            <li class="pcoded-hasmenu">
                <a href="index.php?action=dashboard">
                    <span class="pcoded-micon"><i class="ti-home"></i><b>D</b></span>
                    <span class="pcoded-mtext" data-i18n="nav.dash.main">Dashboard</span>
                    <span class="pcoded-mcaret"></span>
                </a>
            </li>


            <li class="pcoded-hasmenu">
                <a href="index.php?action=mapa">
                    <span class="pcoded-micon"><i class="ti-location-pin"></i><b>W</b></span>
                    <span class="pcoded-mtext"  data-i18n="nav.widget.main">Mapa</span>
                    <span class="pcoded-mcaret"></span>
                </a>
            </li>

             <li class="pcoded-hasmenu">
                <a href="#">
                    <span class="pcoded-micon"><i class="ti-arrow-circle-down"></i><b>W</b></span>
                    <span class="pcoded-mtext"  data-i18n="nav.widget.main">Horario</span>
                    <span class="pcoded-mcaret"></span>
                </a>
                <ul class="pcoded-submenu">
                        <li class="">
                            <a href="">
                                <span class="pcoded-mtext" data-i18n="nav.dash.default"><div style="text-align:center;padding:1em 0;"> <h4><a style="text-decoration:none;" ><span style="color:gray;">Lunes a Viernes de 08:00 a 20:30 horas.</span><br />Sabado de 09:00 a 16:30 horas</a></h4> <iframe src="https://www.zeitverschiebung.net/clock-widget-iframe-v2?language=es&size=small&timezone=America%2FMonterrey" width="100%" height="90" frameborder="0" seamless></iframe> </div>
                                </span>
                            </a>
                        </li>
                    </ul>
            </li>

            <li class="pcoded-hasmenu">
                <a href="index.php?action=actualizar_contraseña">
                    <span class="pcoded-micon"><i class="ti-key"></i><b>W</b></span>
                    <span class="pcoded-mtext"  data-i18n="nav.widget.main">Actualizar Contraseña</span>
                    <span class="pcoded-mcaret"></span>
                </a>
            </li>

            <li class="pcoded-hasmenu">
                <a href="#">
                    <span class="pcoded-micon"><i class="ti-comment-alt"></i><b>W</b></span>
                    <span class="pcoded-mtext"  data-i18n="nav.widget.main">Acerca de</span>
                    <span class="pcoded-mcaret"></span>
                </a>
            </li>

            </li>
            <?php if($_SESSION['username']=="admin"){ ?>
                <li class="pcoded-hasmenu">
                    <a href="#">
                        <span class="pcoded-micon"><i class="ti-user"></i><b>W</b></span>
                        <span class="pcoded-mtext"  data-i18n="nav.widget.main">Usuarios</span>
                        <span class="pcoded-mcaret"></span>
                    </a>

                    <ul class="pcoded-submenu">
                        <li class="">
                            <a href="index.php?action=listado_usuarios">
                                <span class="pcoded-mtext" data-i18n="nav.dash.default"><i class="ti-agenda"></i> Listado de usuarios</span>
                            </a>
                        </li>
                    </ul>
                    <ul class="pcoded-submenu">
                        <li class="">
                            <a href="index.php?action=agregar_usuarios">
                                <span class="pcoded-mtext" data-i18n="nav.dash.default"><i class="fa fa-plus-circle"></i> Agregar usuario</span>
                            </a>
                        </li>
                    </ul>
                </li>
            <?php }?>

            <?php if($_SESSION['username']=="admin"){ ?>
                <li class="pcoded-hasmenu">
                    <a href="#">
                        <span class="pcoded-micon"><i class="ti-user"></i><b>W</b></span>
                        <span class="pcoded-mtext"  data-i18n="nav.widget.main">Visitas</span>
                        <span class="pcoded-mcaret"></span>
                    </a>

                    <ul class="pcoded-submenu">
                        <li class="">
                            <a href="index.php?action=cw_visitas_vista">
                                <span class="pcoded-mtext" data-i18n="nav.dash.default"><i class="ti-agenda"></i> Listado de Visitas</span>
                            </a>
                        </li>
                    </ul>

                    <ul class="pcoded-submenu">
                        <li class="">
                            <a href="index.php?action=cw_visitas_agregar">
                                <span class="pcoded-mtext" data-i18n="nav.dash.default"><i class="fa fa-plus-circle"></i> Agregar Visitas</span>
                            </a>
                        </li>
                    </ul>
                </li>
            <?php }?>

            <?php if($_SESSION['username']=="admin"){ ?>
                 <li class="pcoded-hasmenu">
                    <a href="#">
                        <span class="pcoded-micon"><i class="ti-package"></i><b>W</b></span>
                        <span class="pcoded-mtext"  data-i18n="nav.widget.main">Premios</span>
                        <span class="pcoded-mcaret"></span>
                    </a>

                    <ul class="pcoded-submenu">
                        <li class="">
                            <a href="index.php?action=cw_premio_vista">
                                <span class="pcoded-mtext" data-i18n="nav.dash.default"><i class="ti-agenda"></i> Listado de premios</span>
                            </a>
                        </li>
                    </ul>

                    <?php if($_SESSION['username']=="admin"){ ?>
                        <ul class="pcoded-submenu">
                            <li class="">
                                <a href="index.php?action=agregar_usuarios">
                                    <span class="pcoded-mtext" data-i18n="nav.dash.default"><i class="fa fa-plus-circle"></i> Agregar premio</span>
                                </a>
                            </li>
                        </ul>
                    <?php } ?>
                </li>

                <li class="pcoded-hasmenu">
                <a href="#">
                    <span class="pcoded-micon"><i class="ti-settings"></i><b>W</b></span>
                    <span class="pcoded-mtext"  data-i18n="nav.widget.main">Servicios</span>
                    <span class="pcoded-mcaret"></span>
                </a>

                <!-- Lista desplegable -->
                <ul class="pcoded-submenu">
                    <li class="">
                        <a href="index.php?action=cw_servicio_vista">
                            <span class="pcoded-mtext" data-i18n="nav.dash.default"><i class="ti-agenda"></i> Listado de servicios</span>
                        </a>
                    </li>
                </ul>

                <?php if($_SESSION['username']=="admin"){ ?>
                    <ul class="pcoded-submenu">
                        <li class="">
                            <a href="index.php?action=cw_servicio_agregar">
                                <span class="pcoded-mtext" data-i18n="nav.dash.default"><i class="fa fa-plus-circle"></i> Agregar servicios</span>
                            </a>
                        </li>
                    </ul>
                <?php } ?>
                </li>

                <?php }?>
        </ul>
    </div>
</nav>