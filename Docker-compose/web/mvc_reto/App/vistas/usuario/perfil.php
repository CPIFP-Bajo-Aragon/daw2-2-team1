<?php
    cabecera($this->datos);

?>
 <style>
      

        .drop-area {
            border: 5px dashed #ddd;
            height: 300px;
            width: 500px;
            border-radius: 5px;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
        }

        .drop-area.active {
            background-color: #b8d4fe;
            color: black;
            border: 2px dashed #618ac9;
        }

        .drop-area h2 {
            font-size: 20px;
            font-weight: 500;
            color: #000;
        }

        .drop-area span {
            font-size: 25px;
            color: #000;
        }

        .drop-area button {
            padding: 5px 10px;
            font-size: 20px;
            border: 0;
            outline: none;
            background-color: #5256ad;
            color: white;
            border-radius: 5px;
            cursor: pointer;
            margin: 20px;
        }

        .file-container {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 10px;
            border: solid 1px #ddd;
        }

        #preview {
            margin-top: 10px;
        }

        .status-text {
            padding: 0 10px;
        }

        .success {
            color: #52ad5a;
        }

        .failure {
            color: #ff0000;
        }
    </style>


<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8 bg-white rounded p-4 shadow row">
            <form method="POST" class="col-6 h-100" enctype="multipart/form-data" onsubmit="return ValidateCrearUsuario();">
                <div class="form-row">
                    <div class="form-group col-md-6">
                    <label for="nombre">Foto:</label>
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="inputFoto" name="foto">

                        <label class="custom-file-label" for="inputFoto">Elegir archivo...</label>
                    </div>
                    <img id="previewFoto" src="/images/perfil_<?php echo $this->datos['usuarioSesion']['id_usuario'] ?>/Perfil.jpg" alt="User Photo" class="img-fluid rounded-circle mt-2" style="width: 150px; height: 150px; object-fit: cover;">
                </div>

                </div>
                <div class="form-row">
                    <div class="form-group col-md-8">
                        <label for="nif">NIF:</label>
                        <input type="text" class="form-control" onblur="validateInput(this, validateNIF)" id="nif" name="nif" value="<?php echo $this->datos['usuarioSesion']['nif']?>">
                    </div>
                    <div class="form-group col-md-8">
                        <label for="nombre">Nombre:</label>
                        <input type="text" class="form-control" onblur="validateInput(this, validateNombre)" id="nombre" name="nombre" value="<?php echo $this->datos['usuarioSesion']['nombre_usuario']?>">
                    </div>
                    <div class="form-group col-md-8">
                        <label for="apellido">Apellido:</label>
                        <input type="text" class="form-control" onblur="validateInput(this, validateApellido)" id="apellido" name="apellido" value="<?php echo $this->datos['usuarioSesion']['apellidos_usuario']?>">
                    </div>
                    <div class="form-group col-md-8">
                        <label for="email">Email(Tambien sera tu nombre de usuario):</label>
                        <input type="email" class="form-control" onblur="validateInput(this, validateCorreo)" id="email" name="email" value="<?php echo $this->datos['usuarioSesion']['correo_usuario']?>">
                    </div>
                    <div class="form-group col-md-8">
                        <label for="email">Fecha nacimiento:</label>
                        <input type="date" class="form-control" id="fecha_nacimiento" name="fecha_nacimiento" value="<?php echo $this->datos['usuarioSesion']['fecha_nacimiento_usuario']; ?>">
                    </div>
                    <div class="form-group col-md-8">
                        <label for="email">Telefono Usuario:</label>
                        <input type="text" class="form-control" id="telefono" name="telefono" value="<?php echo $this->datos['usuarioSesion']['telefono_usuario']?>">
                    </div>
                </div>
                <input type="hidden" name="id_usuario" value="<?php echo $this->datos['usuarioSesion']['id_usuario']?>">
                <button type="submit" name="Actualizarformulario" class="btn btn-primary">Guardar</button>
            </form>
            <div class="row col-6 h-100">
        <h3>Tus archivos:</h3>
        <style>
    .drop-area {
        max-height: 300px; 
        overflow-y: auto;
    }
</style>

            <form class="mt-0" method="post" enctype="multipart/form-data" id="file-form">
                <div class="drop-area" id="preview">
                    <h2>Arrastra y suelta imágenes o .pdf</h2>
                    <span>o</span>
                    <label for="archivo" class="file-label">
                        <input type="file" name="archivo" id="archivo" multiple />
                    </label>
                    <input type="submit" value="Guardar">
                </div>
            </form>


        

                <div class="row col-12  mt-3">
                    <!-- Los checkboxes con las funciones correspondientes -->
                        <div class="col-12 row h-25 m-0">
                            <input type="checkbox" id="chkMensajes" class="col-1 h-25" <?php echo $this->datos['usuarioSesion']['notificar_mensajes'] == 1 ? 'checked' : ''; ?> onchange="manejarCambioMensajes()">
                            <label for="chkMensajes" class="col-11">Notificar Mensajes</label>
                        </div>

                        <div class="col-12 row h-25 m-0">
                            <input type="checkbox" id="chkAvisos" class="col-1 h-25" <?php echo $this->datos['usuarioSesion']['notificar_avisos'] == 1 ? 'checked' : ''; ?> onchange="manejarCambioAvisos()">
                            <label for="chkAvisos" class="col-11">Notificar Avisos</label>
                        </div>

                        <div class="col-12 row h-25 m-0">
                            <input type="checkbox" id="chkNotificaciones" class="col-1 h-25" <?php echo $this->datos['usuarioSesion']['notificar_notificaciones'] == 1 ? 'checked' : ''; ?> onchange="manejarCambioNotificaciones()">
                            <label for="chkNotificaciones" class="col-11">Notificar Notificaciones</label>
                        </div>
                </div>

            </div>
        </div>
    </div>
