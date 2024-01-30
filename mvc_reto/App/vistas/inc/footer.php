
<footer class="bg-dark text-white text-center col-12 p-2 align-self-end">
                <div class="py-3 d-flex justify-content-center gap-3">
                    <a href="" class="text-decoration-none text-white">©2024 Revitalizona S.L. </a>
                    <a href="" class="text-decoration-none text-white"> Aviso legal  </a>
                    <a href="" class="text-decoration-none text-white">Protección de datos </a>
                    <a href="" class="text-decoration-none text-white">Política de cookies</a>
                    <div class="d-flex justify-content-end gap-3">
                    <a href="https://www.instagram.com/revi.talizona?utm_source=ig_web_button_share_sheet&igsh=ZDNlZDc0MzIxNw==" class="text-decoration-none text-white" target="_blank"><i class="bi bi-instagram"></i></a>
                        <a href="" class="text-decoration-none text-white"><i class="bi bi-facebook"></i></a>
                        <a href="" class="text-decoration-none text-white"><i class="bi bi-twitter"></i></a>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <script>    
        var ubicaciones = <?php echo json_encode($ubicaciones_php); ?>;
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="<?php echo RUTA_URL ?>/js/main.js"></script>
    
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBDaeWicvigtP9xPv919E-RNoxfvC-Hqik&callback=iniciarMap"></script>
</body>
</html>
