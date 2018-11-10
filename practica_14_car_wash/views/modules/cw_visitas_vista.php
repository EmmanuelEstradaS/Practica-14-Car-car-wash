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
<!DOCTYPE html>
<html>
<head>
	<title>Listado de visitas</title>
</head>
<body>


				<div class="card">
                    <div class="card-header">
						
                        <h1>Listado de visitas</h1>
                        <br>
                        <div class="float-left">
                        <?php if($_SESSION['username']=="admin"){ ?>

    						<a style="background-color: #31971A" href="index.php?action=cw_servicio_agregar" class="btn btn-out-dotted btn-primary btn-square" title="Agregar categorias">
    						      <i class="fa fa-plus-circle"></i>
    						        Agregar Visita 
    						  </a>
                        <?php } ?>
						</div>
                        <div class="card-header-right"> <i class="icofont icofont-spinner-alt-5"></i></div>
                    </div>
                    <div class="card-block">
                        <div class="dt-responsive table-responsive">
                            <div id="simpletable_wrapper" class="dataTables_wrapper dt-bootstrap4">
                            	<div class="row">
                            		<div class="col-xs-12 col-sm-12">
                            			



                            			<table id="example1" class="table table-striped table-bordered nowrap dataTable" role="grid" aria-describedby="simpletable_info">
                                <thead>
                                <tr role="row">
                                	<th class="sorting_asc" tabindex="0" aria-controls="simpletable" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 149px;">id
                                	</th>
                                	<th class="sorting" tabindex="0" aria-controls="simpletable" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" style="width: 106px;">Fecha
                                	</th>
                                	
                                
                                    <th class="sorting" tabindex="0" aria-controls="simpletable" rowspan="1" colspan="1" aria-label="Age: activate to sort column ascending" style="width: 49px;">Servicio
                                    </th>

                                    <th class="sorting" tabindex="0" aria-controls="simpletable" rowspan="1" colspan="1" aria-label="Start date: activate to sort column ascending" style="width: 108px;">Usuario
                                    </th>
                                    <?php if($_SESSION['username']=="admin"){ ?>


                                    	<th class="sorting" tabindex="0" aria-controls="simpletable" rowspan="1" colspan="1" aria-label="Salary: activate to sort column ascending" style="width: 74px;">Editar
                                    	</th>
                                    	<th class="sorting" tabindex="0" aria-controls="simpletable" rowspan="1" colspan="1" aria-label="Salary: activate to sort column ascending" style="width: 74px;">Eliminar
                                    	</th>
                                    <?php } ?>
                                </tr>
                                </thead>
                                <tbody>
                                	<?php 
                                		$cate = new MvcController();
                                		$cate -> vistaVisitaController();
                                	?>
                                </tbody>
                            </table>
                        </div>
                    </div>
            </div>
        </div>
    </div>
</div>	

</body>
</html>

<?php 
	$cate = new MvcController();
	$cate -> borrarServicioController();
?>