</div>
<?php 

require_once RUTA_APP.'/vistas/inc/footer.php'
?>

<script>
    const dropArea = document.querySelector(".drop-area");
    const dragText = dropArea.querySelector("h2");
    const label = dropArea.querySelector('.file-label');
    const input = dropArea.querySelector("#archivo");

    label.addEventListener("click", (e) => {
        input.click();
    });

    input.addEventListener("change", (e) => {
        const files = input.files;
        dropArea.classList.add("active");
        showFiles(files);
        dropArea.classList.remove("active");
    });

    dropArea.addEventListener("dragover", (e) => {
        e.preventDefault();
        dropArea.classList.add("active");
        dragText.textContent = "Suelta para subir los archivos";
    });

    dropArea.addEventListener("dragleave", (e) => {
        e.preventDefault();
        dropArea.classList.remove("active");
        dragText.textContent = "Arrastra y suelta los archivos";
    });

    dropArea.addEventListener("drop", (e) => {
        e.preventDefault();
        const files = e.dataTransfer.files;
        showFiles(files);
        dropArea.classList.remove("active");
        dragText.textContent = "Arrastra y suelta los archivos";
    });

    function showFiles(files) {
        if (files.length === undefined) {
            processFile(files);
        } else {
            for (const file of files) {
                processFile(file);
            }
        }
    }

    function processFile(file) {
        const docType = file.type;
        const validImageExtensions = ['image/jpeg', 'image/jpg', 'image/png', 'image/gif'];
        const validPdfExtensions = ['application/pdf'];

        if (validImageExtensions.includes(docType)) {
            handleImageFile(file);
        } else if (validPdfExtensions.includes(docType)) {
            handlePdfFile(file);
        } else {
            alert("No es un archivo válido");
        }
    }

    function handleImageFile(file) {
        const fileReader = new FileReader();
        const id = `file-${Math.random().toString(32).substring(7)}`;

        fileReader.addEventListener('load', e => {
            const fileUrl = fileReader.result;
            const image = `
                <div id="${id}" class="status-text">
                    <span>${file.name}</span>
                </div>
            `;
            const html = document.querySelector("#preview").innerHTML;
            document.querySelector('#preview').innerHTML = image + html;

            uploadFile(id, file);
        });

        fileReader.readAsDataURL(file);
    }

    function handlePdfFile(file) {
        const id = `file-${Math.random().toString(32).substring(7)}`;
        const pdf = `
            <div id="${id}" class="status-text">
                <span>${file.name}</span>
            </div>
        `;
        const html = document.querySelector("#preview").innerHTML;
        document.querySelector('#preview').innerHTML = pdf + html;

        uploadFile(id, file);
    }

    async function uploadFile(id, file) {
        const formData = new FormData();
        formData.append("archivo", file);

        try {
            const response = await fetch("/DocumentosControlador/subir", {  // Update the URL to match your server endpoint
                method: "POST",
                body: formData,
            });

            const responseText = await response.text();
            document.querySelector(`#${id} .status-text`).innerHTML = `<span class="success">${responseText}</span>`;
        } catch (error) {
            document.querySelector(`#${id} .status-text`).innerHTML = `<span class="failure">Error</span>`;
        }
    }
</script>


<script>
    var datos = <?php echo json_encode($this->datos); ?>


    // Suponiendo que tienes una función handleFileUpload que maneja la subida del archivo
    function handleFileDrop(event) {
        event.preventDefault();

        // Tu lógica para manejar la subida de archivos

        // Ocultar el contenido de subida de archivos
        document.getElementById('file-upload-content').style.display = 'none';
    }

    function handleFileInput(event) {
        // Tu lógica para manejar la subida de archivos desde el input

        // Ocultar el contenido de subida de archivos
        document.getElementById('file-upload-content').style.display = 'none';
    }

    if(datos['CambioEnPerfil']==1){
        Swal.fire({
            icon: "success",
            title: "Tus cambios han sido guardados",
            showConfirmButton: false,
            timer: 1500
            });
    }

    

    function manejarCambioMensajes() {
        var checkbox = document.getElementById('chkMensajes');
        var isChecked = checkbox.checked;

        if (isChecked) {
            var valor = 1;

            // Agrega tu lógica para cuando el checkbox está marcado
        } else {
            var valor = 0;
            // Agrega tu lógica para cuando el checkbox no está marcado
        }
        window.location.href = '/UserControlador/NotiMensajes/' + valor;
    }

    function manejarCambioAvisos() {
        var checkbox = document.getElementById('chkAvisos');
        var isChecked = checkbox.checked;

        if (isChecked) {
            var valor = 1;

            // Agrega tu lógica para cuando el checkbox está marcado
        } else {
            var valor = 0;
            // Agrega tu lógica para cuando el checkbox no está marcado
        }
        window.location.href = '/UserControlador/NotiAvisos/' + valor;
    }

    function manejarCambioNotificaciones() {
        var checkbox = document.getElementById('chkNotificaciones');
        var isChecked = checkbox.checked;

        if (isChecked) {
            var valor = 1;

            // Agrega tu lógica para cuando el checkbox está marcado
        } else {
            var valor = 0;
            // Agrega tu lógica para cuando el checkbox no está marcado
        }
        window.location.href = '/UserControlador/NotiNotificacion/' + valor;
    }
    

</script>
<script src="<?php echo RUTA_URL ?>/js/RegistrarUsuario.js"></script>


</body>
</html>