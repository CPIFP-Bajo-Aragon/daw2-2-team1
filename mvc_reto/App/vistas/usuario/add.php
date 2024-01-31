<?php
    cabecera($this->datos);
?>



    <h2>Añadir de Usuario</h2>
    <form method="post" onsubmit="return ValidateCrearUsuario()">
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" required><br>

        <label for="apellido">Apellido:</label>
        <input type="text" id="apellido" name="apellido" required><br>

        <label for="correo">Correo:</label>
        <input type="email" id="correo" name="correo" required><br>

        <label for="contrasena">Contraseña:</label>
        <input type="password" id="contrasena" name="contrasena" required><br>

        <label for="NIF">NIF:</label>
        <input type="text" id="NIF" name="nif" required><br>

        <input type="submit" value="Enviar">
    </form>




<?php 

require_once RUTA_APP.'/vistas/inc/footer.php'
?>
</body>
</html>