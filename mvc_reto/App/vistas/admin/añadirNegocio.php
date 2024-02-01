<?php
    cabecera($this->datos);
?>



<div class="container mt-5 text-center">
    <form action="" method="POST" class="mb-4">
        <h3>Datos del Negocio</h3>
        <div class="mb-3">
            <input type="text"  id="codigo_negocio" name="codigo_negocio" class="form-control" placeholder="Codigo">
        </div> 
        <div class="mb-3">
            <input type="text"  id="titulo" name="titulo" class="form-control" placeholder="Titulo">
        </div>
        <div class="mb-3">
            <input type="text" id="motivo_traspaso" name="motivo_traspaso" class="form-control" placeholder="Motivo traspaso">
        </div>
        <div class="mb-3">
            <input type="text" id="coste_traspaso" name="coste_traspaso" class="form-control" placeholder="coste Traspaso">
        </div>
        <div class="mb-3">
            <input type="text" id="coste_mensual" name="coste_mensual" class="form-control" placeholder="Coste Mensual">
        </div>
        <div class="mb-3">
            <input type="text" id="ubicacion" name="ubicacion" class="form-control" placeholder="Ubicacion">
        </div>
        <div class="mb-3">
            <input type="text" id="descripcion" name="descripcion" class="form-control" placeholder="Descripcion">
        </div>

        <div class="mb-3">
            <input type="text" id="capital_minimo" name="capital_minimo" class="form-control" placeholder="Capital minimo">
        </div>

          <div class="form-group mx-sm-4 pb-3">
        <input type="submit" class="btn btn-success btn-block" value="Añadir">
    </div>
       
    </form>
  
</div>


<?php
require_once RUTA_APP . '/vistas/inc/footer.php';
?>

