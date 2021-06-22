<form class="text-center border border-light p-5 col-lg-8" method="post" action="../formulario_consulta/mail.php">
    <p class="h4 mb-4">Dejanos tu consulta</p>

    <!-- Nombre -->
    <input type="text" id="defaultContactFormName" class="form-control mb-4" placeholder="nombre" name="name" required>

    <!-- Email -->
    <input type="email" id="defaultContactFormEmail" class="form-control mb-4" placeholder="E-mail" name="email" required>

    <!-- Subject -->
    <label>Tema</label>
    <select class="browser-default custom-select mb-4" name="seleccion">
        <option value="" disabled>Elejir opciones</option>
        <option value="1" selected>Dar de alta servicio</option>
        <option value="2">Reportar un error</option>
        <option value="3">Enviar una sugerencia</option>
        <option value="4">Consulta</option>
    </select>

    <!-- Message -->
    <div class="form-group">
        <textarea class="form-control rounded-0" id="exampleFormControlTextarea2" rows="3" placeholder="Mensaje" name="mensaje"></textarea>
    </div>

    <!-- Send button -->
    <button class="btn btn-info btn-block" type="submit">Enviar</button>

</form>
