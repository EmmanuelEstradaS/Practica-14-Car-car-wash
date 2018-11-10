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
                
                <h1>Actualizar contraseña</h1>
                <div class="card-header-right"><i class="icofont icofont-spinner-alt-5"></i></div>

                <div class="card-header-right">
                    <i class="icofont icofont-spinner-alt-5"></i>
                </div>

            </div>
            <div class="col-sm-12 mobile-inputs">
                        <form method="post"> 
                            <div class="form-group row">
                                <label class="col-sm-8 col-form-label">Ingrese contraseña actual:</label>
                                <div class="col-sm-10">
                                    <input type="password" name="txtPassword" class="form-control form-control-round  form-txt-success" placeholder="Ingresa Contraseña actual" required>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-8 col-form-label">Ingrese contraseña nueva:</label>
                                <div class="col-sm-10">
                                    <input type="password" name="txtPasswordN" class="form-control form-control-round  form-txt-success" placeholder="Ingresa Contraseña nueva" required>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-8 col-form-label"> Repetir contraseña nueva:</label>
                                <div class="col-sm-10">
                                    <input type="password" name="txtPasswordN2" class="form-control form-control-round  form-txt-success" placeholder="Repetir Contraseña nueva" required>
                                </div>
                            </div>

                           

                            <div class="form-group row">
                            <div class="col-sm-12">
                                <input title="Agregar" name="btnEnviar" type="submit" value="ACTUALIZAR" class=" form-control btn hor-grd btn-grd-primary">
                            </div>    
                            </div>
                        </form>
                        
                    </div>
                    <br>
                    <br>
        </div>
        <?php
            $editarPass = new MvcController();
            $editarPass -> actualizarPasswordController();
        ?> 
</div>
</div>















 