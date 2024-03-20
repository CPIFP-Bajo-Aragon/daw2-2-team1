function validateInput(input, validationFunction) {
  var value = input.value;
  if (!validationFunction(value)) {
    input.classList.add("border-danger");
  } else {
    input.classList.remove("border-danger");
  }
}

function openMainModal() {
  var mainModal = document.getElementById('mainModal');

  // Clear the existing content
  mainModal.innerHTML = '';

  // Create elements
  var modalDialog = document.createElement('div');
  modalDialog.className = 'modal-dialog';
  modalDialog.setAttribute('role', 'document');

  var modalContent = document.createElement('div');
  modalContent.className = 'modal-content';

  var modalHeader = document.createElement('div');
  modalHeader.className = 'modal-header';

  var modalTitle = document.createElement('h5');
  modalTitle.className = 'modal-title';
  modalTitle.id = 'exampleModalLabel';
  modalTitle.textContent = 'Documentos';

  var closeButton = document.createElement('button');
  closeButton.type = 'button';
  closeButton.className = 'close';
  closeButton.setAttribute('data-dismiss', 'modal');
  closeButton.setAttribute('aria-label', 'Close');
  closeButton.addEventListener('click', closeMainModal);

  var closeIcon = document.createElement('span');
  closeIcon.setAttribute('aria-hidden', 'true');
  closeIcon.innerHTML = '&times;';

  closeButton.appendChild(closeIcon);
  modalHeader.appendChild(modalTitle);
  modalHeader.appendChild(closeButton);

  var modalBody = document.createElement('div');
  modalBody.className = 'modal-body';

  // Creating buttons for Nóminas and Curriculum
  var nominaButton = createModalButton('Nóminas', 'Contenido de Nóminas.');
  var contenidocurriculum = `
  <div class="container mt-4">
      <h2 class="mb-4">Subir Archivos</h2>
      <form method="post" enctype="multipart/form-data">
          <div class="custom-file mb-3">
              <input type="file" class="custom-file-input" id="archivo" name="archivo">
              <label class="custom-file-label" for="archivo">Elige Archivo</label>
          </div>
          <button type="submit" class="btn btn-primary">Subir Archivo</button>
      </form>

      <h2 class="mt-4">Archivos en la Carpeta</h2>
      <ul class="list-unstyled">
          <?php
        
          ?>
      </ul>

      <div class="button-container mt-4">
          <button onclick="location.reload()" class="btn btn-primary">Recargar Lista</button>
      </div>
  </div>
`;
  var curriculumButton = createModalButton('Curriculum', contenidocurriculum);

  var submodal = document.createElement('div');
  submodal.id = 'submodal';


  // Appending buttons to modalBody
  modalBody.appendChild(nominaButton);
  modalBody.appendChild(curriculumButton);

  // Appending elements to modalContent
  modalContent.appendChild(modalHeader);
  modalContent.appendChild(modalBody);

  // Appending modalContent to modalDialog
  modalDialog.appendChild(modalContent);

  // Appending modalDialog to mainModal
  mainModal.appendChild(modalDialog);
  mainModal.appendChild(submodal);


  // Display the modal
  mainModal.style.display = 'block';
  mainModal.classList.add('show');
}

function openMainModalavisos(titulo, contenido, id, tipo, leido) {
  var mainModal = document.getElementById('mainModal');

  // Clear the existing content
  mainModal.innerHTML = '';

  // Create elements
  var modalDialog = document.createElement('div');
  modalDialog.className = 'modal-dialog';
  modalDialog.setAttribute('role', 'document');

  var modalContent = document.createElement('div');
  modalContent.className = 'modal-content';

  var modalHeader = document.createElement('div');
  modalHeader.className = 'modal-header';

  var modalTitle = document.createElement('h5');
  modalTitle.className = 'modal-title';
  modalTitle.id = 'exampleModalLabel';
  modalTitle.textContent = titulo;

  var closeButton = document.createElement('button');
  closeButton.type = 'button';
  closeButton.className = 'close';
  closeButton.setAttribute('data-dismiss', 'modal');
  closeButton.setAttribute('aria-label', 'Close');
  closeButton.addEventListener('click', closeMainModal);

  var closeIcon = document.createElement('span');
  closeIcon.setAttribute('aria-hidden', 'true');
  closeIcon.innerHTML = '&times;';

  closeButton.appendChild(closeIcon);
  modalHeader.appendChild(modalTitle);
  modalHeader.appendChild(closeButton);

  var modalBody = document.createElement('div');
  modalBody.className = 'modal-body';
  modalBody.textContent = contenido;
  
  var modalfooter = document.createElement('div');
  modalfooter.className = 'modal-footer';
  var linkElement = document.createElement('a');

  if(tipo==="notificacion"){
    linkElement.href = '/UserControlador/eliminarNotificacion/'+id;
    if(leido==0){
      var linkleido = document.createElement('a');
      linkleido.href = '/UserControlador/leidoNotificacion/'+id;
      linkleido.className = 'btn btn-secondary'; // Clases de estilo de Bootstrap
      linkleido.innerText = 'Marcar como leido';  // Texto visible en el enlace
      
      modalfooter.appendChild(linkleido);
    }
  }else{
    // Crear el elemento <a> con estilos de Bootstrap
    linkElement.href = '/UserControlador/eliminarAviso/'+id;  // Puedes establecer la URL deseada
  }

  
  linkElement.className = 'btn btn-primary'; // Clases de estilo de Bootstrap
  linkElement.innerText = 'Eliminar';  // Texto visible en el enlace
  // Añadir el enlace al pie del modal
  modalfooter.appendChild(linkElement);

  // Appending elements to modalContent
  modalContent.appendChild(modalHeader);
  modalContent.appendChild(modalBody);
  modalContent.appendChild(modalfooter);

  // Appending modalContent to modalDialog
  modalDialog.appendChild(modalContent);

  // Appending modalDialog to mainModal
  mainModal.appendChild(modalDialog);


  // Display the modal
  mainModal.style.display = 'block';
  mainModal.classList.add('show');
}

function createModalButton(text, content) {
  var buttonContainer = document.createElement('a');
  buttonContainer.href = '#';
  buttonContainer.className = 'text-decoration-none';
  buttonContainer.addEventListener('click', function() {
      openSubModal(text, content);
  });

  var button = document.createElement('div');
  button.className = 'p-3 bg-light border rounded';
  button.textContent = text;

  buttonContainer.appendChild(button);

  return buttonContainer;
}

  function closeMainModal() {
      var mainModal = document.getElementById('mainModal');
      mainModal.style.display = 'none';
      mainModal.classList.remove('show');
  }

  function openSubModal(title, content) {
      var subModal =  document.getElementById('submodal');
      subModal.className = 'submodal fade show';
      subModal.innerHTML = `
          <div class="modal-dialog">
              <div class="modal-content">
                  <div class="modal-header">
                      <h5 class="modal-title">${title}</h5>
                      <button type="button" class="close" data-dismiss="modal" onclick="closeSubModal()">
                          <span>&times;</span>
                      </button>
                  </div>
                  <div class="modal-body">${content}</div>
              </div>
          </div>
      `;
      subModal.style.display = 'block';
  }

  function closeSubModal() {
      var subModal = document.querySelector('.submodal.fade.show');
      subModal.style.display = 'none';
      subModal.classList.remove('show');
  }