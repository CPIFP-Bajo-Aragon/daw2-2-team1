<?php
    cabecera($this->datos);
?>

<div class="container mt-4 d-flex justify-content-center align-items-center">
    <div class="w-75">
        <h2 class="text-center mb-4">Chat de Usuario</h2>

        <div class="mb-4 border p-5 overflow-auto" style="max-height: 400px;">
            <div class="d-flex flex-column" id="chat-window">
               
            </div>
        </div>

        <form method="post" id="chat-form">
            <div class="form-group">
                <input type="hidden" name="recp" value="<?php echo $this->datos['receptor']->id_usuario?>">
                <label for="mensaje">Mensaje:</label>
                <input type="text" class="form-control" id="mensaje" name="mensaje" required>
            </div>

            <button type="submit" name="enviar"  class="btn btn-primary">Enviar</button>
        </form>
    </div>
</div>

<?php require_once RUTA_APP.'/vistas/inc/footer.php' ?>

<script>
    var reptor = <?php echo json_encode($this->datos['receptor']); ?>;

    function updateChat() {
        const chatWindow = document.getElementById('chat-window');

        fetch('/UserControlador/listarmensajeschat/' + reptor.id_usuario)
            .then(response => response.json())
            .then(data => {
                chatWindow.innerHTML = '';

                data.forEach(mensaje => {
                    const clase = (mensaje.id_usuario == <?php echo $_SESSION['usuarioSesion']['id_usuario']; ?>) ? 'text-right text-white bg-success' : 'text-left bg-danger';

                    const mensajeDiv = document.createElement('div');
                    mensajeDiv.className = `d-flex justify-content-${(mensaje.id_usuario === <?php echo $_SESSION['usuarioSesion']['id_usuario']; ?>) ? 'end' : 'start'} p-2 rounded mb-2 col-3 ${clase}`; // Ajusté la anchura a w-50
                    mensajeDiv.textContent = mensaje.mensaje_chat;

                    chatWindow.appendChild(mensajeDiv);
                });

                chatWindow.scrollTop = chatWindow.scrollHeight;
            })
            .catch(error => {
                console.error('Error al actualizar el chat:', error);
            });
    }

    // Llamar a la función updateChat al cargar la página y cada cierto intervalo (por ejemplo, cada 5 segundos)
    document.addEventListener('DOMContentLoaded', function () {
        updateChat();
        setInterval(updateChat, 5000); // 5000 milisegundos = 5 segundos
    });
</script>

</body>
</html>
