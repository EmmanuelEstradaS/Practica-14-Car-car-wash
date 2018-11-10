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
<div class="row">
    <div class="col-xs-6 col-sm-3">  </div> 
    <div class="col-xs-6 col-sm-6">                                    

        <div class="card">
            <div class="card-header">
                <?php
                          $agregarP = new MvcController();
                          $agregarP -> agregarServicioController();
                        ?> 
                <h1>Agregar nuevo servicio</h1>
                <div class="card-header-right"><i class="icofont icofont-spinner-alt-5"></i></div>

                <div class="card-header-right">
                    <i class="icofont icofont-spinner-alt-5"></i>
                </div>

            </div>
            <div class="col-sm-12 mobile-inputs">
                        <form method="post"> 
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Nombre:</label>
                                <div class="col-sm-10">
                                    <input type="text" name="txtNombre" class="form-control form-control-round  form-txt-success" placeholder="Ingresa el nombre" required>
                                </div>
                            </div>

                            <div class="form-group">

                                <label for="exampleInputEmail1">Descripción:</label>
                                <textarea name="txtDescripcion" id="txtDescripcion" class="form-control" rows="5" cols="50"  value="" required> </textarea> 
                            </div>

                             <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Precio:</label>
                                <div class="col-sm-10">
                                    <input type="number" name="txtPrecio" class="form-control form-control-round  form-txt-success" placeholder="Ingresa el precio" required>
                                </div>
                            </div>


                            <div class="form-group row">
                            <div class="col-sm-12">
                                <input title="Agregar" name="btnEnviar" type="submit" value="AGREGAR" class=" form-control btn hor-grd btn-grd-primary">
                            </div>    
                            </div>
                        </form>
                        
                    </div>
                    <br><br>
        </div>
</div>
</div>















 