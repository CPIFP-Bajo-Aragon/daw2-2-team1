<?php
    cabecera();
?>
<div class="container mt-4">
            <a href="<?php echo RUTA_URL ?>/DocumentosControlador/nominas" class="text-decoration-none">
                <div class="p-3 bg-light border rounded">
                    nominas
                </div>
            </a>
            <a href="<?php echo RUTA_URL ?>/DocumentosControlador/curriculum" class="text-decoration-none">
                <div class="p-3 bg-light border rounded">
                    curriculum
                </div>
            </a>
    </div>
<?php 
require_once RUTA_APP.'/vistas/inc/footer.php'
?>