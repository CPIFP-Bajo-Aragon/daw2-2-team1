
<?php require_once RUTA_APP.'/vistas/inc/header_no_logueado.php'?> 

    <!-- Header-->
    <header class=" imgindex bg-dark py-5">
        <div class="container continicio px-5 ">
            <div class="row gx-5 justify-content-center">
                <div class="col-lg-6">
                    <div class="text-center my-5">
                        <h1 class="display-5 fw-bolder text-white mb-2">Renueva tu entorno Emprende tu destino.</h1>
                        <p class="lead text-white-50 mb-4">Únete a la causa de la repoblación. Apoya los negocios locales para construir un futuro próspero y sostenible en tu comunidad.</p>
                        
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- Secciones-->
  <section id="servicios">
  <div class="encabezados text-center">
          <h3 class="encabezados pt-5 mb-5">
           NUESTROS SERVICIOS
          </h3>
        </div>
  <div class="row pt-5 pb-5 justify-content-center gap-10">
  <div class="col-sm-8 col-md-3 mb-8 mb-md-0 mb-2" >        
    <div class="card text-center">
          <div class="card-body">
            <h5 class="card-title">INMUEBLES</h5>
            <i class="bi bi-houses" style="font-size: 50px; color: currentColor;"></i>
                   
            <p class="card-text">Busca inmuebles según tus preferencias.</p>
            <a href="InvitadoControlador/mostrarOfertas" class="btn btn-primary" style="background-color:  #bb5511; border: none;">Buscar</a>
          </div>
        </div>
      </div>
      <div class="col-sm-8 col-md-3 mb-8 mb-md-0 mb-2">            
        <div class="card text-center">
                <div class="card-body">
                    <h5 class="card-title">NEGOCIOS</h5>
                    <i class="bi bi-buildings" style="font-size: 50px; color: currentColor;"></i>
                   
         <p class="card-text">Hazte dueño de negocios en traspaso.</p>
                    <a href="/InvitadoControlador/listarNegocios" class="btn btn-primary" style="background-color:  #bb5511; border: none;">Adquirir</a>
                </div>
            </div>
        </div>
        <div class="col-sm-8 col-md-3 mb-8 mb-md-0 mb-2">
                        <div class="card text-center">
                <div class="card-body">
                    <h5 class="card-title">SERVICIOS</h5>
                    <i class="bi bi-shop" style="font-size: 50px; color: currentColor;"></i>
                   
                   <p class="card-text">Localiza los servicios de tu zona.</p>
                    <a href="/InvitadoControlador/listarServicios" class="btn btn-primary" style="background-color:  #bb5511; border: none;">Localizar</a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- SOBRE NOSOTROS -->
<section class="about_section layout_padding" id="about">
        <div class="container">
            <div class="encabezados text-center">
                <h3 class="encabezados pt-5 mb-5">SOBRE NOSOTROS</h3>
            </div>
            <p class="layout_padding2-top">
                Somos una plataforma dedicada a fomentar la repoblación y apoyar el desarrollo sostenible de las comunidades. Ofrecemos servicios en tres áreas principales: inmuebles, negocios y servicios locales. 
            </p>
            <div class="img-box layout_padding2">
                <img src="images/about-img.jpg" alt="">
            </div>
            <p class="layout_padding2-bottom">
                Nuestra misión es construir un futuro próspero, brindando oportunidades a emprendedores locales y facilitando la conexión entre la oferta y la demanda en tu comunidad.
            </p>
        </div>
        <div class="container">
            <div class="btn-box">
                
                <hr>
            </div>
        </div>
    </section>


<!-- contacto -->
<section class="contact_section layout_padding" id="contacto">
    <div class="container">
        <div class="encabezados text-center pt-5 mb-5">
            <h3 class="">CONTACTO</h3>
        </div>
        <div class="container layout_padding2-top mb-5">
            <div class="row">
                <div class="col-md-6 mx-auto"> <!-- Añadido mx-auto para centrar el contenido horizontalmente -->
                    <form action="Inicio/contactar" method="post" class="border p-4">
                        <div class="mb-3">
                            <input type="text" class="form-control" placeholder="Nombre" name="nombre" id="nombre">
                        </div>
                        <div class="mb-3">
                            <input type="email" class="form-control" placeholder="Correo Electrónico" name="correo" id="correo">
                        </div>
                        <div class="mb-3">
                            <input type="text" class="form-control" placeholder="Número de Teléfono" name="telefono" id="telefono">
                        </div>
                        <div class="mb-3">
                            <textarea class="form-control" placeholder="Mensaje" rows="4" name="mensaje" id="mensaje"></textarea>
                        </div>
                        <div class="d-flex justify-content-center">
                            <button type="submit" class="text-white text-decoration-none px-3 py-1 rounded-4" style="background-color:  #bb5511; border: none;">Enviar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>




  
     

<?php require_once RUTA_APP.'/vistas/inc/footer.php'?>