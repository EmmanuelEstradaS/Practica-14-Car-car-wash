


<div class="card">
    <div class="card-header">
        <h5>Listado de mis visitas:</h5>
        <div class="card-header-right"><i class="icofont icofont-spinner-alt-5"></i></div>
    </div>
    <div class="row card-block">
        <div class="col-md-12">
            <ul class="list-view">

                <?php
                    $visitas = new MvcController();
                    $visitas -> listadoVisitasController($_SESSION["id"]);
                ?>
 
            </ul>
        </div>
    </div>
</div>