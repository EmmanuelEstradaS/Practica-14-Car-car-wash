<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>  </title>
    <meta name="description" content="Elisyam is a Web App and Admin Dashboard Template built with Bootstrap 4">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Google Fonts -->


    <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.26/webfont.js"></script>
    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Montserrat:400,500,600,700%7CNoto+Sans:400,700" media="all"><script>
      WebFont.load({
        google: {"families":["Montserrat:400,500,600,700","Noto+Sans:400,700"]},
        active: function() {
            sessionStorage.fonts = true;
        }
      });
    </script>
    <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="views/admin_assets/img/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="views/admin_assets/img/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="views/admin_assets/img/favicon-16x16.png">
    <!-- Stylesheet -->
    <link rel="stylesheet" href="views/admin_assets/vendors/css/base/bootstrap.min.css">
    <link rel="stylesheet" href="views/admin_assets/vendors/css/base/elisyam-1.5.min.css">
    <!-- Tweaks for older IEs--><!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->

    
</head>
<body id="page-top">

      <?php
        //se validan los tipos de action que hay ya que existen dos menus de navegacion diferentes
       if(isset($_GET["action"])){
              include("modules/admin_navegacion.php");
         }
      ?>
      <?php 
        $mvc = new MvcController();
        $mvc -> enlacesPaginasController();
      ?> 

<!-- Begin Vendor Js --> 
<script src="views/admin_assets/vendors/js/base/jquery.min.js"></script>
<script src="views/admin_assets/vendors/js/base/core.min.js"></script>
<!-- End Vendor Js -->
<!-- Begin Page Vendor Js -->
<script src="views/admin_assets/vendors/js/nicescroll/nicescroll.min.js"></script>
<script src="views/admin_assets/vendors/js/app/app.min.js"></script>
<!-- End Page Vendor Js -->
<!-- Begin Page Snippets -->
<script src="views/admin_assets/js/components/validation/validation.min.js"></script>
<!-- End Page Snippets -->

</body>
</html>
