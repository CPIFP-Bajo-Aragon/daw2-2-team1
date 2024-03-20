<?php
    cabecera($this->datos);
?>


<div class="container mt-5">
    <div class="row">
        <div class="col-md-6 mb-3">
            <!-- Filtro de búsqueda -->
            <div class="input-group">
                <input type="text" class="form-control" placeholder="Buscar usuarios...">
                <button class="btn btn-outline-secondary" type="button">Buscar</button>
            </div>
        </div>
        <div class="col-md-6 mb-3">
            <!-- Filtro por población -->
            <select class="form-select" id="municipio" name="municipio">
                <option value="" selected>Seleccionar una opcion</option>
                <?php foreach ($this->datos['municipioslistar'] as $municipio): ?>
                    <option value="<?php echo $municipio->id_municipio ?>"><?php echo $municipio->nombre_municipio ?></option>
                <?php endforeach; ?>
            </select>
        </div>
    </div>

    <div id="userList" class="row row-cols-1 row-cols-md-2 g-4 mb-5"></div>
</div>



<script>
    var usuarios = <?php echo json_encode($this->datos['usuarioslistar']); ?>;

    var userListContainer = document.getElementById('userList');

    rellenar(usuarios);


    document.addEventListener('DOMContentLoaded', function () {
        var inputBusqueda = document.querySelector('.form-control');
        inputBusqueda.addEventListener('input', function () {
            filtrarUsuarios(this.value);
        });
    });

    function filtrarUsuarios(terminoBusqueda) {
        
        var usuariosFiltrados = usuarios.filter(function (usuario) {
            return usuario.nombre_usuario.toLowerCase().includes(terminoBusqueda.toLowerCase());
        });
        rellenar(usuariosFiltrados);
    };

    function rellenar(usuarios){
        userListContainer.innerHTML =``;
        usuarios.forEach(function(usuario) {
            var userCard = document.createElement('div');
            userCard.className = 'col';
            userCard.innerHTML = `
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">${usuario.nombre_usuario} ${usuario.apellidos_usuario}</h5>
                        <p class="card-text">
                            <strong>NIF:</strong> ${usuario.nif}<br>
                            <strong>Correo:</strong> ${usuario.correo_usuario}<br>
                            <strong>Fecha Nacimiento:</strong> ${usuario.fecha_nacimiento_usuario}<br>
                            <strong>Teléfono:</strong> ${usuario.telefono_usuario}<br>
                        </p>
                        <div class="btn-group" role="group" aria-label="Opciones">
                            <a class="btn btn-primary" href="/UserControlador/chat/${usuario.id_usuario}">Contactar</a>
                        </div>
                    </div>
                </div>
            `;
            userListContainer.appendChild(userCard);
        });
    }
</script>

<?php 
require_once RUTA_APP.'/vistas/inc/footer.php'
?>
</body>
</html>