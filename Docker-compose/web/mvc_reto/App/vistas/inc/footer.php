    </div>

    <footer class="text-white text-center  mt-auto" id="ConetendorFooter"  style="background-color:  #bb5511;">
    <div class="py-3 text-white row">
    <a href="#" class="text-decoration-none text-white col-12 col-xl-2 col-md-6">©2024 Revitalizona S.L. </a>
    <a href="#" class="text-decoration-none text-white col-12 col-xl-2 col-md-6">Aviso legal</a>
    <a href="#" class="text-decoration-none text-white col-12 col-xl-2 col-md-6">Protección de datos</a>
    <a href="#" class="text-decoration-none text-white col-12 col-xl-2 col-md-6">Política de cookies</a>
    <div class="d-flex justify-content-center gap-3 col-12 col-xl-2 col-md-6">
        <a href="https://www.instagram.com/revi.talizona?utm_source=ig_web_button_share_sheet&igsh=ZDNlZDc0MzIxNw==" class="text-decoration-none text-white" target="_blank"><i class="bi bi-instagram"></i></a>
        <a href="#" class="text-decoration-none text-white"><i class="bi bi-facebook"></i></a>
        <a href="#" class="text-decoration-none text-white"><i class="bi bi-twitter"></i></a>
    </div>
</div>

    </footer>
</div>
       
<!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-MH3X2VWF39"></script>

<script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'G-MH3X2VWF39');
</script>

<script>    
</script>

<script src="<?php echo RUTA_URL ?>/js/main.js"></script>

<?php
    if (isset($_SESSION['error_message'])) {
        // Muestra la alerta con el mensaje de error
        ?>
        <script>
        Swal.fire({
                    icon: "error",
                    title: "Oops...",
                    text: "<?php echo $_SESSION['error_message']; ?>"
                });
        </script>
        <?php
        // Limpia la variable de sesión
        unset($_SESSION['error_message']);
    }

    if (isset($_SESSION['correcto_message'])) {
        // Muestra la alerta con el mensaje de error
        ?>
        <script>
        Swal.fire({
                icon: "success",
                title: "<?php echo $_SESSION['correcto_message']; ?>",
                showConfirmButton: false,
                timer: 1500
                });
        </script>
        <?php
        // Limpia la variable de sesión
        unset($_SESSION['correcto_message']);
    }
?>
